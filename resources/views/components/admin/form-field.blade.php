@props(['label', 'name', 'type' => 'text', 'value' => '', 'placeholder' => '', 'disabled' => false])

<div>
    <label for="{{ $name }}" class="block text-xs font-medium text-gray-500 mb-1.5">{{ $label }}</label>
    <input type="{{ $type }}"
           id="{{ $name }}"
           name="{{ $name }}"
           value="{{ $value }}"
           placeholder="{{ $placeholder }}"
           {{ $disabled ? 'disabled' : '' }}
           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-800 placeholder-gray-300 focus:outline-none focus:border-gray-400 transition-colors {{ $disabled ? 'bg-gray-50 text-gray-400 cursor-not-allowed' : '' }}">
    @error($name)
        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>