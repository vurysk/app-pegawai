<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Input Form</title>
    <style>
        body {
            background-color: #fcfce6;
        }
    </style>
</head>

<body>
    <h1 class="mb-4">Salary Form</h1>
    <form action="{{ route('salaries.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="karyawan_id">Employee:</label></td>
                <td>
                    <select name="karyawan_id" id="karyawan_id">
                        @foreach ($employees as $emp)
                            <option value="{{ $emp->id }}" {{ old('karyawan_id') == $emp->id ? 'selected' : '' }}>
                                {{ $emp->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="bulan">Month:</label></td>
                <td><input type="text" id="bulan" name="bulan" value="{{ old('bulan') }}"></td>
            </tr>
            <tr>
                <td><label for="gaji_pokok">Base Salary:</label></td>
                <td><input type="number" step="0.01" id="gaji_pokok" name="gaji_pokok" value="{{ old('gaji_pokok') }}"></td>
            </tr>
            <tr>
                <td><label for="tunjangan">Allowance:</label></td>
                <td><input type="number" step="0.01" id="tunjangan" name="tunjangan" value="{{ old('tunjangan', 0) }}"></td>
            </tr>
            <tr>
                <td><label for="potongan">Deduction:</label></td>
                <td><input type="number" step="0.01" id="potongan" name="potongan" value="{{ old('potongan', 0) }}"></td>
            </tr>
            <tr>
                <td><label for="total_gaji">Total Salary:</label></td>
                <td><input type="number" step="0.01" id="total_gaji" name="total_gaji" value="{{ old('total_gaji') }}"></td>
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