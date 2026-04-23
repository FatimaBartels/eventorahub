@extends('layouts.admin-dashboard')

@section('title', 'Dashboard')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-medium">Overview</h1>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-6">
    <div class="bg-gray-50 rounded-lg p-4">
        <p class="text-[11px] uppercase tracking-wide text-gray-400 mb-1.5">Total events</p>
        <p class="text-2xl font-medium text-gray-800">{{ $totalEvents }}</p>
    </div>
    <div class="bg-gray-50 rounded-lg p-4">
        <p class="text-[11px] uppercase tracking-wide text-gray-400 mb-1.5">Total bookings</p>
        <p class="text-2xl font-medium text-blue-600">{{ $totalBookings }}</p>
    </div>
    <div class="bg-gray-50 rounded-lg p-4">
        <p class="text-[11px] uppercase tracking-wide text-gray-400 mb-1.5">Active users</p>
        <p class="text-2xl font-medium text-green-600">{{ $activeUsers }}</p>
    </div>
</div>

<div class="bg-white border border-gray-100 rounded-xl overflow-hidden">
    <div class="px-4 py-3 border-b border-gray-100">
        <p class="text-sm font-medium">Recent bookings</p>
    </div>
    <table class="min-w-full text-sm border-collapse">
        <thead>
            <tr class="border-b border-gray-100">
                <th class="px-4 py-3 text-left text-[11px] uppercase tracking-wide font-medium text-gray-400">User</th>
                <th class="px-4 py-3 text-left text-[11px] uppercase tracking-wide font-medium text-gray-400">Event</th>
                <th class="px-4 py-3 text-left text-[11px] uppercase tracking-wide font-medium text-gray-400">Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentBookings as $booking)
                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-2.5">
                            <div class="w-7 h-7 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-[10px] font-medium flex-shrink-0">
                                {{ strtoupper(substr($booking->user->name, 0, 2)) }}
                            </div>
                            <span class="text-gray-800">{{ $booking->user->name }}</span>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-gray-500">{{ $booking->event->title }}</td>
                    <td class="px-4 py-3 text-gray-500">{{ $booking->created_at->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-4 py-10 text-center text-sm text-gray-400">No recent bookings.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection