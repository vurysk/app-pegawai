<x-layout pageTitle="Department Detail">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">🗃️ Department Detail</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300 text-sm">
                <tbody class="divide-y divide-gray-200 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50 w-1/3">ID</th>
                        <td class="px-6 py-3">{{ $departments->id }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Department Name</th>
                        <td class="px-6 py-3">{{ $departments->nama_departemen }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Created At</th>
                        <td class="px-6 py-3">{{ $departments->created_at->format('Y-m-d') }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Last Update</th>
                        <td class="px-6 py-3">{{ $departments->updated_at->format('Y-m-d') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="{{ route('departments.index') }}"
               class="inline-block text-sm text-blue-600 hover:underline">← Back</a>
        </div>
    </div>
</x-layout>


{{-- <!DOCTYPE html>
<html>
<head>
    <title>Detail Departemen</title>
</head>
<body>
    <h1>Detail Departemen</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <td>{{ $departments->id }}</td>
        </tr>
        <tr>
            <th>Department Name</th>
            <td>{{ $departments->nama_departemen }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $departments->created_at->format('Y-m-d') }}</td>
        </tr>
        <tr>
            <th>Last Update</th>
            <td>{{ $departments->updated_at->format('Y-m-d') }}</td>
        </tr>
    </table>
</body>
</html> --}}
