<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | NandiniPANEL</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('vendors/adminlte') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendors/adminlte') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{ asset('vendors/adminlte') }}/dist/css/adminlte.min.css">
    @stack('css')
</head>

{{--

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"> --}}

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">

            {{-- <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__wobble" src="{{ asset('vendors/adminlte') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
            </div> --}}

            {{-- <nav class="main-header navbar navbar-expand navbar-dark"> --}}
                <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                        </li>
                        @yield('nav_button')
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="nav-link btn btn-default btn-sm font-weight-bold text-red border" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                                    Logout <i class="fas fa-sign-out-alt ml-1"></i>
                                </a>
                            </form>
                        </li>
                    </ul>
                </nav>

                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                    <a href="{{ route('index') }}" class="brand-link">
                        <img src="{{ asset('vendors/adminlte') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="brand-text font-weight-light">Nandini<span class="text-white">PANEL</span></span>
                    </a>

                    <div class="sidebar">
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                                <li class="nav-header">GENERAL</li>

                                <li class="nav-item">
                                    <a href="{{ route('index') }}" class="nav-link @yield('dashboard_active')">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <span>
                                            Dashboard
                                        </span>
                                    </a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </aside>

                <div class="content-wrapper">
                    @yield('title_breadcrumb')

                    {{ $slot }}

                </div>

                <footer class="main-footer text-sm">
                    <strong>Nandini Jungle Resort</strong> &copy; 2022 | Created with <i class="fas fa-heart"></i> by <a href="https://instagram.com/a_dev.id" target="_blank" class="font-weight-bold">a-dev</a>. Template by <a href="https://adminlte.io" target="_blank">AdminLTE.io</a>.
                </footer>
        </div>

        <script src="{{ asset('vendors/adminlte') }}/plugins/jquery/jquery.min.js"></script>
        <script src="{{ asset('vendors/adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('vendors/adminlte') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="{{ asset('vendors/adminlte') }}/dist/js/adminlte.js"></script>
        @stack('js')
    </body>

</html>