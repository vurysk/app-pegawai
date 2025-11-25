@props(['name', 'label', 'options', 'selected' => '', 'optionValue' => 'id', 'optionLabel' => 'name'])

<div class="group">
    <label for="{{ $name }}" class="block text-xs font-medium text-gray-400 mb-1.5 flex items-center space-x-2">
        <div class="w-1 h-1 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full"></div>
        <span>{{ $label }}</span>
    </label>
    
    <select id="{{ $name }}" name="{{ $name }}"
            {{ $attributes->merge(['class' => 'w-full px-3 py-2 bg-gray-700/50 border border-gray-600/50 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300 group-hover:border-gray-500/70']) }}>
        @foreach ($options as $option)
            <option value="{{ $option->$optionValue }}" 
                    {{ old($name, $selected) == $option->$optionValue ? 'selected' : '' }}
                    class="bg-gray-800 text-white">
                {{ $option->$optionLabel }}
            </option>
        @endforeach
    </select>
    
    @error($name)
        <p class="mt-1 text-xs text-pink-400 flex items-center space-x-1">
            <span>⚠️</span>
            <span>{{ $message }}</span>
        </p>
    @enderror
</div>

