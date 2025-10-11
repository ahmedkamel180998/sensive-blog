<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        // beginner solution for named error bag
        $requestUri = $request->getRequestUri();
        // Via the global "session" helper...
        session(['requestUri' => $requestUri]);

        $data = $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ], [
            'email.required' => 'The email is required',
            'email.email' => 'This is not a valid email',
            'email.unique' => 'You have already subscribed'
        ]);

        Subscriber::create($data);

        if ($requestUri == '/subscribe/footer/store') {
            return back()->with('footer-status', 'Subscribed successfully');
        }

        return back()->with('status', 'Subscribed successfully');
    }
}
