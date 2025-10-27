<x-layout pageTitle="Positions">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Position List</h2>
            <a href="{{ route('positions.create') }}"
                class="text-sm text-blue-600 hover:underline">➕ Create New Position</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300 text-sm">
                <thead class="bg-gray-100 text-left text-gray-700 font-semibold">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Position Name</th>
                        <th class="px-6 py-3">Main Salary</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-600">
                    @foreach ($positions as $position)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $position->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $position->nama_jabatan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">$ {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                <a href="{{ route('positions.show', $position->id) }}"
                                    class="text-blue-600 hover:underline">👁️</a>
                                <a href="{{ route('positions.edit', $position->id) }}"
                                    class="text-yellow-600 hover:underline">✒️</a>
                                <form action="{{ route('positions.destroy', $position->id) }}" method="POST"
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

        <div class="mt-6">
            {{ $positions->links() }}
        </div>
    </div>
</x-layout>


{{-- @extends('master')
@section('title', 'Daftar Jabatan')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Jabatan</h1>

        <a href="{{ route('positions.create') }}" style="display:inline-block; margin-bottom:15px;">
            ➕ Create New Jabatan
        </a>

        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Position Name </th>
                    <th>Main Salary</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($positions as $position)
                    <tr>
                        <td>{{ $position->id }}</td>
                        <td>{{ $position->nama_jabatan }}</td>
                        <td>$ {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('positions.show', $position->id) }}">📁</a>
                            <a href="{{ route('positions.edit', $position->id) }}">✏️</a>
                            <form action="{{ route('positions.destroy', $position->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $positions->links() }}
    </div>
@endsection --}}