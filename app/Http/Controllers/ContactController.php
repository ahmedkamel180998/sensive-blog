<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request)
    {
        $validated = $request->validated();
        Contact::create($validated);

        return back()->with('status', 'Your Contact message was sent successfully');
    }
}
