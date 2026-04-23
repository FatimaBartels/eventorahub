@extends('layouts.user-dashboard')

@section('title', 'Profile settings')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-medium">Profile settings</h1>
</div>

@if(session('status') === 'profile-updated')
    <div class="flex items-center gap-2 text-sm text-green-700 bg-green-50 border border-green-100 rounded-lg px-4 py-3 mb-4">
        <svg class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 16 16" stroke="currentColor" stroke-width="1.4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 6.5 11.5 3 8"/>
        </svg>
        Profile updated successfully.
    </div>
@endif

{{-- Profile info --}}
<div class="bg-white border border-gray-100 rounded-xl p-6 max-w-lg mb-4">
    <p class="text-sm font-medium mb-4">Personal information</p>
    <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('PATCH')

        <div>
            <label for="name" class="block text-xs font-medium text-gray-500 mb-1.5">Full name</label>
            <input type="text"
                   id="name"
                   name="name"
                   value="{{ old('name', $user->name) }}"
                   class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 focus:outline-none focus:border-gray-400 transition-colors">
            @error('name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="email" class="block text-xs font-medium text-gray-500 mb-1.5">Email</label>
            <input type="email"
                   id="email"
                   name="email"
                   value="{{ old('email', $user->email) }}"
                   class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 focus:outline-none focus:border-gray-400 transition-colors">
            @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end pt-2 border-t border-gray-100">
            <button type="submit"
                    class="text-sm font-medium px-4 py-2 rounded-lg bg-gray-900 text-white hover:bg-gray-700 transition-colors">
                Save changes
            </button>
        </div>
    </form>
</div>

{{-- Change password --}}
<div class="bg-white border border-gray-100 rounded-xl p-6 max-w-lg mb-4">
    <p class="text-sm font-medium mb-4">Change password</p>
    <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="current_password" class="block text-xs font-medium text-gray-500 mb-1.5">Current password</label>
            <input type="password"
                   id="current_password"
                   name="current_password"
                   placeholder="••••••••"
                   class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-300 focus:outline-none focus:border-gray-400 transition-colors">
            @error('current_password') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="new_password" class="block text-xs font-medium text-gray-500 mb-1.5">New password</label>
            <input type="password"
                   id="new_password"
                   name="password"
                   placeholder="••••••••"
                   class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-300 focus:outline-none focus:border-gray-400 transition-colors">
            @error('password') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-xs font-medium text-gray-500 mb-1.5">Confirm new password</label>
            <input type="password"
                   id="password_confirmation"
                   name="password_confirmation"
                   placeholder="••••••••"
                   class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-300 focus:outline-none focus:border-gray-400 transition-colors">
        </div>

        <div class="flex justify-end pt-2 border-t border-gray-100">
            <button type="submit"
                    class="text-sm font-medium px-4 py-2 rounded-lg bg-gray-900 text-white hover:bg-gray-700 transition-colors">
                Update password
            </button>
        </div>
    </form>
</div>

{{-- Delete account --}}
<div class="bg-white border border-red-100 rounded-xl p-6 max-w-lg">
    <p class="text-sm font-medium text-red-600 mb-1">Delete account</p>
    <p class="text-xs text-gray-400 mb-4">Once deleted, all your data and bookings will be permanently removed.</p>
    <form method="POST" action="{{ route('profile.destroy') }}"
          onsubmit="return confirm('Are you sure? This cannot be undone.');">
        @csrf
        @method('DELETE')
        <div class="mb-4">
            <label for="delete_password" class="block text-xs font-medium text-gray-500 mb-1.5">Confirm your password</label>
            <input type="password"
                   id="delete_password"
                   name="password"
                   placeholder="••••••••"
                   class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-300 focus:outline-none focus:border-gray-400 transition-colors">
            @error('password') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>
        <button type="submit"
                class="text-sm font-medium px-4 py-2 rounded-lg border border-red-200 text-red-500 hover:bg-red-50 transition-colors">
            Delete my account
        </button>
    </form>
</div>

@endsection