<!DOCTYPE html>
<html>
<head>
    <title>Detail Departemen</title>
</head>
<body>
    <h1>Detail Departemen</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <td>{{ $departments->id }}</td>
        </tr>
        <tr>
            <th>Department Name</th>
            <td>{{ $departments->nama_departemen }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $departments->created_at->format('Y-m-d') }}</td>
        </tr>
        <tr>
            <th>Last Update</th>
            <td>{{ $departments->updated_at->format('Y-m-d') }}</td>
        </tr>
    </table>
</body>
</html>
