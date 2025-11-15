<x-layout pageTitle="Salary Detail">
    <x-detail.card 
        title="💰 Salary Detail" 
        backRoute="salaries.index" 
        backText="Back"
    >
        <x-detail.row label="Employee Name" :value="$salary->employee->nama_lengkap ?? '-'" />
        <x-detail.row label="Month" :value="$salary->bulan" />
        <x-detail.row label="Base Salary" :value="'$ ' . number_format($salary->gaji_pokok, 0, ',', '.')" />
        <x-detail.row label="Allowance" :value="'$ ' . number_format($salary->tunjangan, 0, ',', '.')" />
        <x-detail.row label="Deductions" :value="'$ ' . number_format($salary->potongan, 0, ',', '.')" />
        <x-detail.row label="Total Salary" :value="'$ ' . number_format($salary->total_gaji, 0, ',', '.')" />
        <x-detail.row label="Created At" :value="$salary->created_at->format('d-m-Y H:i')" />
        <x-detail.row label="Last Updated" :value="$salary->updated_at->format('d-m-Y H:i')" />
    </x-detail.card>
</x-layout>



{{-- <x-layout pageTitle="Salary Detail">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">💰 Salary Detail</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300 text-sm">
                <tbody class="divide-y divide-gray-200 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50 w-1/3">Employee Name</th>
                        <td class="px-6 py-3">{{ $salaries->employee->nama_lengkap ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Month</th>
                        <td class="px-6 py-3">{{ $salaries->bulan }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Base Salary</th>
                        <td class="px-6 py-3">$ {{ number_format($salaries->gaji_pokok, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Allowance</th>
                        <td class="px-6 py-3">$ {{ number_format($salaries->tunjangan, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Deductions</th>
                        <td class="px-6 py-3">$ {{ number_format($salaries->potongan, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Total Salary</th>
                        <td class="px-6 py-3 font-semibold text-gray-800">$ {{ number_format($salaries->total_gaji, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Created At</th>
                        <td class="px-6 py-3">{{ $salaries->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Last Updated</th>
                        <td class="px-6 py-3">{{ $salaries->updated_at->format('d-m-Y H:i') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="{{ route('salaries.index') }}"
               class="inline-block text-sm text-blue-600 hover:underline">← Back</a>
        </div>
    </div>
</x-layout> --}}


{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Details</title>
    <style>
        body {
            background-color: #fcfce6;
        }
    </style>
</head>

<body>
    <h1>Salary Details</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Employee Name</th>
            <td>{{ $salaries->employee->nama_lengkap ?? '-' }}</td>
        </tr>
        <tr>
            <th>Month</th>
            <td>{{ $salaries->bulan }}</td>
        </tr>
        <tr>
            <th>Base Salary</th>
            <td>${{ number_format($salaries->gaji_pokok, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Allowance</th>
            <td>${{ number_format($salaries->tunjangan, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Deductions</th>
            <td>${{ number_format($salaries->potongan, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Total Salary</th>
            <td>${{ number_format($salaries->total_gaji, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $salaries->created_at->format('d-m-Y H:i') }}</td>
        </tr>
        <tr>
            <th>Last Updated</th>
            <td>{{ $salaries->updated_at->format('d-m-Y H:i') }}</td>
        </tr>
    </table>
</body>

</html> --}}