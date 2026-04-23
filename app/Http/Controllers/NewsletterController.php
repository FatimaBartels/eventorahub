<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:newsletters,email'],
        ]);

        Newsletter::create($request->only('email'));

        return back()->with('newsletter_success', 'You\'re subscribed! Thanks for joining.');
    }
}
