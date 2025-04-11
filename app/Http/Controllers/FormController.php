<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'message' => 'required|min:10'
            ], [
                'name.required' => 'Name field is required.',
                'email.required' => 'Email field is required.',
                'email.email' => 'Email field must be a valid email address.',
                'message.required' => 'Message field is required.',
                'message.min' => 'Message must be at least 10 characters long.'
            ]);

        // You can process or store the data here
        // e.g., ContactMessage::create($validatedData);

        return back()->with('success', 'Message sent successfully.');
    }
    
}
