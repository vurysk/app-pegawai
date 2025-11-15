<x-layout pageTitle="Position Detail">
    <x-detail.card 
        title="🗃️ Position Detail" 
        backRoute="positions.index" 
        backText="Back"
    >
        <x-detail.row label="ID" :value="$positions->id" />
        <x-detail.row label="Position Name" :value="$positions->nama_jabatan" />
        <x-detail.row label="Main Salary" :value="'$ ' . number_format($positions->gaji_pokok, 2, '.', ',')" />
        <x-detail.row label="Created At" :value="$positions->created_at->format('Y-m-d')" />
        <x-detail.row label="Last Updated" :value="$positions->updated_at->format('Y-m-d')" />
    </x-detail.card>
</x-layout>
