<x-layout pageTitle="Attendance Detail">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">🗃️ Attendance Detail</h2>

        @php
            $statusMap = [
                'present' => 'Present',
                'leave' => 'Leave',
                'sick' => 'Sick',
                'absent' => 'Absent',
            ];
        @endphp

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300 text-sm">
                <tbody class="divide-y divide-gray-200 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50 w-1/3">Employee Name</th>
                        <td class="px-6 py-3">{{ $attendances->employee->nama_lengkap ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Date</th>
                        <td class="px-6 py-3">{{ $attendances->tanggal }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Check-in Time</th>
                        <td class="px-6 py-3">{{ $attendances->waktu_masuk ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Check-out Time</th>
                        <td class="px-6 py-3">{{ $attendances->waktu_keluar ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Attendance Status</th>
                        <td class="px-6 py-3">{{ $statusMap[$attendances->status_absensi] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Created At</th>
                        <td class="px-6 py-3">{{ $attendances->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Last Updated</th>
                        <td class="px-6 py-3">{{ $attendances->updated_at->format('d-m-Y H:i') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="{{ route('attendances.index') }}"
               class="inline-block text-sm text-blue-600 hover:underline">← Back</a>
        </div>
    </div>
</x-layout>


{{-- <!DOCTYPE html>
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

</html> --}}
