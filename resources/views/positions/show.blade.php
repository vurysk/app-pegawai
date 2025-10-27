<x-layout pageTitle="Position Detail">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">🗃️ Position Detail</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300 text-sm">
                <tbody class="divide-y divide-gray-200 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50 w-1/3">ID</th>
                        <td class="px-6 py-3">{{ $positions->id }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Position Name</th>
                        <td class="px-6 py-3">{{ $positions->nama_jabatan }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Main Salary</th>
                        <td class="px-6 py-3">$ {{ number_format($positions->gaji_pokok, 2, '.', ',') }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Created At</th>
                        <td class="px-6 py-3">{{ $positions->created_at->format('Y-m-d') }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Last Updated</th>
                        <td class="px-6 py-3">{{ $positions->updated_at->format('Y-m-d') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="{{ route('positions.index') }}"
               class="inline-block text-sm text-blue-600 hover:underline">← Back</a>
        </div>
    </div>
</x-layout>


{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Jabatan</title>
    <style>
        body {
            background-color: #fcfce6; /* warna biru muda */
        }
    </style>
</head>

<body>
    <h1>Detail Jabatan</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <td>{{ $positions->id }}</td>
        </tr>
        <tr>
            <th>Position Name</th>
            <td>{{ $positions->nama_jabatan }}</td>
        </tr>
        <tr>
            <th>Main Salary</th>
            <td>$ {{ number_format($positions->gaji_pokok, 2, '.', ',') }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $positions->created_at->format('Y-m-d') }}</td>
        </tr>
        <tr>
            <th>Last Updated</th>
            <td>{{ $positions->updated_at->format('Y-m-d') }}</td>
        </tr>
    </table>
</body>

</html> --}}