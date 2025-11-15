<nav x-data="{ menuOpen: false }" class="bg-gray-950 border-b border-gray-700/50"
>
    <div class="max-w-8xl mx-auto px-8">
        <div class="flex h-20 items-center justify-between">
            <!-- Logo & Brand -->
            <div class="flex items-center space-x-12">
                <a href="/" class="group flex items-center space-x-4">
                    <div class="relative group flex items-center justify-center">
                        <!-- Border bulat -->
                        <div
                            class="absolute w-12 h-12 rounded-full border-2 border-white/40 
              transition-all duration-500 ease-in-out 
              group-hover:border-3 group-hover:border-purple-800 group-hover:scale-110">
                        </div>

                        <!-- Logo -->
                        <img src="/image/owl2.png" alt="Owl HR System"
                            class="relative w-12 h-12 transition-transform duration-500 ease-in-out 
              group-hover:scale-125" />
                    </div>
                </a>

<!-- Navigation Menu -->
<div class="hidden xl:flex items-center space-x-1">
    @php
        $menuItems = ['employees', 'departments', 'positions', 'salaries', 'attendances', 'rooms'];
    @endphp

    @foreach ($menuItems as $route)
        <a href="/{{ $route }}" @class([
            'group relative px-6 py-3 rounded-xl text-sm font-medium transition-all duration-500 border',
            request()->is($route . '*')
                ? 'text-white border-purple-500/50'
                : 'text-gray-400 hover:text-white border-transparent hover:border-gray-600/50',
        ])>
            <span class="capitalize">{{ $route }}</span>
            @if (request()->is($route . '*'))
                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-16 h-0.5 bg-gradient-to-r from-purple-400 to-purple-600 rounded-full"></div>
            @endif
        </a>
    @endforeach
</div>
</div>

<!-- Mobile Menu Button -->
<div class="xl:hidden">
    <button @click="menuOpen = !menuOpen"
        class="p-3 rounded-xl bg-gray-700/50 text-gray-400 hover:text-white hover:bg-gray-600/50 transition-all duration-300 border border-gray-600/50">
        <span class="sr-only">Open menu</span>
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
</div>
</div>
</div>

<!-- Mobile Menu -->
<div x-show="menuOpen" x-transition class="xl:hidden bg-gray-950 backdrop-blur-sm border-t border-gray-700/50">
    <div class="max-w-8xl mx-auto px-8 py-6 grid grid-cols-2 gap-4">
        @foreach ($menuItems as $route)
            <a href="/{{ $route }}" @class([
                'group p-4 rounded-xl text-sm font-medium transition-all duration-300 border-2',
                request()->is($route . '*')
                    ? 'text-white border-purple-500/50'
                    : 'text-gray-400 hover:text-white border-gray-600/30 hover:border-gray-500/50',
            ])>
                <span class="capitalize">{{ $route }}</span>
            </a>
        @endforeach
    </div>
</div>
</nav>

