@extends('layouts.auth')

@section('title', 'Sign in')

@section('content')

<div class="mb-6">
    <h1 class="text-xl font-medium text-gray-900">Welcome back</h1>
    <p class="text-sm text-gray-400 mt-1">Sign in to your account</p>
</div>

@if(session('status'))
    <div class="flex items-center gap-2 text-sm text-green-700 bg-green-50 border border-green-100 rounded-lg px-4 py-3 mb-4">
        <svg class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 16 16" stroke="currentColor" stroke-width="1.4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 6.5 11.5 3 8"/>
        </svg>
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}" class="space-y-4">
    @csrf

    <div>
        <label for="email" class="block text-xs font-medium text-gray-500 mb-1.5">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"
               placeholder="you@example.com" autocomplete="username" required
               class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-300 focus:outline-none focus:border-gray-400 transition-colors">
        @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <div class="flex justify-between items-center mb-1.5">
            <label for="password" class="text-xs font-medium text-gray-500">Password</label>
            @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-xs text-gray-400 hover:text-gray-600 transition-colors">
                    Forgot password?
                </a>
            @endif
        </div>
        <input type="password" id="password" name="password"
               placeholder="••••••••" autocomplete="current-password" required
               class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-300 focus:outline-none focus:border-gray-400 transition-colors">
        @error('password') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" id="remember" name="remember"
               class="w-3.5 h-3.5 rounded border-gray-300 text-gray-900 focus:ring-0">
        <label for="remember" class="text-xs text-gray-500">Remember me</label>
    </div>

    <button type="submit"
            class="w-full py-2.5 text-sm font-medium rounded-lg bg-gray-900 text-white hover:bg-gray-700 transition-colors">
        Sign in
    </button>
</form>

@endsection

@section('footer')
    Don't have an account?
    <a href="{{ route('register') }}" class="text-gray-800 font-medium hover:underline">Sign up</a>
@endsection