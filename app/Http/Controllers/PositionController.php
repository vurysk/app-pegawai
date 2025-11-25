<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Department;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $positions = Position::with('department')
            ->orderBy('id', 'asc')
            ->when($request->search, function ($query) use ($request) {
                $query->where('nama_jabatan', 'like', '%' . $request->search . '%');
            })
            ->paginate(5)
            ->withQueryString();


        return view('positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();

        return view('positions.create', compact('departments'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric|min:0',
            'department_id' => 'required|exists:departments,id',
        ]);

        
        Position::create($request->all());


        return redirect()->route('positions.index')->with('success', 'Position created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $positions = Position::with('department')->findOrFail($id);


        return view('positions.show', compact('positions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $position = Position::findOrFail($id);
        $departments = Department::all();


        return view('positions.edit', compact('position', 'departments'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric|min:0',
            'department_id' => 'required|exists:departments,id',
        ]);

        $position = Position::findOrFail($id);
        $position->update($request->all());

        return redirect()->route('positions.index')->with('success', 'Position updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $positions = Position::findOrFail($id);
        $positions->delete();


        return redirect()->route('positions.index')->with('success', 'Position deleted successfully.');
    }
}
