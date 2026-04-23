@extends('layouts.auth')

@section('title', 'Create account')

@section('content')

<div class="mb-6">
    <h1 class="text-xl font-medium text-gray-900">Create account</h1>
    <p class="text-sm text-gray-400 mt-1">Join to start booking events</p>
</div>

<form method="POST" action="{{ route('register') }}" class="space-y-4">
    @csrf

    <div>
        <label for="name" class="block text-xs font-medium text-gray-500 mb-1.5">Full name</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}"
               placeholder="Jane Doe" autocomplete="name" required
               class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-300 focus:outline-none focus:border-gray-400 transition-colors">
        @error('name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="email" class="block text-xs font-medium text-gray-500 mb-1.5">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"
               placeholder="you@example.com" autocomplete="username" required
               class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-300 focus:outline-none focus:border-gray-400 transition-colors">
        @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="password" class="block text-xs font-medium text-gray-500 mb-1.5">Password</label>
        <input type="password" id="password" name="password"
               placeholder="••••••••" autocomplete="new-password" required
               class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-300 focus:outline-none focus:border-gray-400 transition-colors">
        @error('password') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="password_confirmation" class="block text-xs font-medium text-gray-500 mb-1.5">Confirm password</label>
        <input type="password" id="password_confirmation" name="password_confirmation"
               placeholder="••••••••" autocomplete="new-password" required
               class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-300 focus:outline-none focus:border-gray-400 transition-colors">
        @error('password_confirmation') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <button type="submit"
            class="w-full py-2.5 text-sm font-medium rounded-lg bg-gray-900 text-white hover:bg-gray-700 transition-colors">
        Create account
    </button>
</form>

@endsection

@section('footer')
    Already have an account?
    <a href="{{ route('login') }}" class="text-gray-800 font-medium hover:underline">Sign in</a>
@endsection