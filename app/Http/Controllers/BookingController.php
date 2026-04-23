<?php

namespace App\Http\Controllers;


use App\Models\Event;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{

    public function index() {
        $bookings = auth()->user()?->bookings()->with('event')->get();

        return view('dashboard.bookings.index', compact('bookings'));
    }


    public function create(Event $event) { 
        return view('public-pages.bookings.create', compact('event'));

        }


    public function store(Request $request) {

    //validate input first / validation only belongs to store
    $request->validate([
        'event_id' => 'required|exists:events,id',
    ]);

    // retrieve / recover the event
    $event = Event::findOrFail($request->event_id);

    //check if event is full
        if($event->isFull()){
            return back()->withErrors(['Event is full.']);
        }

            //check if user already booked
        $alreadyBooked = Booking::where('user_id', Auth::id())
        ->where('event_id', $event->id)
        ->exists();

        if($alreadyBooked) {
            return back()->withErrors(['You have already booked this event.']);
        }

        //redirect to payment page
          return redirect()->route('bookings.payment', $event);
    }
    

    //cancel booking
    public function cancel($id){

        $booking = Booking::with('event')->findOrFail($id);

        //ensure the bookings belongs to logged-in user
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        //prevent cancelling past events
        if ($booking->event->date < now()) {
            return back()->withErrors(['You cannot cancel a past booking.']);
        }

        //update status
        $booking->status = 'cancelled';
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Your booking has been cancelled.');
        }

        //Payment
    // showing fake payment form
        public function payment(Event $event) 
        {
            // Check if user already booked before even showing the payment form
        $alreadyBooked = Booking::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->exists();

        if ($alreadyBooked) {
            return redirect()->route('events.show', $event->id)
                ->withErrors(['You have already booked this event.']);
        }
            return view('public-pages.bookings.payment', compact('event'));
        }


            // Process fake payment and create booking
        public function processPayment(Request $request, Event $event)
        {
            $request->validate([
                'card_name'   => 'required|string',
                'card_number' => 'required|digits:16',
                'expiry'      => 'required',
                'cvv'         => 'required|digits:3',
            ]);
        
            // Check again at processing time 
        if ($event->isFull()) {
            return back()->withErrors( ['Sorry, this event just became full.']);
        }

        $alreadyBooked = Booking::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->exists();

        if ($alreadyBooked) {
            return redirect()->route('events.show', $event->id)
                ->withErrors( ['You have already booked this event.']);
        }


        //Create the booking 
            $booking = Booking::create([
                'user_id'  => auth()->id(),
                'event_id' => $event->id,
                'status'   => 'booked',
                'payment_status' => 'paid',

                ]);

            return Redirect()->route('bookings.confirmed', $booking);

        }
    // show booking confirmed page
        public function confirmed(Booking $booking)
        {
            $booking->load('event');
            return view('public-pages.bookings.confirmed', compact('booking'));
        }


    }
    
  

    
        
    

