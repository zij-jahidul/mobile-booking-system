<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Highdmin - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('admin') }}/images/favicon.ico">

        <!-- App css -->
        <link href="{{ asset('admin') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
        @yield('admin_css')




    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts.admin_layout.admin_sidebar')
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                <!-- Top Bar Start -->
                @include('layouts.admin_layout.admin_header')
                <!-- Top Bar End -->



                <!-- Start Page content -->
                @yield('content')


                @include('layouts.admin_layout.admin_footer')


            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="{{ asset('admin') }}/js/jquery.min.js"></script>
        <script src="{{ asset('admin') }}/js/popper.min.js"></script>
        <script src="{{ asset('admin') }}/js/bootstrap.min.js"></script>
        <script src="{{ asset('admin') }}/js/metisMenu.min.js"></script>
        <script src="{{ asset('admin') }}/js/waves.js"></script>
        <script src="{{ asset('admin') }}/js/jquery.slimscroll.js"></script>

        <!-- Flot chart -->
        {{-- <script src="../plugins/flot-chart/jquery.flot.min.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.crosshair.js"></script>
        <script src="../plugins/flot-chart/curvedLines.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.axislabels.js"></script> --}}

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="../plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="../plugins/jquery-knob/jquery.knob.js"></script>

        <!-- Dashboard Init -->
        <script src="{{ asset('admin') }}/pages/jquery.dashboard.init.js"></script>

        <!-- App js -->
        <script src="{{ asset('admin') }}/js/jquery.core.js"></script>
        <script src="{{ asset('admin') }}/js/jquery.app.js"></script>

        <script src="{{ url('js/admin_js/admin_script.js') }}"></script>


        @yield('admin_script')




    </body>
</html>
