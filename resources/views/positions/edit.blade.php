<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Jabatan</title>
    <style>
        body {
            background-color: #fcfce6;
            /* warna biru muda */
        }
    </style>
</head>

<body>
    <h2>Edit Data Jabatan</h2>
    <form action="{{ route('positions.update', $positions->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>Position Name</td>
                <td>
                    <input type="text" name="nama_jabatan" value="{{ old('nama_jabatan', $positions->nama_jabatan) }}"
                        required>
                </td>
            </tr>
            <tr>
                <td>Main Salary</td>
                <td>
                    {{-- <input type="number" name="gaji_pokok" step="0.01" min="0"
                        value="{{ old('gaji_pokok', $positions->gaji_pokok) }}" required> --}}
                    <input type="number" name="gaji_pokok" step="0.01" min="0"
                        value="{{ old('gaji_pokok', $positions->gaji_pokok) }}" placeholder="Contoh: 1200.50">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                    <button type="submit">Update</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
