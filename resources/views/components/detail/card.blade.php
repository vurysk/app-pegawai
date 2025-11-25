@props(['title', 'backRoute', 'backText'])

<div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-2xl overflow-hidden flex flex-col h-full max-h-full">

    <div class="bg-gradient-to-r from-gray-800 to-gray-900 border-b border-gray-700/50 px-6 py-4 shrink-0">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-1.5 h-6 bg-gradient-to-b from-purple-600 to-purple-400 rounded-full"></div>
                <h2 class="text-lg font-semibold text-white">{{ $title }}</h2>
            </div>
            
            <a href="{{ route($backRoute) }}" 
               class="px-4 py-2 bg-purple-600/20 hover:bg-purple-600/40 border border-purple-500/30 text-gray-300 hover:text-white text-xs font-medium rounded-lg transition-all duration-300 flex items-center space-x-2">
                <span>←</span>
                <span>{{ $backText ?? 'Back' }}</span>
            </a>
        </div>
    </div>


    <div class="p-6 overflow-y-auto">
        <div class="bg-gray-700/20 rounded-xl border border-gray-600/30 overflow-hidden">
            <table class="w-full">
                <tbody class="divide-y divide-gray-600/30">
                    {{ $slot }}
                </tbody>
            </table>
        </div>
    </div>
</div>

