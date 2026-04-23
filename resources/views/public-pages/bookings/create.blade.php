@extends('layouts.public')

@section('title', 'Book Event')

@section('content')

<section class="pt-14">
<div class="container mx-auto px-6 py-14">
    <div class="max-w-lg mx-auto bg-white border border-gray-100 rounded-2xl shadow-sm p-8">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">Confirm your booking</h2>

        {{-- Success --}}
        @if(session('success'))
            <div class="bg-green-50 text-green-700 text-sm px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Errors --}}
        @if ($errors->any())
            <div class="bg-red-50 text-red-600 text-sm px-4 py-3 rounded-lg mb-6">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Event Summary --}}
        <div class="bg-gray-50 rounded-xl p-5 mb-8 flex flex-col gap-2">
            <h3 class="font-semibold text-gray-800 text-lg">{{ $event->title }}</h3>
            <div class="flex items-center gap-2 text-sm text-gray-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>{{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}</span>
            </div>
            <div class="flex items-center gap-2 text-sm text-gray-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>{{ $event->location }}</span>
            </div>
            <p class="text-accent font-bold text-xl mt-1">€{{ $event->price }}</p>
        </div>

        {{-- Form --}}
        <form method="POST" action="{{ url('/events/' . $event->id . '/book') }}">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">
            <button type="submit"
                    class="w-full bg-primary text-white font-semibold py-3 rounded-lg hover:bg-primary-hover hover:shadow-md transition-all duration-200">
                Confirm Booking
            </button>
        </form>

        <a href="{{ route('events.show', $event->id) }}"
           class="block text-center text-sm text-gray-400 hover:text-gray-600 mt-4 transition">
            ← Back to event
        </a>

    </div>
</div>
</section>

@endsection