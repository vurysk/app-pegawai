@props(['name', 'label', 'value' => '', 'colspan' => '1'])

<div class="@if ($colspan === '2') sm:col-span-2 @endif group">
    <label for="{{ $name }}" class="block text-xs font-medium text-gray-400 mb-1.5 flex items-center space-x-2">
        <div class="w-1 h-1 bg-gradient-to-r from-pink-400 to-blue-400 rounded-full"></div>
        <span>{{ $label }}</span>
    </label>
    
    <textarea id="{{ $name }}" name="{{ $name }}" rows="2"
              class="w-full px-3 py-2 bg-gray-700/50 border border-gray-600/50 rounded-lg text-white text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300 group-hover:border-gray-500/70 resize-none">{{ old($name, $value) }}</textarea>
              
    @error($name)
        <p class="mt-1 text-xs text-pink-400 flex items-center space-x-1">
            <span>⚠️</span>
            <span>{{ $message }}</span>
        </p>
    @enderror
</div>


