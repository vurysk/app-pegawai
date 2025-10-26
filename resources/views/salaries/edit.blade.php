<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Salary Record</title>
    <style>
        body {
            background-color: #fcfce6;
        }
    </style>
</head>

<body>
    <h2>Edit Salary Record</h2>
    <form action="{{ route('salaries.update', $salaries->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>Employee</td>
                <td>
                    <select name="karyawan_id">
                        @foreach ($employees as $emp)
                            <option value="{{ $emp->id }}"
                                {{ old('karyawan_id', $salaries->karyawan_id) == $emp->id ? 'selected' : '' }}>
                                {{ $emp->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Month</td>
                <td><input type="text" name="bulan" value="{{ old('bulan', $salaries->bulan) }}"></td>
            </tr>
            <tr>
                <td>Base Salary</td>
                <td><input type="number" step="0.01" name="gaji_pokok" value="{{ old('gaji_pokok', $salaries->gaji_pokok) }}"></td>
            </tr>
            <tr>
                <td>Allowance</td>
                <td><input type="number" step="0.01" name="tunjangan" value="{{ old('tunjangan', $salaries->tunjangan) }}"></td>
            </tr>
            <tr>
                <td>Deductions</td>
                <td><input type="number" step="0.01" name="potongan" value="{{ old('potongan', $salaries->potongan) }}"></td>
            </tr>
            <tr>
                <td>Total Salary</td>
                <td><input type="number" step="0.01" name="total_gaji" value="{{ old('total_gaji', $salaries->total_gaji) }}"></td>
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