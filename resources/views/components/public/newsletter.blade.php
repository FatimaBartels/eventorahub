<section class="py-24 px-4 sm:px-6 lg:px-8 bg-background">
    <div class="max-w-7xl mx-auto">
        <div class="bg-primary rounded-3xl p-10 md:p-20 flex flex-col md:flex-row items-center justify-between gap-12">

            <div class="max-w-xl text-center md:text-left">
                <h2 class="font-heading text-3xl md:text-5xl font-bold text-white leading-tight">
                    Never miss an extraordinary moment.
                </h2>
                <p class="font-body text-white/80 mt-6 text-lg">
                    Join thousands of people receiving weekly drops of the most exciting local events.
                </p>
            </div>

            <div class="w-full max-w-md">
                <form action="{{ route('newsletter.store') }}" method="POST" class="space-y-3">
                @csrf

                @if(session('newsletter_success'))
                    <div class="text-white/90 text-sm text-center bg-white/10 rounded-xl px-4 py-3">
                        {{ session('newsletter_success') }}
                    </div>
                @endif

                @error('email')
                    <p class="text-red-200 text-xs text-center">{{ $message }}</p>
                @enderror

                <div class="flex p-1.5 bg-white/10 rounded-2xl border border-white/20">
                    <input type="email" name="email" placeholder="Enter your email" required
                        class="flex-1 bg-transparent border-none focus:ring-0 text-white placeholder:text-white/60 px-5 font-body text-sm">
                    <button type="submit"
                            class="font-body font-bold text-sm bg-white text-primary px-8 py-3.5 rounded-xl hover:bg-gray-50 transition-all active:scale-95">
                        Subscribe
                    </button>
                </div>
                <p class="font-body text-white/60 text-xs text-center">Join for free. Unsubscribe anytime.</p>
            </form>
            </div>

        </div>
    </div>
</section>