@extends('layouts.admin-dashboard')

@section('title', 'Edit Category')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <p class="text-xs text-gray-400 mb-0.5">Categories</p>
        <h1 class="text-2xl font-medium">Edit category</h1>
    </div>
    <a href="{{ route('admin.categories.index') }}"
       class="flex items-center gap-1.5 text-sm text-gray-400 hover:text-gray-600 transition-colors">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
        </svg>
        Back
    </a>
</div>

<div class="bg-white border border-gray-100 rounded-xl p-6 max-w-lg">
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <x-admin.form-field label="Category name" name="name" :value="old('name', $category->name)" />
        <x-admin.form-field label="Slug" name="slug" :value="old('slug', $category->slug)" />

        <div class="flex items-center justify-end gap-2 pt-2 border-t border-gray-100">
            <a href="{{ route('admin.categories.index') }}"
               class="text-sm px-4 py-2 rounded-lg border border-gray-100 text-gray-500 hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit"
                    class="text-sm font-medium px-4 py-2 rounded-lg bg-gray-900 text-white hover:bg-gray-700 transition-colors">
                Update category
            </button>
        </div>
    </form>
</div>

@endsection