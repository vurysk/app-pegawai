<x-layout pageTitle="Salaries">
    <x-table.container title="Employee Salary List" addRoute="{{ route('salaries.create') }}" addText="Add Salary">
        <x-slot name="header">
            <x-table.header :columns="['Employee Name', 'Month', 'Base Salary', 'Allowance', 'Deductions', 'Total Salary', 'Actions']" />
        </x-slot>

        <x-slot name="body">
            @foreach ($salaries as $salary)
                <tr class="hover:bg-gray-700/50 transition duration-200 border-b border-gray-700/30">
                    <td class="px-6 py-3 whitespace-nowrap text-gray-100">{{ $salary->employee->nama_lengkap ?? '-' }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-gray-300">{{ $salary->bulan }}</td>
                    <td class="px-6 py-3 whitespace-nowrap text-gray-300">$
                        {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                    <td class="px-6 py-3 whitespace-nowrap text-green-400">$
                        {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                    <td class="px-6 py-3 whitespace-nowrap text-red-400">$
                        {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                    <td
                        class="px-6 py-3 whitespace-nowrap font-semibold text-white bg-gradient-to-r from-purple-500/10 to-purple-600/10 border-l-2 border-purple-500">
                        $ {{ number_format($salary->total_gaji, 0, ',', '.') }}
                    </td>
                    <x-table.actions showRoute="salaries.show" editRoute="salaries.edit" destroyRoute="salaries.destroy"
                        :id="$salary->id" />
                </tr>
            @endforeach
        </x-slot>
    </x-table.container>
</x-layout>



{{-- <x-layout pageTitle="Salaries">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Employee Salary List</h2>
            <a href="{{ route('salaries.create') }}"
                class="text-sm text-blue-600 hover:underline">➕ Add Salary</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300 text-sm">
                <thead class="bg-gray-100 text-left text-gray-700 font-semibold">
                    <tr>
                        <th class="px-6 py-3">Employee Name</th>
                        <th class="px-6 py-3">Month</th>
                        <th class="px-6 py-3">Base Salary</th>
                        <th class="px-6 py-3">Allowance</th>
                        <th class="px-6 py-3">Deductions</th>
                        <th class="px-6 py-3">Total Salary</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-600">
                    @foreach ($salaries as $salary)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $salary->employee->nama_lengkap ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $salary->bulan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">$ {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">$ {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">$ {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800">$ {{ number_format($salary->total_gaji, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                <a href="{{ route('salaries.show', $salary->id) }}"
                                    class="text-blue-600 hover:underline">👁️</a>
                                <a href="{{ route('salaries.edit', $salary->id) }}"
                                    class="text-yellow-600 hover:underline">✒️</a>
                                <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this salary?')"
                                        class="text-red-600 hover:underline">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout> --}}


{{-- @extends('master')
@section('title', 'Salary List')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Employee Salary List</h1>

        <a href="{{ route('salaries.create') }}" style="display:inline-block; margin-bottom:15px;">
            ➕ Add Salary
        </a>

        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Month</th>
                    <th>Base Salary</th>
                    <th>Allowance</th>
                    <th>Deductions</th>
                    <th>Total Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($salaries as $salary)
                    <tr>
                        <td>{{ $salary->employee->nama_lengkap ?? '-' }}</td>
                        <td>{{ $salary->bulan }}</td>
                        <td>${{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                        <td>${{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                        <td>${{ number_format($salary->potongan, 0, ',', '.') }}</td>
                        <td>${{ number_format($salary->total_gaji, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('salaries.show', $salary->id) }}">📁</a>
                            <a href="{{ route('salaries.edit', $salary->id) }}">✏️</a>
                            <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this?')">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}
