@extends('layouts.auth')

@section('title', 'Reset password')

@section('content')

<div class="mb-6">
    <h1 class="text-xl font-medium text-gray-900">Forgot your password?</h1>
    <p class="text-sm text-gray-400 mt-1">Enter your email and we'll send you a reset link.</p>
</div>

@if(session('status'))
    <div class="flex items-center gap-2 text-sm text-green-700 bg-green-50 border border-green-100 rounded-lg px-4 py-3 mb-4">
        <svg class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 16 16" stroke="currentColor" stroke-width="1.4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 6.5 11.5 3 8"/>
        </svg>
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}" class="space-y-4">
    @csrf

    <div>
        <label for="email" class="block text-xs font-medium text-gray-500 mb-1.5">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"
               placeholder="you@example.com" required
               class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-300 focus:outline-none focus:border-gray-400 transition-colors">
        @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <button type="submit"
            class="w-full py-2.5 text-sm font-medium rounded-lg bg-gray-900 text-white hover:bg-gray-700 transition-colors">
        Send reset link
    </button>
</form>

@endsection

@section('footer')
    Remembered it?
    <a href="{{ route('login') }}" class="text-gray-800 font-medium hover:underline">Back to sign in</a>
@endsection