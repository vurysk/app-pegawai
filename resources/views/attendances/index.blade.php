<x-layout pageTitle="Attendance Management">
    <div class="max-w-8xl mx-auto">
        <!-- Header -->
        <div class="mb-8">

            <!-- Filter Section -->
            <div class="gradient-border rounded-xl p-0.5 mb-6">
                <div class="bg-gray-800/90 backdrop-blur-sm rounded-xl p-6 border border-gray-700/50">
                    <form action="{{ route('attendances.index') }}" method="GET" class="flex flex-col sm:flex-row gap-4 items-end">
                        <!-- Date Selection -->
                        <div class="flex-1 group">
                            <label class="block text-sm font-medium text-gray-300 mb-2 flex items-center space-x-2">
                                <div class="w-1.5 h-1.5 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full"></div>
                                <span>Select Date</span>
                            </label>
                            <input type="date" name="selected_date" value="{{ $selectedDate }}" 
                                   class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600/50 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-purple-500/50 transition-all duration-300 group-hover:border-gray-500/70">
                        </div>

                        <!-- View All Toggle -->
                        <div class="flex-1 group">
                            <label class="block text-sm font-medium text-gray-300 mb-2 flex items-center space-x-2">
                                <div class="w-1.5 h-1.5 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full"></div>
                                <span>View Mode</span>
                            </label>
                            <div class="flex space-x-4">
                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="radio" name="view_all" value="0" {{ !$viewAll ? 'checked' : '' }} 
                                           class="text-purple-600 focus:ring-purple-500">
                                    <span class="text-gray-300">Selected Date</span>
                                </label>
                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="radio" name="view_all" value="1" {{ $viewAll ? 'checked' : '' }}
                                           class="text-purple-600 focus:ring-purple-500">
                                    <span class="text-gray-300">All Dates</span>
                                </label>
                            </div>
                        </div>

                        <button type="submit" 
                                class="px-6 py-3 text-sm font-medium text-white bg-gradient-to-r from-purple-800 to-purple-800 border border-purple-900 rounded-xl hover:from-purple-700 hover:to-purple-700 transition-all duration-300">
                            Apply Filter
                        </button>

                        <!-- Reset Filter -->
                        @if($selectedDate !== \Carbon\Carbon::today()->format('Y-m-d') || $viewAll)
                        <a href="{{ route('attendances.index') }}" 
                           class="px-4 py-3 text-sm font-medium text-gray-300 bg-gray-700/50 border border-gray-600/50 rounded-xl hover:bg-gray-600/50 transition-all duration-300">
                            Reset
                        </a>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Stats Cards Section -->
            <div class="grid grid-cols-2 lg:grid-cols-6 gap-4 mb-6">
                <!-- Total Employees -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl p-4 border border-gray-700/50">
                    <div class="text-center">
                        <div class="text-gray-400 text-sm mb-1">Total</div>
                        <div class="text-2xl font-bold text-white mb-1">{{ $stats['total'] }}</div>
                        <div class="text-gray-500 text-xs">Employees</div>
                    </div>
                </div>

                <!-- Present -->
                <div class="bg-gradient-to-br from-green-500/20 to-green-600/20 rounded-xl p-4 border border-green-500/30">
                    <div class="text-center">
                        <div class="text-green-400 text-sm mb-1">Present</div>
                        <div class="text-2xl font-bold text-white mb-1">{{ $stats['present'] }}</div>
                        <div class="text-green-500/70 text-xs">{{ $stats['present'] }}/{{ $stats['total'] }}</div>
                    </div>
                </div>

                <!-- Sick -->
                <div class="bg-gradient-to-br from-blue-500/20 to-blue-600/20 rounded-xl p-4 border border-blue-500/30">
                    <div class="text-center">
                        <div class="text-blue-400 text-sm mb-1">Sick</div>
                        <div class="text-2xl font-bold text-white mb-1">{{ $stats['sick'] }}</div>
                        <div class="text-blue-500/70 text-xs">{{ $stats['sick'] }}/{{ $stats['total'] }}</div>
                    </div>
                </div>

                <!-- Leave -->
                <div class="bg-gradient-to-br from-purple-500/20 to-purple-600/20 rounded-xl p-4 border border-purple-500/30">
                    <div class="text-center">
                        <div class="text-purple-400 text-sm mb-1">Leave</div>
                        <div class="text-2xl font-bold text-white mb-1">{{ $stats['leave'] }}</div>
                        <div class="text-purple-500/70 text-xs">{{ $stats['leave'] }}/{{ $stats['total'] }}</div>
                    </div>
                </div>

                <!-- Late -->
                <div class="bg-gradient-to-br from-yellow-500/20 to-yellow-600/20 rounded-xl p-4 border border-yellow-500/30">
                    <div class="text-center">
                        <div class="text-yellow-400 text-sm mb-1">Late</div>
                        <div class="text-2xl font-bold text-white mb-1">{{ $stats['late'] }}</div>
                        <div class="text-yellow-500/70 text-xs">{{ $stats['late'] }}/{{ $stats['total'] }}</div>
                    </div>
                </div>

                <!-- Absent -->
                <div class="bg-gradient-to-br from-red-500/20 to-red-600/20 rounded-xl p-4 border border-red-500/30">
                    <div class="text-center">
                        <div class="text-red-400 text-sm mb-1">Absent</div>
                        <div class="text-2xl font-bold text-white mb-1">{{ $stats['absent'] }}</div>
                        <div class="text-red-500/70 text-xs">{{ $stats['absent'] }}/{{ $stats['total'] }}</div>
                    </div>
                </div>
            </div>

            <!-- Date Info -->
            <div class="bg-gray-800/50 rounded-lg p-4 mb-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-1.5 h-6 bg-gradient-to-b from-purple-400 to-pink-400 rounded-full"></div>
                        <h3 class="text-lg font-medium text-white">
                            @if($viewAll)
                                All Attendance Records
                            @else
                                Attendance for {{ $displayDate }}
                            @endif
                        </h3>
                    </div>
                    <div class="text-gray-400 text-sm">
                        {{ $attendances->total() }} records found
                        @if(!$viewAll)
                        • {{ $stats['present'] }}/{{ $stats['total'] }} present
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Container -->
        <x-table.container title="Attendance List" addRoute="{{ route('attendances.create') }}" addText="Add Attendance">
            <x-slot name="header">
                <x-table.header :columns="[
                    'Employee Name', 
                    'Date',
                    'Check-in', 
                    'Check-out', 
                    'Status', 
                    'Hours', 
                    'Actions'
                ]" />
            </x-slot>

            <x-slot name="body">
                @foreach ($attendances as $attendance)
                    @php
                        $statusInfo = $statusConfig[$attendance->status] ?? [
                            'label' => ucfirst($attendance->status),
                            'color' => 'bg-gray-500/20 text-gray-300 border border-gray-500/30',
                            'dot_color' => 'bg-gray-400'
                        ];
                    @endphp
                    
                    <tr class="hover:bg-gray-700/50 transition duration-200 border-b border-gray-700/30">
                        <td class="px-6 py-3 whitespace-nowrap text-gray-100">
                            {{ $attendance->employee->nama_lengkap ?? '-' }}
                        </td>
                        
                        
                        <td class="px-6 py-3 whitespace-nowrap text-gray-300">
                            {{ $attendance->tanggal->format('d M Y') }}
                        </td>
                        

                        <td class="px-6 py-3 whitespace-nowrap text-green-400">
                            {{ $attendance->jam_masuk ?? '-' }}
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap text-red-400">
                            {{ $attendance->jam_keluar ?? '-' }}
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusInfo['color'] }}">
                                <span class="w-1.5 h-1.5 rounded-full mr-1.5 {{ $statusInfo['dot_color'] }}"></span>
                                {{ $statusInfo['label'] }}
                            </span>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap text-gray-300">
                            {{ $attendance->working_hours ? $attendance->working_hours . 'h' : '-' }}
                        </td>
                        <x-table.actions showRoute="attendances.show" editRoute="attendances.edit"
                            destroyRoute="attendances.destroy" :id="$attendance->id" />
                    </tr>
                @endforeach
            </x-slot>
        </x-table.container>
    </div>
</x-layout>


{{-- <x-layout pageTitle="Attendance Management">
    <!-- Stats Cards Section -->
    <div class="grid grid-cols-2 lg:grid-cols-6 gap-4 mb-6">
        <!-- Total Employees -->
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl p-4 border border-gray-700/50">
            <div class="text-center">
                <div class="text-gray-400 text-sm mb-1">Total</div>
                <div class="text-2xl font-bold text-white mb-1">{{ $stats['total'] }}</div>
                <div class="text-gray-500 text-xs">Employees</div>
            </div>
        </div>

        <!-- Present -->
        <div class="bg-gradient-to-br from-green-500/20 to-green-600/20 rounded-xl p-4 border border-green-500/30">
            <div class="text-center">
                <div class="text-green-400 text-sm mb-1">Present</div>
                <div class="text-2xl font-bold text-white mb-1">
                    {{ $stats['present'] }}/{{ $stats['total'] }}
                </div>
                <div class="text-green-500/70 text-xs">
                    {{ $stats['total'] > 0 ? round(($stats['present'] / $stats['total']) * 100, 1) : 0 }}%
                </div>
            </div>
        </div>

        <!-- Sick -->
        <div class="bg-gradient-to-br from-blue-500/20 to-blue-600/20 rounded-xl p-4 border border-blue-500/30">
            <div class="text-center">
                <div class="text-blue-400 text-sm mb-1">Sick</div>
                <div class="text-2xl font-bold text-white mb-1">
                    {{ $stats['sick'] }}/{{ $stats['total'] }}
                </div>
                <div class="text-blue-500/70 text-xs">
                    {{ $stats['total'] > 0 ? round(($stats['sick'] / $stats['total']) * 100, 1) : 0 }}%
                </div>
            </div>
        </div>

        <!-- Leave -->
        <div class="bg-gradient-to-br from-purple-500/20 to-purple-600/20 rounded-xl p-4 border border-purple-500/30">
            <div class="text-center">
                <div class="text-purple-400 text-sm mb-1">Leave</div>
                <div class="text-2xl font-bold text-white mb-1">
                    {{ $stats['leave'] }}/{{ $stats['total'] }}
                </div>
                <div class="text-purple-500/70 text-xs">
                    {{ $stats['total'] > 0 ? round(($stats['leave'] / $stats['total']) * 100, 1) : 0 }}%
                </div>
            </div>
        </div>

        <!-- Late -->
        <div class="bg-gradient-to-br from-yellow-500/20 to-yellow-600/20 rounded-xl p-4 border border-yellow-500/30">
            <div class="text-center">
                <div class="text-yellow-400 text-sm mb-1">Late</div>
                <div class="text-2xl font-bold text-white mb-1">
                    {{ $stats['late'] }}/{{ $stats['total'] }}
                </div>
                <div class="text-yellow-500/70 text-xs">
                    {{ $stats['total'] > 0 ? round(($stats['late'] / $stats['total']) * 100, 1) : 0 }}%
                </div>
            </div>
        </div>

        <!-- Absent -->
        <div class="bg-gradient-to-br from-red-500/20 to-red-600/20 rounded-xl p-4 border border-red-500/30">
            <div class="text-center">
                <div class="text-red-400 text-sm mb-1">Absent</div>
                <div class="text-2xl font-bold text-white mb-1">
                    {{ $stats['absent'] }}/{{ $stats['total'] }}
                </div>
                <div class="text-red-500/70 text-xs">
                    {{ $stats['total'] > 0 ? round(($stats['absent'] / $stats['total']) * 100, 1) : 0 }}%
                </div>
            </div>
        </div>
    </div>

    <!-- Date Info -->
    <div class="bg-gray-800/50 rounded-lg p-4 mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-1.5 h-6 bg-gradient-to-b from-purple-400 to-pink-400 rounded-full"></div>
                <h3 class="text-lg font-medium text-white">Attendance for {{ $today->format('l, F j, Y') }}</h3>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('attendances.monthly-report') }}"
                    class="px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-green-600 to-green-400 border border-green-500/50 rounded-lg hover:from-green-500 hover:to-green-300 transition-all duration-300">
                    📊 Monthly Report
                </a>
            </div>
        </div>
    </div>

    <!-- Table Container -->
    <x-table.container title="Attendance List" addRoute="{{ route('attendances.create') }}" addText="Add Attendance">
        <x-slot name="header">
            <x-table.header :columns="['Employee Name', 'Date', 'Check-in', 'Check-out', 'Status', 'Hours', 'Actions']" />
        </x-slot>

        <x-slot name="body">
            @foreach ($attendances as $attendance)
                <tr class="hover:bg-gray-700/50 transition duration-200 border-b border-gray-700/30">
                    <td class="px-6 py-3 whitespace-nowrap text-gray-100">
                        {{ $attendance->employee->nama_lengkap ?? '-' }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-gray-300">
                        {{ $attendance->tanggal->format('d M Y') }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-green-400">
                        {{ $attendance->jam_masuk ?? '-' }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-red-400">
                        {{ $attendance->jam_keluar ?? '-' }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap">
                        @php
                            $statusColors = [
                                'present' => 'bg-green-500/20 text-green-300 border border-green-500/30',
                                'late' => 'bg-yellow-500/20 text-yellow-300 border border-yellow-500/30',
                                'sick' => 'bg-blue-500/20 text-blue-300 border border-blue-500/30',
                                'leave' => 'bg-purple-500/20 text-purple-300 border border-purple-500/30',
                                'absent' => 'bg-red-500/20 text-red-300 border border-red-500/30',
                            ];
                            $statusLabels = [
                                'present' => 'Present',
                                'late' => 'Late',
                                'sick' => 'Sick',
                                'leave' => 'Leave',
                                'absent' => 'Absent',
                            ];
                        @endphp
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$attendance->status] ?? 'bg-gray-500/20 text-gray-300 border border-gray-500/30' }}">
                            <span
                                class="w-1.5 h-1.5 rounded-full mr-1.5 
                                @if ($attendance->status == 'present') bg-green-400
                                @elseif($attendance->status == 'late') bg-yellow-400
                                @elseif($attendance->status == 'sick') bg-blue-400
                                @elseif($attendance->status == 'leave') bg-purple-400
                                @elseif($attendance->status == 'absent') bg-red-400
                                @else bg-gray-400 @endif">
                            </span>
                            {{ $statusLabels[$attendance->status] ?? $attendance->status }}
                        </span>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-gray-300">
                        {{ $attendance->working_hours ? $attendance->working_hours . 'h' : '-' }}
                    </td>
                    <x-table.actions showRoute="attendances.show" editRoute="attendances.edit"
                        destroyRoute="attendances.destroy" :id="$attendance->id" />
                </tr>
            @endforeach
        </x-slot>
    </x-table.container>
</x-layout> --}}



{{-- <x-layout pageTitle="Attendance">
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
</x-layout> --}}
