@props(['name', 'label', 'type' => 'text', 'value' => '', 'colspan' => '1'])

<div class="@if ($colspan === '2') sm:col-span-2 @endif group">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-300 mb-3 flex items-center space-x-2">
        <div class="w-1.5 h-1.5 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full"></div>
        <span>{{ $label }}</span>
    </label>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}"
           class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600/50 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300 group-hover:border-gray-500/70">
    @error($name)
        <p class="mt-2 text-sm text-pink-400 flex items-center space-x-2">
            <span>⚠️</span>
            <span>{{ $message }}</span>
        </p>
    @enderror
</div>

