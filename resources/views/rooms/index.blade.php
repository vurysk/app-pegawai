<x-layout pageTitle="Rooms">
    
    <div class="mb-4 bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-3">
        <form action="{{ route('rooms.index') }}" method="GET" class="flex flex-col md:flex-row gap-3 items-end">
            
            <div class="flex-1 w-full">
                <label class="text-xs text-gray-400 ml-1 mb-1 block">Search Room</label>
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Room Code..." 
                       class="w-full bg-gray-900/50 text-gray-200 text-sm border border-gray-600 rounded-lg px-3 py-1.5 focus:ring-purple-500 focus:border-purple-500">
            </div>

            <div class="w-full md:w-1/4">
                <label class="text-xs text-gray-400 ml-1 mb-1 block">Floor</label>
                <input type="number" name="floor" value="{{ request('floor') }}" placeholder="Floor No."
                       class="w-full bg-gray-900/50 text-gray-200 text-sm border border-gray-600 rounded-lg px-3 py-1.5 focus:ring-purple-500 focus:border-purple-500">
            </div>

            <div class="flex space-x-2">
                {{-- Button py-1.5 --}}
                <button type="submit" class="px-3 py-1.5 text-sm bg-purple-600 hover:bg-purple-500 text-white rounded-lg shadow-lg shadow-purple-900/20 transition-all">Search</button>
                <a href="{{ route('rooms.index') }}" class="px-3 py-1.5 text-sm text-gray-400 hover:text-white border border-gray-600 rounded-lg transition-all">Reset</a>
            </div>
        </form>
    </div>

    <x-table.container title="Room List" addRoute="{{ route('rooms.create') }}" addText="Add Room">
        <x-slot name="header">
            <x-table.header :columns="['Room Code', 'Floor', 'Department', 'Actions']" />
        </x-slot>

        <x-slot name="body">
            @foreach ($rooms as $room)
                <tr class="hover:bg-gray-700/50 transition duration-200 border-b border-gray-700/30">
                    {{-- Table Cell px-4 py-2 --}}
                    <td class="px-4 py-2 whitespace-nowrap">
                        <span class="px-2 py-0.5 rounded-md bg-gray-700 text-white font-mono text-xs border border-gray-600">
                            {{ $room->room_code }}
                        </span>
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-300 text-sm">
                        Lantai {{ $room->floor }}
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-400 text-sm">
                        {{ $room->department->nama_departemen ?? 'General' }}
                    </td>
                    <x-table.actions showRoute="rooms.show" editRoute="rooms.edit" destroyRoute="rooms.destroy" :id="$room->id" />
                </tr>
            @endforeach
        </x-slot>
    </x-table.container>
    
    <div class="mt-3 px-2">
        {{ $rooms->withQueryString()->links() ?? '' }}
    </div>
</x-layout>





