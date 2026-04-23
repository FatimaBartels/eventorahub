<footer class="bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <div class="flex flex-col md:flex-row justify-between items-center gap-10">

            {{-- Brand --}}
            <div class="text-center md:text-left space-y-2">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5">
                    <div class="w-7 h-7 rounded-[7px] bg-indigo-50 flex items-center justify-center">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="#4F46E5" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                        </svg>
                    </div>
                    <span class="font-heading text-sm font-bold tracking-tight">
                        <span class="text-primary">E</span>ventoraHub
                    </span>
                </a>
                <p class="font-body text-gray-400 text-sm">© {{ date('Y') }} EventoraHub. All rights reserved.</p>
            </div>

            {{-- Links --}}
            <div class="flex flex-wrap justify-center gap-8 md:gap-12">
                <a href="#" class="font-body text-gray-500 hover:text-primary transition-colors text-sm font-medium">Privacy policy</a>
                <a href="#" class="font-body text-gray-500 hover:text-primary transition-colors text-sm font-medium">Terms of service</a>
                <a href="{{ route('about') }}" class="font-body text-gray-500 hover:text-primary transition-colors text-sm font-medium">About</a>
                <a href="#" class="font-body text-gray-500 hover:text-primary transition-colors text-sm font-medium">Contact</a>
            </div>

        </div>
    </div>
</footer>