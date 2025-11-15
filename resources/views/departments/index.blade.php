<x-layout pageTitle="Departments">
    <x-table.container title="Department List" addRoute="{{ route('departments.create') }}" addText="Add Department">
        <x-slot name="header">
            <x-table.header :columns="['Department Name', 'Actions']" />
        </x-slot>

        <x-slot name="body">
            @foreach ($departments as $department)
                <tr class="hover:bg-gray-700/50 transition duration-200 border-b border-gray-700/30">
                    <td class="px-6 py-3 whitespace-nowrap text-gray-100">{{ $department->nama_departemen }}</td>
                    <x-table.actions showRoute="departments.show" editRoute="departments.edit"
                        destroyRoute="departments.destroy" :id="$department->id" />
                </tr>
            @endforeach
        </x-slot>
    </x-table.container>
</x-layout>

