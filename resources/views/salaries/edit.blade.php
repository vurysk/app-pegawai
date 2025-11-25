<x-layout pageTitle="Edit Salary">
    <div class="max-w-2xl mx-auto">

        <div class="mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-1.5 h-6 bg-gradient-to-b from-purple-600 to-purple-400 rounded-full"></div>
                    <h2 class="text-xl font-light text-white">Edit Salary Record</h2>
                </div>
            </div>
        </div>

        <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="gradient-border rounded-xl p-0.5 mb-6">
                <div class="bg-gray-800/90 backdrop-blur-sm rounded-xl p-6 border border-gray-700/50">
                    <div class="grid grid-cols-1 gap-4">
                        <x-form.select 
                            name="karyawan_id" 
                            label="Employee" 
                            :options="$employees" 
                            selected="{{ old('karyawan_id', $salary->karyawan_id) }}"
                            optionLabel="nama_lengkap"
                        />

                        <x-form.input 
                            name="bulan" 
                            label="Month" 
                            value="{{ old('bulan', $salary->bulan) }}"
                            placeholder="e.g. October 2025"
                        />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                        <x-form.input 
                            name="gaji_pokok" 
                            label="Base Salary" 
                            type="number" 
                            value="{{ old('gaji_pokok', $salary->gaji_pokok) }}"
                            step="0.01"
                        />

                        <x-form.input 
                            name="tunjangan" 
                            label="Allowance" 
                            type="number" 
                            value="{{ old('tunjangan', $salary->tunjangan) }}"
                            step="0.01"
                        />

                        <x-form.input 
                            name="potongan" 
                            label="Deductions" 
                            type="number" 
                            value="{{ old('potongan', $salary->potongan) }}"
                            step="0.01"
                        />

                        <x-form.input 
                            name="total_gaji" 
                            label="Total Salary" 
                            type="number" 
                            value="{{ old('total_gaji', $salary->total_gaji) }}"
                            step="0.01"
                        />
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end space-x-3">
                <a href="{{ route('salaries.index') }}" 
                   class="px-4 py-2 text-xs font-medium text-gray-300 bg-gray-700/50 border border-gray-600/50 rounded-lg hover:bg-gray-600/50 hover:text-white transition-all duration-300">
                    Cancel
                </a>
                <button type="submit"
                    class="px-4 py-2 text-xs font-medium text-white bg-gradient-to-r from-purple-800 to-purple-800 border border-purple-900 rounded-lg hover:from-purple-700 hover:to-purple-700 hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    Update Salary
                </button>
            </div>
        </form>
    </div>
</x-layout>
