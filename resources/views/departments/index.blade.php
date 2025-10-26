@extends('master')
@section('title', 'Daftar Pegawai')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Departemen</h1>
        <table border="1" cellpadding="5" cellspacing="0">
            {{-- <thead>
                <tr>
                    <th>Department Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $department->nama_departemen }}</td>
                        <td>
                            <a href="{{ route('departments.show', $department->id) }}">Detail</a> |
                            <a href="{{ route('departments.edit', $department->id) }}">Edit</a> |
                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody> --}}
            <a href="{{ route('departments.create') }}" style="display:inline-block; margin-bottom:15px;">
                ➕
            </a>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Departemen</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->nama_departemen }}</td>
                        <td>
                            <a href="{{ route('departments.show', $department->id) }}">📁</a>
                            <a href="{{ route('departments.edit', $department->id) }}">✏️</a>
                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
                                style="display:inline;">
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
