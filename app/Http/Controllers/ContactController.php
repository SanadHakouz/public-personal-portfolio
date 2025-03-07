<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Store a contact request.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactRequest::create($validated);

        return redirect()->route('contact')->with('success', 'Thank you for your message! We will get back to you soon.');
    }

    /**
     * Display a listing of contact requests in admin panel.
     */
    public function adminIndex()
    {
        $contactRequests = ContactRequest::latest()->paginate(10);
        return view('admin.contacts.index', compact('contactRequests'));
    }

    /**
     * Display the specified contact request in admin panel.
     */
    public function adminShow(ContactRequest $contactRequest)
    {
        // Mark as read when viewed
        if (!$contactRequest->is_read) {
            $contactRequest->update(['is_read' => true]);
        }

        return view('admin.contacts.show', compact('contactRequest'));
    }

    /**
     * Remove the specified contact request.
     */
    public function adminDestroy(ContactRequest $contactRequest)
    {
        $contactRequest->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact request deleted successfully.');
    }
}
