<x-layout pageTitle="Attendance Detail">
    <x-detail.card 
        title="🗃️ Attendance Detail" 
        backRoute="attendances.index" 
        backText="Back"
    >
        @php
            $statusMap = [
                'present' => 'Present',
                'leave' => 'Leave', 
                'sick' => 'Sick',
                'absent' => 'Absent'
            ];
        @endphp

        <x-detail.row label="Employee Name" :value="$attendance->employee->nama_lengkap ?? '-'" />
        <x-detail.row label="Date" :value="$attendance->tanggal" />
        <x-detail.row label="Check-in Time" :value="$attendance->waktu_masuk ?? '-'" />
        <x-detail.row label="Check-out Time" :value="$attendance->waktu_keluar ?? '-'" />
        <x-detail.row label="Attendance Status" :value="$statusMap[$attendance->status_absensi] ?? '-'" />
        <x-detail.row label="Created At" :value="$attendance->created_at->format('d-m-Y H:i')" />
        <x-detail.row label="Last Updated" :value="$attendance->updated_at->format('d-m-Y H:i')" />
    </x-detail.card>
</x-layout>



