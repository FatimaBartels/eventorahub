<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use \App\Models\Booking;
use \App\Models\Event;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index() {
        // list of bookings
        $bookings = Booking::with(['user', 'event'])->latest()->paginate(15);
        return view('admin.bookings.index', compact('bookings'));
    }


    public function show($id) {

        $booking = Booking::findOrFail($id);
        return view('admin.bookings.show', compact('booking'));
    }
   
}
