@extends('layouts.public')

@section('title', 'Event')

@section('content')

<div class="container mx-auto px-6 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start py-16">

        {{-- Image --}}
        <div>
            <img src="{{ asset('storage/' . $event->image) }}"
                 class="w-full h-80 object-cover rounded-2xl shadow-md"/>
        </div>

        {{-- Details --}}
        <div class="flex flex-col gap-4">

            <h2 class="font-bold text-4xl text-gray-800 leading-tight">{{ $event->title }}</h2>

            <p class="text-gray-500 leading-7">{{ $event->description }}</p>

            <div class="flex flex-col gap-2 text-sm text-gray-500">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>{{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>{{ $event->location }}</span>
                </div>
            </div>

            <p class="text-2xl font-bold text-accent">€{{ $event->price }}</p>

            <div class="pt-2">
                @if ($event->isFull())
                    <span class="inline-block bg-gray-200 text-gray-500 px-6 py-3 rounded-lg cursor-not-allowed text-sm font-medium">
                        Event Full
                    </span>
                @else
                    <a href="{{ route('bookings.create', $event) }}"
                       class="inline-block bg-primary text-white font-semibold px-6 py-3 rounded-lg hover:bg-primary-hover hover:scale-[1.02] hover:shadow-lg transition-all duration-200">
                        Book Now
                    </a>
                @endif
            </div>

        </div>
    </div>
</div>

@endsection