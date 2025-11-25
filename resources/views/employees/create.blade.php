<x-layout pageTitle="Create Employee">
    <div class="max-w-6xl mx-auto">
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-1.5 h-6 bg-gradient-to-b from-purple-600 to-purple-400 rounded-full"></div>
                    <h2 class="text-xl font-light text-white">Add New Employee</h2>
                </div>
            </div>
        </div>

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            
            <div class="gradient-border rounded-xl p-0.5 mb-6">
                <div class="bg-gray-800/90 backdrop-blur-sm rounded-xl p-6 border border-gray-700/50">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                        
                        <x-form.input name="nama_lengkap" label="Full Name" value="{{ old('nama_lengkap') }}" />
                        <x-form.input name="email" label="Email" type="email" value="{{ old('email') }}" />
                        <x-form.input name="nomor_telepon" label="Phone Number" value="{{ old('nomor_telepon') }}" />
                        <x-form.input name="tanggal_lahir" label="Birthday" type="date" value="{{ old('tanggal_lahir') }}" />
                        <x-form.textarea name="alamat" label="Address" value="{{ old('alamat') }}"/>
                        <x-form.input name="tanggal_masuk" label="Entry Date" type="date" value="{{ old('tanggal_masuk') }}" />

                        <div class="group">
                            <label for="status" class="block text-xs font-medium text-gray-300 mb-2 flex items-center space-x-2">
                                <div class="w-1.5 h-1.5 bg-gradient-to-r from-green-400 to-blue-400 rounded-full"></div>
                                <span>Status</span>
                            </label>
                            <select id="status" name="status"
                                class="w-full px-3 py-2 text-sm bg-gray-700/50 border border-gray-600/50 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-purple-500/50 transition-all">
                                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Active</option>
                                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Non Active</option>
                            </select>
                        </div>


                        <x-form.select 
                            name="jabatan_id" 
                            label="Position" 
                            :options="$positions"
                            selected="{{ old('jabatan_id') }}" 
                            optionLabel="nama_jabatan" 
                            id="jabatan_select" 
                        />


                        <div id="dept_container" class="relative">
                            <x-form.select 
                                name="departemen_id" 
                                label="Department (Auto)" 
                                :options="$departments"
                                selected="{{ old('departemen_id') }}" 
                                optionLabel="nama_departemen" 
                                id="departemen_select"
                            />
                        </div>

                        {{-- Option akan dimanipulasi oleh JS --}}
                        <x-form.select 
                            name="room_id" 
                            label="Room (Filtered by Dept)" 
                            :options="$rooms"
                            selected="{{ old('room_id') }}" 
                            optionLabel="room_code" 
                            id="room_select"
                        />

                        <div></div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end space-x-3">
                <a href="{{ route('employees.index') }}" class="px-4 py-2 text-xs font-medium text-gray-300 bg-gray-700/50 border border-gray-600/50 rounded-lg hover:bg-gray-600">Cancel</a>
                <button type="submit" class="px-4 py-2 text-xs font-medium text-white bg-gradient-to-r from-purple-800 to-purple-800 border border-purple-900 rounded-lg hover:from-purple-700">Add Employee</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Ambil data dari Laravel ke variabel JS
            const positions = @json($positions);
            const rooms = @json($rooms);

            // 2. Ambil Elemen DOM
            // Pastikan komponen x-form.select Anda merender atribut ID yang kita pass diatas
            // Jika tidak, gunakan document.querySelector('[name="jabatan_id"]')
            const positionSelect = document.getElementById('jabatan_select') || document.querySelector('[name="jabatan_id"]');
            const deptSelect = document.getElementById('departemen_select') || document.querySelector('[name="departemen_id"]');
            const roomSelect = document.getElementById('room_select') || document.querySelector('[name="room_id"]');

            // Simpan opsi Room original agar bisa di-reset/filter ulang
            // Kita clone node option-nya
            const originalRoomOptions = Array.from(roomSelect.options);

            // Fungsi Filter Room berdasarkan Dept ID
            function filterRooms(deptId) {
                // Kosongkan dropdown room
                roomSelect.innerHTML = '';

                // Tambahkan opsi default/placeholder jika ada (index 0 biasanya "Select One")
                // roomSelect.add(originalRoomOptions[0]); 

                // Loop semua opsi original
                originalRoomOptions.forEach(option => {
                    // Cari data room asli di JSON array rooms untuk cek department_id
                    // Value option adalah room.id
                    const roomData = rooms.find(r => r.id == option.value);
                    
                    if (roomData) {
                        // Jika room ini milik dept yang dipilih, masukkan ke dropdown
                        if (roomData.department_id == deptId) {
                            roomSelect.add(option);
                        }
                    } else {
                        // Jika value kosong (placeholder), masukkan saja
                        if(option.value == "") roomSelect.add(option);
                    }
                });

                // Reset pilihan room ke kosong/pertama setelah filter
                if(roomSelect.options.length > 0) {
                    roomSelect.value = roomSelect.options[0].value;
                }
            }

            // Event Listener: Saat Posisi Berubah
            positionSelect.addEventListener('change', function() {
                const selectedPosId = this.value;
                
                // Cari data posisi yang dipilih
                const selectedPos = positions.find(p => p.id == selectedPosId);

                if (selectedPos && selectedPos.department_id) {
                    // 1. Set Department secara otomatis
                    deptSelect.value = selectedPos.department_id;

                    // 2. Filter Room sesuai department posisi tsb
                    filterRooms(selectedPos.department_id);
                }
            });

            // Event Listener: Saat Department Berubah (Manual change)
            // Ini opsional, jaga-jaga user ganti department manual
            deptSelect.addEventListener('change', function() {
                filterRooms(this.value);
            });

            // Trigger saat halaman load (jika sedang mode edit atau validasi error)
            if(positionSelect.value) {
                positionSelect.dispatchEvent(new Event('change'));
            } else if(deptSelect.value) {
                filterRooms(deptSelect.value);
            }
        });
    </script>
</x-layout>



