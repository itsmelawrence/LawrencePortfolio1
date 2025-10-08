<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        return view('home'); // Your form view
    }

    /**
     * Store the submitted contact data in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Step 1: Validate Input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
            'cf-turnstile-response' => 'required',
        ]);

        // Step 2: Skip verification in development
        if (app()->environment('production')) {
            $token = $request->input('cf-turnstile-response');
            $secretKey = '0x4AAAAAAB5a-LIzDwuQzJMaKLYPHJWbv9o';
            $remoteIp = $request->ip();

            try {
                $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                    'secret' => $secretKey,
                    'response' => $token,
                    'remoteip' => $remoteIp,
                ]);

                $validation = $response->json();

                if (!($validation['success'] ?? false)) {
                    Log::error('Turnstile validation failed', [
                        'errors' => $validation['error-codes'] ?? [],
                    ]);

                    return response()->json(
                        [
                            'message' => 'Captcha verification could not be completed.',
                            'errors' => ['captcha' => 'Captcha verification failed. Please try again.'],
                        ],
                        422,
                    );
                }
            } catch (\Exception $e) {
                Log::error('Turnstile request failed: ' . $e->getMessage());
                return response()->json(
                    [
                        'message' => 'Captcha verification could not be completed.',
                        'errors' => ['captcha' => 'Captcha service unavailable. Please try again later.'],
                    ],
                    422,
                );
            }
        }

        // Step 4: Check validation result
        if (!($validation['success'] ?? false)) {
            Log::warning('Turnstile validation failed', [
                'errors' => $validation['error-codes'] ?? [],
                'ip' => $remoteIp,
            ]);

            return response()->json(
                [
                    'message' => 'Captcha verification failed.',
                    'errors' => ['captcha' => 'Failed captcha verification.'],
                ],
                422,
            );
        }

        // Step 5: Store message
        Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);

        // Step 6: Return success
        return response()->json(['message' => 'Message sent successfully.']);
    }
}