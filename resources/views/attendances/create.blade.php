<!DOCTYPE html>
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

</html>