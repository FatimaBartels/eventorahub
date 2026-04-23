@extends('layouts.user-dashboard')

@section('title', 'Dashboard')

@section('content')

<div class="mb-6">
    <p class="text-xs text-gray-400 mb-0.5">Welcome back</p>
    <h1 class="text-2xl font-medium">{{ $user->name }}</h1>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-6">
    <div class="bg-gray-50 rounded-lg p-4">
        <p class="text-[11px] uppercase tracking-wide text-gray-400 mb-1.5">Total bookings</p>
        <p class="text-2xl font-medium text-gray-800">{{ $bookings->count() }}</p>
    </div>
    <div class="bg-gray-50 rounded-lg p-4">
        <p class="text-[11px] uppercase tracking-wide text-gray-400 mb-1.5">Upcoming events</p>
        <p class="text-2xl font-medium text-green-600">{{ $upcoming->count() }}</p>
    </div>
    <div class="bg-gray-50 rounded-lg p-4">
        <p class="text-[11px] uppercase tracking-wide text-gray-400 mb-1.5">Past events</p>
        <p class="text-2xl font-medium text-gray-400">{{ $past->count() }}</p>
    </div>
</div>

<div class="bg-white border border-gray-100 rounded-xl overflow-hidden">
    <div class="px-4 py-3 border-b border-gray-100">
        <p class="text-sm font-medium">Your bookings</p>
    </div>

    @if($bookings->isEmpty())
        <div class="px-4 py-10 text-center text-sm text-gray-400">
            You have no bookings yet.
        </div>
    @else
        @foreach($bookings as $booking)
            <div class="flex items-center gap-3 px-4 py-3 border-b border-gray-100 last:border-0 hover:bg-gray-50 transition-colors">
                @if($booking->event->image)
                    <img src="{{ asset('storage/' . $booking->event->image) }}"
                        class="w-12 h-12 rounded-lg object-cover flex-shrink-0">
                @else
                    <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M3.75 18h16.5"/>
                        </svg>
                    </div>
                @endif
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-800 truncate">{{ $booking->event->title }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">
                        {{ $booking->event->date->format('d M Y, H:i') }} · {{ $booking->event->location }}
                    </p>
                </div>
                @php
                    $statusColor = match($booking->status) {
                        'confirmed' => 'bg-green-50 text-green-700',
                        'pending'   => 'bg-amber-50 text-amber-700',
                        default     => 'bg-gray-100 text-gray-500',
                    };
                @endphp
                <span class="text-[11px] font-medium px-2 py-0.5 rounded {{ $statusColor }} flex-shrink-0">
                    {{ ucfirst($booking->status) }}
                </span>
            </div>
        @endforeach
    @endif
</div>

@endsection
