<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contactInfo = ContactUs::first();

        $emails = ContactUs::whereNotNull('emails')->pluck('emails')->filter();
        $contacts = ContactUs::whereNotNull('contacts')->pluck('contacts')->filter();

        return view('contact', compact('contactInfo', 'emails', 'contacts'));
    }
}
