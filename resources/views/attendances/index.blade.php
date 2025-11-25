<x-layout pageTitle="Attendance Management">
    <div class="max-w-8xl mx-auto">
        <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-3 mb-4">
            <form action="{{ route('attendances.index') }}" method="GET"
                class="flex flex-col lg:flex-row gap-3 items-end">

                <div class="flex-1 w-full">
                    <label class="text-xs text-gray-400 ml-1 mb-1 block">Select Date</label>
                    <div class="relative">
                        <input type="date" name="selected_date" value="{{ $selectedDate }}"
                            class="w-full bg-gray-900/50 text-gray-200 text-sm border border-gray-600 rounded-lg px-3 py-1.5 focus:ring-purple-500 focus:border-purple-500 placeholder-gray-500">
                    </div>
                </div>

                <div class="flex-1 w-full">
                    <label class="text-xs text-gray-400 ml-1 mb-1 block">View Mode</label>
                    <div class="flex bg-gray-900/50 rounded-lg p-1 border border-gray-600">
                        <label class="flex-1 text-center cursor-pointer">
                            <input type="radio" name="view_all" value="0" class="hidden peer"
                                {{ !$viewAll ? 'checked' : '' }} onchange="this.form.submit()">
                            <span
                                class="block px-3 py-1.5 rounded-md text-xs font-medium text-gray-400 peer-checked:bg-gray-700 peer-checked:text-white transition-all">
                                Specific Date
                            </span>
                        </label>
                        <label class="flex-1 text-center cursor-pointer">
                            <input type="radio" name="view_all" value="1" class="hidden peer"
                                {{ $viewAll ? 'checked' : '' }} onchange="this.form.submit()">
                            <span
                                class="block px-3 py-1.5 rounded-md text-xs font-medium text-gray-400 peer-checked:bg-purple-600 peer-checked:text-white transition-all">
                                All History
                            </span>
                        </label>
                    </div>
                </div>

                <div class="flex space-x-2 w-full lg:w-auto">
                    <button type="submit"
                        class="flex-1 lg:flex-none px-4 py-1.5 text-sm bg-purple-600 hover:bg-purple-500 text-white rounded-lg transition-all shadow-lg shadow-purple-900/20">
                        Apply
                    </button>

                    @if ($selectedDate !== \Carbon\Carbon::today()->format('Y-m-d') || $viewAll)
                        <a href="{{ route('attendances.index') }}"
                            class="px-3 py-1.5 text-sm text-gray-400 hover:text-white border border-gray-600 hover:border-gray-500 rounded-lg transition-all">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <div class="bg-gray-800/50 rounded-lg p-3 mb-4 border border-gray-700/30">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-1.5 h-6 bg-gradient-to-b from-purple-400 to-pink-400 rounded-full"></div>
                    <h3 class="text-base font-medium text-white">
                        @if ($viewAll)
                            All Attendance Records
                        @else
                            Attendance for {{ $displayDate }}
                        @endif
                    </h3>
                </div>

                <div class="text-right">
                    <div class="text-gray-400 text-xs">
                        {{ $attendances->total() }} records found
                    </div>

                    @if (!$viewAll)
                        <div class="text-xs font-medium mt-0.5 {{ $stats['recorded_count'] < $stats['total'] ? 'text-yellow-400' : 'text-green-400' }}">
                            Entry Status: {{ $stats['recorded_count'] }} / {{ $stats['total'] }} Employees
                        </div>
                    @endif
                </div>
            </div>

            @if (!$viewAll && isset($dataMessage))
                <div class="mt-2 pt-2 border-t border-gray-700/50 text-xs flex items-center {{ Str::contains($dataMessage, 'Warning') ? 'text-yellow-500' : 'text-green-500' }}">
                    <span class="mr-2 text-sm">
                        {{ Str::contains($dataMessage, 'Warning') ? '⚠️' : '✅' }}
                    </span>
                    {{ $dataMessage }}
                </div>
            @endif
        </div>

        <x-table.container title="Attendance List" addRoute="{{ route('attendances.create') }}"
            addText="Add Attendance">
            <x-slot name="header">
                <x-table.header :columns="['Employee', 'Date', 'In', 'Out', 'Status', 'Hours', 'Actions']" />
            </x-slot>

            <x-slot name="body">
                @foreach ($attendances as $attendance)
                    @php
                        $statusConfig = [
                            'hadir' => 'bg-green-500/10 text-green-400 border-green-500/20',
                            'sakit' => 'bg-blue-500/10 text-blue-400 border-blue-500/20',
                            'izin' => 'bg-purple-500/10 text-purple-400 border-purple-500/20',
                            'alpha' => 'bg-red-500/10 text-red-400 border-red-500/20',
                            'terlambat' => 'bg-yellow-500/10 text-yellow-400 border-yellow-500/20',
                        ];
                        $cssClass = $statusConfig[strtolower($attendance->status)] ?? 'bg-gray-500/10 text-gray-400';
                    @endphp

                    <tr class="hover:bg-gray-700/50 transition duration-200 border-b border-gray-700/30">
                        <td class="px-4 py-2 whitespace-nowrap text-gray-100 font-medium text-sm">
                            {{ $attendance->employee->nama_lengkap ?? '-' }}
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-400 text-sm">
                            {{ $attendance->tanggal->format('d M Y') }}
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap text-green-400 text-sm">
                            {{ $attendance->jam_masuk ?? '--:--' }}
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap text-red-400 text-sm">
                            {{ $attendance->jam_keluar ?? '--:--' }}
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <span class="px-2 py-0.5 rounded-md text-xs font-medium border {{ $cssClass }}">
                                {{ ucfirst($attendance->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-300 text-sm">
                            {{ $attendance->working_hours ? $attendance->working_hours . 'h' : '-' }}
                        </td>
                        <x-table.actions showRoute="attendances.show" editRoute="attendances.edit"
                            destroyRoute="attendances.destroy" :id="$attendance->id" />
                    </tr>
                @endforeach
            </x-slot>
        </x-table.container>

        <div class="mt-3 px-2">
            {{ $attendances->withQueryString()->links() }}
        </div>
    </div>
</x-layout>



