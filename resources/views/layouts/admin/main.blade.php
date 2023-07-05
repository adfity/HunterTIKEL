<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Hal Admin</title>

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="badmin/assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('badmin/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
        @section('side')
            @include('layouts.admin.inc.side')
        @show
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">

                <!-- Top navigation-->
                @section('header')
                    @include('layouts.admin.inc.header')
                @show
                <!-- Page content-->
                <div class="container-fluid">
                @yield('content')
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('badmin/js/scripts.js') }}"></script>
    </body>
</html>
