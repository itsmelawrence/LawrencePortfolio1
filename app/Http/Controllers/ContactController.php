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

        // Step 2: Verify Turnstile (Cloudflare)
        $secretKey = env('CLOUDFLARE_TURNSTILE_SECRET_KEY');
        $token = $request->input('cf-turnstile-response');

        // Detect the user's real IP (Cloudflare-aware)
        $remoteIp = $request->server('HTTP_CF_CONNECTING_IP')
            ?? $request->server('HTTP_X_FORWARDED_FOR')
            ?? $request->ip();

        $url = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
        $data = [
            'secret' => $secretKey,
            'response' => $token,
            'remoteip' => $remoteIp,
        ];

        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
                'timeout' => 5,
            ],
        ];

        try {
            $context = stream_context_create($options);
            $response = file_get_contents($url, false, $context);

            if ($response === false) {
                throw new \Exception('No response from Turnstile API');
            }

            $validation = json_decode($response, true);
        } catch (\Exception $e) {
            Log::error('Turnstile API error: ' . $e->getMessage());

            return response()->json([
                'message' => 'Captcha verification could not be completed.',
                'errors' => ['captcha' => 'Captcha service unavailable. Please try again later.'],
            ], 422);
        }

        // Step 3: Check validation result
        if (!($validation['success'] ?? false)) {
            Log::warning('Turnstile validation failed', [
                'errors' => $validation['error-codes'] ?? [],
                'ip' => $remoteIp,
            ]);

            return response()->json([
                'message' => 'Captcha verification failed.',
                'errors' => ['captcha' => 'Failed captcha verification.'],
            ], 422);
        }

        // Step 4: Store the message
        Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);

        // Step 5: Return success
        return response()->json(['message' => 'Message sent successfully.']);
    }


}