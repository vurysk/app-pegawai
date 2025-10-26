<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::latest()->paginate(5);

        return view('attendances.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('attendances.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i',
            'status_absensi' => 'required|in:present,leave,sick,absent',
        ]);

        if ($validated['status_absensi'] !== 'present') {
            $validated['waktu_masuk'] = null;
            $validated['waktu_keluar'] = null;
        }


        Attendance::create($validated);
        return redirect()->route('attendances.index')
            ->with('success', 'Attendance record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attendances = Attendance::find($id);
        return view('attendances.show', compact('attendances'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attendances = Attendance::find($id);
        $employees = Employee::all();
        return view('attendances.edit', compact('attendances', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i',
            'status_absensi' => 'required|in:present,leave,sick,absent', // sesuaikan dengan enum di database
        ]);

        // Kosongkan waktu masuk/keluar jika status bukan 'hadir'
        if ($validated['status_absensi'] !== 'present') {
            $validated['waktu_masuk'] = '-';
            $validated['waktu_keluar'] = '-';
        }

        $attendance = Attendance::findOrFail($id);
        $attendance->update($validated);

        return redirect()->route('attendances.index')
            ->with('success', 'Attendance record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attendances = Attendance::findOrFail($id);
        $attendances->delete();
        return redirect()->route('attendances.index')
            ->with('success', 'Attendance record deleted successfully.');
    }
}
