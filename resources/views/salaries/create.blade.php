<x-layout pageTitle="Create Salary">
    <div class="max-w-2xl mx-auto">
        <!-- Compact Header -->
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-1.5 h-6 bg-gradient-to-b from-purple-600 to-purple-400 rounded-full"></div>
                    <h2 class="text-xl font-light text-white">Add Salary Record</h2>
                </div>
            </div>
        </div>

        <!-- Compact Form Section -->
        <form action="{{ route('salaries.store') }}" method="POST">
            @csrf
            
            <div class="gradient-border rounded-xl p-0.5 mb-6">
                <div class="bg-gray-800/90 backdrop-blur-sm rounded-xl p-6 border border-gray-700/50">
                    <div class="grid grid-cols-1 gap-4">
                        <x-form.select 
                            name="karyawan_id" 
                            label="Employee" 
                            :options="$employees" 
                            selected="{{ old('karyawan_id') }}"
                            optionLabel="nama_lengkap"
                        />

                        <x-form.input 
                            name="bulan" 
                            label="Month" 
                            value="{{ old('bulan') }}"
                            placeholder="e.g. October 2025"
                        />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                        <x-form.input 
                            name="gaji_pokok" 
                            label="Base Salary" 
                            type="number" 
                            value="{{ old('gaji_pokok') }}"
                            step="0.01"
                        />

                        <x-form.input 
                            name="tunjangan" 
                            label="Allowance" 
                            type="number" 
                            value="{{ old('tunjangan', 0) }}"
                            step="0.01"
                        />

                        <x-form.input 
                            name="potongan" 
                            label="Deduction" 
                            type="number" 
                            value="{{ old('potongan', 0) }}"
                            step="0.01"
                        />

                        <x-form.input 
                            name="total_gaji" 
                            label="Total Salary" 
                            type="number" 
                            value="{{ old('total_gaji') }}"
                            step="0.01"
                        />
                    </div>
                </div>
            </div>

            <!-- Compact Action Buttons -->
            <div class="flex items-center justify-end space-x-3">
                <a href="{{ route('salaries.index') }}" 
                   class="px-4 py-2 text-xs font-medium text-gray-300 bg-gray-700/50 border border-gray-600/50 rounded-lg hover:bg-gray-600/50 hover:text-white transition-all duration-300">
                    Cancel
                </a>
                <button type="submit"
                    class="px-4 py-2 text-xs font-medium text-white bg-gradient-to-r from-purple-800 to-purple-800 border border-purple-900 rounded-lg hover:from-purple-700 hover:to-purple-700 hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    Add Salary
                </button>
            </div>
        </form>
    </div>
</x-layout>



{{-- <x-layout pageTitle="Create Salary">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">➕ Add Salary Record</h2>

        <form action="{{ route('salaries.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="karyawan_id" class="block text-sm font-medium text-gray-700">Employee</label>
                <select name="karyawan_id" id="karyawan_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm">
                    @foreach ($employees as $emp)
                        <option value="{{ $emp->id }}" {{ old('karyawan_id') == $emp->id ? 'selected' : '' }}>
                            {{ $emp->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="bulan" class="block text-sm font-medium text-gray-700">Month</label>
                <input type="text" id="bulan" name="bulan" value="{{ old('bulan') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm"
                    >
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="gaji_pokok" class="block text-sm font-medium text-gray-700">Base Salary</label>
                    <input type="number" step="0.01" id="gaji_pokok" name="gaji_pokok" value="{{ old('gaji_pokok') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm">
                </div>

                <div>
                    <label for="tunjangan" class="block text-sm font-medium text-gray-700">Allowance</label>
                    <input type="number" step="0.01" id="tunjangan" name="tunjangan" value="{{ old('tunjangan', 0) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm">
                </div>

                <div>
                    <label for="potongan" class="block text-sm font-medium text-gray-700">Deduction</label>
                    <input type="number" step="0.01" id="potongan" name="potongan" value="{{ old('potongan', 0) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm">
                </div>

                <div>
                    <label for="total_gaji" class="block text-sm font-medium text-gray-700">Total Salary</label>
                    <input type="number" step="0.01" id="total_gaji" name="total_gaji" value="{{ old('total_gaji') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm">
                </div>
            </div>

            <div class="pt-4 text-right">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-neutral-900 text-white text-sm font-medium rounded-md hover:bg-neutral-800 hover:scale-105 hover:shadow-md transform transition duration-200 ease-out">
                    ➕ Add
                </button>
                <a href="{{ route('salaries.index') }}"
                    class="ml-4 text-sm text-red-900 hover:underline">← Cancel</a>
            </div>
        </form>
    </div>
</x-layout> --}}


{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Input Form</title>
    <style>
        body {
            background-color: #fcfce6;
        }
    </style>
</head>

<body>
    <h1 class="mb-4">Salary Form</h1>
    <form action="{{ route('salaries.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="karyawan_id">Employee:</label></td>
                <td>
                    <select name="karyawan_id" id="karyawan_id">
                        @foreach ($employees as $emp)
                            <option value="{{ $emp->id }}" {{ old('karyawan_id') == $emp->id ? 'selected' : '' }}>
                                {{ $emp->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="bulan">Month:</label></td>
                <td><input type="text" id="bulan" name="bulan" value="{{ old('bulan') }}"></td>
            </tr>
            <tr>
                <td><label for="gaji_pokok">Base Salary:</label></td>
                <td><input type="number" step="0.01" id="gaji_pokok" name="gaji_pokok" value="{{ old('gaji_pokok') }}"></td>
            </tr>
            <tr>
                <td><label for="tunjangan">Allowance:</label></td>
                <td><input type="number" step="0.01" id="tunjangan" name="tunjangan" value="{{ old('tunjangan', 0) }}"></td>
            </tr>
            <tr>
                <td><label for="potongan">Deduction:</label></td>
                <td><input type="number" step="0.01" id="potongan" name="potongan" value="{{ old('potongan', 0) }}"></td>
            </tr>
            <tr>
                <td><label for="total_gaji">Total Salary:</label></td>
                <td><input type="number" step="0.01" id="total_gaji" name="total_gaji" value="{{ old('total_gaji') }}"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                    <button type="submit">Submit</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html> --}}