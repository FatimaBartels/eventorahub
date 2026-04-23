@extends('layouts.auth')

@section('title', 'Set new password')

@section('content')

<div class="mb-6">
    <h1 class="text-xl font-medium text-gray-900">Set new password</h1>
    <p class="text-sm text-gray-400 mt-1">Choose a strong password for your account.</p>
</div>

<form method="POST" action="{{ route('password.store') }}" class="space-y-4">
    @csrf

    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <div>
        <label for="email" class="block text-xs font-medium text-gray-500 mb-1.5">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}"
               placeholder="you@example.com" required autocomplete="username"
               class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-300 focus:outline-none focus:border-gray-400 transition-colors">
        @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="password" class="block text-xs font-medium text-gray-500 mb-1.5">New password</label>
        <input type="password" id="password" name="password"
               placeholder="••••••••" required autocomplete="new-password"
               class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-300 focus:outline-none focus:border-gray-400 transition-colors">
        @error('password') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="password_confirmation" class="block text-xs font-medium text-gray-500 mb-1.5">Confirm new password</label>
        <input type="password" id="password_confirmation" name="password_confirmation"
               placeholder="••••••••" required autocomplete="new-password"
               class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-300 focus:outline-none focus:border-gray-400 transition-colors">
        @error('password_confirmation') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <button type="submit"
            class="w-full py-2.5 text-sm font-medium rounded-lg bg-gray-900 text-white hover:bg-gray-700 transition-colors">
        Reset password
    </button>
</form>

@endsection