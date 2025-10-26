<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Input Jabatan</title>
    <style>
        body {
            background-color: #fcfce6; /* warna biru muda */
        }
    </style>
</head>

<body>
    <h1 class="mb-4">Form Jabatan</h1>
    <form action="{{ route('positions.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="nama_jabatan">Position Name</label></td>
                <td><input type="text" id="nama_jabatan" name="nama_jabatan" required></td>
            </tr>
            <tr>
                <td><label for="gaji_pokok">Main Salary:</label></td>
                <td><input type="number" id="gaji_pokok" name="gaji_pokok" min="0" required></td>
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