@props(['title', 'addRoute', 'addText'])

<div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-2xl overflow-hidden flex flex-col">
    <div class="bg-gradient-to-r from-gray-900 to-gray-950 border-b border-gray-700/50 px-6 py-4"> {{-- Padding dikurangi --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-1.5 h-6 bg-gradient-to-b from-purple-700 to-purple-400 rounded-full"></div> {{-- Bar diperkecil --}}
                <h2 class="text-lg font-semibold text-white">{{ $title }}</h2> {{-- Font diperkecil --}}
            </div>
            
            @if($addRoute)
                <a href="{{ $addRoute }}" 
                   class="group px-4 py-2 bg-gradient-to-r from-purple-800 to-purple-800 hover:from-purple-950 hover:to-purple-900 text-white text-xs font-medium rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg shadow-purple-500/25 flex items-center space-x-2">
                    <span class="text-sm">✨</span>
                    <span>{{ $addText ?? 'Add New' }}</span>
                </a>
            @endif
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-gray-700 to-gray-800">
                {{ $header }}
            </thead>
            <tbody class="divide-y divide-gray-700/50">
                {{ $body }}
            </tbody>
        </table>
    </div>
</div>



{{-- @props(['title', 'addRoute', 'addText'])

<div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl border border-gray-700/50 shadow-2xl overflow-hidden">
    <!-- Header -->
    <div class="bg-gradient-to-r from-gray-900 to-gray-950 border-b border-gray-700/50 px-8 py-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-2 h-8 bg-gradient-to-b from-purple-700 to-purple-400 rounded-full"></div>
                <h2 class="text-xl font-semibold text-white">{{ $title }}</h2>
            </div>
            
            @if($addRoute)
                <a href="{{ $addRoute }}" 
                   class="group px-6 py-3 bg-gradient-to-r from-purple-800 to-purple-800 hover:from-purple-950 hover:to-purple-900 text-white font-medium rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg shadow-purple-500/25 flex items-center space-x-2">
                    <span class="text-lg">✨</span>
                    <span>{{ $addText ?? 'Add New' }}</span>
                </a>
            @endif
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-gray-700 to-gray-800">
                {{ $header }}
            </thead>
            <tbody class="divide-y divide-gray-700/50">
                {{ $body }}
            </tbody>
        </table>
    </div>
</div> --}}
