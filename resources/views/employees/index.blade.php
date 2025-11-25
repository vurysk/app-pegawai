<x-layout pageTitle="Employees">
    

    <div class="mb-4 bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-3">
        <form action="{{ route('employees.index') }}" method="GET" class="flex flex-col md:flex-row gap-3 items-end">
            
            <div class="flex-1 w-full">
                <label class="text-xs text-gray-400 ml-1 mb-1 block">Search Employee</label>
                <div class="relative">

                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Name, email, or phone..." 
                           class="w-full bg-gray-900/50 text-gray-200 text-sm border border-gray-600 rounded-lg px-3 py-1.5 focus:ring-purple-500 focus:border-purple-500 placeholder-gray-500">
                </div>
            </div>

            <div class="w-full md:w-1/4">
                <label class="text-xs text-gray-400 ml-1 mb-1 block">Status</label>

                <select name="status" onchange="this.form.submit()" 
                        class="w-full bg-gray-900/50 text-gray-200 text-sm border border-gray-600 rounded-lg px-3 py-1.5 focus:ring-purple-500 focus:border-purple-500 cursor-pointer">
                    <option value="">All Status</option>
                    <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Active</option>
                    <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="flex space-x-2">
                <button type="submit" class="px-3 py-1.5 text-sm bg-purple-600 hover:bg-purple-500 text-white rounded-lg shadow-lg shadow-purple-900/20 transition-all">
                    Search
                </button>
                <a href="{{ route('employees.index') }}" class="px-3 py-1.5 text-sm text-gray-400 hover:text-white border border-gray-600 hover:border-gray-500 rounded-lg transition-all">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <x-table.container title="Employee List" addRoute="{{ route('employees.create') }}" addText="Add Employee">
        <x-slot name="header">
            <x-table.header :columns="['Full Name', 'Contact', 'Position', 'Department', 'Status', 'Action']" />
        </x-slot>

        <x-slot name="body">
            @foreach ($employees as $employee)
                <tr class="hover:bg-gray-700/50 transition duration-200 border-b border-gray-700/30">
                    {{-- Table Cell px-4 py-2 --}}
                    <td class="px-4 py-2 whitespace-nowrap text-white font-medium text-sm">
                        {{ $employee->nama_lengkap }}
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap">
                        <div class="text-sm text-gray-300">{{ $employee->email }}</div>
                        <div class="text-xs text-gray-500">{{ $employee->nomor_telepon }}</div>
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-300 text-sm">
                        {{ $employee->position->nama_jabatan ?? '-' }}
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-400 text-sm">
                        {{ $employee->department->nama_departemen ?? '-' }}
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap">
                        @if($employee->status == 'aktif')
                            <span class="px-2 py-0.5 text-xs font-medium bg-green-500/10 text-green-400 border border-green-500/20 rounded-md">
                                Active
                            </span>
                        @else
                            <span class="px-2 py-0.5 text-xs font-medium bg-red-500/10 text-red-400 border border-red-500/20 rounded-md">
                                Inactive
                            </span>
                        @endif
                    </td>
                    <x-table.actions showRoute="employees.show" editRoute="employees.edit" destroyRoute="employees.destroy" :id="$employee->id" />
                </tr>
            @endforeach
        </x-slot>
    </x-table.container>

    <div class="mt-3 px-2">
        {{ $employees->withQueryString()->links() }}
    </div>
</x-layout>







