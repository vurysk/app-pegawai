<x-layout pageTitle="Employee Detail">
    <x-detail.card 
        title="👤 Employee Detail" 
        backRoute="employees.index" 
        backText="Back"
    >
        <x-detail.row label="ID" :value="$employee->id" />
        <x-detail.row label="Full Name" :value="$employee->nama_lengkap" />
        <x-detail.row label="Email" :value="$employee->email" />
        <x-detail.row label="Phone Number" :value="$employee->nomor_telepon" />
        <x-detail.row label="Date of Birth" :value="$employee->tanggal_lahir" />
        <x-detail.row label="Address" :value="$employee->alamat" />
        <x-detail.row label="Join Date" :value="$employee->tanggal_masuk" />
        <x-detail.row label="Status" :value="$employee->status" />
        <x-detail.row label="Department" :value="$employee->department->nama_departemen ?? '-'" />
        <x-detail.row label="Position" :value="$employee->position->nama_jabatan ?? '-'" />
        <x-detail.row label="Room" :value="$employee->room->room_code ?? '-'" />
        <x-detail.row label="Created At" :value="$employee->created_at->format('d-m-Y H:i')" />
        <x-detail.row label="Last Updated" :value="$employee->updated_at->format('d-m-Y H:i')" />
    </x-detail.card>
</x-layout>


