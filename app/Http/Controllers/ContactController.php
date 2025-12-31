<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('user.contact');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
        Contact::create($validated);
        return back()->with('success', 'Your message has been sent.');
    }
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contacts.index', compact('contacts'));
    }
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Message deleted.');
    }
}
