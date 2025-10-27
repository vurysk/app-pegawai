<x-layout pageTitle="Attendance">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Attendance List</h2>
            <a href="{{ route('attendances.create') }}"
                class="text-sm text-blue-600 hover:underline">➕ Add Attendance</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300 text-sm">
                <thead class="bg-gray-100 text-left text-gray-700 font-semibold">
                    <tr>
                        <th class="px-6 py-3">Employee Name</th>
                        <th class="px-6 py-3">Date</th>
                        <th class="px-6 py-3">Entry Time</th>
                        <th class="px-6 py-3">Out Time</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-600">
                    @foreach($attendances as $attendance)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $attendance->employee->nama_lengkap ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $attendance->tanggal }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $attendance->waktu_masuk }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $attendance->waktu_keluar }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $attendance->status_absensi }}</td>
                            <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                <a href="{{ route('attendances.show', $attendance->id) }}"
                                    class="text-blue-600 hover:underline">👁️</a>
                                <a href="{{ route('attendances.edit', $attendance->id) }}"
                                    class="text-yellow-600 hover:underline">✒️</a>
                                <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST"
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
@section('title', 'Daftar Absensi')
@section('page-title', 'Attendance')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Attendance List</h1>

        <a href="{{ route('attendances.create') }}" style="display:inline-block; margin-bottom:15px;">
            ➕
        </a>

        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Date</th>
                    <th>Entry Time</th>
                    <th>Out Time</th>
                    <th>Attendance Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->employee->nama_lengkap ?? '-' }}</td>
                    <td>{{ $attendance->tanggal }}</td>
                    <td>{{ $attendance->waktu_masuk }}</td>
                    <td>{{ $attendance->waktu_keluar }}</td>
                    <td>{{ $attendance->status_absensi }}</td>
                    <td>
                        <a href="{{ route('attendances.show', $attendance->id) }}">📁</a>
                        <a href="{{ route('attendances.edit', $attendance->id) }}">✏️</a>
                        <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" style="display:inline;">
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