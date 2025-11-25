<x-layout pageTitle="Create Salary">
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-1.5 h-6 bg-gradient-to-b from-purple-600 to-purple-400 rounded-full"></div>
                    <h2 class="text-xl font-light text-white">Add Salary Record</h2>
                </div>
            </div>
        </div>

        <form action="{{ route('salaries.store') }}" method="POST">
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
                            id="employee_select" 
                        />

                        <x-form.input 
                            name="bulan" 
                            label="Month" 
                            value="{{ old('bulan', date('F Y')) }}"
                            placeholder="e.g. October 2025"
                        />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                        
                        
                        <x-form.input 
                            name="gaji_pokok_display" 
                            label="Base Salary (Auto)" 
                            type="number" 
                            value="0"
                            step="0.01"
                            id="gaji_pokok"
                            readonly
                            class="bg-gray-700/50 text-gray-400 cursor-not-allowed focus:border-gray-600"
                        />

                        
                        <x-form.input 
                            name="tunjangan" 
                            label="Allowance" 
                            type="number" 
                            value="{{ old('tunjangan', 0) }}"
                            step="0.01"
                            id="tunjangan"
                        />

                        <x-form.input 
                            name="potongan" 
                            label="Deduction" 
                            type="number" 
                            value="{{ old('potongan', 0) }}"
                            step="0.01"
                            id="potongan"
                        />

                        
                        <x-form.input 
                            name="total_gaji_display" 
                            label="Total Salary (Auto)" 
                            type="number" 
                            value="0"
                            step="0.01"
                            id="total_gaji"
                            readonly
                            class="bg-gray-700/50 text-green-400 font-bold cursor-not-allowed focus:border-gray-600"
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
                    Add Salary
                </button>
            </div>
        </form>
    </div>

 
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const employeesData = @json($employees);


            const empSelect = document.getElementById('employee_select') || document.querySelector('[name="karyawan_id"]');
            
            const gajiInput = document.getElementById('gaji_pokok');
            const tunjanganInput = document.getElementById('tunjangan');
            const potonganInput = document.getElementById('potongan');
            const totalInput = document.getElementById('total_gaji');

            function calculateTotal() {
                const base = parseFloat(gajiInput.value) || 0;
                const allowance = parseFloat(tunjanganInput.value) || 0;
                const deduction = parseFloat(potonganInput.value) || 0;
                
                const total = base + allowance - deduction;
                totalInput.value = total.toFixed(2);
            }

            if(empSelect) {
                empSelect.addEventListener('change', function() {
                    const selectedId = this.value;
                    const employee = employeesData.find(emp => emp.id == selectedId);

                    if (employee && employee.position) {
                        gajiInput.value = employee.position.gaji_pokok;
                    } else {
                        gajiInput.value = 0;
                    }
                    calculateTotal();
                });
            }

            
            tunjanganInput.addEventListener('input', calculateTotal);
            potonganInput.addEventListener('input', calculateTotal);
        });
    </script>
</x-layout>




