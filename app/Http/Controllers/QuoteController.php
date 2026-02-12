<?php

namespace App\Http\Controllers;

use App\Mail\QuoteFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'contact_number' => ['nullable', 'string', 'max:50'],
            'country' => ['nullable', 'string', 'max:100'],
            'product' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $message = 'Thank you for your quote request. We will get back to you shortly.';

        try {
            $recipient = config('mail.contact_recipient');
            Mail::to($recipient)->send(new QuoteFormMail($validated));
        } catch (\Throwable $e) {
            Log::error('Quote form mail failed: ' . $e->getMessage(), [
                'exception' => $e,
                'quote_email' => $validated['email'] ?? null,
            ]);
            // Still show success so the user gets confirmation; admin can fix mail later
        }

        return redirect()->back()->with('quote_success', $message);
    }
}
