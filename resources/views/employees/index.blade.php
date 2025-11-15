<x-layout pageTitle="Employees">
    <x-table.container title="Employee List" addRoute="{{ route('employees.create') }}" addText="Add Employee">
        <x-slot name="header">
            <x-table.header :columns="['Full Name', 'Email', 'Phone Number', 'Department', 'Position', 'Status', 'Action']" />
        </x-slot>

        <x-slot name="body">
            @foreach ($employees as $employee)
                <tr class="hover:bg-gray-700/50 transition duration-200 border-b border-gray-700/30">
                    <td class="px-6 py-3 whitespace-nowrap text-gray-100">{{ $employee->nama_lengkap }}</td>
                    <td class="px-6 py-3 whitespace-nowrap text-gray-300">{{ $employee->email }}</td>
                    <td class="px-6 py-3 whitespace-nowrap text-gray-300">{{ $employee->nomor_telepon }}</td>
                    <td class="px-6 py-3 whitespace-nowrap text-gray-300">
                        {{ $employee->department->nama_departemen ?? '-' }}</td>
                    <td class="px-6 py-3 whitespace-nowrap text-gray-300">{{ $employee->position->nama_jabatan ?? '-' }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap">
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                    {{ $employee->status == 'aktif'
                        ? 'bg-green-500/20 text-green-300 border border-green-500/30'
                        : 'bg-red-500/20 text-red-300 border border-red-500/30' }}">
                            <span
                                class="w-1.5 h-1.5 rounded-full mr-1.5 
                        {{ $employee->status == 'aktif' ? 'bg-green-400' : 'bg-red-400' }}"></span>
                            {{ ucfirst($employee->status) }}
                        </span>
                    </td>
                    <x-table.actions showRoute="employees.show" editRoute="employees.edit"
                        destroyRoute="employees.destroy" :id="$employee->id" />
                </tr>
            @endforeach
        </x-slot>
    </x-table.container>
</x-layout>






