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
            'g-recaptcha-response' => 'required'
        ]);

        // Step 2: Verify reCAPTCHA with Google
        try {
            $recaptchaResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret'   => env('GOOGLE_RECAPTCHA_SECRET_KEY'),
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip()
            ]);

            $recaptchaResult = $recaptchaResponse->json();

            if (!($recaptchaResult['success'] ?? false)) {
                return response()->json([
                    'message' => 'Captcha verification failed.',
                    'errors' => ['captcha' => 'Failed captcha verification.']
                ], 422);
            }
        } catch (\Exception $e) {
            Log::error('reCAPTCHA error: ' . $e->getMessage());

            return response()->json([
                'message' => 'Captcha verification could not be completed.',
                'errors' => ['captcha' => 'Captcha service unavailable. Please try again later.']
            ], 422);
        }

        // Step 3: Store the message
        Contact::create($validated);

        // Step 4: Return success
        return response()->json(['message' => 'Message sent successfully.']);
    }

}
