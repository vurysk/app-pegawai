<x-layout pageTitle="Rooms">
    <x-table.container title="Room List" addRoute="{{ route('rooms.create') }}" addText="Add Room">
        <x-slot name="header">
            <x-table.header :columns="['Room Code', 'Floor', 'Department', 'Actions']" />
        </x-slot>

        <x-slot name="body">
            @foreach ($rooms as $room)
                <tr class="hover:bg-gray-700/50 transition duration-200 border-b border-gray-700/30">
                    <td class="px-6 py-3 whitespace-nowrap">
                        <div class="text-white font-medium">
                            {{ $room->room_code }}
                        </div>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-gray-300">
                        {{ $room->floor }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-gray-400">
                        {{ $room->department->nama_departemen }}
                    </td>
                    <x-table.actions showRoute="rooms.show" editRoute="rooms.edit" destroyRoute="rooms.destroy"
                        :id="$room->id" />
                </tr>
            @endforeach
        </x-slot>
    </x-table.container>
</x-layout>
