<?php

namespace App\Http\Controllers;

use App\Mail\ServiceBookingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ServiceCenterController extends Controller
{
    public function index()
    {
        return view('pages.service-center');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'id_number' => ['required', 'string', 'max:100'],
            'reg_number' => ['required', 'string', 'max:100'],
            'model' => ['required', 'string', 'max:255'],
            'booking_date' => ['required', 'date', 'after_or_equal:today'],
        ]);

        $recipient = config('mail.contact_recipient');
        Mail::to($recipient)->send(new ServiceBookingMail($validated));

        return redirect()->route('service-center')->with('success', 'Your appointment request has been received. We will contact you shortly.');
    }
}
