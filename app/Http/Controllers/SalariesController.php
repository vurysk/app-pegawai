<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salaries;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SalariesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $availableMonths = Salaries::select('bulan')->distinct()->pluck('bulan');


       $salaries = Salaries::with('employee')
            ->when($request->search, function ($query) use ($request) {
                $query->whereHas('employee', function ($q) use ($request) {
                    $q->where('nama_lengkap', 'like', '%' . $request->search . '%');
                });
            })
            ->when($request->filter_bulan, function ($query) use ($request) {
                $query->where('bulan', $request->filter_bulan);
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();


        return view('salaries.index', compact('salaries', 'availableMonths'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::with('position')
            ->where('status', 'aktif') 
            ->get();

        return view('salaries.create', compact('employees'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => [
                'required', 
                'exists:employees,id',
                Rule::unique('salaries')->where(function ($query) use ($request) {
                    return $query->where('karyawan_id', $request->karyawan_id)
                                 ->where('bulan', $request->bulan);
                }),
            ],
            'bulan' => 'required|string|max:10',
            'tunjangan' => 'required|numeric|min:0',
            'potongan' => 'required|numeric|min:0',
        ], [ 
            'karyawan_id.unique' => 'Pegawai ini sudah menerima gaji untuk bulan tersebut!',
        ]);

        

        $employee = Employee::with('position')->findOrFail($request->karyawan_id);

        if (!$employee->position) {
            return back()->withErrors(['msg' => 'Pegawai ini belum memiliki jabatan/posisi set.']);
        }

        $gajiPokok = $employee->position->gaji_pokok;

        $tunjangan = $request->tunjangan;
        $potongan  = $request->potongan;
        $totalGaji = ($gajiPokok + $tunjangan) - $potongan;

        Salaries::create([
            'karyawan_id' => $request->karyawan_id,
            'bulan'       => $request->bulan,
            'gaji_pokok'  => $gajiPokok,     
            'tunjangan'   => $tunjangan,
            'potongan'    => $potongan,
            'total_gaji'  => $totalGaji,     
        ]);
        
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
