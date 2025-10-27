<x-layout pageTitle="Create Attendance">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">➕ Add Attendance</h2>

        <form action="{{ route('attendances.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="karyawan_id" class="block text-sm font-medium text-gray-700">Employee</label>
                <select name="karyawan_id" id="karyawan_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm">
                    @foreach ($employees as $emp)
                        <option value="{{ $emp->id }}" {{ old('karyawan_id') == $emp->id ? 'selected' : '' }}>
                            {{ $emp->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="waktu_masuk" class="block text-sm font-medium text-gray-700">Entry Time</label>
                    <input type="time" id="waktu_masuk" name="waktu_masuk" value="{{ old('waktu_masuk') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm">
                </div>

                <div>
                    <label for="waktu_keluar" class="block text-sm font-medium text-gray-700">Out Time</label>
                    <input type="time" id="waktu_keluar" name="waktu_keluar" value="{{ old('waktu_keluar') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm">
                </div>
            </div>

            <div>
                <label for="status_absensi" class="block text-sm font-medium text-gray-700">Attendance Status</label>
                <select name="status_absensi" id="status_absensi"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-neutral-900 focus:border-neutral-900 text-sm">
                    <option value="present" {{ old('status_absensi') == 'present' ? 'selected' : '' }}>Present</option>
                    <option value="leave" {{ old('status_absensi') == 'leave' ? 'selected' : '' }}>Leave</option>
                    <option value="sick" {{ old('status_absensi') == 'sick' ? 'selected' : '' }}>Sick</option>
                    <option value="absent" {{ old('status_absensi') == 'absent' ? 'selected' : '' }}>Absent</option>
                </select>
            </div>

            <div class="pt-4 text-right">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-neutral-900 text-white text-sm font-medium rounded-md hover:bg-neutral-800 hover:scale-105 hover:shadow-md transform transition duration-200 ease-out">
                    ➕ Add
                </button>
                <a href="{{ route('attendances.index') }}"
                    class="ml-4 text-sm text-red-900 hover:underline">← Cancel</a>
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
    <title>Attendance Form</title>
    <style>
        body {
            background-color: #fcfce6;
        }
    </style>
</head>

<body>
    <h1 class="mb-4">Attendance Form</h1>
    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="karyawan_id">Employee:</label></td>
                <td>
                    <select name="karyawan_id" id="karyawan_id">
                        @foreach ($employees as $emp)
                            <option value="{{ $emp->id }}" {{ old('karyawan_id') == $emp->id ? 'selected' : '' }}>
                                {{ $emp->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="tanggal">Date:</label></td>
                <td><input type="date" id="tanggal" name="tanggal"></td>
            </tr>
            <tr>
                <td><label for="waktu_masuk">Entry Time:</label></td>
                <td><input type="time" id="waktu_masuk" name="waktu_masuk"></td>
            </tr>
            <tr>
                <td><label for="waktu_keluar">Out Time:</label></td>
                <td><input type="time" id="waktu_keluar" name="waktu_keluar"></td>
            </tr>
            <tr>
                <td><label for="status_absensi">Attendance Status:</label></td>
                <td>
                    <select name="status_absensi" id="status_absensi">
                        <option value="present">Present</option>
                        <option value="leave">Leave</option>
                        <option value="sick">Sick</option>
                        <option value="absent">Absent</option>
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