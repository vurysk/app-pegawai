<x-layout pageTitle="Salaries">

    <div class="mb-4 bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-3">
        <form action="{{ route('salaries.index') }}" method="GET" class="flex flex-col md:flex-row gap-3 items-end">
            
           
            <div class="flex-1 w-full">
                <label class="text-xs text-gray-400 ml-1 mb-1 block">Search Employee</label>
                <div class="relative">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Find by name..." 
                           class="w-full bg-gray-900/50 text-gray-200 text-sm border border-gray-600 rounded-lg px-3 py-1.5 focus:ring-purple-500 focus:border-purple-500 placeholder-gray-500">
                </div>
            </div>

            
            <div class="w-full md:w-1/4">
                <label class="text-xs text-gray-400 ml-1 mb-1 block">Filter Month</label>
                <select name="filter_bulan" 
                        onchange="this.form.submit()" 
                        class="w-full bg-gray-900/50 text-gray-200 text-sm border border-gray-600 rounded-lg px-3 py-1.5 focus:ring-purple-500 focus:border-purple-500 cursor-pointer">
                    <option value="">All Months</option>
                    @foreach($availableMonths as $m)
                        <option value="{{ $m }}" {{ request('filter_bulan') == $m ? 'selected' : '' }}>
                            {{ $m }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="flex space-x-2">
                <button type="submit" class="px-3 py-1.5 text-sm bg-purple-600 hover:bg-purple-500 text-white rounded-lg transition-all shadow-lg shadow-purple-900/20">
                    Search
                </button>
                <a href="{{ route('salaries.index') }}" class="px-3 py-1.5 text-sm text-gray-400 hover:text-white border border-gray-600 hover:border-gray-500 rounded-lg transition-all">
                    Reset
                </a>
            </div>
        </form>
    </div>


    <x-table.container title="Employee Salary List" addRoute="{{ route('salaries.create') }}" addText="Add Salary">
        <x-slot name="header">
            <x-table.header :columns="['Employee Name', 'Month', 'Base Salary', 'Allowance', 'Deductions', 'Total Salary', 'Actions']" />
        </x-slot>

        <x-slot name="body">
            @forelse ($salaries as $salary)
                <tr class="hover:bg-gray-700/50 transition duration-200 border-b border-gray-700/30">
                    
                   
                    <td class="px-4 py-2 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full bg-gray-700 flex items-center justify-center text-purple-400 text-xs font-bold mr-3 border border-gray-600">
                                {{ substr($salary->employee->nama_lengkap, 0, 1) }}
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-100">{{ $salary->employee->nama_lengkap ?? '-' }}</div>
                                <div class="text-xs text-gray-500">{{ $salary->employee->position->nama_jabatan ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </td>

                    <td class="px-4 py-2 whitespace-nowrap">
                        <span class="px-2 py-0.5 text-xs font-medium bg-gray-700 text-gray-300 rounded-md border border-gray-600">
                            {{ $salary->bulan }}
                        </span>
                    </td>

                    <td class="px-4 py-2 whitespace-nowrap text-gray-400 text-sm">
                        Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}
                    </td>

                    <td class="px-4 py-2 whitespace-nowrap text-green-400 text-sm">
                        + Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}
                    </td>

                    <td class="px-4 py-2 whitespace-nowrap text-red-400 text-sm">
                        - Rp {{ number_format($salary->potongan, 0, ',', '.') }}
                    </td>

                    <td class="px-4 py-2 whitespace-nowrap">
                        <div class="flex items-center px-2 py-0.5 rounded-lg bg-purple-500/10 border border-purple-500/30 w-fit">
                            <span class="font-bold text-purple-300 text-sm">
                                Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}
                            </span>
                        </div>
                    </td>

                    
                    <x-table.actions 
                        showRoute="salaries.show" 
                        editRoute="salaries.edit" 
                        destroyRoute="salaries.destroy"
                        :id="$salary->id" 
                    />
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center">
                            <p class="text-sm font-medium">No records found</p>
                            <p class="text-xs text-gray-600">Try adjusting your search.</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </x-slot>
    </x-table.container>

    
    <div class="mt-3 px-2">
        {{ $salaries->links() }}
    </div>

</x-layout>
