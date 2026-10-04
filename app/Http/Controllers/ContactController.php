<?php

namespace App\Http\Controllers;

use App\Mail\ContactNotification;
use App\Mail\SpamRejection;
use App\Support\ContactSpamDetector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function store(Request $request, ContactSpamDetector $spamDetector)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
            'website' => 'nullable|string|max:255',
            'cf-turnstile-response' => 'required',
        ]);

        if (app()->environment('production')) {
            $token = $request->input('cf-turnstile-response');
            $secretKey = config('services.turnstile.secret');
            $remoteIp = $request->ip();

            try {
                $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                    'secret' => $secretKey,
                    'response' => $token,
                    'remoteip' => $remoteIp,
                ]);

                $result = $response->json();
            } catch (\Exception $e) {
                Log::error('Turnstile request failed: ' . $e->getMessage());
                return response()->json([
                    'message' => 'Captcha verification could not be completed.',
                    'errors' => ['captcha' => 'Captcha service unavailable. Please try again later.'],
                ], 422);
            }

            if (!($result['success'] ?? false)) {
                Log::error('Turnstile validation failed', ['errors' => $result['error-codes'] ?? []]);
                return response()->json([
                    'message' => 'Captcha verification failed.',
                    'errors' => ['captcha' => 'Captcha verification failed. Please try again.'],
                ], 422);
            }
        }

        $spamAssessment = $spamDetector->inspect($validated);

        if ($spamAssessment['is_spam']) {
            Log::notice('Contact form spam suppressed', [
                'score' => $spamAssessment['score'],
                'reasons' => $spamAssessment['reasons'],
                'email_hash' => hash('sha256', strtolower($validated['email'])),
                'ip_hash' => hash('sha256', (string) $request->ip()),
            ]);

            $shouldAutorespond = (bool) config('contact.spam.autorespond', false)
                && $spamAssessment['score'] >= (int) config('contact.spam.autorespond_threshold', 10)
                && in_array('brand_impersonation_domain', $spamAssessment['reasons'], true)
                && !in_array('honeypot_filled', $spamAssessment['reasons'], true);

            if ($shouldAutorespond) {
                try {
                    Mail::to($validated['email'])->send(new SpamRejection);
                } catch (\Throwable $e) {
                    Log::warning('Spam rejection email failed', [
                        'error' => $e->getMessage(),
                        'email_hash' => hash('sha256', strtolower($validated['email'])),
                    ]);
                }
            }

            return response()->json(['message' => 'Message sent successfully.']);
        }

        try {
            Mail::to(config('mail.contact_recipient'))->send(new ContactNotification(
                name: $validated['name'],
                email: $validated['email'],
                inquiryMessage: $validated['message'],
                submittedAt: now(),
            ));
        } catch (\Throwable $e) {
            Log::error('Contact notification email failed: ' . $e->getMessage());

            return response()->json([
                'message' => 'Your message could not be delivered. Please try again.',
            ], 503);
        }

        return response()->json(['message' => 'Message sent successfully.']);
    }
}
