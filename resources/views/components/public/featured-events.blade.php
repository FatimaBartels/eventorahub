@props(['featuredEvents'])

<section class="bg-gray-50 py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col md:flex-row justify-between items-end gap-6 mb-12">
            <div>
                <span class="font-body text-primary font-bold text-xs tracking-[0.2em] uppercase">Handpicked</span>
                <h2 class="font-heading text-4xl font-bold text-text-dark mt-2">Featured experiences</h2>
            </div>
            <a href="{{ route('events.index') }}"
               class="font-body inline-flex items-center gap-2 text-primary font-bold text-sm hover:gap-3 transition-all">
                View all events
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($featuredEvents as $event)
                <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">

                    {{-- Image --}}
                    <div class="relative aspect-[16/10] overflow-hidden">
                        @if($event->image)
                            <img src="{{ asset('storage/' . $event->image) }}"
                                 alt="{{ $event->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-indigo-50 flex items-center justify-center">
                                <svg class="w-10 h-10 text-primary/30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                                </svg>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4 bg-primary text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-md">
                            {{ $event->date->format('d M') }}
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="font-heading text-lg font-bold text-text-dark group-hover:text-primary transition-colors leading-snug pr-4">
                                {{ $event->title }}
                            </h3>
                            <span class="font-body text-base font-bold text-primary flex-shrink-0">
                                {{ $event->price > 0 ? '€' . number_format($event->price, 2) : 'Free' }}
                            </span>
                        </div>
                        <p class="font-body text-sm text-text-light line-clamp-2 leading-relaxed mb-6">
                            {{ $event->description }}
                        </p>
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="flex items-center gap-1.5 text-gray-400 text-xs font-body">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                                </svg>
                                {{ $event->location }}
                            </div>
                            <a href="{{ route('events.show', $event->id) }}"
                               class="font-body text-sm font-bold text-primary hover:underline underline-offset-4 transition-all">
                                View details
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 py-12 text-center text-sm text-gray-400 font-body">
                    No featured events yet.
                </div>
            @endforelse
        </div>
    </div>
</section>