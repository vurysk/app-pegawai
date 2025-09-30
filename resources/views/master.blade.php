<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'App Pegawai')</title>
</head>

<body>
    <header>
        <h1>@yield('page-title', 'App-pegawai')</h1>
        <nav>
            <ul>
                <li><a href="{{ url('/employee') }}">Employee</a></li>
                <li><a href="{{ url('/department') }}">Department</a></li>
                <li><a href="{{ url('/attendance') }}">Attendance</a></li>
                <li><a href="{{ url('/report') }}">Report</a></li>
                <li><a href="{{ url('/settings') }}">Settings</a></li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content');
    </main>
    <footer>
        <p>&copy; {{  date('Y') }} App Pegawai </p>
    </footer>
</body>

</html>
