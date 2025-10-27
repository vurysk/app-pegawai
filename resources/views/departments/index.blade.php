<x-layout pageTitle="Departments">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Department List</h2>
            <a href="{{ route('departments.create') }}"
                class="text-sm text-blue-600 hover:underline">➕ Add Department</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300 text-sm">
                <thead class="bg-gray-100 text-left text-gray-700 font-semibold">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Department Name</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-600">
                    @foreach ($departments as $department)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $department->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $department->nama_departemen }}</td>
                            <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                <a href="{{ route('departments.show', $department->id) }}"
                                    class="text-blue-600 hover:underline">👁️</a>
                                <a href="{{ route('departments.edit', $department->id) }}"
                                    class="text-yellow-600 hover:underline">✒️</a>
                                <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus?')"
                                        class="text-red-600 hover:underline">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>



{{-- @extends('master')
@section('title', 'Daftar Pegawai')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Departemen</h1>
        <table border="1" cellpadding="5" cellspacing="0">

            <a href="{{ route('departments.create') }}" style="display:inline-block; margin-bottom:15px;">
                ➕
            </a>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Departemen</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->nama_departemen }}</td>
                        <td>
                            <a href="{{ route('departments.show', $department->id) }}">📁</a>
                            <a href="{{ route('departments.edit', $department->id) }}">✏️</a>
                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection --}}
