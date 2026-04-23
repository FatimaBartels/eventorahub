@extends('layouts.public')

@section('title', 'Booking Confirmed')

@section('content')

<div class="container mx-auto px-6 py-20">
    <div class="max-w-md mx-auto text-center">
  
        {{-- Success --}}
        @if(session('success'))
            <div class="bg-green-50 text-green-700 text-sm px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif


        {{-- Success Icon --}}
        <div class="flex items-center justify-center w-20 h-20 bg-green-100 rounded-full mx-auto mb-6 mt-6">
            <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
        </div>

        <h2 class="text-3xl font-bold text-gray-800 mb-2">Booking Confirmed!</h2>
        <p class="text-gray-400 text-sm mb-8">Thank you! Your spot has been reserved.</p>

        {{-- Booking Summary --}}
        <div class="bg-gray-50 rounded-2xl p-6 text-left flex flex-col gap-3 mb-8">
            <h3 class="font-bold text-gray-800 text-lg">{{ $booking->event->title }}</h3>

            <div class="flex items-center gap-2 text-sm text-gray-500">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>{{ \Carbon\Carbon::parse($booking->event->date)->format('F d, Y') }}</span>
            </div>

            <div class="flex items-center gap-2 text-sm text-gray-500">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>{{ $booking->event->location }}</span>
            </div>

            <div class="border-t border-gray-200 pt-3 mt-1 flex justify-between items-center">
                <span class="text-sm text-gray-500">Amount paid</span>
                <span class="text-xl font-bold text-accent">€{{ $booking->event->price }}</span>
            </div>

            <div class="flex justify-between items-center">
                <span class="text-sm text-gray-500">Status</span>
                <span class="text-xs font-medium bg-green-100 text-green-700 px-3 py-1 rounded-full">Confirmed</span>
            </div>
        </div>

        {{-- Actions --}}
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ route('dashboard') }}"
               class="bg-primary text-white font-semibold px-6 py-3 rounded-lg hover:bg-primary-hover transition-all duration-200">
                Go to Dashboard
            </a>
            <a href="{{ route('events.index') }}"
               class="border border-gray-200 text-gray-600 font-medium px-6 py-3 rounded-lg hover:bg-gray-50 transition-all duration-200">
                Browse More Events
            </a>
        </div>

    </div>
</div>

@endsection