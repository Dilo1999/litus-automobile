<?php

namespace App\Http\Controllers;

use App\Mail\PartsInquiryMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PartsController extends Controller
{
    public function index()
    {
        return view('pages.parts');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => ['required', 'string', 'max:100'],
            'year' => ['required', 'string', 'max:10'],
            'model' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'parts_needed' => ['required', 'string', 'max:5000'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
        ]);

        $recipient = config('mail.contact_recipient');
        Mail::to($recipient)->send(new PartsInquiryMail($validated));

        return redirect()->route('parts')->with('success', 'Thank you for your inquiry. Our team will contact you shortly.');
    }
}
