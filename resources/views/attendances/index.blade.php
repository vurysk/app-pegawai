@extends('master')
@section('title', 'Daftar Absensi')
@section('page-title', 'Attendance')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Attendance List</h1>

        <a href="{{ route('attendances.create') }}" style="display:inline-block; margin-bottom:15px;">
            ➕
        </a>

        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Date</th>
                    <th>Entry Time</th>
                    <th>Out Time</th>
                    <th>Attendance Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->employee->nama_lengkap ?? '-' }}</td>
                    <td>{{ $attendance->tanggal }}</td>
                    <td>{{ $attendance->waktu_masuk }}</td>
                    <td>{{ $attendance->waktu_keluar }}</td>
                    <td>{{ $attendance->status_absensi }}</td>
                    <td>
                        <a href="{{ route('attendances.show', $attendance->id) }}">📁</a>
                        <a href="{{ route('attendances.edit', $attendance->id) }}">✏️</a>
                        <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">🗑️</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection