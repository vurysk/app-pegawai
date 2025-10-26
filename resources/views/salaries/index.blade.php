@extends('master')
@section('title', 'Salary List')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Employee Salary List</h1>

        <a href="{{ route('salaries.create') }}" style="display:inline-block; margin-bottom:15px;">
            ➕ Add Salary
        </a>

        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Month</th>
                    <th>Base Salary</th>
                    <th>Allowance</th>
                    <th>Deductions</th>
                    <th>Total Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($salaries as $salary)
                    <tr>
                        <td>{{ $salary->employee->nama_lengkap ?? '-' }}</td>
                        <td>{{ $salary->bulan }}</td>
                        <td>${{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                        <td>${{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                        <td>${{ number_format($salary->potongan, 0, ',', '.') }}</td>
                        <td>${{ number_format($salary->total_gaji, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('salaries.show', $salary->id) }}">📁</a>
                            <a href="{{ route('salaries.edit', $salary->id) }}">✏️</a>
                            <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this?')">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
