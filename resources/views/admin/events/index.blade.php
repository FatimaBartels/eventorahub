@extends('layouts.admin-dashboard')

@section('title', 'Events')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-medium">Events</h1>
    <a href="{{ route('admin.events.create') }}"
       class="text-sm font-medium px-4 py-2 rounded-lg bg-gray-900 text-white hover:bg-gray-700 transition-colors">
        + Add event
    </a>
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
                <th class="px-4 py-3 text-left text-[11px] uppercase tracking-wide font-medium text-gray-400">Image</th>
                <th class="px-4 py-3 text-left text-[11px] uppercase tracking-wide font-medium text-gray-400">Title</th>
                <th class="px-4 py-3 text-left text-[11px] uppercase tracking-wide font-medium text-gray-400">Category</th>
                <th class="px-4 py-3 text-left text-[11px] uppercase tracking-wide font-medium text-gray-400">Date</th>
                <th class="px-4 py-3 text-left text-[11px] uppercase tracking-wide font-medium text-gray-400">Price</th>
                <th class="px-4 py-3 text-left text-[11px] uppercase tracking-wide font-medium text-gray-400">Capacity</th>
                <th class="px-4 py-3 text-right text-[11px] uppercase tracking-wide font-medium text-gray-400">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3">
                        @if($event->image)
                            <img src="{{ asset('storage/' . $event->image) }}"
                                 class="w-10 h-10 rounded-lg object-cover">
                        @else
                            <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M3.75 18h16.5"/>
                                </svg>
                            </div>
                        @endif
                    </td>
                    <td class="px-4 py-3 font-medium text-gray-800">{{ $event->title }}</td>
                    <td class="px-4 py-3">
                        <span class="text-[11px] font-medium px-2 py-0.5 rounded bg-gray-100 text-gray-500">
                            {{ $event->category->name ?? '—' }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-gray-500">{{ $event->date->format('d M Y, H:i') }}</td>
                    <td class="px-4 py-3 text-gray-800">€{{ number_format($event->price, 2) }}</td>
                    <td class="px-4 py-3 text-gray-500">{{ $event->max_capacity }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center justify-end gap-1">
                            <a href="{{ route('admin.events.edit', $event->id) }}"
                               title="Edit"
                               class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-100 text-gray-400 hover:text-gray-700 hover:border-gray-300 transition-colors">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z"/>
                                </svg>
                            </a>
                            <form action="{{ route('admin.events.destroy', $event->id) }}"
                                  method="POST" class="inline-block"
                                  onsubmit="return confirm('Delete this event?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Delete"
                                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-100 text-red-400 hover:text-red-600 hover:border-red-200 hover:bg-red-50 transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-4 py-10 text-center text-sm text-gray-400">No events found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="px-4 py-3 border-t border-gray-100 flex items-center justify-between">
        <p class="text-xs text-gray-400">Showing {{ $events->firstItem() }}–{{ $events->lastItem() }} of {{ $events->total() }} events</p>
        {{ $events->links() }}
    </div>
</div>

@endsection
