<x-layout pageTitle="Edit Department">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-xl mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">✒️ Edit Department</h2>

        <form action="{{ route('departments.update', $departments->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="nama_departemen" class="block text-sm font-medium text-gray-700">Department Name</label>
                <input type="text" name="nama_departemen" id="nama_departemen"
                    value="{{ old('nama_departemen', $departments->nama_departemen) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm">
            </div>

            <div class="pt-4 text-right">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-neutral-900 text-white text-sm font-medium rounded-md hover:bg-neutral-800 hover:scale-105 hover:shadow-md transform transition duration-200 ease-out">
                    💾 Update
                </button>
                <a href="{{ route('departments.index') }}"
                    class="ml-4 text-sm text-red-900 hover:underline">← Cancel</a>
            </div>
        </form>
    </div>
</x-layout>


{{-- <x-layout pageTitle="Edit Department">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-xl mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">✒️ Edit Department</h2>

        <div class="mb-4">
            <table class="min-w-full divide-y divide-gray-300 text-sm">
                <tbody class="divide-y divide-gray-200 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50 w-1/3">ID</th>
                        <td class="px-6 py-3">{{ $departments->id }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <form action="{{ route('departments.update', $departments->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="nama_departemen" class="block text-sm font-medium text-gray-700">Department Name</label>
                <input type="text" name="nama_departemen" id="nama_departemen"
                    value="{{ old('nama_departemen', $departments->nama_departemen) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm">
            </div>

            <div class="pt-4 text-right">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-neutral-900 text-white text-sm font-medium rounded-md hover:bg-neutral-800 hover:scale-105 hover:shadow-md transform transition duration-200 ease-out">
                    💾 Update
                </button>
                <a href="{{ route('departments.index') }}"
                    class="ml-4 text-sm text-gray-600 hover:underline">← Cancel</a>
            </div>
        </form>
    </div>
</x-layout> --}}


{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Departemen</title>
    <style>
        body {
            background-color: #fcfce6; /* warna biru muda */
        }
    </style>
</head>

<body>
    <h2>Edit Data Departemen</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <td>{{ $departments->id }}</td>
        </tr>
    </table>

    <form action="{{ route('departments.update', $departments->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>Nama Departemen</td>
                <td>
                    <input type="text" name="nama_departemen"
                        value="{{ old('nama_departemen', $departments->nama_departemen) }}" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Update</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html> --}}