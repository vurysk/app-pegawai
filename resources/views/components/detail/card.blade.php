@props(['title', 'backRoute', 'backText'])

<div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl border border-gray-700/50 shadow-2xl overflow-hidden">
    <!-- Header -->
    <div class="bg-gradient-to-r from-gray-800 to-gray-900 border-b border-gray-700/50 px-8 py-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-2 h-8 bg-gradient-to-b from-purple-600 to-purple-400 rounded-full"></div>
                <h2 class="text-xl font-semibold text-white">{{ $title }}</h2>
            </div>
            
            <a href="{{ route($backRoute) }}" 
               class="px-6 py-3 bg-purple-600/50 hover:bg-purple-800 border border-purple-950 text-gray-300 hover:text-white font-medium rounded-xl transition-all duration-300 flex items-center space-x-2">
                <span>←</span>
                <span>{{ $backText ?? 'Back to List' }}</span>
            </a>
        </div>
    </div>

    <!-- Content -->
    <div class="p-8">
        <div class="bg-gray-700/30 rounded-xl border border-gray-600/30 overflow-hidden">
            <table class="w-full">
                <tbody class="divide-y divide-gray-600/30">
                    {{ $slot }}
                </tbody>
            </table>
        </div>
    </div>
</div>
