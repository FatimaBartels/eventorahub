@extends('layouts.admin-dashboard')

@section('title', 'Details')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <p class="text-xs text-gray-400 mb-0.5">Admin / Bookings</p>
        <h1 class="text-2xl font-medium">Booking detail overview</h1>
    </div>
    <span class="text-xs font-medium px-3 py-1 rounded bg-green-50 text-green-700">
        {{ $booking->status }}
    </span>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-3">

    {{-- User --}}
    <div class="bg-white border border-gray-100 rounded-xl p-5">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-9 h-9 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 text-sm font-medium flex-shrink-0">
                {{ strtoupper(substr($booking->user->name, 0, 2)) }}
            </div>
            <p class="font-medium text-sm">User</p>
        </div>
        <div class="border-t border-gray-100 pt-3 space-y-3">
            <div>
                <p class="text-[11px] uppercase tracking-wide text-gray-400 mb-0.5">Name</p>
                <p class="text-sm text-gray-800">{{ $booking->user->name }}</p>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-wide text-gray-400 mb-0.5">Email</p>
                <p class="text-sm text-blue-500">{{ $booking->user->email }}</p>
            </div>
        </div>
    </div>

    {{-- Event --}}
    <div class="bg-white border border-gray-100 rounded-xl p-5">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-9 h-9 rounded-full bg-amber-50 flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 16 16"><rect x="2" y="3" width="12" height="11" rx="1.5" stroke="currentColor" stroke-width="1.2"/><path d="M5 2v2M11 2v2M2 7h12" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/></svg>
            </div>
            <p class="font-medium text-sm">Event</p>
        </div>
        <div class="border-t border-gray-100 pt-3 space-y-3">
            <div>
                <p class="text-[11px] uppercase tracking-wide text-gray-400 mb-0.5">Title</p>
                <p class="text-sm text-gray-800">{{ $booking->event->title }}</p>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-wide text-gray-400 mb-0.5">Date</p>
                <p class="text-sm text-gray-800">{{ $booking->event->date->format('d M Y H:i') }}</p>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-wide text-gray-400 mb-0.5">Location</p>
                <p class="text-sm text-gray-800">{{ $booking->event->location }}</p>
            </div>
        </div>
    </div>

    {{-- Booking --}}
    <div class="bg-white border border-gray-100 rounded-xl p-5">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 16 16"><path d="M8 1.5a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13zM8 4.5v4l2.5 1.5" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <p class="font-medium text-sm">Booking</p>
        </div>
        <div class="border-t border-gray-100 pt-3 space-y-3">
            <div>
                <p class="text-[11px] uppercase tracking-wide text-gray-400 mb-0.5">Booking ID</p>
                <p class="text-sm text-gray-800 font-mono">#{{ $booking->id }}</p>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-wide text-gray-400 mb-0.5">Status</p>
                <p class="text-sm text-gray-800">{{ $booking->status }}</p>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-wide text-gray-400 mb-0.5">Booked on</p>
                <p class="text-sm text-gray-800">{{ $booking->created_at->format('d M Y H:i') }}</p>
            </div>
        </div>
    </div>

</div>

@endsection
