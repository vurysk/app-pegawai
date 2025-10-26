@extends('master')
@section('title', 'Daftar Jabatan')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Jabatan</h1>

        <a href="{{ route('positions.create') }}" style="display:inline-block; margin-bottom:15px;">
            ➕ Create New Jabatan
        </a>

        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Position Name </th>
                    <th>Main Salary</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($positions as $position)
                    <tr>
                        <td>{{ $position->id }}</td>
                        <td>{{ $position->nama_jabatan }}</td>
                        <td>$ {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('positions.show', $position->id) }}">📁</a>
                            <a href="{{ route('positions.edit', $position->id) }}">✏️</a>
                            <form action="{{ route('positions.destroy', $position->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $positions->links() }}
    </div>
@endsection