<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Jabatan</title>
    <style>
        body {
            background-color: #fcfce6; /* warna biru muda */
        }
    </style>
</head>

<body>
    <h1>Detail Jabatan</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <td>{{ $positions->id }}</td>
        </tr>
        <tr>
            <th>Position Name</th>
            <td>{{ $positions->nama_jabatan }}</td>
        </tr>
        <tr>
            <th>Main Salary</th>
            <td>$ {{ number_format($positions->gaji_pokok, 2, '.', ',') }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $positions->created_at->format('Y-m-d') }}</td>
        </tr>
        <tr>
            <th>Last Updated</th>
            <td>{{ $positions->updated_at->format('Y-m-d') }}</td>
        </tr>
    </table>
</body>

</html>