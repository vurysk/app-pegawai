<x-layout pageTitle="Employee Detail">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800">👤 Employee Detail</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300 text-sm">
                <tbody class="divide-y divide-gray-200 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50 w-1/3">Full Name</th>
                        <td class="px-6 py-3">{{ $employee->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Email</th>
                        <td class="px-6 py-3">{{ $employee->email }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Phone Number</th>
                        <td class="px-6 py-3">{{ $employee->nomor_telepon }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Date of Birth</th>
                        <td class="px-6 py-3">{{ $employee->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Address</th>
                        <td class="px-6 py-3">{{ $employee->alamat }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Join Date</th>
                        <td class="px-6 py-3">{{ $employee->tanggal_masuk }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Status</th>
                        <td class="px-6 py-3">{{ $employee->status }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Department</th>
                        <td class="px-6 py-3">{{ $employee->department->nama_departemen ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Position</th>
                        <td class="px-6 py-3">{{ $employee->position->nama_jabatan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Created At</th>
                        <td class="px-6 py-3">{{ $employee->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Last Updated</th>
                        <td class="px-6 py-3">{{ $employee->updated_at->format('d-m-Y H:i') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="{{ route('employees.index') }}"
               class="inline-block text-sm text-blue-600 hover:underline">
                ← Back to Employee List
            </a>
        </div>
    </div>
</x-layout>




{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pegawai</title>
    <title>Form Input Pegawai</title>
    <style>
        body {
            background-color: #fcfce6;
            /* warna biru muda */
        }
    </style>
</head>

<body>
    <h1>Detail Pegawai</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $employee->nama_lengkap }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $employee->email }}</td>
        </tr>
        <tr>
            <th>Nomor Telepon</th>
            <td>{{ $employee->nomor_telepon }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $employee->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $employee->alamat }}</td>
        </tr>
        <tr>
            <th>Tanggal Masuk</th>
            <td>{{ $employee->tanggal_masuk }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $employee->status }}</td>
        </tr>
        <tr>
            <th>Departemen</th>
            <td>{{ $employee->department->nama_departemen ?? '-' }}</td>
        </tr>
        <tr>
            <th>Jabatan</th>
            <td>{{ $employee->position->nama_jabatan ?? '-' }}</td>
        </tr>
        <tr>
            <th>Dibuat Pada</th>
            <td>{{ $employee->created_at->format('d-m-Y H:i') }}</td>
        </tr>
        <tr>
            <th>Terakhir Diupdate</th>
            <td>{{ $employee->updated_at->format('d-m-Y H:i') }}</td>
        </tr>

    </table>
</body>

</html> --}}
