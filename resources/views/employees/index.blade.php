<x-layout pageTitle="Employee">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Employee List</h2>
            <a href="{{ route('employees.create') }}" class="text-sm text-blue-600 hover:underline">
                ➕ Add Employee
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300 text-sm">
                <thead class="bg-gray-100 text-left text-gray-700 font-semibold">
                    <tr>
                        <th class="px-6 py-3">Full Name</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Phone Number</th>
                        <th class="px-6 py-3">Date of Birth</th>
                        <th class="px-6 py-3">Address</th>
                        <th class="px-6 py-3">Join Date</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-600">
                    @foreach ($employees as $employee)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->nama_lengkap }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->nomor_telepon }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->tanggal_lahir }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->alamat }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->tanggal_masuk }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->status }}</td>
                            <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                <a href="{{ route('employees.show', $employee->id) }}"
                                    class="text-blue-600 hover:underline">👤</a>
                                <a href="{{ route('employees.edit', $employee->id) }}"
                                    class="text-yellow-600 hover:underline">✒️
                                </a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this employee?')"
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


{{-- <x-layout pageTitle="Employee List">
    <div class="bg-white/30 backdrop-blur-md border border-white/20 p-6 rounded-xl shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Employee List</h2>
            <a href="{{ route('employees.create') }}" class="text-sm text-blue-600 hover:underline">
                ➕ Add Employee
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300 text-sm">
                <thead class="bg-white/40 backdrop-blur-sm text-gray-700 font-semibold">
                    <tr>
                        <th class="px-6 py-3">Full Name</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Phone Number</th>
                        <th class="px-6 py-3">Date of Birth</th>
                        <th class="px-6 py-3">Address</th>
                        <th class="px-6 py-3">Join Date</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-600">
                    @foreach ($employees as $employee)
                        <tr class="hover:bg-white/20 transition duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->nama_lengkap }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->nomor_telepon }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->tanggal_lahir }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->alamat }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->tanggal_masuk }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->status }}</td>
                            <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                <a href="{{ route('employees.show', $employee->id) }}" class="text-blue-600 hover:underline">📁</a>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="text-yellow-600 hover:underline">✏️</a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this employee?')" class="text-red-600 hover:underline">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout> --}}


{{-- <x-layout pageTitle="Employee List">
    <div class="bg-white p-4 rounded shadow">
        <a href="{{ route('employees.create') }}" class="inline-block mb-4 text-blue-600 hover:underline">
            ➕ Add Employee
        </a>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">Full Name</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Phone Number</th>
                    <th class="border px-4 py-2">Date of Birth</th>
                    <th class="border px-4 py-2">Address</th>
                    <th class="border px-4 py-2">Join Date</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td class="border px-4 py-2">{{ $employee->nama_lengkap }}</td>
                        <td class="border px-4 py-2">{{ $employee->email }}</td>
                        <td class="border px-4 py-2">{{ $employee->nomor_telepon }}</td>
                        <td class="border px-4 py-2">{{ $employee->tanggal_lahir }}</td>
                        <td class="border px-4 py-2">{{ $employee->alamat }}</td>
                        <td class="border px-4 py-2">{{ $employee->tanggal_masuk }}</td>
                        <td class="border px-4 py-2">{{ $employee->status }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('employees.show', $employee->id) }}">📁</a>
                            <a href="{{ route('employees.edit', $employee->id) }}">✏️</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this employee?')">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout> --}}




{{-- @extends('master')
@section('title', 'Daftar Pegawai')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Pegawai</h1>
        <table border="1" cellpadding="5" cellspacing="0">
            <a href="{{ route('employees.create') }}" style="display:inline-block; margin-bottom:15px;">
                ➕
            </a>
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Tanggal Masuk</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->nama_lengkap }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->nomor_telepon }}</td>
                        <td>{{ $employee->tanggal_lahir }}</td>
                        <td>{{ $employee->alamat }}</td>
                        <td>{{ $employee->tanggal_masuk }}</td>
                        <td>{{ $employee->status }}</td>
                        <td>
                            <a href="{{ route('employees.show', $employee->id) }}">📁</a> 
                            <a href="{{ route('employees.edit', $employee->id) }}">✏️</a> 
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus?')">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}
