<x-layout pageTitle="Create Department">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-xl mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">➕ Add Department</h2>

        <form action="{{ route('departments.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="nama_departemen" class="block text-sm font-medium text-gray-700">Department Name</label>
                <input type="text" id="nama_departemen" name="nama_departemen" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm">
            </div>

            <div class="pt-4 text-right">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-neutral-900 text-white text-sm font-medium rounded-md hover:bg-neutral-800 hover:scale-105 hover:shadow-md transform transition duration-200 ease-out">
                    ➕ Add
                </button>
                <a href="{{ route('departments.index') }}"
                    class="ml-4 text-sm text-red-900 hover:underline">← Cancel</a>
            </div>
        </form>
    </div>
</x-layout>

{{-- <!DOCTYPE html>
<html>
<head>
    <title>Form Input Departemen</title>
</head>
<body>
    <h1 class="mb-4">Department Form</h1>
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="nama_departemen">Nama Departemen:</label></td>
                <td><input type="text" id="nama_departemen" name="nama_departemen" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                    <button type="submit">Saved</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html> --}}