<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class contactController extends Controller
{
    // Display the contact page
    public function show()
    {
        $contact = Contact::first();
        return view('contact.show', compact('contact'));
    }

    // Show form to edit the contact content
    public function edit()
    {
        $contact = Contact::first();
        return view('admin.contact.edit', compact('contact'));
    }

    // Update the contact content in the database
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $contact = Contact::first();
        if ($contact) {
            $contact->update($validated);
        } else {
            Contact::create($validated);
        }

        return redirect()->route('dashboard.contact.edit')->with('success', 'Contact content updated successfully!');
    }
}
