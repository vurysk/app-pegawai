<x-layout pageTitle="Edit Attendance">
    <div class="max-w-2xl mx-auto">
       
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-1.5 h-6 bg-gradient-to-b from-purple-600 to-purple-400 rounded-full"></div>
                    <h2 class="text-xl font-light text-white">Edit Attendance Record</h2>
                </div>
            </div>
        </div>

        
        <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="gradient-border rounded-xl p-0.5 mb-6">
                <div class="bg-gray-800/90 backdrop-blur-sm rounded-xl p-6 border border-gray-700/50">
                    <div class="grid grid-cols-1 gap-4">
                        <x-form.select name="karyawan_id" label="Employee" :options="$employees"
                            selected="{{ old('karyawan_id', $attendance->karyawan_id) }}" optionLabel="nama_lengkap" />

                        <x-form.input name="tanggal" label="Date" type="date"
                            value="{{ old('tanggal', $attendance->tanggal) }}" />
                    </div>

                    <div class="mt-4 group">
                        <label for="status"
                            class="block text-sm font-medium text-gray-300 mb-2 flex items-center space-x-2">
                            <div class="w-1.5 h-1.5 bg-gradient-to-r from-green-400 to-blue-400 rounded-full"></div>
                            <span>Attendance Status</span>
                        </label>
                        <select name="status" id="statusSelect"
                            class="w-full px-3 py-2 text-sm bg-gray-700/50 border border-gray-600/50 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300 group-hover:border-gray-500/70">
                            <option value="present"
                                {{ old('status', $attendance->status) == 'present' ? 'selected' : '' }}>Present</option>
                            <option value="late" {{ old('status', $attendance->status) == 'late' ? 'selected' : '' }}>
                                Late</option>
                            <option value="sick" {{ old('status', $attendance->status) == 'sick' ? 'selected' : '' }}>
                                Sick</option>
                            <option value="leave"
                                {{ old('status', $attendance->status) == 'leave' ? 'selected' : '' }}>Leave</option>
                            <option value="absent"
                                {{ old('status', $attendance->status) == 'absent' ? 'selected' : '' }}>Absent</option>
                        </select>
                        @error('status')
                            <p class="mt-2 text-sm text-pink-400 flex items-center space-x-2">
                                <span>⚠️</span>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Time fields - only show for present/late status -->
                    <div id="timeFields" class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                        <x-form.input name="jam_masuk" label="Check-in Time" type="time"
                            value="{{ old('jam_masuk', $attendance->jam_masuk) }}" />

                        <x-form.input name="jam_keluar" label="Check-out Time" type="time"
                            value="{{ old('jam_keluar', $attendance->jam_keluar) }}" />
                    </div>
                </div>
            </div>

            <!-- Compact Action Buttons -->
            <div class="flex items-center justify-end space-x-3">
                <a href="{{ route('attendances.index') }}"
                    class="px-4 py-2 text-xs font-medium text-gray-300 bg-gray-700/50 border border-gray-600/50 rounded-lg hover:bg-gray-600/50 hover:text-white transition-all duration-300">
                    Cancel
                </a>
                <button type="submit"
                    class="px-4 py-2 text-xs font-medium text-white bg-gradient-to-r from-purple-800 to-purple-800 border border-purple-900 rounded-lg hover:from-purple-700 hover:to-purple-700 hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    Update Attendance
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelect = document.getElementById('statusSelect');
            const timeFields = document.getElementById('timeFields');

            
            const jamMasukInput = document.querySelector('input[name="jam_masuk"]');
            const jamKeluarInput = document.querySelector('input[name="jam_keluar"]');

            function toggleTimeInputs() {
                const status = statusSelect.value;

                if (status === 'present' || status === 'late') {
                    // Tampilkan dan aktifkan
                    timeFields.style.display = 'grid';
                    if (jamMasukInput) jamMasukInput.disabled = false;
                    if (jamKeluarInput) jamKeluarInput.disabled = false;
                } else {
                    // Sembunyikan dan nonaktifkan
                    timeFields.style.display = 'none';
                    if (jamMasukInput) jamMasukInput.disabled = true;
                    if (jamKeluarInput) jamKeluarInput.disabled = true;
                }
            }

            statusSelect.addEventListener('change', toggleTimeInputs);
            toggleTimeInputs();
        });
    </script>
</x-layout>

