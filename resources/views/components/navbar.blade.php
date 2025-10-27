<nav x-data="{ menuOpen: false, profileOpen: false }" class="bg-gray-800">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <!-- Kiri: Logo -->
      <div class="flex items-center">
        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
          alt="Your Company" class="size-8" />
      </div>

      <!-- Tengah: Menu utama (hanya tampil di desktop) -->
      <div class="hidden md:flex space-x-6">
        <a href="/employees" @class([
            'px-3 py-2 rounded-md text-sm font-medium',
            request()->is('employees*')
                ? 'bg-gray-900 text-white'
                : 'text-gray-300 hover:bg-gray-700 hover:text-white',
        ])>Employees</a>
        <a href="/departments" @class([
            'px-3 py-2 rounded-md text-sm font-medium',
            request()->is('departments*')
                ? 'bg-gray-900 text-white'
                : 'text-gray-300 hover:bg-gray-700 hover:text-white',
        ])>Departments</a>
        <a href="/positions" @class([
            'px-3 py-2 rounded-md text-sm font-medium',
            request()->is('positions*')
                ? 'bg-gray-900 text-white'
                : 'text-gray-300 hover:bg-gray-700 hover:text-white',
        ])>Positions</a>
        <a href="/salaries" @class([
            'px-3 py-2 rounded-md text-sm font-medium',
            request()->is('salaries*')
                ? 'bg-gray-900 text-white'
                : 'text-gray-300 hover:bg-gray-700 hover:text-white',
        ])>Salaries</a>
        <a href="/attendances" @class([
            'px-3 py-2 rounded-md text-sm font-medium',
            request()->is('attendances*')
                ? 'bg-gray-900 text-white'
                : 'text-gray-300 hover:bg-gray-700 hover:text-white',
        ])>Attendance</a>
      </div>

      <!-- Kanan: Profil (desktop) + Hamburger (mobile) -->
      <div class="flex items-center space-x-2">
        <!-- Profil (desktop only) -->
        <div class="hidden md:block relative" x-data>
          <button @click="profileOpen = !profileOpen" type="button"
            class="relative flex items-center rounded-full focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75">
            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
              alt="User avatar" class="size-8 rounded-full outline-1 outline-white/10" />
          </button>

          <div x-show="profileOpen" @click.outside="profileOpen = false"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
          </div>
        </div>

        <!-- Tombol hamburger (mobile only) -->
        <div class="md:hidden">
          <button @click="menuOpen = !menuOpen" type="button"
            class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-none focus:ring-2 focus:ring-white/75">
            <span class="sr-only">Open main menu</span>

            <!-- Icon menu -->
            <svg x-show="!menuOpen" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>

            <!-- Icon X -->
            <svg x-show="menuOpen" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Menu mobile -->
  <div x-show="menuOpen" @click.outside="menuOpen = false" x-transition
    class="md:hidden bg-gray-800 border-t border-gray-700">
    <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
      <a href="/employees" @class([
          'block rounded-md px-3 py-2 text-base font-medium',
          request()->is('employees*')
              ? 'bg-gray-900 text-white'
              : 'text-gray-300 hover:bg-gray-700 hover:text-white',
      ])>Employees</a>
      <a href="/departments" @class([
          'block rounded-md px-3 py-2 text-base font-medium',
          request()->is('departments*')
              ? 'bg-gray-900 text-white'
              : 'text-gray-300 hover:bg-gray-700 hover:text-white',
      ])>Departments</a>
      <a href="/positions" @class([
          'block rounded-md px-3 py-2 text-base font-medium',
          request()->is('positions*')
              ? 'bg-gray-900 text-white'
              : 'text-gray-300 hover:bg-gray-700 hover:text-white',
      ])>Positions</a>
      <a href="/salaries" @class([
          'block rounded-md px-3 py-2 text-base font-medium',
          request()->is('salaries*')
              ? 'bg-gray-900 text-white'
              : 'text-gray-300 hover:bg-gray-700 hover:text-white',
      ])>Salaries</a>
      <a href="/attendances" @class([
          'block rounded-md px-3 py-2 text-base font-medium',
          request()->is('attendances*')
              ? 'bg-gray-900 text-white'
              : 'text-gray-300 hover:bg-gray-700 hover:text-white',
      ])>Attendance</a>
    </div>

    <!-- Profil (mobile) -->
    <div class="border-t border-white/10 pt-4 pb-3">
      <div class="flex items-center px-5">
        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
          alt="User photo" class="size-10 rounded-full outline-1 outline-white/10">
        <div class="ml-3">
          <div class="text-base font-medium text-white">Eren Yeager</div>
          <div class="text-sm font-medium text-gray-400">eren@gmail.com</div>
        </div>
      </div>
      <div class="mt-3 space-y-1 px-2">
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Your profile</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Settings</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Sign out</a>
      </div>
    </div>
  </div>
</nav>
