<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Departemen</title>
    <style>
        body {
            background-color: #fcfce6; /* warna biru muda */
        }
    </style>
</head>

<body>
    <h2>Edit Data Departemen</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <td>{{ $departments->id }}</td>
        </tr>
    </table>

    <form action="{{ route('departments.update', $departments->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>Nama Departemen</td>
                <td>
                    <input type="text" name="nama_departemen"
                        value="{{ old('nama_departemen', $departments->nama_departemen) }}" required>
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