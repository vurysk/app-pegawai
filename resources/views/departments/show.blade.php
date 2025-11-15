<x-layout pageTitle="Department Detail">
    <x-detail.card 
        title="🗃️ Department Detail" 
        backRoute="departments.index" 
        backText="Back"
    >
        <x-detail.row label="ID" :value="$departments->id" />
        <x-detail.row label="Department Name" :value="$departments->nama_departemen" />
        <x-detail.row label="Created At" :value="$departments->created_at->format('Y-m-d')" />
        <x-detail.row label="Last Update" :value="$departments->updated_at->format('Y-m-d')" />
    </x-detail.card>
</x-layout>

