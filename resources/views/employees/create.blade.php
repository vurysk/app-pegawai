<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Input Pegawai</title>
    <style>
        body {
            background-color: #fcfce6;
            /* warna biru muda */
        }
    </style>
</head>

<body>
    <h1 class="mb-4">Employee Form</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="nama_lengkap">Full Name:</label></td>
                <td><input type="text" id="nama_lengkap" name="nama_lengkap"></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email"></td>
            </tr>
            <tr>
                <td><label for="nomor_telepon">Phone Number:</label></td>
                <td><input type="text" id="nomor_telepon" name="nomor_telepon"></td>
            </tr>
            <tr>
                <td><label for="tanggal_lahir">Birthday:</label></td>
                <td><input type="date" id="tanggal_lahir" name="tanggal_lahir"></td>
            </tr>
            <tr>
                <td><label for="alamat">Address:</label></td>
                <td>
                    <textarea id="alamat" name="alamat"></textarea>
                </td>
            </tr>
            <tr>
                <td><label for="tanggal_masuk">Entry Date:</label></td>
                <td><input type="date" Sid="tanggal_masuk" name="tanggal_masuk"></td>
            </tr>
            <tr>
                <td><label for="status">Status:</label></td>
                <td>
                    <select id="status" name="status">
                        <option value="aktif">Active</option>
                        <option value="nonaktif">NonActive</option>
                    </select>
                </td>
            </tr>
             <tr>
                <td>Departemen</td>
                <td>
                    <select name="departemen_id">
                        @foreach ($departments as $dept)
                            <option value="{{ $dept->id }}"
                                {{ old('departemen_id') == $dept->id ? 'selected' : '' }}>
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
                            <option value="{{ $pos->id }}" {{ old('jabatan_id') == $pos->id ? 'selected' : '' }}>
                                {{ $pos->nama_jabatan }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                    <button type="submit">Submit</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
