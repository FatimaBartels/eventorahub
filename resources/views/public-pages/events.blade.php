 @extends('layouts.public') 

  @section('title', 'Events') 


 @section('content') 

<main class="pt-28 pb-24 px-4 md:px-8 max-w-screen-xl mx-auto flex gap-10">

    {{-- Filter Sidebar --}}
    <aside class="hidden md:block w-64 shrink-0 space-y-8">

        <h2 class="text-xs font-body uppercase tracking-widest text-gray-400">Filters</h2>

        {{-- Category --}}
        <section>
            <h3 class="font-heading font-bold text-sm mb-4 text-text-dark">Category</h3>
            <form method="GET" action="{{ route('events.index') }}" id="filter-form" class="space-y-3">
                @foreach($categories as $category)
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox"
                               name="categories[]"
                               value="{{ $category->id }}"
                               {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}
                               onchange="document.getElementById('filter-form').submit()"
                               class="rounded border-gray-300 text-primary focus:ring-primary/20 w-4 h-4">
                        <span class="font-body text-sm text-gray-600 group-hover:text-primary transition-colors">
                            {{ $category->name }}
                        </span>
                    </label>
                @endforeach
            </form>
        </section>

        {{-- Price --}}
        <section>
            <h3 class="font-heading font-bold text-sm mb-4 text-text-dark">Price range</h3>
            <input type="range"
                name="max_price"
                form="filter-form"
                min="0"
                max="500"
                value="{{ request('max_price', 500) }}"
                class="w-full h-1.5 rounded-full appearance-none cursor-pointer accent-primary"
                oninput="document.getElementById('price-label').textContent = '€' + this.value"
                onchange="document.getElementById('filter-form').submit()">
            <div class="flex justify-between mt-2">
                <span class="text-xs text-gray-400">€0</span>
                <span class="text-xs text-gray-400" id="price-label">
                    €{{ request('max_price', 500) }}
                </span>
            </div>
        </section>

        {{-- Location --}}
        <section>
            <h3 class="font-heading font-bold text-sm mb-4 text-text-dark">Location</h3>
            <input type="text"
                   name="location"
                   form="filter-form"
                   placeholder="City or region"
                   value="{{ request('location') }}"
                   class="w-full bg-indigo-50 border-none rounded-xl py-2.5 px-4 text-sm font-body focus:ring-2 focus:ring-primary/20 placeholder-gray-400">
        </section>

    </aside>

    {{-- Main content --}}
    <div class="flex-1 min-w-0">

        {{-- Header --}}
        <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <span class="text-xs font-body uppercase tracking-widest text-primary font-bold mb-1 block">Discovery</span>
                <h1 class="font-heading text-3xl font-extrabold tracking-tight text-text-dark">
                    {{ $events->total() }} event{{ $events->total() !== 1 ? 's' : '' }} found
                </h1>
            </div>
            <form method="GET" action="{{ route('events.index') }}" class="flex items-center gap-3">
                <span class="text-sm font-body text-gray-400">Sort by:</span>
                <select name="sort" onchange="this.form.submit()"
                        class="bg-white border border-gray-100 rounded-xl text-sm font-body px-4 py-2 focus:ring-2 focus:ring-primary/20 shadow-sm text-gray-600">
                    <option value="latest"    {{ request('sort') === 'latest'    ? 'selected' : '' }}>Latest</option>
                    <option value="soonest"   {{ request('sort') === 'soonest'   ? 'selected' : '' }}>Date: soonest</option>
                    <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Price: low to high</option>
                    <option value="price_desc"{{ request('sort') === 'price_desc'? 'selected' : '' }}>Price: high to low</option>
                </select>
            </form>
        </div>

        {{-- Events grid --}}
        @if($events->isEmpty())
            <div class="py-24 text-center">
                <p class="font-body text-gray-400 text-sm">No events found. Try adjusting your filters.</p>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">

                {{-- First event as featured wide card --}}
                @foreach($events as $event)
                    @if($loop->first)
                        <div class="lg:col-span-2 group relative overflow-hidden rounded-2xl shadow-sm cursor-pointer">
                            <div class="aspect-[21/9] w-full overflow-hidden">
                                @if($event->image)
                                    <img src="{{ asset('storage/' . $event->image) }}"
                                         alt="{{ $event->title }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full bg-indigo-100"></div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-transparent to-transparent"></div>
                            </div>
                            <div class="absolute bottom-0 left-0 p-7 text-white">
                                <div class="flex gap-2 mb-3">
                                    <span class="bg-primary/80 backdrop-blur-md px-3 py-1 rounded-full text-[10px] font-body uppercase tracking-widest">Featured</span>
                                    @if($event->category)
                                        <span class="bg-white/10 backdrop-blur-md px-3 py-1 rounded-full text-[10px] font-body uppercase tracking-widest">
                                            {{ $event->category->name }}
                                        </span>
                                    @endif
                                </div>
                                <h2 class="font-heading text-2xl font-bold mb-1">{{ $event->title }}</h2>
                                <div class="flex items-center gap-4 text-sm text-white/80">
                                    <span>{{ $event->date->format('d M Y') }}</span>
                                    <span>· {{ $event->location }}</span>
                                    <span>· {{ $event->price > 0 ? '€' . number_format($event->price, 2) : 'Free' }}</span>
                                </div>
                                <a href="{{ route('events.show', $event->id) }}"
                                   class="inline-flex items-center gap-2 mt-4 bg-white text-primary font-body font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-gray-50 transition-all">
                                    View details
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                                </a>
                            </div>
                        </div>
                    @else
                        {{-- Regular cards --}}
                        <div class="bg-white p-5 rounded-2xl shadow-sm group transition-all hover:-translate-y-1">
                            <div class="aspect-video rounded-xl overflow-hidden mb-4 bg-indigo-50">
                                @if($event->image)
                                    <img src="{{ asset('storage/' . $event->image) }}"
                                         alt="{{ $event->title }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-indigo-50 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-primary/20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            @if($event->category)
                                <span class="text-[10px] font-body uppercase tracking-widest text-primary font-bold mb-1 block">
                                    {{ $event->category->name }}
                                </span>
                            @endif
                            <h3 class="font-heading font-bold text-text-dark mb-2 group-hover:text-primary transition-colors leading-snug">
                                {{ $event->title }}
                            </h3>
                            <p class="font-body text-sm text-gray-500 line-clamp-2 mb-4">{{ $event->description }}</p>
                            <div class="flex items-center justify-between border-t border-gray-100 pt-3">
                                <div>
                                    <span class="font-body font-extrabold text-text-dark">
                                        {{ $event->price > 0 ? '€' . number_format($event->price, 2) : 'Free' }}
                                    </span>
                                    <p class="font-body text-xs text-gray-400 mt-0.5">{{ $event->date->format('d M Y') }}</p>
                                </div>
                                <a href="{{ route('events.show', $event->id) }}"
                                   class="text-primary font-body font-semibold text-sm flex items-center gap-1 hover:gap-2 transition-all">
                                    View details
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>

            {{-- Pagination --}}
            <div class="mt-16 flex items-center justify-center gap-2">
                {{ $events->links('components.public.pagination') }}
            </div>
        @endif

    </div>
</main>


 
@endsection 