<x-layout pageTitle="Edit Salary">
    <div class="max-w-2xl mx-auto">
        <!-- Compact Header -->
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-1.5 h-6 bg-gradient-to-b from-purple-600 to-purple-400 rounded-full"></div>
                    <h2 class="text-xl font-light text-white">Edit Salary Record</h2>
                </div>
            </div>
        </div>

        <!-- Compact Form Section -->
        <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="gradient-border rounded-xl p-0.5 mb-6">
                <div class="bg-gray-800/90 backdrop-blur-sm rounded-xl p-6 border border-gray-700/50">
                    <div class="grid grid-cols-1 gap-4">
                        <x-form.select 
                            name="karyawan_id" 
                            label="Employee" 
                            :options="$employees" 
                            selected="{{ old('karyawan_id', $salary->karyawan_id) }}"
                            optionLabel="nama_lengkap"
                        />

                        <x-form.input 
                            name="bulan" 
                            label="Month" 
                            value="{{ old('bulan', $salary->bulan) }}"
                            placeholder="e.g. October 2025"
                        />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                        <x-form.input 
                            name="gaji_pokok" 
                            label="Base Salary" 
                            type="number" 
                            value="{{ old('gaji_pokok', $salary->gaji_pokok) }}"
                            step="0.01"
                        />

                        <x-form.input 
                            name="tunjangan" 
                            label="Allowance" 
                            type="number" 
                            value="{{ old('tunjangan', $salary->tunjangan) }}"
                            step="0.01"
                        />

                        <x-form.input 
                            name="potongan" 
                            label="Deductions" 
                            type="number" 
                            value="{{ old('potongan', $salary->potongan) }}"
                            step="0.01"
                        />

                        <x-form.input 
                            name="total_gaji" 
                            label="Total Salary" 
                            type="number" 
                            value="{{ old('total_gaji', $salary->total_gaji) }}"
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
                    Update Salary
                </button>
            </div>
        </form>
    </div>
</x-layout>


{{-- <x-layout pageTitle="Edit Salary">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">✒️ Edit Salary Record</h2>

        <form action="{{ route('salaries.update', $salaries->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="karyawan_id" class="block text-sm font-medium text-gray-700">Employee</label>
                <select name="karyawan_id" id="karyawan_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm">
                    @foreach ($employees as $emp)
                        <option value="{{ $emp->id }}"
                            {{ old('karyawan_id', $salaries->karyawan_id) == $emp->id ? 'selected' : '' }}>
                            {{ $emp->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="bulan" class="block text-sm font-medium text-gray-700">Month</label>
                <input type="text" name="bulan" id="bulan" value="{{ old('bulan', $salaries->bulan) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm"
                    placeholder="e.g. October 2025">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="gaji_pokok" class="block text-sm font-medium text-gray-700">Base Salary</label>
                    <input type="number" step="0.01" name="gaji_pokok" id="gaji_pokok"
                        value="{{ old('gaji_pokok', $salaries->gaji_pokok) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm">
                </div>

                <div>
                    <label for="tunjangan" class="block text-sm font-medium text-gray-700">Allowance</label>
                    <input type="number" step="0.01" name="tunjangan" id="tunjangan"
                        value="{{ old('tunjangan', $salaries->tunjangan) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm">
                </div>

                <div>
                    <label for="potongan" class="block text-sm font-medium text-gray-700">Deductions</label>
                    <input type="number" step="0.01" name="potongan" id="potongan"
                        value="{{ old('potongan', $salaries->potongan) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm">
                </div>

                <div>
                    <label for="total_gaji" class="block text-sm font-medium text-gray-700">Total Salary</label>
                    <input type="number" step="0.01" name="total_gaji" id="total_gaji"
                        value="{{ old('total_gaji', $salaries->total_gaji) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm">
                </div>
            </div>

            <div class="pt-4 text-right">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-neutral-900 text-white text-sm font-medium rounded-md hover:bg-neutral-800 hover:scale-105 hover:shadow-md transform transition duration-200 ease-out">
                    💾 Update
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
    <title>Edit Salary Record</title>
    <style>
        body {
            background-color: #fcfce6;
        }
    </style>
</head>

<body>
    <h2>Edit Salary Record</h2>
    <form action="{{ route('salaries.update', $salaries->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>Employee</td>
                <td>
                    <select name="karyawan_id">
                        @foreach ($employees as $emp)
                            <option value="{{ $emp->id }}"
                                {{ old('karyawan_id', $salaries->karyawan_id) == $emp->id ? 'selected' : '' }}>
                                {{ $emp->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Month</td>
                <td><input type="text" name="bulan" value="{{ old('bulan', $salaries->bulan) }}"></td>
            </tr>
            <tr>
                <td>Base Salary</td>
                <td><input type="number" step="0.01" name="gaji_pokok" value="{{ old('gaji_pokok', $salaries->gaji_pokok) }}"></td>
            </tr>
            <tr>
                <td>Allowance</td>
                <td><input type="number" step="0.01" name="tunjangan" value="{{ old('tunjangan', $salaries->tunjangan) }}"></td>
            </tr>
            <tr>
                <td>Deductions</td>
                <td><input type="number" step="0.01" name="potongan" value="{{ old('potongan', $salaries->potongan) }}"></td>
            </tr>
            <tr>
                <td>Total Salary</td>
                <td><input type="number" step="0.01" name="total_gaji" value="{{ old('total_gaji', $salaries->total_gaji) }}"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                    <button type="submit">Update</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html> --}}