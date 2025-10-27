<x-layout pageTitle="Create Salary">
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
                    placeholder="e.g. October 2025">
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
</x-layout>


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