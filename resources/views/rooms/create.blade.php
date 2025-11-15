<x-layout pageTitle="Create Room">
    <div class="max-w-2xl mx-auto">
        <!-- Compact Header -->
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-1.5 h-6 bg-gradient-to-b from-purple-600 to-purple-400 rounded-full"></div>
                    <h2 class="text-xl font-light text-white">Add Room</h2>
                </div>
            </div>
        </div>

        <!-- Compact Form Section -->
        <form action="{{ route('rooms.store') }}" method="POST">
            @csrf
            
            <div class="gradient-border rounded-xl p-0.5 mb-6">
                <div class="bg-gray-800/90 backdrop-blur-sm rounded-xl p-6 border border-gray-700/50">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <x-form.input 
                            name="room_code" 
                            label="Room Code" 
                            type="text" 
                            :value="old('room_code')"
                        />

                        <x-form.input 
                            name="floor" 
                            label="Floor" 
                            type="text" 
                            :value="old('floor')"
                        />

                        <x-form.select 
                            name="department_id" 
                            label="Department" 
                            :options="$departments" 
                            :selected="old('department_id')"
                            optionValue="id" 
                            optionLabel="nama_departemen"
                        />
                    </div>
                </div>
            </div>

            <!-- Compact Action Buttons -->
            <div class="flex items-center justify-end space-x-3">
                <a href="{{ route('rooms.index') }}" 
                   class="px-4 py-2 text-xs font-medium text-gray-300 bg-gray-700/50 border border-gray-600/50 rounded-lg hover:bg-gray-600/50 hover:text-white transition-all duration-300">
                    Cancel
                </a>
                <button type="submit"
                    class="px-4 py-2 text-xs font-medium text-white bg-gradient-to-r from-purple-800 to-purple-800 border border-purple-900 rounded-lg hover:from-purple-700 hover:to-purple-700 hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    Add Room
                </button>
            </div>
        </form>
    </div>
</x-layout>


