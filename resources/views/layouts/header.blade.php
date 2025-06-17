<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->


<!-- Mirrored from themesflat.co/html/remos/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Dec 2024 18:12:21 GMT -->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Dashboard</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <meta name="author" content="themesflat.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstraps.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">



    <!-- Font -->
    <link rel="stylesheet" href="{{ asset('fonts/fonts.css')}}">

    <!-- Icon -->
    <link rel="stylesheet" href="{{ asset('icon/style.css')}}">

    <!-- Favicon and Touch Icons  -->
  
</head>

<body class="body">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <!-- layout-wrap -->
           <div class="layout-wrap">
                <!-- preload -->
                <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div>
                <!-- /preload -->
                 
                <!-- section-menu-left -->
                <div class="section-menu-left">
                    <div class="box-logo">

                        <div class="button-show-hide">
                            <i class="icon-menu-left"></i>
                        </div>
                    </div>

                    <div class="section-menu-left-wrap">
                        <div class="center">
                            <div class="center-item">
                                <ul class="menu-list">
                                    <li class="menu-item">
                                    <a href="{{ route('dashboard') }}" class="">
                                            <div class="icon"><i class="icon-grid"></i></div>
                                            <div class="text">Dashboard</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                            
                            <div class="center-item">
                                <ul class="menu-list">
                                    <!-- Add Hotel -->
                                    <li class="menu-item">
                                        <a class="menu-item-button" href="{{ route('addHotel') }}">
                                            <div class="icon"><i class="fa-solid fa-hotel"></i></div> <!-- Hotel icon -->
                                            <div class="text">Add Hotel</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="center-item">
                                <ul class="menu-list">
                                    <!-- Manage Hotel -->
                                    <li class="menu-item">
                                        <a class="menu-item-button" href="{{ route('manageHotel') }}">
                                            <div class="icon"><i class="fa-solid fa-gear"></i></div> <!-- Gear/settings icon -->
                                            <div class="text">Manage Hotel</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>


                            <div class="center-item">
                                <ul class="menu-list">
                                    <li class="menu-item">
                                        <a class="menu-item-button" href="{{ route('addRoom') }}">
                                            <div class="icon"><i class="fa-solid fa-bed"></i></div> <!-- Bed icon -->
                                            <div class="text">Add Room</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="center-item">
                                <ul class="menu-list">
                                    <li class="menu-item">
                                        <a class="menu-item-button" href="{{ route('manageRoom') }}">
                                            <div class="icon"><i class="fa-solid fa-door-open"></i></div> <!-- Door icon -->
                                            <div class="text">Manage Room</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>



                            

                            

                           


                            <div class="center-item">
                                <ul class="menu-list">
                                    <li class="menu-item">
                                        <a class="menu-item-button" href="{{ route('logout') }}">
                                            <div class="icon"><i class="fa-solid fa-right-from-bracket"></i></div> <!-- Logout icon -->
                                            <div class="text">Log Out</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>


                            
                            
                        </div>
                    </div>
                </div>
                <!-- /section-menu-left -->
          

                <!-- /section-menu-left -->
                  <!-- section-content-right -->
                  <div class="section-content-right">
                    <!-- header-dashboard -->
                    <div class="header-dashboard">
                        <div class="wrap">
                            <div class="header-left">
                                
                                <div class="button-show-hide">
                                    <i class="icon-menu-left"></i>
                                </div>
                            </div>
                            <div class="header-grid">
                                <div class="header-item button-dark-light">
                                    <i class="icon-moon"></i>
                                </div>
                                <div class="header-item button-zoom-maximize">
                                    <div class="">
                                        <i class="icon-maximize"></i>
                                    </div>
                                </div>
                                <div class="popup-wrap user type-header">
                                    <div class="dropdown">
                                    @if (Auth::check())
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-user wg-user">
                                                <span class="image">
                                                    <img src="{{ asset('images/avatar/user-1.png')}}" alt="">
                                                </span>
                                                <span class="flex flex-column">
                                                    <span class="body-title mb-2">{{ Auth::user()->name }}</span>
                                                </span>
                                            </span>
                                        </button>
                                    @else
                                        <script>
                                            window.location.href = "{{ route('login') }}"; // Redirect to login page
                                        </script>
                                    @endif

                                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton3" >
                                            <li>
                                            <a href="{{ route('logout') }}" class="user-item">
                                            <div class="icon">
                                                        <i class="icon-log-out"></i>
                                                    </div>
                                                    <div class="body-title-2">Log out</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
