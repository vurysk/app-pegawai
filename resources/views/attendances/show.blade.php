<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance Details</title>
    <style>
        body {
            background-color: #fcfce6;
        }
    </style>
</head>

<body>
    <h1>Attendance Details</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Employee Name</th>
            <td>{{ $attendances->employee->nama_lengkap ?? '-' }}</td>
        </tr>
        <tr>
            <th>Date</th>
            <td>{{ $attendances->tanggal }}</td>
        </tr>
        <tr>
            <th>Check-in Time</th>
            <td>{{ $attendances->waktu_masuk ?? '-' }}</td>
        </tr>
        <tr>
            <th>Check-out Time</th>
            <td>{{ $attendances->waktu_keluar ?? '-' }}</td>
        </tr>
        <tr>
            <th>Attendance Status</th>
            <td>
                @php
                    $statusMap = [
                        'present' => 'Present',
                        'leave' => 'Leave',
                        'sick' => 'Sick',
                        'absent' => 'Absent',
                    ];
                @endphp
                {{ $statusMap[$attendances->status_absensi] ?? '-' }}
            </td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $attendances->created_at->format('d-m-Y H:i') }}</td>
        </tr>
        <tr>
            <th>Last Updated</th>
            <td>{{ $attendances->updated_at->format('d-m-Y H:i') }}</td>
        </tr>
    </table>
</body>

</html>
