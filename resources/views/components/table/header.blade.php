@props(['columns'])

<tr>
    @foreach($columns as $column)
        {{-- Padding dikurangi drastis (py-4 -> py-3), Font text-sm -> text-xs --}}
        <th class="px-6 py-3 text-left text-xs font-bold text-gray-400 uppercase tracking-wider border-r border-gray-600/50 last:border-r-0">
            <div class="flex items-center space-x-2">
                <div class="w-1 h-1 bg-purple-500 rounded-full"></div> {{-- Dot diperkecil --}}
                <span>{{ $column }}</span>
            </div>
        </th>
    @endforeach
</tr>



{{-- @props(['columns'])

<tr>
    @foreach($columns as $column)
        <th class="px-8 py-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider border-r border-gray-600 last:border-r-0">
            <div class="flex items-center space-x-2">
                <div class="w-1.5 h-1.5 bg-gradient-to-r from-purple-400 to-purple-600 rounded-full"></div>
                <span>{{ $column }}</span>
            </div>
        </th>
    @endforeach
</tr> --}}

