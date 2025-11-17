<x-layout pageTitle="Create Attendance">
    <div class="max-w-2xl mx-auto">
        <!-- Compact Header -->
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-1.5 h-6 bg-gradient-to-b from-purple-600 to-purple-400 rounded-full"></div>
                    <h2 class="text-xl font-light text-white">Add Attendance</h2>
                </div>
            </div>
        </div>

        <!-- Compact Form Section -->
        <form action="{{ route('attendances.store') }}" method="POST">
            @csrf
            
            <div class="gradient-border rounded-xl p-0.5 mb-6">
                <div class="bg-gray-800/90 backdrop-blur-sm rounded-xl p-6 border border-gray-700/50">
                    <div class="grid grid-cols-1 gap-4">
                        <x-form.select 
                            name="karyawan_id" 
                            label="Employee" 
                            :options="$employees" 
                            selected="{{ old('karyawan_id') }}"
                            optionLabel="nama_lengkap"
                        />

                        <x-form.input 
                            name="tanggal" 
                            label="Date" 
                            type="date" 
                            value="{{ old('tanggal', $today) }}"
                        />
                    </div>

                    <div class="mt-4 group">
                        <label for="status" class="block text-sm font-medium text-gray-300 mb-2 flex items-center space-x-2">
                            <div class="w-1.5 h-1.5 bg-gradient-to-r from-green-400 to-blue-400 rounded-full"></div>
                            <span>Attendance Status</span>
                        </label>
                        <select name="status" id="statusSelect"
                            class="w-full px-3 py-2 text-sm bg-gray-700/50 border border-gray-600/50 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300 group-hover:border-gray-500/70">
                            <option value="present" {{ old('status') == 'present' ? 'selected' : '' }}>✅ Present - Hadir normal</option>
                            <option value="late" {{ old('status') == 'late' ? 'selected' : '' }}>⏰ Late - Hadir terlambat</option>
                            <option value="sick" {{ old('status') == 'sick' ? 'selected' : '' }}>🏥 Sick - Tidak masuk sakit</option>
                            <option value="leave" {{ old('status') == 'leave' ? 'selected' : '' }}>📝 Leave - Tidak masuk izin</option>
                            <option value="absent" {{ old('status') == 'absent' ? 'selected' : '' }}>❌ Absent - Tidak masuk tanpa kabar</option>
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
                        <x-form.input 
                            name="jam_masuk" 
                            label="Check-in Time" 
                            type="time" 
                            value="{{ old('jam_masuk', '08:00') }}"
                        />

                        <x-form.input 
                            name="jam_keluar" 
                            label="Check-out Time" 
                            type="time" 
                            value="{{ old('jam_keluar', '17:00') }}"
                        />
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
                    Add Attendance
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelect = document.getElementById('statusSelect');
            const timeFields = document.getElementById('timeFields');

            function toggleTimeInputs() {
                const status = statusSelect.value;
                
                if (status === 'present' || status === 'late') {
                    timeFields.style.display = 'grid';
                } else {
                    timeFields.style.display = 'none';
                }
            }

            statusSelect.addEventListener('change', toggleTimeInputs);
            // Initialize on load
            toggleTimeInputs();
        });
    </script>
</x-layout>




{{-- <x-layout pageTitle="Create Attendance">
    <div class="max-w-2xl mx-auto">
        <!-- Compact Header -->
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-1.5 h-6 bg-gradient-to-b from-purple-600 to-purple-400 rounded-full"></div>
                    <h2 class="text-xl font-light text-white">Add Attendance</h2>
                </div>
            </div>
        </div>

        <!-- Compact Form Section -->
        <form action="{{ route('attendances.store') }}" method="POST">
            @csrf
            
            <div class="gradient-border rounded-xl p-0.5 mb-6">
                <div class="bg-gray-800/90 backdrop-blur-sm rounded-xl p-6 border border-gray-700/50">
                    <div class="grid grid-cols-1 gap-4">
                        <x-form.select 
                            name="karyawan_id" 
                            label="Employee" 
                            :options="$employees" 
                            selected="{{ old('karyawan_id') }}"
                            optionLabel="nama_lengkap"
                        />

                        <x-form.input 
                            name="tanggal" 
                            label="Date" 
                            type="date" 
                            value="{{ old('tanggal') }}"
                        />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                        <x-form.input 
                            name="waktu_masuk" 
                            label="Entry Time" 
                            type="time" 
                            value="{{ old('waktu_masuk') }}"
                        />

                        <x-form.input 
                            name="waktu_keluar" 
                            label="Out Time" 
                            type="time" 
                            value="{{ old('waktu_keluar') }}"
                        />
                    </div>

                    <div class="mt-4 group">
                        <label for="status_absensi" class="block text-sm font-medium text-gray-300 mb-2 flex items-center space-x-2">
                            <div class="w-1.5 h-1.5 bg-gradient-to-r from-green-400 to-blue-400 rounded-full"></div>
                            <span>Attendance Status</span>
                        </label>
                        <select name="status_absensi" id="status_absensi"
                            class="w-full px-3 py-2 text-sm bg-gray-700/50 border border-gray-600/50 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300 group-hover:border-gray-500/70">
                            <option value="present" {{ old('status_absensi') == 'present' ? 'selected' : '' }}>Present</option>
                            <option value="leave" {{ old('status_absensi') == 'leave' ? 'selected' : '' }}>Leave</option>
                            <option value="sick" {{ old('status_absensi') == 'sick' ? 'selected' : '' }}>Sick</option>
                            <option value="absent" {{ old('status_absensi') == 'absent' ? 'selected' : '' }}>Absent</option>
                        </select>
                        @error('status_absensi')
                            <p class="mt-2 text-sm text-pink-400 flex items-center space-x-2">
                                <span>⚠️</span>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
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
                    Add Attendance
                </button>
            </div>
        </form>
    </div>
</x-layout> --}}


