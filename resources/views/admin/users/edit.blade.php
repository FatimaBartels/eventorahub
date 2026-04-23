@extends('layouts.admin-dashboard')

@section('title', 'Edit User')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <p class="text-xs text-gray-400 mb-0.5">Users</p>
        <h1 class="text-2xl font-medium">Edit user</h1>
    </div>
    <a href="{{ route('admin.users.index') }}"
       class="flex items-center gap-1.5 text-sm text-gray-400 hover:text-gray-600 transition-colors">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
        </svg>
        Back
    </a>
</div>

<div class="bg-white border border-gray-100 rounded-xl p-6 max-w-lg">
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <x-admin.form-field label="Name" name="name" :value="old('name', $user->name)" />
        <x-admin.form-field label="Email" name="email" type="email" :value="old('email', $user->email)" />

        <div>
            <label for="role" class="block text-xs font-medium text-gray-500 mb-1.5">Role</label>
            <select id="role" name="role"
                    class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 focus:outline-none focus:border-gray-400 transition-colors">
                <option value="user"  {{ old('role', $user->role) === 'user'  ? 'selected' : '' }}>User</option>
                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('role') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="is_active" class="block text-xs font-medium text-gray-500 mb-1.5">Status</label>
            <select id="is_active" name="is_active"
                    class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 focus:outline-none focus:border-gray-400 transition-colors">
                <option value="1" {{ old('is_active', $user->is_active) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('is_active', $user->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <x-admin.form-field label="Registered on" name="registered_at" :value="$user->created_at->format('d M Y, H:i')" :disabled="true" />

        <div class="flex items-center justify-end gap-2 pt-2 border-t border-gray-100">
            <a href="{{ route('admin.users.index') }}"
               class="text-sm px-4 py-2 rounded-lg border border-gray-100 text-gray-500 hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit"
                    class="text-sm font-medium px-4 py-2 rounded-lg bg-gray-900 text-white hover:bg-gray-700 transition-colors">
                Update user
            </button>
        </div>
    </form>
</div>

@endsection