<x-layout pageTitle="Rooms Detail">
    <x-detail.card 
        title="🗃️ Rooms Detail" 
        backRoute="rooms.index" 
        backText="Back"
    >
        <x-detail.row label="ID" :value="$rooms->id" />
        <x-detail.row label="Room Code" :value="$rooms->room_code" />
        <x-detail.row label="Floor" :value="$rooms->floor" />
        <x-detail.row label="Department" :value="$rooms->department->nama_departemen" />
        <x-detail.row label="Created At" :value="$rooms->created_at->format('Y-m-d')" />
        <x-detail.row label="Last Update" :value="$rooms->updated_at->format('Y-m-d')" />
    </x-detail.card>
</x-layout>

