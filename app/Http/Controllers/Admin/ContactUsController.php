<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactUsController extends Controller
{
    public function index()
    {
        $contacts = ContactUs::latest()->paginate(10);
        return view('admin.contact-us.index', compact('contacts'));
    }

    public function create()
    {
        if (!ContactUs::exists()) {
            ContactUs::create([
                'address' => '123 Business Bay, Dubai, UAE',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3610.178510024321!2d55.266483!3d25.186069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f69b4a9fc2ebd%3A0x27b21b1800ef4053!2sBusiness%20Bay%20-%20Dubai%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2s!4v1650000000000!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'emails' => 'info@cryptohome.ae, sales@cryptohome.ae, support@cryptohome.ae',
                'contacts' => '+971 4 123 4567, +971 50 123 4567, +971 55 123 4567'
            ]);

            return redirect()->route('admin.contact-us.index')
                ->with('success', 'Initial contact information created successfully');
        }

        return view('admin.contact-us.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'address' => 'nullable|string',
            'map' => 'nullable|string',
            'emails' => 'nullable|string',
            'contacts' => 'nullable|string',
            'address_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'contact_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('address_icon')) {
            $data['address_icon'] = $request->file('address_icon')->store('uploads/contact', 'public');
        }

        if ($request->hasFile('contact_icon')) {
            $data['contact_icon'] = $request->file('contact_icon')->store('uploads/contact', 'public');
        }

        if ($request->hasFile('email_icon')) {
            $data['email_icon'] = $request->file('email_icon')->store('uploads/contact', 'public');
        }

        ContactUs::create($data);
        return redirect()->route('admin.contact-us.index')->with('success', 'Contact information created successfully');
    }

    public function edit(ContactUs $contactUs)
    {
        return view('admin.contact-us.edit', compact('contactUs'));
    }

    public function update(Request $request, ContactUs $contactUs)
    {
        $data = $request->validate([
            'address' => 'nullable|string',
            'map' => 'nullable|string',
            'emails' => 'nullable|string',
            'contacts' => 'nullable|string',
            'address_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'contact_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('address_icon')) {
            if ($contactUs->address_icon) {
                Storage::disk('public')->delete($contactUs->address_icon);
            }
            $data['address_icon'] = $request->file('address_icon')->store('uploads/contact', 'public');
        }

        if ($request->hasFile('contact_icon')) {
            if ($contactUs->contact_icon) {
                Storage::disk('public')->delete($contactUs->contact_icon);
            }
            $data['contact_icon'] = $request->file('contact_icon')->store('uploads/contact', 'public');
        }

        if ($request->hasFile('email_icon')) {
            if ($contactUs->email_icon) {
                Storage::disk('public')->delete($contactUs->email_icon);
            }
            $data['email_icon'] = $request->file('email_icon')->store('uploads/contact', 'public');
        }

        $contactUs->update($data);
        return redirect()->route('admin.contact-us.index')->with('success', 'Contact information updated successfully');
    }

    public function destroy(ContactUs $contactUs)
    {
        if ($contactUs->address_icon) {
            Storage::disk('public')->delete($contactUs->address_icon);
        }
        if ($contactUs->contact_icon) {
            Storage::disk('public')->delete($contactUs->contact_icon);
        }
        if ($contactUs->email_icon) {
            Storage::disk('public')->delete($contactUs->email_icon);
        }

        $contactUs->delete();
        return redirect()->route('admin.contact-us.index')->with('success', 'Contact information deleted successfully');
    }
}
