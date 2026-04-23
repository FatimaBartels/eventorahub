@extends('layouts.user-dashboard')

@section('title', 'Bookings')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-medium">My bookings overview</h1>
</div>

@if(session('success'))
    <div class="flex items-center gap-2 text-sm text-green-700 bg-green-50 border border-green-100 rounded-lg px-4 py-3 mb-4">
        <svg class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 16 16" stroke="currentColor" stroke-width="1.4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 6.5 11.5 3 8"/>
        </svg>
        {{ session('success') }}
    </div>
@endif

<div class="bg-white border border-gray-100 rounded-xl overflow-hidden">
    <table class="min-w-full text-sm border-collapse">
        <thead>
            <tr class="border-b border-gray-100">
                <th class="px-4 py-3 text-left text-[11px] uppercase tracking-wide font-medium text-gray-400">Event</th>
                <th class="px-4 py-3 text-left text-[11px] uppercase tracking-wide font-medium text-gray-400">Date</th>
                <th class="px-4 py-3 text-left text-[11px] uppercase tracking-wide font-medium text-gray-400">Status</th>
                <th class="px-4 py-3 text-left text-[11px] uppercase tracking-wide font-medium text-gray-400">Payment</th>
                <th class="px-4 py-3 text-right text-[11px] uppercase tracking-wide font-medium text-gray-400">Action</th>
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
                    $paymentColor = match($booking->payment_status) {
                        'paid'    => 'bg-green-50 text-green-700',
                        'unpaid'  => 'bg-amber-50 text-amber-700',
                        'refunded'=> 'bg-gray-100 text-gray-500',
                        default   => 'bg-gray-100 text-gray-500',
                    };
                @endphp
                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 font-medium text-gray-800">{{ $booking->event->title }}</td>
                    <td class="px-4 py-3 text-gray-500">{{ $booking->event->date->format('d M Y, H:i') }}</td>
                    <td class="px-4 py-3">
                        <span class="text-[11px] font-medium px-2 py-0.5 rounded {{ $statusColor }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        <span class="text-[11px] font-medium px-2 py-0.5 rounded {{ $paymentColor }}">
                            {{ ucfirst($booking->payment_status) }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-right">
                        <form method="POST" action="{{ route('bookings.cancel', $booking->id) }}"
                              onsubmit="return confirm('Cancel this booking?');">
                            @csrf
                            <button type="submit"
                                    title="Cancel booking"
                                    class="w-8 h-8 inline-flex items-center justify-center rounded-lg border border-gray-100 text-red-400 hover:text-red-600 hover:border-red-200 hover:bg-red-50 transition-colors">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-10 text-center text-sm text-gray-400">
                        You have no bookings yet.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection