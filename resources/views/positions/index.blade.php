<x-layout pageTitle="Positions">
    
    <div class="mb-4 bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-3">
        <form action="{{ route('positions.index') }}" method="GET" class="flex gap-3">
            <div class="flex-1 relative">
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Search position title..." 
                       class="w-full bg-gray-900/50 text-gray-200 text-sm border border-gray-600 rounded-lg px-3 py-1.5 focus:ring-purple-500 focus:border-purple-500 placeholder-gray-500">
            </div>
            <button type="submit" class="px-3 py-1.5 text-sm bg-purple-600 hover:bg-purple-500 text-white rounded-lg shadow-lg shadow-purple-900/20 transition-all">
                Search
            </button>
            @if(request('search'))
                <a href="{{ route('positions.index') }}" class="px-3 py-1.5 text-sm text-gray-400 hover:text-white border border-gray-600 rounded-lg transition-all">Reset</a>
            @endif
        </form>
    </div>

    <x-table.container title="Position List" addRoute="{{ route('positions.create') }}" addText="Create New Position">
        <x-slot name="header">
            <x-table.header :columns="['Position Name', 'Main Salary', 'Actions']" />
        </x-slot>

        <x-slot name="body">
            @foreach ($positions as $position)
                <tr class="hover:bg-gray-700/50 transition duration-200 border-b border-gray-700/30">
                    <td class="px-4 py-2 whitespace-nowrap text-gray-100 font-medium text-sm">
                        {{ $position->nama_jabatan }}
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap text-green-400 font-medium text-sm">
                        Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}
                    </td>
                    <x-table.actions showRoute="positions.show" editRoute="positions.edit" destroyRoute="positions.destroy" :id="$position->id" />
                </tr>
            @endforeach
        </x-slot>
    </x-table.container>

    <div class="mt-3 px-2">
        {{ $positions->withQueryString()->links() }}
    </div>
</x-layout>


