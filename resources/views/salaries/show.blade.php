<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Details</title>
    <style>
        body {
            background-color: #fcfce6;
        }
    </style>
</head>

<body>
    <h1>Salary Details</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Employee Name</th>
            <td>{{ $salaries->employee->nama_lengkap ?? '-' }}</td>
        </tr>
        <tr>
            <th>Month</th>
            <td>{{ $salaries->bulan }}</td>
        </tr>
        <tr>
            <th>Base Salary</th>
            <td>${{ number_format($salaries->gaji_pokok, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Allowance</th>
            <td>${{ number_format($salaries->tunjangan, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Deductions</th>
            <td>${{ number_format($salaries->potongan, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Total Salary</th>
            <td>${{ number_format($salaries->total_gaji, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $salaries->created_at->format('d-m-Y H:i') }}</td>
        </tr>
        <tr>
            <th>Last Updated</th>
            <td>{{ $salaries->updated_at->format('d-m-Y H:i') }}</td>
        </tr>
    </table>
</body>

</html>