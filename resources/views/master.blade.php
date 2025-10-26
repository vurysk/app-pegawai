<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'App Pegawai')</title>
    <style>
        body {
            background-color: #fcfce6;
            /* warna biru muda */
        }
    </style>
</head>

<body>
    <header>
        <h1>@yield('page-title', 'App-pegawai')</h1>
        <nav>
            <ul>
                <li><a href="{{ route('employees.index') }}">Employees</a></li>
                <li><a href="{{ route('departments.index') }}">Departments</a></li>
                <li><a href="{{ route('positions.index') }}">Positions</a></li>
                <li><a href="{{ route('attendances.index') }}">Attendance</a></li>
                <li><a href="{{ route('salaries.index') }}">Salaries</a></li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content');
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} App Pegawai </p>
    </footer>
</body>

</html>
