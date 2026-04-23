<!--Hero -->
@props(['categories'])
<section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-background">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-12 items-center">

            {{-- Left: copy --}}
            <div class="lg:col-span-7 space-y-8">

                <div class="inline-flex items-center px-4 py-1.5 bg-indigo-50 rounded-full">
                    <span class="text-primary font-body text-xs font-bold tracking-widest uppercase">
                        Curated Experiences
                    </span>
                </div>

                <h1 class="font-heading text-5xl md:text-7xl font-bold text-text-dark leading-[1.1] tracking-tight">
                    Discover and Book <span class="text-primary">Amazing</span> Events
                </h1>

                <p class="font-body text-lg md:text-xl text-text-light max-w-2xl leading-relaxed">
                    Access exclusive workshops, tech summits, and live performances tailored to your interests — all in one place.
                </p>

                {{-- Search bar --}}
                <form action="{{ route('events.index') }}" method="GET"
                    class="p-2 bg-white rounded-2xl shadow-sm flex flex-col md:flex-row gap-2 max-w-2xl border border-gray-100">

                    <div class="flex-1 flex items-center bg-gray-50 rounded-xl px-4">
                        <svg class="w-4 h-4 text-primary flex-shrink-0 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                        </svg>
                        <input type="text"
                            name="search"
                            placeholder="What kind of event?"
                            class="bg-transparent border-none focus:ring-0 text-text-dark font-body text-sm w-full py-4 placeholder:text-gray-400">
                    </div>

                    <div class="flex-1 flex items-center bg-gray-50 rounded-xl px-4">
                        <svg class="w-4 h-4 text-primary flex-shrink-0 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                        </svg>
                        <input type="text"
                            name="location"
                            placeholder="Where?"
                            class="bg-transparent border-none focus:ring-0 text-text-dark font-body text-sm w-full py-4 placeholder:text-gray-400">
                    </div>

                    <button type="submit"
                            class="font-body font-bold text-sm bg-primary text-white px-8 py-4 rounded-xl hover:bg-primary-hover transition-colors text-center">
                        Search
                    </button>

                </form>

               {{-- Category pills --}}
                <div class="flex flex-wrap gap-3 pt-2">
                    @foreach($categories as $category)
                        <a href="{{ route('events.index', ['categories[]' => $category->id]) }}"
                        class="px-5 py-2.5 bg-white border border-gray-100 rounded-full font-body text-sm font-medium text-gray-600 hover:bg-primary hover:text-white hover:border-primary transition-all">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Right: image --}}
            <div class="lg:col-span-5 relative">
                <div class="relative z-10 aspect-[4/5] rounded-3xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/hero.jpg') }}"
                         alt="Events"
                         class="w-full h-full object-cover hover:scale-105 transition-transform duration-1000">
                </div>
            </div>

        </div>
    </div>
</section>