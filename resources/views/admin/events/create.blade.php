@extends('layouts.admin-dashboard')

@section('title', 'Create Event')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <p class="text-xs text-gray-400 mb-0.5">Events</p>
        <h1 class="text-2xl font-medium">Create event</h1>
    </div>
    <a href="{{ route('admin.events.index') }}"
       class="flex items-center gap-1.5 text-sm text-gray-400 hover:text-gray-600 transition-colors">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
        </svg>
        Back
    </a>
</div>

<div class="bg-white border border-gray-100 rounded-xl p-6 max-w-2xl">
    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <x-admin.form-field label="Title" name="title" :value="old('title')" placeholder="e.g. Jazz Night at La Monnaie" />

        <div>
            <label for="description" class="block text-xs font-medium text-gray-500 mb-1.5">Description</label>
            <textarea id="description" name="description" rows="3"
                      class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-300 focus:outline-none focus:border-gray-400 transition-colors resize-none">{{ old('description') }}</textarea>
            @error('description') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <x-admin.form-field label="Date" name="date" type="datetime-local" :value="old('date')" />
            <x-admin.form-field label="Location" name="location" :value="old('location')" placeholder="e.g. Brussels" />
        </div>

        <div class="grid grid-cols-3 gap-4">
            <x-admin.form-field label="Price (€)" name="price" type="number" :value="old('price')" placeholder="0.00" />
            <x-admin.form-field label="Max capacity" name="max_capacity" type="number" :value="old('max_capacity')" placeholder="100" />
            <div>
                <label for="category_id" class="block text-xs font-medium text-gray-500 mb-1.5">Category</label>
                <select id="category_id" name="category_id"
                        class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 focus:outline-none focus:border-gray-400 transition-colors">
                    <option value="">Select category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-xs font-medium text-gray-500 mb-1.5">Image</label>
            <label class="flex flex-col items-center justify-center w-full border border-dashed border-gray-200 rounded-lg p-6 cursor-pointer hover:bg-gray-50 transition-colors">
                <svg class="w-6 h-6 text-gray-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5"/>
                </svg>
                <p class="text-xs text-gray-400">Click to upload or drag & drop</p>
                <p class="text-[11px] text-gray-300 mt-0.5">PNG, JPG up to 2MB</p>
                <input type="file" name="image" class="hidden">
            </label>
            @error('image') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center justify-end gap-2 pt-2 border-t border-gray-100">
            <a href="{{ route('admin.events.index') }}"
               class="text-sm px-4 py-2 rounded-lg border border-gray-100 text-gray-500 hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit"
                    class="text-sm font-medium px-4 py-2 rounded-lg bg-gray-900 text-white hover:bg-gray-700 transition-colors">
                Create event
            </button>
        </div>
    </form>
</div>

@endsection