<x-layout pageTitle="Edit Employee">
    <div class="max-w-6xl mx-auto">
        <!-- Compact Header -->
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-1.5 h-6 bg-gradient-to-b from-purple-600 to-purple-400 rounded-full"></div>
                    <h2 class="text-xl font-light text-white">Edit Employee</h2>
                </div>
            </div>
        </div>


        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="gradient-border rounded-xl p-0.5">
                <div class="bg-gray-800/90 backdrop-blur-sm rounded-xl p-6 border border-gray-700/50">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                        <!-- Row 1 -->
                        <x-form.input name="nama_lengkap" label="Full Name" 
                            value="{{ old('nama_lengkap', $employee->nama_lengkap) }}" />

                        <x-form.input name="email" label="Email" type="email"
                            value="{{ old('email', $employee->email) }}" />


                        <x-form.input name="nomor_telepon" label="Phone Number"
                            value="{{ old('nomor_telepon', $employee->nomor_telepon) }}" />

                        <x-form.input name="tanggal_lahir" label="Birthday" type="date"
                            value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}" />


                        <x-form.textarea name="alamat" label="Address" 
                            value="{{ old('alamat', $employee->alamat) }}"  />


                        <x-form.input name="tanggal_masuk" label="Entry Date" type="date"
                            value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}" />


                        <div class="group">
                            <label for="status" class="block text-xs font-medium text-gray-300 mb-2 flex items-center space-x-2">
                                <div class="w-1.5 h-1.5 bg-gradient-to-r from-green-400 to-blue-400 rounded-full"></div>
                                <span>Status</span>
                            </label>
                            <select id="status" name="status"
                                class="w-full px-3 py-2 text-sm bg-gray-700/50 border border-gray-600/50 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300 group-hover:border-gray-500/70">
                                <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Active</option>
                                <option value="nonaktif" {{ old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}>Non Active</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-xs text-pink-400 flex items-center space-x-2">
                                    <span>⚠️</span>
                                    <span>{{ $message }}</span>
                                </p>
                            @enderror
                        </div>


                        <x-form.select name="departemen_id" label="Department" :options="$departments"
                            selected="{{ old('departemen_id', $employee->departemen_id) }}" optionLabel="nama_departemen" />

                        <x-form.select name="jabatan_id" label="Position" :options="$positions"
                            selected="{{ old('jabatan_id', $employee->jabatan_id) }}" optionLabel="nama_jabatan" />

                        <x-form.select name="room_id" label="Room" :options="$rooms"
                            selected="{{ old('room_id', $employee->room_id) }}" optionLabel="room_code" />
                        <div></div>
                    </div>
                </div>
            </div>


            <div class="flex items-center justify-end space-x-3 pt-4">
                <a href="{{ route('employees.index') }}" 
                   class="px-4 py-2 text-xs font-medium text-gray-300 bg-gray-700/50 border border-gray-600/50 rounded-lg hover:bg-gray-600/50 hover:text-white transition-all duration-300">
                    Cancel
                </a>
                <button type="submit"
                    class="px-4 py-2 text-xs font-medium text-white bg-gradient-to-r from-purple-800 to-purple-800 border border-purple-900 rounded-lg hover:from-purple-700 hover:to-purple-700 hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    Update Employee
                </button>
            </div>
        </form>
    </div>
</x-layout>







