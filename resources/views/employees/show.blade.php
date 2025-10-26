<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pegawai</title>
    <title>Form Input Pegawai</title>
    <style>
        body {
            background-color: #fcfce6;
            /* warna biru muda */
        }
    </style>
</head>

<body>
    <h1>Detail Pegawai</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $employee->nama_lengkap }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $employee->email }}</td>
        </tr>
        <tr>
            <th>Nomor Telepon</th>
            <td>{{ $employee->nomor_telepon }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $employee->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $employee->alamat }}</td>
        </tr>
        <tr>
            <th>Tanggal Masuk</th>
            <td>{{ $employee->tanggal_masuk }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $employee->status }}</td>
        </tr>
        <tr>
            <th>Departemen</th>
            <td>{{ $employee->department->nama_departemen ?? '-' }}</td>
        </tr>
        <tr>
            <th>Jabatan</th>
            <td>{{ $employee->position->nama_jabatan ?? '-' }}</td>
        </tr>
        <tr>
            <th>Dibuat Pada</th>
            <td>{{ $employee->created_at->format('d-m-Y H:i') }}</td>
        </tr>
        <tr>
            <th>Terakhir Diupdate</th>
            <td>{{ $employee->updated_at->format('d-m-Y H:i') }}</td>
        </tr>

    </table>
</body>

</html>
