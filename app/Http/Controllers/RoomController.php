<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Department;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request )
    {
        $rooms = Room::with('department')
            ->orderBy('id', 'asc')
            ->when($request->search, function ($query) use ($request) {
                $query->where('room_code', 'like', '%' . $request->search . '%');
            })
            
            
            ->when($request->floor, function ($query) use ($request) {
                $query->where('floor', $request->floor);
            })
            ->paginate(5)
            ->withQueryString();


        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('rooms.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_code' => 'required|string|max:255',
            'floor' => 'required|integer|max:5',
            'department_id' => 'required|exists:departments,id',
        ]);

        Room::create([
            'room_code' => $request->room_code,
            'floor' => $request->floor,
            'department_id' => $request->department_id,
        ]);

        return redirect()->route('rooms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rooms = Room::find($id);
        return view('rooms.show', compact('rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rooms = Room::find($id);
        $departments = Department::all();
        return view('rooms.edit', compact('rooms', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'room_code' => 'required|string|max:255',
            'floor' => 'required|integer|max:5',
            'department_id' => 'required|exists:departments,id',
        ]);

        $rooms = Room::findOrFail($id);

        $rooms->update([
            'room_code' => $request->room_code,
            'floor' => $request->floor,
            'department_id' => $request->department_id
        ]);

        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rooms = Room::find($id);
        $rooms->delete();

        return redirect()->route('rooms.index');
    }
}
