<!DOCTYPE html>
<html lang="en">

<!-- For RTL verison -->
<!-- <html lang="en" dir="rtl"> -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>AdminLTE 4 | Dashboard 2</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE 4 | Dashboard 2">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
    <!-- By adding {{ asset('/') }}css/dark/adminlte-dark-addon.css then the page supports both dark color schemes, and the page author prefers / default is light. -->
    <meta name="color-scheme" content="light dark">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- By adding {{ asset('/') }}css/dark/adminlte-dark-addon.css then the page supports both dark color schemes, and the page author prefers / default is dark. -->
    <!-- <meta name="color-scheme" content="dark light"> -->

    <!-- OPTIONAL LINKS -->
    @yield('style')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@1.13.1/css/OverlayScrollbars.min.css" integrity="sha256-WKijf8KI68sbq8Znd6yMepIuFF0wdWfIt6gk3JWcQfk=" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css" integrity="sha256-mUZM63G8m73Mcidfrv5E+Y61y7a12O5mW4ezU3bxqW4=" crossorigin="anonymous">

    <!-- REQUIRED LINKS -->

    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/solid.css" integrity="sha384-wnAC7ln+XN0UKdcPvJvtqIH3jOjs9pnKnq9qX68ImXvOGz2JuFoEiCjT8jyZQX2z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css" integrity="sha384-HbmWTHay9psM8qyzEKPc8odH4DsOuzdejtnr+OFtDmOcIVnhgReQ4GZBH7uwcjf6" crossorigin="anonymous">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/') }}css/adminlte.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/jquery.skedTape.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/jquery.skedtape.css">

    <!-- For RTL verison use {{ asset('/') }}css/rtl/adminlte.rtl.css, remove dist/css/adminlte.css -->
    <!-- <link rel="stylesheet" href="{{ asset('/') }}css/rtl/adminlte.rtl.css""> -->

    <!-- For dark mode use {{ asset('/') }}css/dark/adminlte-dark-addon.css, do not remove dist/css/adminlte.css or if usinf RTL version do not remove {{ asset('/') }}css/rtl/adminlte.rtl.css-->
    <!-- ... and then the alternate CSS first as a snap-on for dark color scheme preference -->
    <!-- <link rel="stylesheet" href="{{ asset('/') }}css/dark/adminlte-dark-addon.css" media="(prefers-color-scheme: dark)""> -->

</head>

<body class="layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light">
            <div class="container-fluid">
                <!-- Start navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar-full" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a href="#" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>

                <!-- End navbar links -->
                <ul class="navbar-nav ms-auto">
                    <!-- Navbar Search -->
                    <li class="nav-item">
                        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                            <i class="fas fa-search"></i>
                        </a>
                    </li>

                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#">
                            <i class="far fa-comments"></i>
                            <span class="navbar-badge badge bg-danger">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('/') }}assets/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle me-3">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h3 class="dropdown-item-title">
                                            Brad Diesel
                                            <span class="float-end fs-7 text-danger"><i class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="fs-7">Call me whenever you can...</p>
                                        <p class="fs-7 text-muted"><i class="far fa-clock me-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('/') }}assets/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle me-3">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h3 class="dropdown-item-title">
                                            John Pierce
                                            <span class="float-end fs-7 text-muted"><i class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="fs-7">I got your message bro</p>
                                        <p class="fs-7 text-muted"><i class="far fa-clock me-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('/') }}assets/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle me-3">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h3 class="dropdown-item-title">
                                            Nora Silvester
                                            <span class="float-end fs-7 text-warning"><i class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="fs-7">The subject goes here</p>
                                        <p class="fs-7 text-muted"><i class="far fa-clock me-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                        </div>
                    </li>
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="navbar-badge badge bg-warning">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <span class="dropdown-item dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope me-2"></i> 4 new messages
                                <span class="float-end text-muted fs-7">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users me-2"></i> 8 friend requests
                                <span class="float-end text-muted fs-7">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file me-2"></i> 3 new reports
                                <span class="float-end text-muted fs-7">2 days</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ asset('/') }}assets/img/user2-160x160.jpg" class="user-image img-circle shadow" alt="User Image">
                            <span class="d-none d-md-inline">Alexander Pierce</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <!-- User image -->
                            <li class="user-header bg-primary">
                                <img src="{{ asset('/') }}assets/img/user2-160x160.jpg" class="img-circle shadow" alt="User Image">

                                <p>
                                    Alexander Pierce - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                <a href="#" class="btn btn-default btn-flat float-end">Sign out</a>
                            </li>
                        </ul>
                    </li>
                    <!-- TODO tackel in v4.1 -->
                    <!-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-bg-dark sidebar-color-primary shadow">
            <div class="brand-container">
                <a href="javascript:;" class="brand-link">
                    <img src="{{ asset('/') }}assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-80 shadow">
                    <span class="brand-text fw-light">AdminLTE 4</span>
                </a>
                <a class="pushmenu mx-1" data-lte-toggle="sidebar-mini" href="javascript:;" role="button"><i class="fas fa-bars"></i></a>
            </div>
            @include('layout.menu')
            <!-- Sidebar -->
        </aside>

        <!-- Main content -->
        <main class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <div class="fs-3">@yield('judul')</div>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@yield('judul')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                @yield('content')
            </div>
        </main>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the end -->
            <div class="float-end d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the start -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

    </div>
    <!--  {{ asset('/') }}wrapper -->

    <!-- OPTIONAL SCRIPTS -->
    <!-- overlayScrollbars -->

    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@1.13.1/js/OverlayScrollbars.min.js" integrity="sha256-7mHsZb07yMyUmZE5PP1ayiSGILxT6KyU+a/kTDCWHA8=" crossorigin="anonymous"></script>
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha256-9SEPo+fwJFpMUet/KACSwO+Z/dKMReF9q4zFhU/fT9M=" crossorigin="anonymous"></script>

    <!-- REQUIRED SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    @yield('script')
    <!-- AdminLTE App -->
    <script src="{{ asset('/') }}js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->

    <script>
        const SELECTOR_SIDEBAR = '.sidebar'
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave'
        }
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof OverlayScrollbars !== 'undefined') {
                OverlayScrollbars(document.querySelectorAll(SELECTOR_SIDEBAR), {
                    className: Default.scrollbarTheme,
                    sizeAutoCapable: true,
                    scrollbars: {
                        autoHide: Default.scrollbarAutoHide,
                        clickScrolling: true
                    }
                })
            }
        })
    </script>


    <!-- OPTIONAL SCRIPTS -->

    <!-- ChartJS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js" integrity="sha256-7lWo7cjrrponRJcS6bc8isfsPDwSKoaYfGIHgSheQkk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
