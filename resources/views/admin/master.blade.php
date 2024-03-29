<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    {{--<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">--}}
    {{--<link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ url('/') }}">


    <title>
        @yield('title') - School Management System
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    {{--<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />--}}
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link  rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"  />
    <link rel="stylesheet" href="{{ asset('assets/css/now-ui-dashboard.css?v=1.2.0') }}"  />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('assets/demo/demo.css') }}"  />
    <link rel="stylesheet" href="{{ asset('css/native-toast.css') }}"  />

</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="orange">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
        <div class="logo">
            <a href="#" class="simple-text logo-mini">
                SMS
            </a>
            <a href="#" class="simple-text logo-normal">
                SCH-MGT-SYS
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li>
                    <a href="{{url('admin/dashboard')}}">
                        <i class="now-ui-icons design_app"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/teachers')}}">
                        <i class="now-ui-icons education_atom"></i>
                        <p>Teachers</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('/admin/students')}}">
                        <i class="now-ui-icons location_map-big"></i>
                        <p>Students</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('/admin/classes')}}">
                        <i class="now-ui-icons ui-1_bell-53"></i>
                        <p>Classes</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('/admin/sessions')}}">
                        <i class="now-ui-icons users_single-02"></i>
                        <p>Sessions</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('/admin/subject_allocation')}}">
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <p>Subject Allocations</p>
                    </a>
                </li>

                <li>
                    <a href="{{url('admin/library_users')}}">
                        <i class="now-ui-icons text_caps-small"></i>
                        <p>Library Users</p>
                    </a>
                </li>

                <li>
                    <a href="{{url('admin/payments')}}">
                        <i class="now-ui-icons business_money-coins"></i>
                        <p>Payments</p>
                    </a>
                </li>
                {{--<li class="active-pro">--}}
                {{--<a href="./upgrade.html">--}}
                {{--<i class="now-ui-icons arrows-1_cloud-download-93"></i>--}}
                {{--<p>Upgrade to PRO</p>--}}
                {{--</a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-transparent  bg-primary  navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="#">@yield('title')</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    {{--<form>--}}
                    {{--<div class="input-group no-border">--}}
                    {{--<input type="text" value="" class="form-control" placeholder="Search...">--}}
                    {{--<div class="input-group-append">--}}
                    {{--<div class="input-group-text">--}}
                    {{--<i class="now-ui-icons ui-1_zoom-bold"></i>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</form>--}}
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            {{--<a class="nav-link" href="#pablo">--}}
                            {{--<i class="now-ui-icons media-2_sound-wave"></i>--}}
                            {{--<p>--}}
                            {{--<span class="d-lg-none d-md-block">Stats</span>--}}
                            {{--</p>--}}
                            {{--</a>--}}
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="now-ui-icons location_world"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Some Actions</span>
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pablo">
                                <i class="now-ui-icons users_single-02"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Account</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="panel-header panel-header-sm">
        </div>
        <div class="content" id="app">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-md-10">
                                    <h3 class="title">@yield('title')</h3>
                                </div>
                                <div class="col-md-2">
                                    @yield('action-button')
                                </div>
                            </div>


                        </div>
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">

                <div class="copyright" id="copyright">
                </div>
            </div>
        </footer>
    </div>
</div>
<!--   Core JS Files   -->
@section('scripts')
    <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Google Maps Plugin    -->
    {{--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>--}}
    <!-- Chart JS -->
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.2.0') }}" ></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('assets/demo/demo.js') }}"></script>
@show
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        // demo.initDashboardPageCharts();
    });

    $(".sidebar-wrapper a").each(function (index,elm) {

        if(window.location.href === elm.href){
            $(elm).parent().addClass('active')
        }
    })




</script>
</body>

</html>
