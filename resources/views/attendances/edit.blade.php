<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Attendance</title>
    <style>
        body {
            background-color: #fcfce6;
        }
    </style>
</head>

<body>
    <h2>Edit Attendance Record</h2>
    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('attendances.update', $attendances->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>Employee</td>
                <td>
                    <select name="karyawan_id">
                        @foreach ($employees as $emp)
                            <option value="{{ $emp->id }}"
                                {{ old('karyawan_id', $attendances->karyawan_id) == $emp->id ? 'selected' : '' }}>
                                {{ $emp->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Date</td>
                <td><input type="date" name="tanggal" value="{{ old('tanggal', $attendances->tanggal) }}"></td>
            </tr>
            <tr>
                <td>Check-in Time</td>
                <td><input type="time" name="waktu_masuk"
                        value="{{ old('waktu_masuk', $attendances->waktu_masuk) }}"></td>
            </tr>
            <tr>
                <td>Check-out Time</td>
                <td><input type="time" name="waktu_keluar"
                        value="{{ old('waktu_keluar', $attendances->waktu_keluar) }}"></td>
            </tr>
            <tr>
                <td>Attendance Status</td>
                <td>
                    <select name="status_absensi">
                        <option value="present"
                            {{ old('status_absensi', $attendances->status_absensi) == 'present' ? 'selected' : '' }}>
                            Present</option>
                        <option value="leave"
                            {{ old('status_absensi', $attendances->status_absensi) == 'leave' ? 'selected' : '' }}>Leave
                        </option>
                        <option value="sick"
                            {{ old('status_absensi', $attendances->status_absensi) == 'sick' ? 'selected' : '' }}>Sick
                        </option>
                        <option value="absent"
                            {{ old('status_absensi', $attendances->status_absensi) == 'absent' ? 'selected' : '' }}>
                            Absent</option>
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

</html>
