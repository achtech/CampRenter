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
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}"  type='image/x-icon'>
    <title>Campunit</title>
    <!-- Custom CSS -->
    <link href="{{ asset('assets/admin/libs/bootstrap/dist/css/bootstrap.min.css') }}"></link>
    <link href="{{ asset('assets/admin/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.0/jquery.fancybox.min.css" rel="stylesheet" />
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.0/jquery.fancybox.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.0/jquery.fancybox.min.css">
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
                        <a href="{{route('dashboard')}}">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="{{ asset('assets/admin/images/logo-icon.png') }}" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="{{ asset('assets/admin/images/logo-icon.png') }}" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->

                        </a>
                    </div>

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
                        <h3>{{$titlePage}}</h3>
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
                                <span><i data-feather="mail" class="svg-icon"></i></span>
                                @if(App\Http\Controllers\Controller::getMessageCount()!=0)
                                    <span class="badge badge-primary notify-no rounded-circle">{{App\Http\Controllers\Controller::getMessageCount()}}</span>
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="message-center notifications position-relative" style="width: 194px !important;">
                                            <!-- Message -->
                                            @if(App\Http\Controllers\Controller::getMessageCount() == 0)
                                                <div class="w-2 d-inline-block v-middle pl-1">
                                                    <span class="message-item d-flex align-items-center border-bottom px-3 py-2">{{__('backend.No Messages')}}</span>
                                                </div>
                                            @else
                                                @foreach(App\Http\Controllers\Controller::getNotReadedMessages() as $msg)
                                                    <a href="{{route('message.show',$msg->id)}}"
                                                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                        <span class="btn btn-primary rounded-circle btn-circle"><i
                                                                data-feather="box" class="text-white"></i></span>
                                                        <div class="w-75 d-inline-block v-middle pl-2">
                                                            <h6 class="message-title mb-0 mt-1">{{$msg->full_name}}</h6> <span
                                                                class="font-12 text-nowrap d-block text-muted">{{$msg->subject}}</span>
                                                            <span class="font-12 text-nowrap d-block text-muted">{{$msg->send_date}}</span>
                                                        </div>
                                                    </a>
                                                @endforeach
                                            @endif
                                            <!-- Message -->
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                                id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span><i data-feather="bell" class="svg-icon"></i></span>
                            @if(App\Http\Controllers\Controller::getCampersCount()!=0)
                                <span class="badge badge-primary notify-no rounded-circle">{{App\Http\Controllers\Controller::getCampersCount()}}</span>
                            @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="message-center notifications position-relative">
                                        @if(count(App\Http\Controllers\Controller::getNotConfirmedcampers())==0)
                                            <a href="{{route('message.index')}}"
                                                    class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                    <span class="btn btn-primary rounded-circle btn-circle"><i
                                                            data-feather="box" class="text-white"></i></span>
                                                    <div class="w-75 d-inline-block v-middle pl-2">
                                                       <span class="font-12 text-nowrap d-block text-muted">{{__('backend.No data found')}}</span>
                                                    </div>
                                                </a>
                                            @else
                                                @foreach(App\Http\Controllers\Controller::getNotConfirmedcampers() as $camps)
                                                    <a href="{{route('camper.detail',$camps->id)}}"
                                                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                        <span class="btn btn-primary rounded-circle btn-circle"><i
                                                                data-feather="box" class="text-white"></i></span>
                                                        <div class="w-75 d-inline-block v-middle pl-2">
                                                            <h6 class="message-title mb-0 mt-1">{{$camps->client_last_name." ".$camps->client_name}}</h6> <span
                                                                class="font-12 text-nowrap d-block text-muted">{{(app()->getLocale()== 'fr' ? $camps->label_fr : (app()->getLocale()== 'en' ? $camps->label_en : $camps->label_de))}}</span>
                                                            <span class="font-12 text-nowrap d-block text-muted">{{date('j F Y', strtotime($camps->created_at))}}</span>
                                                        </div>
                                                    </a>
                                                @endforeach
                                            @endif
                                            <!-- Message -->
                                        </div>
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
                                <img src="{{ asset('assets/admin/images/users')}}/{{auth()->user()->picture ?? '1.jpg'}}" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>{{__('backend.Hello')}},</span> <span
                                        class="text-dark">{{auth()->user()->name}}</span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="{{route('user.profile')}}"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout')}}"><i data-feather="power"
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
                                    <a class="form-control" style="display:unset !important;padding:5px;color:@if(app()->getLocale()=='en') black;@endif"
                                        href="{{ url('lang/en') }}" class="dropdown-item">En</a>
                                    <a class="form-control" style="display:unset !important;padding:5px;color:@if(app()->getLocale()=='de') black;@endif"
                                        href="{{ url('lang/de') }}" class="dropdown-item">DE</a>
                                    <a class="form-control" style="display:unset !important;padding:5px;color:@if(app()->getLocale()=='fr') black;@endif"
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
                            href="{{route('dashboard')}}"
                            aria-expanded="false">
                            <i class="icon-home"></i>
                            <span class="hide-menu">
                            {{ __('backend.Dashboard') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item{{ $activePage == 'camper' ? ' selected' : '' }}">
                        <a class="sidebar-link sidebar-link" href="{{route('camper.index')}}" aria-expanded="false">
                        <i class="icon-grid"></i>
                            <span class="hide-menu">{{ __('backend.menu_campers') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item">

                    </li>
                    <li class="sidebar-item{{ $activePage == 'booking' ? ' selected' : '' }}">
                        <a class="sidebar-link sidebar-link" href="{{route('booking.index')}}" aria-expanded="false">
                        <i class="icon-wallet"></i>
                            <span class="hide-menu">{{ __('backend.menu_booking') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item{{ $activePage == 'billing' ? ' selected' : '' }}">
                        <a class="sidebar-link sidebar-link" href="{{route('billing.index')}}" aria-expanded="false">
                            <i class="fas fa-money-bill-alt"></i>
                            <span class="hide-menu">{{ __('backend.billings') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item{{ $activePage == 'client' ? ' selected' : '' }}">
                        <a class="sidebar-link sidebar-link" href="{{route('admin.client.index')}}" aria-expanded="false">
                        <i class="icon-people"></i>
                            <span class="hide-menu"> {{ __('backend.menu_clients') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item{{ $activePage == 'blog' ? ' selected' : '' }}">
                        <a class="sidebar-link sidebar-link" href="{{route('admin.blog.index')}}" aria-expanded="false">
                        <i class="fab fa-blogger-b"></i>
                            <span class="hide-menu"> {{ __('backend.menu_blog') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item{{ $activePage == 'insurance' ? ' selected' : '' }}">
                        <a class="sidebar-link sidebar-link" href="{{route('insurance.index')}}" aria-expanded="false">
                        <i class="icon-book-open"></i>
                            <span class="hide-menu">{{ __('backend.menu_insurances') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item{{ $activePage == 'message' ? ' selected' : '' }}">
                        <a class="sidebar-link sidebar-link"
                            href="{{route('message.index')}}"
                            aria-expanded="false">
                            <i class="icon-bubble"></i>
                            <span class="hide-menu">{{ __('backend.menu_message') }} </span>
                        </a>
                    </li>
                    @if(auth()->user()->role == 'super-admin')
                        <li class="sidebar-item{{ $activePage == 'user' ? ' selected' : '' }}">
                            <a class="sidebar-link sidebar-link" href="{{route('user.index')}}" aria-expanded="false">
                            <i class="icon-user"></i>
                                <span class="hide-menu"> {{ __('backend.menu_user_managment') }}</span>
                            </a>
                        </li>
                    @endif
                    <li class="sidebar-item {{ $activePage == 'profile' || $activePage == 'promotion' || $activePage == 'licenceCategory' || $activePage == 'camperCategory' || $activePage == 'camperSubCategory' || $activePage == 'insurance_company' || $activePage == 'transmission' || $activePage == 'fuel' || $activePage == 'avatar' || $activePage == 'backup' ? ' selected' : '' }}">
                        <a class="sidebar-link has-arrow" aria-expanded="false">
                        <i class="icon-settings"></i>
                            <span class="hide-menu">{{ __('backend.menu_settings') }}</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line {{ $activePage == 'profile' || $activePage == 'promotion' || $activePage == 'licenceCategory' || $activePage == 'camperCategory'  || $activePage == 'camperSubCategory'|| $activePage == 'insurance_company' || $activePage == 'transmission' || $activePage == 'fuel' || $activePage == 'avatar' || $activePage == 'backup' ? ' in' : '' }}">
                            <li class="sidebar-item {{$activePage == 'profile' || $activePage == 'user' ? 'active' : ''}}"><a href="{{route('user.profile')}}" class="sidebar-link {{$activePage == 'profile' || $activePage == 'user' ? 'active' : ''}}"><span
                                        class="hide-menu"> {{ __('backend.menu_profil') }}
                                        </span></a>
                            </li>
                            @if(auth()->user()->role == 'super-admin')
                            <li class="sidebar-item {{$activePage == 'promotion' ? 'active' : ''}}"><a href="{{route('promotion.index')}}" class="sidebar-link {{$activePage == 'promotion' ? 'active' : ''}}"><span
                                class="hide-menu">{{ __('backend.menu_promotion') }}
                                    </span></a>
                            </li>
                            @endif
                            <li class="sidebar-item {{$activePage == 'avatar' ? 'active' : ''}}"><a href="{{route('avatar.index')}}" class="sidebar-link {{$activePage == 'avatar' ? 'active' : ''}}"><span
                                            class="hide-menu">  {{ __('backend.menu_avatars') }}
                                    </span></a>
                            </li>
                            <li class="sidebar-item {{$activePage == 'camperCategory' ? 'active' : ''}}"><a  href="{{route('camperCategory.index')}}" class="sidebar-link {{$activePage == 'camperCategory' ? 'active' : ''}}"><span
                                            class="hide-menu"> {{ __('backend.menu_camper_category') }}
                                    </span></a>
                            </li>
                            <li class="sidebar-item {{$activePage == 'camperSubCategory' ? 'active' : ''}}"><a  href="{{route('camperSubCategory.index')}}" class="sidebar-link {{$activePage == 'camperSubCategory' ? 'active' : ''}}"><span
                                            class="hide-menu"> {{ __('backend.menu_camper_sub_category') }}
                                    </span></a>
                            </li>
                            <li class="sidebar-item {{$activePage == 'licenceCategory' ? 'active' : ''}}"><a href="{{route('licenceCategory.index')}}" class="sidebar-link {{$activePage == 'licenceCategory' ? 'active' : ''}}"><span
                                        class="hide-menu">{{ __('backend.menu_licence_category') }}
                                    </span></a>
                            </li>
                            <li class="sidebar-item {{$activePage == 'insurance_company' ? 'active' : ''}}">
                                <a href="{{route('inssuranceCompany.index')}}" class="sidebar-link {{$activePage == 'insurance_company' ? 'active' : ''}}">
                                    <span class="hide-menu">{{ __('backend.menu_inssurance_providers') }}</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{$activePage == 'fuel' ? 'active' : ''}}">
                                <a href="{{route('fuel.index')}}"
                                   class="sidebar-link {{$activePage == 'fuel' ? 'active' : ''}}">
                                       <span  class="hide-menu"> {{ __('backend.menu_fuels') }}</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{$activePage == 'transmission' ? 'active' : ''}}">
                                <a href="{{route('transmission.index')}}"
                                    class="sidebar-link {{$activePage == 'transmission' ? 'active' : ''}}">
                                        <span class="hide-menu"> {{ __('backend.menu_transmissions') }}</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{$activePage == 'backup' ? 'active' : ''}}"><a href="{{route('backup.index')}}" class="sidebar-link {{$activePage == 'backup' ? 'active' : ''}}">
                                <span class="hide-menu"> {{ __('backend.menu_backup') }}
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
    <script src="{{ asset('assets/admin/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('assets/admin/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('assets/admin/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('assets/admin/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboards/dashboard1.min.js') }}"></script>
      <!--This page plugins -->
    <script src="{{ asset('assets/admin/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
    <script>
        $(function () {
            $(document).on('keypress', "#textarea1", function (e) {
                if (e.keyCode == 13) {
                    var id = $(this).attr("data-user-id");
                    var msg = $(this).val();
                    msg = msg_sent(msg);
                    $("#someDiv").append(msg);
                    $(this).val("");
                    $(this).focus();
                }
            });
        });
    </script>
</body>

</html>
