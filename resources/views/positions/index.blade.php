<x-layout pageTitle="Positions">
    <x-table.container title="Position List" addRoute="{{ route('positions.create') }}" addText="Create New Position">
        <x-slot name="header">
            <x-table.header :columns="['Position Name', 'Main Salary', 'Actions']" />
        </x-slot>

        <x-slot name="body">
            @foreach ($positions as $position)
                <tr class="hover:bg-gray-700/50 transition duration-200 border-b border-gray-700/30">
                    <td class="px-6 py-3 whitespace-nowrap text-gray-100">{{ $position->nama_jabatan }}</td>
                    <td class="px-6 py-3 whitespace-nowrap text-green-400 font-medium">
                        $ {{ number_format($position->gaji_pokok, 0, ',', '.') }}
                    </td>
                    <x-table.actions showRoute="positions.show" editRoute="positions.edit"
                        destroyRoute="positions.destroy" :id="$position->id" />
                </tr>
            @endforeach
        </x-slot>
    </x-table.container>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $positions->links() }}
    </div>
</x-layout>

