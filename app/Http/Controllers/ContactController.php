<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactInformation;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contactInfo = ContactInformation::getActive();
        return view('contact', compact('contactInfo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'service_interest' => 'nullable|string|max:255',
            'message' => 'required|string',
            'privacy_consent' => 'required|accepted',
        ]);

        // Combine first and last name
        $name = $request->first_name . ' ' . $request->last_name;

        Contact::create([
            'name' => $name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->service_interest ?? 'General Inquiry',
            'message' => $request->message,
            'status' => 'new',
        ]);

        return redirect()->route('contact')->with('success', 'Thank you for your message. We will get back to you soon!');
    }
}
