<x-layout pageTitle="Edit Salary">
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
</x-layout>


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