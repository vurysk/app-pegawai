<x-layout pageTitle="Salary Detail">
    <x-detail.card 
        title="💰 Salary Detail" 
        backRoute="salaries.index" 
        backText="Back"
    >
        <x-detail.row label="Employee Name" :value="$salary->employee->nama_lengkap ?? '-'" />
        <x-detail.row label="Month" :value="$salary->bulan" />
        <x-detail.row label="Base Salary" :value="'$ ' . number_format($salary->gaji_pokok, 0, ',', '.')" />
        <x-detail.row label="Allowance" :value="'$ ' . number_format($salary->tunjangan, 0, ',', '.')" />
        <x-detail.row label="Deductions" :value="'$ ' . number_format($salary->potongan, 0, ',', '.')" />
        <x-detail.row label="Total Salary" :value="'$ ' . number_format($salary->total_gaji, 0, ',', '.')" />
        <x-detail.row label="Created At" :value="$salary->created_at->format('d-m-Y H:i')" />
        <x-detail.row label="Last Updated" :value="$salary->updated_at->format('d-m-Y H:i')" />
    </x-detail.card>
</x-layout>


