@extends('layouts.auth')

@section('title', 'Verify email')

@section('content')

<div class="mb-6">
    <h1 class="text-xl font-medium text-gray-900">Verify your email</h1>
    <p class="text-sm text-gray-400 mt-1">
        We sent a verification link to your email address. Check your inbox and click the link to continue.
    </p>
</div>

@if(session('status') === 'verification-link-sent')
    <div class="flex items-center gap-2 text-sm text-green-700 bg-green-50 border border-green-100 rounded-lg px-4 py-3 mb-4">
        <svg class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 16 16" stroke="currentColor" stroke-width="1.4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 6.5 11.5 3 8"/>
        </svg>
        A new verification link has been sent to your email.
    </div>
@endif

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit"
            class="w-full py-2.5 text-sm font-medium rounded-lg bg-gray-900 text-white hover:bg-gray-700 transition-colors">
        Resend verification email
    </button>
</form>

@endsection

@section('footer')
    Wrong account?
    <form method="POST" action="{{ route('logout') }}" class="inline">
        @csrf
        <button type="submit" class="text-gray-800 font-medium hover:underline">Log out</button>
    </form>
@endsection