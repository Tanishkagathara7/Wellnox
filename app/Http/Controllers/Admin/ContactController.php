<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of contact enquiries with search, status filters and pagination.
     */
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->search($search);
        }

        if ($request->filled('status')) {
            $query->status($request->input('status'));
        }

        $contacts = $query->latest()
            ->paginate(10)
            ->withQueryString();

        $statusCounts = [
            'all'      => Contact::count(),
            'new'      => Contact::where('status', 'new')->count(),
            'read'     => Contact::where('status', 'read')->count(),
            'replied'  => Contact::where('status', 'replied')->count(),
            'archived' => Contact::where('status', 'archived')->count(),
        ];

        return view('admin.contacts.index', compact('contacts', 'statusCounts'));
    }

    /**
     * Display the specified contact enquiry.
     */
    public function show(Contact $contact)
    {
        // Auto mark as read if it is currently new
        if ($contact->status === 'new') {
            $contact->update(['status' => 'read']);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Update the enquiry status (read, replied, archived).
     */
    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:new,read,replied,archived'],
        ]);

        $contact->update($validated);

        return back()->with('success', 'Enquiry status updated to ' . ucfirst($validated['status']) . '.');
    }

    /**
     * Remove the specified contact enquiry.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact enquiry deleted successfully.');
    }
}
