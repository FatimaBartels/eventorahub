<nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-xl border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            {{-- Logo --}}
            <div class="flex items-center gap-10">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 flex-shrink-0">
                    <div class="w-9 h-9 rounded-[9px] bg-indigo-50 flex items-center justify-center">
                        <svg class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke="#4F46E5" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-heading text-[17px] leading-tight tracking-tight">
                            <span class="text-primary">E</span>ventoraHub
                        </p>
                        <p class="font-body text-[9px] uppercase tracking-widest text-gray-400 mt-0.5">
                            Book events you love
                        </p>
                    </div>
                </a>

                {{-- Desktop links --}}
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}"
                       class="font-body text-sm font-medium transition-colors
                              {{ request()->routeIs('home') ? 'text-primary border-b-2 border-primary pb-1' : 'text-gray-600 hover:text-primary' }}">
                        Home
                    </a>
                    <a href="{{ route('events.index') }}"
                       class="font-body text-sm font-medium transition-colors
                              {{ request()->routeIs('events.*') ? 'text-primary border-b-2 border-primary pb-1' : 'text-gray-600 hover:text-primary' }}">
                        Events
                    </a>
                    <a href="{{ route('about') }}"
                       class="font-body text-sm font-medium transition-colors
                              {{ request()->routeIs('about') ? 'text-primary border-b-2 border-primary pb-1' : 'text-gray-600 hover:text-primary' }}">
                        About
                    </a>
                </div>
            </div>

            {{-- Right side --}}
            <div class="hidden md:flex items-center gap-3">
                @guest
                    <a href="{{ route('login') }}"
                       class="font-body text-sm font-medium px-4 py-2 rounded-lg text-gray-600 hover:text-primary transition-colors">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="font-body text-sm font-medium px-5 py-2.5 rounded-lg bg-primary text-white hover:bg-primary-hover transition-colors">
                        Register
                    </a>
                @endguest

                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}"
                           class="font-body text-sm font-medium px-4 py-2 text-gray-600 hover:text-primary transition-colors">
                            Admin panel
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}"
                           class="font-body text-sm font-medium px-4 py-2 text-gray-600 hover:text-primary transition-colors">
                            Dashboard
                        </a>
                        <a href="{{ route('bookings.index') }}"
                           class="font-body text-sm font-medium px-4 py-2 text-gray-600 hover:text-primary transition-colors">
                            My bookings
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                                class="font-body text-sm font-medium px-5 py-2.5 rounded-lg bg-primary text-white hover:bg-primary-hover transition-colors">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>

            {{-- Mobile hamburger --}}
            <button type="button" id="nav-toggle"
                    class="md:hidden w-9 h-9 flex items-center justify-center rounded-lg border border-gray-100 text-gray-500 hover:bg-gray-50 transition-colors">
                <svg id="icon-open" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                </svg>
                <svg id="icon-close" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Mobile menu --}}
        <div id="mobile-menu" class="md:hidden hidden pb-4">
            <div class="flex flex-col space-y-1 pt-2 border-t border-gray-100">
                <a href="{{ route('home') }}"
                   class="px-3 py-2.5 rounded-lg text-sm font-body text-gray-600 hover:bg-gray-50 hover:text-primary transition-colors {{ request()->routeIs('home') ? 'bg-gray-50 text-primary font-medium' : '' }}">
                    Home
                </a>
                <a href="{{ route('events.index') }}"
                   class="px-3 py-2.5 rounded-lg text-sm font-body text-gray-600 hover:bg-gray-50 hover:text-primary transition-colors {{ request()->routeIs('events.*') ? 'bg-gray-50 text-primary font-medium' : '' }}">
                    Events
                </a>
                <a href="{{ route('about') }}"
                   class="px-3 py-2.5 rounded-lg text-sm font-body text-gray-600 hover:bg-gray-50 hover:text-primary transition-colors {{ request()->routeIs('about') ? 'bg-gray-50 text-primary font-medium' : '' }}">
                    About
                </a>
            </div>
            <div class="flex flex-col gap-2 pt-3 mt-2 border-t border-gray-100">
                @guest
                    <a href="{{ route('login') }}"
                       class="text-sm font-medium font-body px-4 py-2.5 rounded-lg bg-primary text-white text-center hover:bg-primary-hover transition-colors">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="text-sm font-medium font-body px-4 py-2.5 rounded-lg border border-primary text-primary text-center hover:bg-primary hover:text-white transition-colors">
                        Register
                    </a>
                @endguest
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}"
                           class="text-sm font-medium font-body px-4 py-2.5 rounded-lg bg-primary text-white text-center hover:bg-primary-hover transition-colors">
                            Admin panel
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}"
                           class="px-3 py-2.5 rounded-lg text-sm font-body text-gray-600 hover:bg-gray-50 hover:text-primary transition-colors">
                            Dashboard
                        </a>
                        <a href="{{ route('bookings.index') }}"
                           class="px-3 py-2.5 rounded-lg text-sm font-body text-gray-600 hover:bg-gray-50 hover:text-primary transition-colors">
                            My bookings
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full text-sm font-medium font-body px-4 py-2.5 rounded-lg border border-gray-200 text-gray-600 hover:border-red-200 hover:text-red-500 hover:bg-red-50 transition-colors">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>

<script>
    const toggle = document.getElementById('nav-toggle');
    const menu = document.getElementById('mobile-menu');
    const iconOpen = document.getElementById('icon-open');
    const iconClose = document.getElementById('icon-close');
    toggle.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        iconOpen.classList.toggle('hidden');
        iconClose.classList.toggle('hidden');
    });
</script>