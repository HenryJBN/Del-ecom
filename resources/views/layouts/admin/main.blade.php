<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title> @yield('title')</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
          <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" type="image/png" href="{{\App\Setting::logo('site_logo','icon')}}">
         <!-- Sweet Alert -->
         {{-- <link href="{{ asset('plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"> --}}
         {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> --}}
         <script src="{{ asset('vendor/sweetalert/sweetalert.all.js')}}"></script>

        <!-- DataTables -->
        <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css')}}">

        <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">

        @yield('css')
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo">
                        <span>
                        <img src="{{\App\Setting::logo('site_logo','smallest')}}" alt="" >
                        </span>
                        <i>
                            <img src="{{\App\Setting::logo('site_logo','icon')}}" alt="" >
                            {{-- <img src="{{ asset('assets/images/logo-sm.png')}}" alt="" height="22"> --}}
                        </i>
                    </a>
                </div>

              @include('layouts.admin.nav')
            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                  @include('layouts.admin.sidebar')

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">


                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                <h4 class="page-title"> {{$result = $PageTitle != null ? $PageTitle : 'Del-York'}}</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Welcome to  Del-York</li>
                                    </ol>

                                    <div class="state-information d-none d-sm-block">
                                        <div class="state-graph">
                                            <div id="header-chart-1"></div>
                                            <div class="info">Balance $ 2,317</div>
                                        </div>
                                        <div class="state-graph">
                                            <div id="header-chart-2"></div>
                                            <div class="info">Item Sold 1230</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                      @include('sweetalert::alert')







                    @yield('content')

    <!-- end page content-->
                </div> <!-- content -->

                <footer class="footer">
                    © {{date('Y')}}  {{ \App\Setting::siteInfo()->get('site_title')}} <span class="d-none d-sm-inline-block">- Crafted with <i class="mdi mdi-heart text-danger"></i> by Donsoft.</span>
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
            <!-- Plugins css -->
            <link href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">


        <!-- jQuery  -->
          <!-- jQuery  -->
          <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
          <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
          <script src="{{ asset('assets/js/metisMenu.min.js')}}"></script>
          <script src="{{ asset('assets/js/jquery.slimscroll.js')}}"></script>
          <script src="{{ asset('assets/js/waves.min.js')}}"></script>

          <script src="{{ asset('plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

                            <!-- Required datatable js -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{ asset('plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{ asset('plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{ asset('plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{ asset('plugins/datatables/buttons.print.min.js')}}"></script>
        <script src="{{ asset('plugins/datatables/buttons.colVis.min.js')}}"></script>
        <!-- Responsive examples -->
        <script src="{{ asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

        <!-- Datatable init js -->
        <script src="{{ asset('assets/pages/datatables.init.js')}}"></script>

        <script src="{{ asset('plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}"></script>
          <!-- Peity JS -->
          <script src="{{ asset('plugins/peity/jquery.peity.min.js')}}"></script>

          <script src="{{ asset('plugins/morris/morris.min.js')}}"></script>
          <script src="{{ asset('plugins/raphael/raphael-min.js')}}"></script>

          <script src="{{ asset('assets/pages/dashboard.js')}}"></script>

          <!-- Sweet-Alert  -->
        {{-- <script src="{{ asset('plugins/sweet-alert2/sweetalert2.min.js')}}"></script> --}}
        {{-- <script src="{{ asset('assets/pages/sweet-alert.init.js')}}"></script> --}}


          <!-- App js -->
          <script src="{{ asset('assets/js/app.js')}}"></script>

        <!-- Parsley js -->
        <script src="{{ asset('plugins/parsleyjs/parsley.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('form').parsley();
    });
</script>

          @yield('js')
    </body>

</html>
