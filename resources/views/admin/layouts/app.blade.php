<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard - ZimboDelights</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('static/svg/app.svg') }}"/>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="{{ asset('static_admin/dist/icons/bootstrap-icons-1.4.0/bootstrap-icons.min.css') }}" type="text/css">
    <!-- Bootstrap Docs -->
    <link rel="stylesheet" href="{{ asset('static_admin/dist/css/bootstrap-docs.css') }}" type="text/css">

        <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('static_admin/libs/slick/slick.css') }}" type="text/css">

    <!-- Main style file -->
    <link rel="stylesheet" href="{{ asset('static_admin/dist/css/app.min.css') }}" type="text/css">
</head>
<body>

    <!-- preloader -->
    <div class="preloader">
        <div class="preloader-icon"></div>
    </div>
    <!-- ./ preloader -->

    @yield('content')

    <!-- content-footer -->
    <footer class="content-footer">
        <div>© <script>document.write(new Date().getFullYear()) </script> ZimboDelights - <a target="_blank" href="https://coderiam.web.app" target="_blank">Coderiam<~></a></div>
        <div>
            <nav class="nav gap-4">
                <a href="/" class="nav-link">Go Home</a>
            </nav>
        </div>
    </footer>
    <!-- ./ content-footer -->

</div>
<!-- ./ layout-wrapper -->

<!-- Bundle scripts -->
<script src="{{ asset('static_admin/libs/bundle.js') }}"></script>

<!-- Apex chart -->
<script src="{{ asset('static_admin/libs/charts/apex/apexcharts.min.js') }}"></script>

<!-- Slick -->
<script src="{{ asset('static_admin/libs/slick/slick.min.js') }}"></script>

<!-- Examples -->
<script src="{{ asset('static_admin/dist/js/examples/dashboard.js') }}"></script>

<!-- Main Javascript file -->
<script src="{{ asset('static_admin/dist/js/app.min.js') }}"></script>


</body>
</html>
