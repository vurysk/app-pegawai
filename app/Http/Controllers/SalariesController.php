<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salaries;
use Illuminate\Http\Request;

class SalariesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salaries = Salaries::latest()->paginate(5);
        return view('salaries.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:10',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'required|numeric|min:0',
            'potongan' => 'required|numeric|min:0',
            'total_gaji' => 'required|numeric|min:0',
        ]);

        Salaries::create($request->all());

        return redirect()->route('salaries.index')
            ->with('success', 'Salary record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $salary = Salaries::find($id);

        if (!$salary) {
            abort(404, 'Data gaji tidak ditemukan');
        }

        return view('salaries.show', compact('salary'));
    }

    
    public function edit(string $id)
    {
        $salary = Salaries::find($id);
        $employees = Employee::all();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:10',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'required|numeric|min:0',
            'potongan' => 'required|numeric|min:0',
            'total_gaji' => 'required|numeric|min:0',
        ]);

        $salary = Salaries::findOrFail($id);

        $salary->update($request->only([
            'karyawan_id',
            'bulan',
            'gaji_pokok',
            'tunjangan',
            'potongan',
            'total_gaji',
        ]));

        return redirect()->route('salaries.index')
            ->with('success', 'Salary record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $salaries = Salaries::find($id);
        $salaries->delete();
        return redirect()->route('salaries.index')
            ->with('success', 'Salary record deleted successfully.');
    }
}
