<x-layout pageTitle="Create Position">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-xl mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">➕ Add Position</h2>

        <form action="{{ route('positions.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="nama_jabatan" class="block text-sm font-medium text-gray-700">Position Name</label>
                <input type="text" id="nama_jabatan" name="nama_jabatan" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm">
            </div>

            <div>
                <label for="gaji_pokok" class="block text-sm font-medium text-gray-700">Main Salary</label>
                <input type="number" id="gaji_pokok" name="gaji_pokok" min="0" step="0.01" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm"
                    placeholder="Contoh: 1200.50">
            </div>

            <div class="pt-4 text-right">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-neutral-900 text-white text-sm font-medium rounded-md hover:bg-neutral-800 hover:scale-105 hover:shadow-md transform transition duration-200 ease-out">
                    ➕ Add
                </button>
                <a href="{{ route('positions.index') }}"
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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Input Jabatan</title>
    <style>
        body {
            background-color: #fcfce6; /* warna biru muda */
        }
    </style>
</head>

<body>
    <h1 class="mb-4">Form Jabatan</h1>
    <form action="{{ route('positions.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="nama_jabatan">Position Name</label></td>
                <td><input type="text" id="nama_jabatan" name="nama_jabatan" required></td>
            </tr>
            <tr>
                <td><label for="gaji_pokok">Main Salary:</label></td>
                <td><input type="number" id="gaji_pokok" name="gaji_pokok" min="0" required></td>
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