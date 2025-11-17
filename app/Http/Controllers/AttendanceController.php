<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{

    


public function index(Request $request)
{
    try {
        // Ambil parameter filter
        $selectedDate = $request->get('selected_date', Carbon::today()->format('Y-m-d'));
        $viewAll = $request->get('view_all', false);

        // Query data attendance dengan sorting yang benar
        $attendances = Attendance::with('employee')
            ->when(!$viewAll, function ($query) use ($selectedDate) {
                return $query->whereDate('tanggal', $selectedDate);
            })
            ->orderBy('tanggal', 'desc') // Urutkan dari tanggal terbaru
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        // Hitung statistics
        $totalEmployees = Employee::where('status', 'aktif')->count();

        // Base query untuk statistics
        $statsQuery = Attendance::query();
        if (!$viewAll) {
            $statsQuery->whereDate('tanggal', $selectedDate);
        }

        // Hitung jumlah per status
        $presentCount = (clone $statsQuery)->where('status', 'present')->count();
        $sickCount = (clone $statsQuery)->where('status', 'sick')->count();
        $leaveCount = (clone $statsQuery)->where('status', 'leave')->count();
        $lateCount = (clone $statsQuery)->where('status', 'late')->count();
        $absentCount = (clone $statsQuery)->where('status', 'absent')->count();

        // Siapkan data untuk view
        $viewData = [
            'attendances' => $attendances,
            'selectedDate' => $selectedDate,
            'viewAll' => $viewAll,
            'displayDate' => $viewAll ? null : Carbon::parse($selectedDate)->format('l, F j, Y'),
            'stats' => [
                'total' => $totalEmployees,
                'present' => $presentCount,
                'sick' => $sickCount,
                'leave' => $leaveCount,
                'late' => $lateCount,
                'absent' => $absentCount,
            ],
            'statusConfig' => [
                'present' => [
                    'label' => 'Present',
                    'color' => 'bg-green-500/20 text-green-300 border border-green-500/30',
                    'dot_color' => 'bg-green-400'
                ],
                'late' => [
                    'label' => 'Late', 
                    'color' => 'bg-yellow-500/20 text-yellow-300 border border-yellow-500/30',
                    'dot_color' => 'bg-yellow-400'
                ],
                'sick' => [
                    'label' => 'Sick',
                    'color' => 'bg-blue-500/20 text-blue-300 border border-blue-500/30', 
                    'dot_color' => 'bg-blue-400'
                ],
                'leave' => [
                    'label' => 'Leave',
                    'color' => 'bg-purple-500/20 text-purple-300 border border-purple-500/30',
                    'dot_color' => 'bg-purple-400'
                ],
                'absent' => [
                    'label' => 'Absent',
                    'color' => 'bg-red-500/20 text-red-300 border border-red-500/30',
                    'dot_color' => 'bg-red-400'
                ]
            ]
        ];

        return view('attendances.index', $viewData);

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}
    // public function index(Request $request)
    // {
    //     // Ambil filter tanggal dari request, default hari ini
    //     $selectedDate = $request->get('selected_date', Carbon::today()->format('Y-m-d'));
    //     $viewAll = $request->has('view_all'); // Flag untuk lihat semua data

    //     // Query attendance dengan filter
    //     $attendances = Attendance::with('employee')
    //         ->when(!$viewAll, function ($query) use ($selectedDate) {
    //             return $query->whereDate('tanggal', $selectedDate);
    //         })
    //         ->latest()
    //         ->paginate(10);

    //     // Statistics - sesuaikan dengan filter
    //     $totalEmployees = Employee::where('status', 'aktif')->count();

    //     $baseQuery = Attendance::query();
    //     if (!$viewAll) {
    //         $baseQuery->whereDate('tanggal', $selectedDate);
    //     }

    //     // Statistics untuk hari ini
    //     $presentCount = (clone $baseQuery)->where('status', 'present')->count();
    //     $sickCount = (clone $baseQuery)->where('status', 'sick')->count();
    //     $leaveCount = (clone $baseQuery)->where('status', 'leave')->count();
    //     $lateCount = (clone $baseQuery)->where('status', 'late')->count();
    //     $absentCount = (clone $baseQuery)->where('status', 'absent')->count();

    //     $stats = [
    //         'total' => $totalEmployees,
    //         'present' => $presentCount,
    //         'sick' => $sickCount,
    //         'leave' => $leaveCount,
    //         'late' => $lateCount,
    //         'absent' => $absentCount,
    //         'selected_date' => $selectedDate,
    //         'view_all' => $viewAll
    //     ];

    //     return view('attendances.index', compact('attendances', 'stats'));
    // }


    public function create()
    {
        $employees = Employee::where('status', 'aktif')->get();
        $today = Carbon::today()->format('Y-m-d');

        return view('attendances.create', compact('employees', 'today'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:present,late,sick,leave,absent',
            'jam_masuk' => 'nullable|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i|after:jam_masuk',
        ]);



        if (in_array($validated['status'], ['present', 'late'])) {
            $validated['jam_masuk'] = $validated['jam_masuk'] ?? '08:00';
            $validated['jam_keluar'] = $validated['jam_keluar'] ?? '17:00';
        } else {
            $validated['jam_masuk'] = null;
            $validated['jam_keluar'] = null;
        }

        $existing = Attendance::where('karyawan_id', $validated['karyawan_id'])
            ->whereDate('tanggal', $validated['tanggal'])
            ->first();


        if ($existing) {
            return back()->withErrors(['karyawan_id' => 'Attendance record already exists for this employee on selected date.']);
        }


        Attendance::create($validated);


        return redirect()->route('attendances.index')
            ->with('success', 'Attendance record created successfully.');
    }


    public function show(string $id)
    {
        $attendance = Attendance::with('employee')->findOrFail($id);
        return view('attendances.show', compact('attendance'));
    }


    public function edit(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employee::where('status', 'aktif')->get();


        return view('attendances.edit', compact('attendance', 'employees'));
    }


    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:present,late,sick,leave,absent',
            'jam_masuk' => 'nullable|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i|after:jam_masuk',
        ]);


        // Auto-set times based on status
        if (in_array($validated['status'], ['present', 'late'])) {
            $validated['jam_masuk'] = $validated['jam_masuk'] ?? '08:00';
            $validated['jam_keluar'] = $validated['jam_keluar'] ?? '17:00';
        } else {
            $validated['jam_masuk'] = null;
            $validated['jam_keluar'] = null;
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
