<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $departments = Department::orderBy('id', 'asc')
            ->when($request->search, function ($query) use ($request) {
                $query->where('nama_departemen', 'like', '%' . $request->search . '%');
            })
            ->paginate(5)
            ->withQueryString();


        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:255',
        ]);

        Department::create([
            'nama_departemen' => $request->nama_departemen,
        ]);

        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $departments = Department::find($id);
        return view('departments.show', compact('departments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departments = Department::find($id);
        return view('departments.edit', compact('departments'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:255',
        ]);

        $departments = Department::findOrFail($id);
        $departments->update([
            'nama_departemen' => $request->nama_departemen,
        ]);

        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departments = Department::find($id);
        $departments->delete();

        return redirect()->route('departments.index');
    }
}
