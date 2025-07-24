<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('home');  // Your form view
    }

    /**
     * Store the submitted contact data in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required',
            'g-recaptcha-response' => 'required'
        ]);

        // Verify reCAPTCHA with Google
        $response = \Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => '6LcnYI0rAAAAADcnPyKCh4bNOEXPvG4KMVXGg29-',
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip()
        ]);

        $result = $response->json();

        if (!($result['success'] ?? false)) {
            return response()->json([
                'message' => 'Captcha verification failed.',
                'errors' => ['captcha' => 'Failed captcha verification.']
            ], 422);
        }

        // Store to database if captcha passed
        \App\Models\Contact::create($validated);

        return response()->json(['message' => 'Message sent.']);
    }
}
