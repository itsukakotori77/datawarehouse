<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ csrf_token() }}" name="csrf_token">
    <title>Sistem Reporting UMKM | Kabupaten Bandung Barat</title>

    <!-- Css -->
    @include('layouts.linkcss')

    <!-- CSS -->
    @stack('custom-css')

</head>

<body>
    <div id="app">
        <!-- Sidebar -->
        @include('layouts.sidebar')
        
        <div id="main">
            <!-- Header -->
            @include('layouts.header')

            <!-- Content Header -->
            @yield('content')

            <!-- Footer -->
            @include('layouts.footer')
        </div>
    </div>

    <!-- Script -->
    @include('layouts.linkjs')

    <!-- Custom JS -->
    @stack('custom-js')
</body>

</html>