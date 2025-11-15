@props(['title'])

<header class="bg-gradient-to-br from-gray-800 to-gray-900 border-b border-gray-700/50">
    <div class="max-w-8xl mx-auto py-4 px-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-6">
                <div class="w-1 h-8 bg-gradient-to-b from-purple-600 to-purple-400 rounded-full"></div>
                <div>
                    <h1 class="text-2xl font-light text-white tracking-tight">
                        {{ $title }}
                    </h1>
                </div>
            </div>
            
            <!-- Quick Actions -->
            <div class="hidden lg:flex items-center space-x-3">
                <div class="flex items-center space-x-4 text-sm">
                    <div class="flex items-center space-x-2 text-gray-400">
                        <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse"></div>
                        <span>System Online</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>