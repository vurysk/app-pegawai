@props(['showRoute', 'editRoute', 'destroyRoute', 'id'])

<td class="px-8 py-6 whitespace-nowrap">
    <div class="flex items-center space-x-3">
<a href="{{ route($showRoute, $id) }}" 
   class="group p-2 bg-purple-200/10 hover:bg-purple-200/20 border border-purple-200/30 rounded-lg transition-all duration-300">
    <span class="text-purple-300 group-hover:text-purple-200">Show</span>
</a>

<a href="{{ route($editRoute, $id) }}" 
   class="group p-2 bg-purple-500/10 hover:bg-purple-500/20 border border-purple-500/30 rounded-lg transition-all duration-300">
    <span class="text-purple-400 group-hover:text-purple-300">Edit</span>
</a>
        
        <form action="{{ route($destroyRoute, $id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    onclick="return confirm('Are you sure you want to delete this item?')"
                    class="group p-2 bg-pink-500/10 hover:bg-pink-500/20 border border-pink-500/30 rounded-lg transition-all duration-300">
                <span class="text-pink-400 group-hover:text-pink-300">Delete</span>
            </button>
        </form>
    </div>
</td>
