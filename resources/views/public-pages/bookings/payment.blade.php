@extends('layouts.public')

@section('title', 'Payment')

@section('content')

<section class="pt-14">
<div class="container mx-auto px-6 py-12">
    <div class="max-w-2xl mx-auto">

        <h2 class="text-3xl font-bold text-gray-800 mb-2">Payment</h2>
        <p class="text-gray-400 text-sm mb-8">Your payment info is encrypted and secure.</p>

            {{-- Success --}}
        @if(session('success'))
            <div class="bg-green-50 text-green-700 text-sm px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error --}}
        @if(session('error'))
            <div class="bg-red-50 text-red-600 text-sm px-4 py-3 rounded-lg mb-6">
                {{ session('error') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="bg-red-50 text-red-600 text-sm px-4 py-3 rounded-lg mb-6">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">

            {{-- Event Summary --}}
            <div class="bg-gray-50 rounded-2xl p-6 flex flex-col gap-3">
                <img src="{{ asset('storage/' . $event->image) }}"
                     class="w-full h-40 object-cover rounded-xl mb-2">

                <h3 class="font-bold text-gray-800 text-lg leading-tight">{{ $event->title }}</h3>

                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>{{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}</span>
                </div>

                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>{{ $event->location }}</span>
                </div>

                <div class="border-t border-gray-200 pt-3 mt-1 flex justify-between items-center">
                    <span class="text-sm text-gray-500">Total</span>
                    <span class="text-xl font-bold text-accent">€{{ $event->price }}</span>
                </div>
            </div>
              

            {{-- Payment Form --}}
            <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-6">

                <form method="POST" action="{{ route('bookings.processPayment', $event) }}">
                    @csrf

                    {{-- Card Name --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Name on card</label>
                        <input type="text" name="card_name" value="{{ old('card_name') }}"
                               placeholder="John Doe"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary"/>
                    </div>

                    {{-- Card Number --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Card number</label>
                        <input type="text" name="card_number" value="{{ old('card_number') }}"
                               placeholder="1234 5678 9012 3456"
                               maxlength="16"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary"/>
                    </div>

                    {{-- Expiry + CVV --}}
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Expiry date</label>
                            <input type="text" name="expiry" value="{{ old('expiry') }}"
                                   placeholder="MM/YY"
                                   maxlength="5"
                                   class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary"/>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">CVV</label>
                            <input type="password" name="cvv"
                                   placeholder="•••"
                                   maxlength="3"
                                   class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary"/>
                        </div>
                    </div>

                    <button type="submit"
                            class="w-full bg-primary text-white font-semibold py-3 rounded-lg hover:bg-primary-hover hover:shadow-md transition-all duration-200">
                        Pay €{{ $event->price }}
                    </button>

                </form>

                <p class="text-center text-xs text-gray-400 mt-4 flex items-center justify-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    Secured & encrypted payment
                </p>
            </div>

        </div>
    </div>
</div>
</section>

@endsection