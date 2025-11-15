<?php

namespace App\Http\Controllers;
    
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class AttendanceController extends Controller
{

    public function index()
    {
        $attendances = Attendance::latest()->paginate(9);

        return view('attendances.index', compact('attendances'));
    }


    public function create()
    {
        $employees = Employee::all();
        return view('attendances.create', compact('employees'));
    }


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
            $validated['waktu_masuk'] = '-';
            $validated['waktu_keluar'] = '-';
        }


        Attendance::create($validated);
        return redirect()->route('attendances.index')
            ->with('success', 'Attendance record created successfully.');
    }


    public function show(string $id)
    {
        $attendance = Attendance::find($id);
        return view('attendances.show', compact('attendance'));
    }


    public function edit(string $id)
    {
        $attendance = Attendance::find($id);
        $employees = Employee::all();
        return view('attendances.edit', compact('attendance', 'employees'));
    }

    
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i',
            'status_absensi' => 'required|in:present,leave,sick,absent', 
        ]);

        
        if ($validated['status_absensi'] !== 'present') {
            $validated['waktu_masuk'] = '-';
            $validated['waktu_keluar'] = '-';
        }

        $attendance = Attendance::findOrFail($id);
        $attendance->update($validated);

        return redirect()->route('attendances.index')
            ->with('success', 'Attendance record updated successfully.');
    }


    public function destroy(string $id)
    {
        $attendances = Attendance::findOrFail($id);
        $attendances->delete();
        return redirect()->route('attendances.index')
            ->with('success', 'Attendance record deleted successfully.');
    }
}
