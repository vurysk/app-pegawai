@props(['label', 'value'])

<tr class="hover:bg-gray-600/20 transition-colors duration-300">
    <th class="px-8 py-6 text-left font-semibold text-gray-300 bg-gray-700/40 border-r border-gray-600/30 w-1/3">
        <div class="flex items-center space-x-3">
            <div class="w-1.5 h-1.5 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full"></div>
            <span>{{ $label }}</span>
        </div>
    </th>
    <td class="px-8 py-6 text-white font-medium">
        {{ $value ?? '-' }}
    </td>
</tr>

