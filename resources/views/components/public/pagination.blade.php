@if($paginator->hasPages())
    <div class="flex items-center justify-center gap-2">

        {{-- Prev --}}
        @if($paginator->onFirstPage())
            <span class="w-11 h-11 flex items-center justify-center rounded-xl bg-indigo-50 text-gray-300 cursor-not-allowed">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/></svg>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
               class="w-11 h-11 flex items-center justify-center rounded-xl bg-indigo-50 text-gray-500 hover:bg-primary/10 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/></svg>
            </a>
        @endif

        {{-- Pages --}}
        @foreach($elements as $element)
            @if(is_string($element))
                <span class="px-2 text-gray-400 text-sm">{{ $element }}</span>
            @endif
            @if(is_array($element))
                @foreach($element as $page => $url)
                    @if($page == $paginator->currentPage())
                        <span class="w-11 h-11 flex items-center justify-center rounded-xl bg-primary text-white font-body font-bold shadow-sm">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}"
                           class="w-11 h-11 flex items-center justify-center rounded-xl bg-white text-gray-600 font-body font-medium hover:bg-primary/5 transition-colors shadow-sm">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
               class="w-11 h-11 flex items-center justify-center rounded-xl bg-indigo-50 text-gray-500 hover:bg-primary/10 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
            </a>
        @else
            <span class="w-11 h-11 flex items-center justify-center rounded-xl bg-indigo-50 text-gray-300 cursor-not-allowed">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
            </span>
        @endif

    </div>
@endif