<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Jimmy Parker">
    <link rel="icon" href="{{ url('/images') }}/favicon.png" sizes="16x16" type="image/png">
    <title>Talisay District Hospital Template</title>
    <!-- Custom styles for this template -->
    <link href="{{ url('/css') }}/bootstrap.css" rel="stylesheet">
    <link href="{{ url('/css') }}/font-awesome.css" rel="stylesheet">
    <link href="{{ url('/css') }}/loader.css" rel="stylesheet">
    @yield('css')
</head>

<body>
<div id="loader-wrapper">
    <div id="loader"></div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Withholding<font class="text-yellow">Tax</font></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item {{ ($menu=='home') ? 'active':'' }}">
                    <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="nav-item {{ ($menu=='employee') ? 'active':'' }}">
                    <a class="nav-link" href="{{ url('/employee') }}"><i class="fa fa-users"></i> Employees</a>
                </li>
                <li class="nav-item {{ ($menu=='upload') ? 'active':'' }}">
                    <a class="nav-link" href="#upload" data-toggle="modal"><i class="fa fa-cloud-upload"></i> Upload Payroll</a>
                </li>
                <li class="nav-item dropdown {{ ($menu=='tax') ? 'active':'' }}">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="fa fa-circle-o-notch fa-spin"></i> Manage Tax
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#taxEmployee" data-toggle="modal"><i class="fa fa-user"></i> Per Employee</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/tax/overall') }}"><i class="fa fa-users"></i> All Employees</a>
                    </div>
                </li>

                <li class="nav-item dropdown {{ ($menu=='lib') ? 'active':'' }}">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="fa fa-book"></i> Library
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item {{ (isset($sub) && $sub=='designation') ? 'active':'' }}" href="{{ url('/library/designation') }}"><i class="fa fa-user-circle"></i> Designation</a>
                        <a class="dropdown-item {{ (isset($sub) && $sub=='sg') ? 'active':'' }}" href="{{ url('/library/sg') }}"><i class="fa fa-table"></i> Salary Grade Table</a>
                        <a class="dropdown-item {{ (isset($sub) && $sub=='hazard') ? 'active':'' }}" href="{{ url('/library/hazard') }}"><i class="fa fa-minus-square"></i> Hazard Table</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="fa fa-gears"></i> Settings
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('/user/password') }}"><i class="fa fa-lock mr-1"></i> Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-sign-out mr-1"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Header -->
<header class="bg-success py-3 mb-5">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-12">
                <div class="banner mt-5">
                    <img src="{{ url('/images') }}/banner.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Page Content -->
<div class="wrapper pb-5">
    <div class="container">
        <div class="loading"></div>
        @yield('body')
    </div>
</div>

@yield('modal')
@include('modal.upload')
@include('modal.tax')
<!-- /.container -->
<!-- Footer -->
<footer class="py-md-3 bg-dark footer">
    <div class="container">
        <font class="text-white">Copyright &copy; TDH iHOMP 2020</font>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ url('/js') }}/jquery.min.js"></script>
<script src="{{ url('/js') }}/bootstrap.bundle.min.js"></script>
@yield('js')

<script>
    $(document).ready(function(){

        $(".btn-upload").click(function(){
            $("#loader-wrapper").css('visibility','visible');
            $(this).addClass('disabled');
        });

        $("a[href='#taxEmployee']").on('click',function(){
            $(".taxContent").html('Loading...').load("{{ url('/load/employee/year') }}");
        });
    });
</script>
</body>

</html>
