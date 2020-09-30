<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Adminmart Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="../../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <link href="../../dist/css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.0/jquery.fancybox.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.0/jquery.fancybox.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.0/jquery.fancybox.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

     <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand" style="padding-left: 75px; margin-top: 21px;">
                        <!-- Logo icon -->
                        <a href="index.html">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="../../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="../../assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        
                        <!-- End Notification -->                        
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- Notification -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                                id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span><i data-feather="bell" class="svg-icon"></i></span>
                                <span class="badge badge-primary notify-no rounded-circle">5</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="message-center notifications position-relative">
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <div class="btn btn-danger rounded-circle btn-circle"><i
                                                        data-feather="airplay" class="text-white"></i></div>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Luanch Admin</h6>
                                                    <span class="font-12 text-nowrap d-block text-muted">Just see
                                                        the my new
                                                        admin!</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="btn btn-success text-white rounded-circle btn-circle"><i
                                                        data-feather="calendar" class="text-white"></i></span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Event today</h6>
                                                    <span
                                                        class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                                        a reminder that you have event</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="btn btn-info rounded-circle btn-circle"><i
                                                        data-feather="settings" class="text-white"></i></span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Settings</h6>
                                                    <span
                                                        class="font-12 text-nowrap d-block text-muted text-truncate">You
                                                        can customize this template
                                                        as you want</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="btn btn-primary rounded-circle btn-circle"><i
                                                        data-feather="box" class="text-white"></i></span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Pavan kumar</h6> <span
                                                        class="font-12 text-nowrap d-block text-muted">Just
                                                        see the my admin!</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                                            <strong>Check all notifications</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="../../assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark">Jason Doe</span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                            <div class="nav-link">
                            <div class="customize-input">
                                    <a class="form-control" style="display:unset !important;padding:5px"
                                        href="{{ url('lang/en') }}" class="dropdown-item">En</a>
                                    <a class="form-control" style="display:unset !important;padding:5px"
                                        href="{{ url('lang/de') }}" class="dropdown-item">DE</a>
                                    <a class="form-control" style="display:unset !important;padding:5px"
                                        href="{{ url('lang/fr') }}" class="dropdown-item">FR</a>
                                    
                                </div> </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                    <li class="sidebar-item{{ $activePage == 'dashboard' ? ' selected' : '' }}"> 
                        <a class="sidebar-link sidebar-link" 
                            href="/" 
                            aria-expanded="false">
                            <i class="icon-home"></i>
                            <span class="hide-menu">
                            {{ __('backend.dashboard.lbl') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item{{ $activePage == 'user' ? ' selected' : '' }}"> 
                        <a class="sidebar-link sidebar-link" href="{{route('user.index')}}" aria-expanded="false">
                        <i class="icon-user"></i>
                            <span class="hide-menu"> {{ __('backend.menu_user_managment.lbl') }}</span>
                        </a>
                    </li>
                    
                    <li class="sidebar-item{{ $activePage == 'client' ? ' selected' : '' }}"> 
                        <a class="sidebar-link sidebar-link" href="{{route('client.index')}}" aria-expanded="false">
                        <i class="icon-people"></i>
                            <span class="hide-menu"> {{ __('backend.menu_clients.lbl') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item"> 
                        <a class="sidebar-link sidebar-link" href="{{route('equipment.index')}}" aria-expanded="false">
                        <i class="icon-grid"></i>
                            <span class="hide-menu">{{ __('backend.menu_campers.lbl') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item"> 

                    </li>
                    <li class="sidebar-item{{ $activePage == 'booking' ? ' selected' : '' }}"> 
                        <a class="sidebar-link sidebar-link" href="{{route('booking.index')}}" aria-expanded="false">
                        <i class="icon-wallet"></i>
                            <span class="hide-menu">{{ __('backend.menu_booking.lbl') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item{{ $activePage == 'insurance' ? ' selected' : '' }}"> 
                        <a class="sidebar-link sidebar-link" href="{{route('insurance.index')}}" aria-expanded="false">
                        <i class="icon-book-open"></i>
                            <span class="hide-menu">{{ __('backend.menu_insurances.lbl') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item{{ $activePage == 'billing' ? ' selected' : '' }}"> 
                        <a class="sidebar-link sidebar-link" href="{{route('billing.index')}}" aria-expanded="false">
                            <i class="fas fa-money-bill-alt"></i>
                            <span class="hide-menu">{{ __('backend.billings.lbl') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item{{ $activePage == 'message' ? ' selected' : '' }}"> 
                        <a class="sidebar-link sidebar-link" 
                            href="{{route('message.index')}}" 
                            aria-expanded="false">
                            <i class="icon-bubble"></i>
                            <span class="hide-menu">{{ __('backend.menu_message.lbl') }} </span>
                        </a>
                    </li>
                    <li class="sidebar-item"> 
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="icon-settings"></i>
                            <span class="hide-menu">{{ __('backend.menu_settings.lbl') }}</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="{{route('user.profile')}}" class="sidebar-link"><span
                                        class="hide-menu"> {{ __('backend.menu_profil.lbl') }}
                                    </span></a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('commission.index')}}" class="sidebar-link"><span
                                            class="hide-menu">{{ __('backend.menu_commision.lbl') }}
                                    </span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{route('promotion.index')}}" class="sidebar-link"><span
                                class="hide-menu">{{ __('backend.menu_promotion.lbl') }} 
                        </span></a>
                </li>
                            <li class="sidebar-item"><a href="{{route('licenceCategory.index')}}" class="sidebar-link"><span
                                        class="hide-menu">{{ __('backend.menu_licence_category.lbl') }} 
                                    </span></a>
                            </li>
                            <li class="sidebar-item"><a  href="{{route('equipmentCategory.index')}}" class="sidebar-link"><span
                                            class="hide-menu"> {{ __('backend.menu_equipment_category.lbl') }} 
                                    </span></a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link sidebar-link" href="{{route('inssuranceCompany.index')}}" class="sidebar-link">
                                    <span class="hide-menu">{{ __('backend.menu_inssurance_providers.lbl') }}</span>
                                </a>
                            </li>
                            <li class="sidebar-item"><a href="{{route('transmission.index')}}" class="sidebar-link"><span
                                            class="hide-menu"> {{ __('backend.menu_transmissions.lbl') }}
                                    </span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{route('fuel.index')}}" class="sidebar-link"><span
                                            class="hide-menu"> {{ __('backend.menu_fuels.lbl') }}
                                    </span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{route('avatar.index')}}" class="sidebar-link"><span
                                            class="hide-menu">  {{ __('backend.menu_avatars.lbl') }}
                                    </span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{route('avatar.index')}}" class="sidebar-link">
                                <span class="hide-menu"> {{ __('backend.menu_backup.lbl') }}
                                    </span></a>
                            </li>
                        </ul>
                    </li>
                    
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                All Rights Reserved . Designed and Developed by <a
                    href="https://software.sarl">Software</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../../dist/js/app-style-switcher.js"></script>
    <script src="../../dist/js/feather.min.js"></script>
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../dist/js/pages/dashboards/dashboard1.min.js"></script>
      <!--This page plugins -->
    <script src="../../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../dist/js/pages/datatable/datatable-basic.init.js"></script>
</body>

</html>