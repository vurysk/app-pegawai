<x-layout pageTitle="Edit Employee">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-3xl mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">✒️ Edit Employee</h2>

        <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $employee->nama_lengkap) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email', $employee->email) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" name="nomor_telepon"
                        value="{{ old('nomor_telepon', $employee->nomor_telepon) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Birthday</label>
                    <input type="date" name="tanggal_lahir"
                        value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="alamat" value="{{ old('alamat', $employee->alamat) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Entry Date</label>
                    <input type="date" name="tanggal_masuk"
                        value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">
                        <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>
                            Active</option>
                        <option value="tidak aktif"
                            {{ old('status', $employee->status) == 'tidak aktif' ? 'selected' : '' }}>Nonactive</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Department</label>
                    <select name="departemen_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">
                        @foreach ($departments as $dept)
                            <option value="{{ $dept->id }}"
                                {{ old('departemen_id', $employee->departemen_id ?? '') == $dept->id ? 'selected' : '' }}>
                                {{ $dept->nama_departemen }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Position</label>
                    <select name="jabatan_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">
                        @foreach ($positions as $pos)
                            <option value="{{ $pos->id }}"
                                {{ old('jabatan_id', $employee->jabatan_id ?? '') == $pos->id ? 'selected' : '' }}>
                                {{ $pos->nama_jabatan }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" <button
                    class="inline-flex items-center px-4 py-2 bg-neutral-900 text-white text-sm font-medium rounded-md hover:bg-zinc-800 hover:scale-105 transform transition duration-200 ease-out">
                    💾 Update
                </button>
                </button>
                <a href="{{ route('employees.index') }}" class="ml-4 text-sm text-red-600 hover:underline">← Cancel</a>
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
    <title>Update Pegawai</title>
    <style>
        body {
            background-color: #fcfce6;
            /* warna biru muda */
        }
    </style>
</head>

<body>
    <h2>Edit Data Pegawai</h2>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>Full Name</td>
                <td><input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $employee->nama_lengkap) }}">
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="{{ old('email', $employee->email) }}"></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td><input type="text" name="nomor_telepon"
                        value="{{ old('nomor_telepon', $employee->nomor_telepon) }}"></td>
            </tr>
            <tr>
                <td>Birthday</td>
                <td><input type="date" name="tanggal_lahir"
                        value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="alamat" value="{{ old('alamat', $employee->alamat) }}"></td>
            </tr>
            <tr>
                <td>Entry Date</td>
                <td><input type="date" name="tanggal_masuk"
                        value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status">
                        <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="tidak aktif"
                            {{ old('status', $employee->status) == 'tidak aktif' ? 'selected' : '' }}>Nonactive</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Departemen</td>
                <td>
                    <select name="departemen_id">
                        @foreach ($departments as $dept)
                            <option value="{{ $dept->id }}"
                                {{ old('departemen_id', $employee->departemen_id ?? '') == $dept->id ? 'selected' : '' }}>
                                {{ $dept->nama_departemen }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td>Jabatan</td>
                <td>
                    <select name="jabatan_id">
                        @foreach ($positions as $pos)
                            <option value="{{ $pos->id }}"
                                {{ old('jabatan_id', $employee->jabatan_id ?? '') == $pos->id ? 'selected' : '' }}>
                                {{ $pos->nama_jabatan }}
                            </option>
                        @endforeach
                    </select>
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
