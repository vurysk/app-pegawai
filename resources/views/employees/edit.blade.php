<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Pegawai</title>
    <style>
        body {
            background-color: #fcfce6;
            /* warna biru muda */
        }
    </style>
</head>

<body>
    <h2>Edit Data Pegawai</h2>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>Full Name</td>
                <td><input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $employee->nama_lengkap) }}">
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="{{ old('email', $employee->email) }}"></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td><input type="text" name="nomor_telepon"
                        value="{{ old('nomor_telepon', $employee->nomor_telepon) }}"></td>
            </tr>
            <tr>
                <td>Birthday</td>
                <td><input type="date" name="tanggal_lahir"
                        value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="alamat" value="{{ old('alamat', $employee->alamat) }}"></td>
            </tr>
            <tr>
                <td>Entry Date</td>
                <td><input type="date" name="tanggal_masuk"
                        value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status">
                        <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="tidak aktif"
                            {{ old('status', $employee->status) == 'tidak aktif' ? 'selected' : '' }}>Nonactive</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Departemen</td>
                <td>
                    <select name="departemen_id">
                        @foreach ($departments as $dept)
                            <option value="{{ $dept->id }}"
                                {{ old('departemen_id', $employee->departemen_id ?? '') == $dept->id ? 'selected' : '' }}>
                                {{ $dept->nama_departemen }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td>Jabatan</td>
                <td>
                    <select name="jabatan_id">
                        @foreach ($positions as $pos)
                            <option value="{{ $pos->id }}"
                                {{ old('jabatan_id', $employee->jabatan_id ?? '') == $pos->id ? 'selected' : '' }}>
                                {{ $pos->nama_jabatan }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>


            <tr>
                <td colspan="2">
                    <button type="submit">Update</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
