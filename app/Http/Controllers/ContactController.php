<?php

namespace App\Http\Controllers;

use App\Mail\ContactNotification;
use App\Models\Contact;
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
            'cf-turnstile-response' => 'required',
        ]);
        
        if (app()->env('production')) {
            $token = $request->input('cf-turnstile-response');
            $secretKey = env('TURNSTILE_SECRET_KEY', '0x4AAAAAAB5a-LIzDwuQzJMaKLYPHJWbv9o');
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
        
        $contact = Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);

        try {
            Http::timeout(10)
                ->acceptJson()
                ->post('https://lawrencetendenilla.app.n8n.cloud/webhook/d7b0889e-e383-4630-8968-332be9c3a3b2', [
                    'id'        => $contact->id,
                    'name'      => $contact->name,
                    'email'     => $contact->email,
                    'message'   => $contact->message,
                    'submitted' => now()->toDateTimeString(),
                    'ip'         => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ]);
        } catch (\Exception $e) {
            Log::error('Failed to send contact to n8n: ' . $e->getMessage());
        }

        try {
            Mail::to('lawrencetendenilla83@gmail.com')->send(new ContactNotification($contact));
        } catch (\Exception $e) {
            Log::error('Contact notification email failed: ' . $e->getMessage());
        }

        return response()->json(['message' => 'Message sent successfully.']);
    }
}