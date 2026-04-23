@extends('layouts.admin-dashboard')

@section('title', 'Bookings')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-medium">Bookings</h1>
</div>

<div class="bg-white border border-gray-100 rounded-xl overflow-hidden">
    <table class="min-w-full text-sm border-collapse">
        <thead>
            <tr class="border-b border-gray-100">
                <th class="px-4 py-3 text-left text-[11px] uppercase tracking-wide font-medium text-gray-400">ID</th>
                <th class="px-4 py-3 text-left text-[11px] uppercase tracking-wide font-medium text-gray-400">User</th>
                <th class="px-4 py-3 text-left text-[11px] uppercase tracking-wide font-medium text-gray-400">Event</th>
                <th class="px-4 py-3 text-left text-[11px] uppercase tracking-wide font-medium text-gray-400">Date</th>
                <th class="px-4 py-3 text-left text-[11px] uppercase tracking-wide font-medium text-gray-400">Status</th>
                <th class="px-4 py-3 text-right text-[11px] uppercase tracking-wide font-medium text-gray-400">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
                @php
                    $statusColor = match($booking->status) {
                        'confirmed' => 'bg-green-50 text-green-700',
                        'pending'   => 'bg-amber-50 text-amber-700',
                        'cancelled' => 'bg-red-50 text-red-600',
                        default     => 'bg-gray-100 text-gray-500',
                    };
                @endphp
                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 font-mono text-xs text-gray-400">#{{ $booking->id }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-2.5">
                            <div class="w-7 h-7 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-[10px] font-medium flex-shrink-0">
                                {{ strtoupper(substr($booking->user->name, 0, 2)) }}
                            </div>
                            <span class="text-gray-800">{{ $booking->user->name }}</span>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-gray-500">{{ $booking->event->title }}</td>
                    <td class="px-4 py-3 text-gray-500">{{ $booking->created_at->format('d M Y, H:i') }}</td>
                    <td class="px-4 py-3">
                        <span class="text-[11px] font-medium px-2 py-0.5 rounded {{ $statusColor }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('admin.bookings.show', $booking->id) }}"
                           title="View"
                           class="w-8 h-8 inline-flex items-center justify-center rounded-lg border border-gray-100 text-gray-400 hover:text-gray-700 hover:border-gray-300 transition-colors">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-10 text-center text-sm text-gray-400">No bookings found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if($bookings->hasPages())
    <div class="px-4 py-3 border-t border-gray-100 flex items-center justify-between">
        <p class="text-xs text-gray-400">Showing {{ $bookings->firstItem() }}–{{ $bookings->lastItem() }} of {{ $bookings->total() }} bookings</p>
        {{ $bookings->links() }}
    </div>
    @endif
</div>

@endsection