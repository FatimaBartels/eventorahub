<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        //load all bookings with event details
        $bookings = $user->bookings()->with('event')->get();

        //Separate upcoming event vs past event
        $upcoming = $bookings->where('event.date', '>=', now());
        $past = $bookings->where('event.date', '<', now());

        return view('dashboard.index', compact('user', 'bookings', 'upcoming', 'past'));
    }
}
