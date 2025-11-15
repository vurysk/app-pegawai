<x-layout pageTitle="Attendance">
    <x-table.container title="Attendance List" addRoute="{{ route('attendances.create') }}" addText="Add Attendance">
        <x-slot name="header">
            <x-table.header :columns="['Employee Name', 'Date', 'Entry Time', 'Out Time', 'Status', 'Actions']" />
        </x-slot>

        <x-slot name="body">
            @foreach ($attendances as $attendance)
                <tr class="hover:bg-gray-700/50 transition duration-200 border-b border-gray-700/30">
                    <td class="px-6 py-3 whitespace-nowrap text-gray-100">
                        {{ $attendance->employee->nama_lengkap ?? '-' }}</td>
                    <td class="px-6 py-3 whitespace-nowrap text-gray-300">{{ $attendance->tanggal }}</td>
                    <td class="px-6 py-3 whitespace-nowrap text-green-400">{{ $attendance->waktu_masuk ?? '-' }}</td>
                    <td class="px-6 py-3 whitespace-nowrap text-red-400">{{ $attendance->waktu_keluar ?? '-' }}</td>
                    <td class="px-6 py-3 whitespace-nowrap">
                        @php
                            $statusColors = [
                                'present' => 'bg-green-500/20 text-green-300 border border-green-500/30',
                                'leave' => 'bg-blue-500/20 text-blue-300 border border-blue-500/30',
                                'sick' => 'bg-yellow-500/20 text-yellow-300 border border-yellow-500/30',
                                'absent' => 'bg-red-500/20 text-red-300 border border-red-500/30',
                            ];
                            $statusLabels = [
                                'present' => 'Present',
                                'leave' => 'Leave',
                                'sick' => 'Sick',
                                'absent' => 'Absent',
                            ];
                        @endphp
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$attendance->status_absensi] ?? 'bg-gray-500/20 text-gray-300 border border-gray-500/30' }}">
                            <span
                                class="w-1.5 h-1.5 rounded-full mr-1.5 
                        @if ($attendance->status_absensi == 'present') bg-green-400
                        @elseif($attendance->status_absensi == 'leave') bg-blue-400
                        @elseif($attendance->status_absensi == 'sick') bg-yellow-400
                        @elseif($attendance->status_absensi == 'absent') bg-red-400
                        @else bg-gray-400 @endif">
                            </span>
                            {{ $statusLabels[$attendance->status_absensi] ?? $attendance->status_absensi }}
                        </span>
                    </td>
                    <x-table.actions showRoute="attendances.show" editRoute="attendances.edit"
                        destroyRoute="attendances.destroy" :id="$attendance->id" />
                </tr>
            @endforeach
        </x-slot>
    </x-table.container>
</x-layout>


