@props(['label', 'value'])

<tr class="hover:bg-gray-600/10 transition-colors duration-200">
   
    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 bg-gray-700/30 border-r border-gray-600/30 w-1/3">
        <div class="flex items-center space-x-2">
            <div class="w-1 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full"></div>
            <span>{{ $label }}</span>
        </div>
    </th>
    <td class="px-6 py-3 text-sm text-white font-medium">
        {{ $value ?? '-' }}
    </td>
</tr>


