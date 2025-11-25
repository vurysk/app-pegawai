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
        // 1. Tentukan Tanggal & Mode View
        $selectedDate = $request->selected_date ?? Carbon::today()->format('Y-m-d');
        $viewAll = $request->view_all == '1';

        // 2. Query Dasar Attendance
        $query = Attendance::with('employee')->latest();

        // Jika TIDAK view all, filter berdasarkan tanggal
        if (!$viewAll) {
            $query->whereDate('tanggal', $selectedDate);
        }

        // Eksekusi Pagination
        $attendances = $query->paginate(10)->withQueryString();

        // ---------------------------------------------------------
        // LOGIC STATS CARD & SLICING (/ TOTAL KARYAWAN)
        // ---------------------------------------------------------

        // A. Ambil Total Karyawan Aktif (Penyebut)
        $totalEmployees = Employee::where('status', 'aktif')->count();

        // B. Hitung Statistik pada Tanggal Terpilih (Pembilang)
        // Kita hitung berdasarkan $selectedDate agar informasinya relevan dengan hari itu
        $statsQuery = Attendance::whereDate('tanggal', $selectedDate);

        $stats = [
            'total'   => $totalEmployees, // Total populasi karyawan
            // Hitung berapa data attendance yang sudah masuk hari ini
            'recorded_count' => $statsQuery->count()
        ];

        // ---------------------------------------------------------
        // DISPLAY MESSAGE LOGIC
        // ---------------------------------------------------------
        $displayDate = Carbon::parse($selectedDate)->format('d F Y');

        // Cek selisih data (Misal: Total Karyawan 10, Data Masuk 8 -> Berarti 2 orang belum absen)
        $missingCount = $totalEmployees - $stats['recorded_count'];
        $dataMessage = "";

        if (!$viewAll) {
            if ($missingCount > 0) {
                $dataMessage = "Warning: {$missingCount} employees have no attendance record for {$displayDate}.";
            } else {
                $dataMessage = "All {$totalEmployees} employees have records for {$displayDate}.";
            }
        }

        return view('attendances.index', compact('attendances', 'stats', 'selectedDate', 'viewAll', 'displayDate', 'dataMessage'));
    }

    

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
