<x-layout pageTitle="Attendance Detail">
    <x-detail.card 
        title="Attendance Detail" 
        backRoute="attendances.index" 
        backText="Back to Attendance"
    >
        @php
            $statusMap = [
                'present' => 'Present',
                'late' => 'Late',
                'sick' => 'Sick',
                'leave' => 'Leave',
                'absent' => 'Absent'
            ];
        @endphp

        <x-detail.row label="Employee Name" :value="$attendance->employee->nama_lengkap ?? '-'" />
        <x-detail.row label="Date" :value="$attendance->tanggal->format('d F Y')" />
        <x-detail.row label="Status" :value="$statusMap[$attendance->status] ?? '-'" />
        <x-detail.row label="Check-in Time" :value="$attendance->jam_masuk ?? '-'" />
        <x-detail.row label="Check-out Time" :value="$attendance->jam_keluar ?? '-'" />
        <x-detail.row label="Working Hours" :value="$attendance->working_hours ? $attendance->working_hours . ' hours' : '-'" />
        <x-detail.row label="Created At" :value="$attendance->created_at->format('d-m-Y H:i')" />
        <x-detail.row label="Last Updated" :value="$attendance->updated_at->format('d-m-Y H:i')" />
    </x-detail.card>
</x-layout>




