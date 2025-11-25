<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index(Request $request)
    {
        $employees = Employee::with(['department', 'position', 'room'])

            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('nama_lengkap', 'like', '%' . $request->search . '%')
                        ->orWhere('email', 'like', '%' . $request->search . '%')
                        ->orWhere('nomor_telepon', 'like', '%' . $request->search . '%');
                });
            })

            ->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();


        return view('employees.index', compact('employees'));
    }


    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        $rooms = Room::all();


        return view('employees.create', compact('departments', 'positions', 'rooms'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'  => 'required|string|max:225',
            'email'         => 'required|email|max:225',
            'nomor_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'status'        => 'required|string|max:50',
            'departemen_id' => 'required|exists:departments,id',
            'jabatan_id'    => 'required|exists:positions,id',
            'room_id'       => 'required|exists:rooms,id',

        ]);

        Employee::create($request->all());


        return redirect()->route('employees.index');
    }


    public function show(string $id)
    {
        $employee = Employee::with(['department', 'position', 'room'])->find($id);
        
        return view('employees.show', compact('employee'));
    }


    public function edit(string $id)
    {
        $employee = Employee::find($id);
        $departments = Department::all();
        $positions = Position::all();
        $rooms = Room::all();

        return view('employees.edit', compact('employee', 'departments', 'positions', 'rooms'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap'  => 'required|string|max:225',
            'email'         => 'required|email|max:225',
            'nomor_telepon'  => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|string|max:50',
            'departemen_id'   => 'required|exists:departments,id',
            'jabatan_id'      => 'required|exists:positions,id',
            'room_id' => 'required|exists:rooms,id',

        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->only([
            'nama_lengkap',
            'email',
            'nomor_telepon',
            'tanggal_lahir',
            'alamat',
            'tanggal_masuk',
            'status',
            'departemen_id',
            'jabatan_id',
            'room_id',

        ]));

        return redirect()->route('employees.index');
    }


    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
