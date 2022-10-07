<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/libs/css/style.css">
    <link rel="stylesheet" href="/assets/vendor/fontawesome-free/css/all.min.css">
    <title>@yield('title')</title>
    <style>
        ul.navbar-nav li a {
            color: rgb(207, 214, 200) !important;
        }

        ul.navbar-nav li a i {
            color: rgb(207, 214, 200) !important;
        }

        .navbar-brand {
            color: rgb(42, 42, 111) !important;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        @include('layouts._top-nav')
        @include('layouts._side-bar')
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                @yield('main')
            </div>
        </div>
    </div>
        <!-- ============================================================== -->
        <!-- end main wrapper  -->
        <!-- ============================================================== -->
        <!-- Optional JavaScript -->
        <!-- jquery 3.3.1 js-->
        <script src="/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
        <!-- bootstrap bundle js-->
        <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <script src="/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
        <!-- chartjs js-->
        <script src="/assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
        <script src="/assets/vendor/charts/charts-bundle/chartjs.js"></script>

        <!-- main js-->
        <script src="/assets/libs/js/main-js.js"></script>
        <!-- dashboard sales js-->
        <script src="/assets/libs/js/dashboard-sales.js"></script>
</body>

</html>