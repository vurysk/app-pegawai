<x-layout pageTitle="Edit Position">
    <div class="max-w-xl mx-auto">
        

        <div class="mb-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-1.5 h-5 bg-gradient-to-b from-purple-600 to-purple-400 rounded-full"></div>
                    <h2 class="text-lg font-light text-white">Edit Position: {{ $position->nama_jabatan }}</h2>
                </div>
            </div>
        </div>

        <form action="{{ route('positions.update', $position->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="gradient-border rounded-xl p-0.5 mb-4">

                <div class="bg-gray-800/90 backdrop-blur-sm rounded-xl p-4 border border-gray-700/50">

                    <div class="grid grid-cols-1 gap-3">
                        
                        <x-form.input 
                            name="nama_jabatan" 
                            label="Position Title" 
                            value="{{ old('nama_jabatan', $position->nama_jabatan) }}" 
                        />


                        <x-form.select 
                            name="department_id" 
                            label="Department" 
                            :options="$departments" 
                            selected="{{ old('department_id', $position->department_id) }}"
                            optionLabel="nama_departemen"
                        />

                        <x-form.input 
                            name="gaji_pokok" 
                            label="Base Salary" 
                            type="number" 
                            step="0.01"
                            value="{{ old('gaji_pokok', $position->gaji_pokok) }}" 
                        />

                    </div>
                </div>
            </div>


            <div class="flex items-center justify-end space-x-2">
                <a href="{{ route('positions.index') }}" 
                   class="px-3 py-1.5 text-xs font-medium text-gray-300 bg-gray-700/50 border border-gray-600/50 rounded-lg hover:bg-gray-600/50 hover:text-white transition-all duration-300">
                    Cancel
                </a>
                <button type="submit"
                    class="px-3 py-1.5 text-xs font-medium text-white bg-gradient-to-r from-purple-800 to-purple-800 border border-purple-900 rounded-lg hover:from-purple-700 hover:to-purple-700 hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    Update Position
                </button>
            </div>
        </form>
    </div>
</x-layout>



