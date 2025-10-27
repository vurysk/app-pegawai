<x-layout pageTitle="Create Employee">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-3xl mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">➕ Add New Employee</h2>

        <form action="{{ route('employees.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-gray-700 focus:border-gray-700 text-sm">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-gray-700 focus:border-gray-700 text-sm">
                </div>

                <div>
                    <label for="nomor_telepon" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-gray-700 focus:border-gray-700 text-sm">
                </div>

                <div>
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Birthday</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-gray-700 focus:border-gray-700 text-sm">
                </div>

                <div class="sm:col-span-2">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Address</label>
                    <textarea id="alamat" name="alamat"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-gray-700 focus:border-gray-700 text-sm">{{ old('alamat') }}</textarea>
                </div>

                <div>
                    <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700">Entry Date</label>
                    <input type="date" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-gray-700 focus:border-gray-700 text-sm">
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-gray-700 focus:border-gray-700 text-sm">
                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Active</option>
                        <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>NonActive</option>
                    </select>
                </div>

                <div>
                    <label for="departemen_id" class="block text-sm font-medium text-gray-700">Department</label>
                    <select name="departemen_id" id="departemen_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-gray-700 focus:border-gray-700 text-sm">
                        @foreach ($departments as $dept)
                            <option value="{{ $dept->id }}" {{ old('departemen_id') == $dept->id ? 'selected' : '' }}>
                                {{ $dept->nama_departemen }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="jabatan_id" class="block text-sm font-medium text-gray-700">Position</label>
                    <select name="jabatan_id" id="jabatan_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-gray-700 focus:border-gray-700 text-sm">
                        @foreach ($positions as $pos)
                            <option value="{{ $pos->id }}" {{ old('jabatan_id') == $pos->id ? 'selected' : '' }}>
                                {{ $pos->nama_jabatan }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="pt-4 text-right">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-neutral-900 text-white text-sm font-medium rounded-md hover:bg-neutral-800 hover:scale-105 hover:shadow-md transform transition duration-200 ease-out">
                    ➕ Add
                </button>
                <a href="{{ route('employees.index') }}"
                    class="ml-4 text-sm text-red-600 hover:underline">← Cancel</a>
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
    <title>Form Input Pegawai</title>
    <style>
        body {
            background-color: #fcfce6;
            /* warna biru muda */
        }
    </style>
</head>

<body>
    <h1 class="mb-4">Employee Form</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="nama_lengkap">Full Name:</label></td>
                <td><input type="text" id="nama_lengkap" name="nama_lengkap"></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email"></td>
            </tr>
            <tr>
                <td><label for="nomor_telepon">Phone Number:</label></td>
                <td><input type="text" id="nomor_telepon" name="nomor_telepon"></td>
            </tr>
            <tr>
                <td><label for="tanggal_lahir">Birthday:</label></td>
                <td><input type="date" id="tanggal_lahir" name="tanggal_lahir"></td>
            </tr>
            <tr>
                <td><label for="alamat">Address:</label></td>
                <td>
                    <textarea id="alamat" name="alamat"></textarea>
                </td>
            </tr>
            <tr>
                <td><label for="tanggal_masuk">Entry Date:</label></td>
                <td><input type="date" Sid="tanggal_masuk" name="tanggal_masuk"></td>
            </tr>
            <tr>
                <td><label for="status">Status:</label></td>
                <td>
                    <select id="status" name="status">
                        <option value="aktif">Active</option>
                        <option value="nonaktif">NonActive</option>
                    </select>
                </td>
            </tr>
             <tr>
                <td>Departemen</td>
                <td>
                    <select name="departemen_id">
                        @foreach ($departments as $dept)
                            <option value="{{ $dept->id }}"
                                {{ old('departemen_id') == $dept->id ? 'selected' : '' }}>
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
                            <option value="{{ $pos->id }}" {{ old('jabatan_id') == $pos->id ? 'selected' : '' }}>
                                {{ $pos->nama_jabatan }}
                            </option>
                        @endforeach
                    </select>
                </td>
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
