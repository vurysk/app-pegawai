<x-layout pageTitle="Departments">
    <div class="mb-4 bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-3">
        <form action="{{ route('departments.index') }}" method="GET" class="flex gap-3">
            <div class="flex-1 relative">
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Search department name..." 
                       class="w-full bg-gray-900/50 text-gray-200 text-sm border border-gray-600 rounded-lg px-3 py-1.5 focus:ring-purple-500 focus:border-purple-500 placeholder-gray-500">
            </div>
            <button type="submit" class="px-3 py-1.5 text-sm bg-purple-600 hover:bg-purple-500 text-white rounded-lg shadow-lg shadow-purple-900/20 transition-all">
                Search
            </button>
            @if(request('search'))
                <a href="{{ route('departments.index') }}" class="px-3 py-1.5 text-sm text-gray-400 hover:text-white border border-gray-600 rounded-lg transition-all">Reset</a>
            @endif
        </form>
    </div>

    <x-table.container title="Department List" addRoute="{{ route('departments.create') }}" addText="Add Department">
        <x-slot name="header">
            <x-table.header :columns="['Department Name', 'Actions']" />
        </x-slot>

        <x-slot name="body">
            @foreach ($departments as $department)
                <tr class="hover:bg-gray-700/50 transition duration-200 border-b border-gray-700/30">
                    <td class="px-4 py-2 whitespace-nowrap text-gray-100 font-medium pl-6 text-sm">
                        {{ $department->nama_departemen }}
                    </td>
                    <x-table.actions showRoute="departments.show" editRoute="departments.edit" destroyRoute="departments.destroy" :id="$department->id" />
                </tr>
            @endforeach
        </x-slot>
    </x-table.container>

    <div class="mt-3 px-2">
        {{ $departments->withQueryString()->links() ?? '' }}
    </div>
</x-layout>



