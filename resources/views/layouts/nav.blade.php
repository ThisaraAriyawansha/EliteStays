<div class="header" style="border-bottom: 1px solid #e0e6ed;" id="mainNavbar">
    <div class="container-fluid px-lg-3">
        <nav class="navbar navbar-expand-lg navbar-light py-0" style="min-height: 10px;">
            <!-- Brand Logo -->
            <a class="navbar-brand" href="{{ route('home') }}">
                <span class="brand-text" style="color: #2a4b7c; font-weight: 600; font-size: 1.1rem;">EliteStays</span>
            </a>
            
            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" style="padding: 0.25rem 0.5rem;">
                <span class="navbar-toggler-icon" style="width: 1.2em; height: 1.2em;"></span>
            </button>

            <!-- Navigation Content -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <!-- Main Menu -->
                <ul class="navbar-nav me-auto mb-1 mb-lg-0" style="margin-left: 15px;">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" 
                           href="{{ route('home') }}" 
                           style="color: #4a6b8a; padding: 6px 10px; font-size: 0.8rem;">
                           <i class="fa-solid fa-home me-1" style="font-size: 0.75rem;"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('flights') ? 'active' : '' }}" 
                           href="{{ route('flights') }}" 
                           style="color: #4a6b8a; padding: 6px 10px; font-size: 0.8rem;">
                           <i class="fa-solid fa-plane me-1" style="font-size: 0.75rem;"></i> Flights
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('hotelFilter') ? 'active' : '' }}" 
                           href="{{ route('hotelFilter') }}" 
                           style="color: #4a6b8a; padding: 6px 10px; font-size: 0.8rem;">
                           <i class="fa-solid fa-hotel me-1" style="font-size: 0.75rem;"></i> Hotels
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('property') ? 'active' : '' }}" 
                           href="{{ route('property') }}" 
                           style="color: #4a6b8a; padding: 6px 10px; font-size: 0.8rem;">
                           <i class="fa-solid fa-house-user me-1" style="font-size: 0.75rem;"></i> Rentals
                        </a>
                    </li>
                </ul>

                <!-- Right Side Elements -->
                <div class="d-flex align-items-center">
                    <!-- Language Selector -->
                    <div class="dropdown me-2">
                        <a class="btn btn-sm dropdown-toggle py-0 px-2" 
                           href="#" 
                           role="button" 
                           id="languageDropdown" 
                           data-bs-toggle="dropdown"
                           style="color: #4a6b8a; border: 1px solid #d1d9e6; background: white; font-size: 0.75rem;">
                           <img src="assets/img/flag/FlagUK.webp" width="14" class="me-1">
                           <span class="d-none d-md-inline">English</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#" style="font-size: 0.8rem;">English</a></li>
                            <li><a class="dropdown-item" href="#" style="font-size: 0.8rem;">සිංහල</a></li>
                            <li><a class="dropdown-item" href="#" style="font-size: 0.8rem;">தமிழ்</a></li>
                        </ul>
                    </div>

                    <!-- Currency Selector -->
                    <div class="dropdown me-2">
                        <a class="btn btn-sm dropdown-toggle py-0 px-2" 
                           href="#" 
                           role="button" 
                           id="currencyDropdown" 
                           data-bs-toggle="dropdown"
                           style="color: #4a6b8a; border: 1px solid #d1d9e6; background: white; font-size: 0.75rem;">
                           <i class="fa-solid fa-dollar-sign me-1" style="font-size: 0.7rem;"></i>
                           <span class="d-none d-md-inline">USD</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#" style="font-size: 0.8rem;">LKR - Sri Lankan Rupee</a></li>
                            <li><a class="dropdown-item" href="#" style="font-size: 0.8rem;">USD - US Dollar</a></li>
                            <li><a class="dropdown-item" href="#" style="font-size: 0.8rem;">EUR - Euro</a></li>
                        </ul>
                    </div>

                    <!-- User Account -->
                    @if (session('customer'))
                        <div class="dropdown">
                        <a class="btn-log dropdown-toggle py-0 px-2"
                            href="#"
                            role="button"
                            id="userDropdown"
                            data-bs-toggle="dropdown">
                            <i class="fa-regular fa-user me-1" style="font-size: 0.7rem;"></i>
                            <span class="d-none d-md-inline">Account</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                            <a class="dropdown-item" href="{{ route('customer.profile') }}" style="font-size: 0.8rem;">
                                <i class="fa-regular fa-user me-2" style="font-size: 0.7rem;"></i>Profile
                            </a>
                            </li>
                        </ul>
                        </div>

                    @else
                        <a href="#" 
                           class="btn-log py-0 px-2" 
                           data-bs-toggle="modal" 
                           data-bs-target="#login"
                           style="background-color: #3a6ea5; border: none; border-radius: 4px; font-size: 0.75rem;">
                           <i class="fa-regular fa-circle-user me-1" style="font-size: 0.7rem;"></i>
                           <span class="d-none d-md-inline">Sign In</span>
                        </a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</div>

<style>

        /* Initial transparent state */
    .header {
        background-color: transparent !important;
        transition: background-color 0.3s ease;
    }
    
    /* Scrolled state */
    .header.scrolled {
        background-color: #f8f9fa !important;
    }
    /* Active state for nav items */
    .nav-link.active {
        color: #2a4b7c !important;
        font-weight: 500;
        position: relative;
    }
    
    .nav-link.active:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 10px;
        right: 10px;
        height: 2px;
        background-color: #3a6ea5;
    }
    
    /* Hover effects */
    .nav-link:hover {
        color: #2a4b7c !important;
    }
    
    .dropdown-item:hover {
        background-color: #f0f4f9;
        color: #2a4b7c;
    }

        .btn-log {
        color: white;
        background-color: #3a6ea5; /* Default blue */
        padding: 0.75rem 1.5rem; /* Increased padding */
        font-size: 0.75rem;
        border: none;
        border-radius: 4px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        transition: background-color 0.3s ease;
          padding: 0 1.1rem; /* horizontal padding only */
            line-height: 35px; /* vertically center text */
        }

        .btn-log:hover {
        background-color:rgb(76, 137, 203);
        }

        @media (min-width: 768px) {
        .btn-log {
            font-size: 0.9rem;
            padding: 0.6rem 1.2rem;
        }
        }


    
    /* Mobile view adjustments */
    @media (max-width: 991.98px) {
        #navbarContent {
            padding: 8px;
            background-color: white;
            border-radius: 4px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-top: 6px;
        }
        
        .navbar-nav {
            margin-left: 0 !important;
            margin-bottom: 8px !important;
        }
        
        .nav-item {
            margin-bottom: 2px;
        }
        
        .d-flex {
            flex-direction: column;
            align-items: flex-start !important;
        }
        
        .dropdown {
            margin-bottom: 6px;
            width: 100%;
        }
        
        .dropdown-toggle {
            width: 100%;
            text-align: left;
        }
    }
</style>

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="loginmodal">
            <div class="modal-header">
                <h4 class="modal-title fs-6">Sign In</h4>
                <a href="#" class="text-muted fs-4" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-square-xmark"></i></a>
            </div>
            <div class="modal-body">
                <div class="modal-login-form py-4 px-md-3 px-0">
                    <form id="customerLoginForm" name="customerLoginForm" action="{{ route('customer.login') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-4">
                            <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                            <label>Email</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                            <label>Password</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary full-width font--bold btn-lg">Log In</button>
                        </div>
                        <div class="modal-flex-item d-flex align-items-center justify-content-between mb-3">
                            <div class="modal-flex-first">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="savepassword" value="option1">
                                    <label class="form-check-label" for="savepassword">Save Password</label>
                                </div>
                            </div>
                            <div class="modal-flex-last">
                                <a href="{{ route('password.request') }}" class="text-primary fw-medium">Forgot Password?</a>
                            </div>
                        </div>
                        <!-- Display Error Messages -->
                        @if (session('error'))
                            <div class="alert alert-danger text-center">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif
                    </form>
                </div>
                <div class="prixer px-3">
                    <div class="devider-wraps position-relative">
                        <div class="devider-text text-muted-2 text-md">Sign In with More Methods</div>
                    </div>
                </div>
                <div class="social-login py-4 px-2">
                    <ul class="row align-items-center justify-content-between g-3 p-0 m-0">
                        <li class="col"><a href="#" class="square--60 border br-dashed rounded-2 full-width"><i
                                    class="fa-brands fa-facebook color--facebook fs-2"></i></a></li>
                        <li class="col"><a href="#" class="square--60 border br-dashed rounded-2"><i
                                    class="fa-brands fa-whatsapp color--whatsapp fs-2"></i></a></li>
                        <li class="col"><a href="#" class="square--60 border br-dashed rounded-2"><i
                                    class="fa-brands fa-linkedin color--linkedin fs-2"></i></a></li>
                        <li class="col"><a href="#" class="square--60 border br-dashed rounded-2"><i
                                    class="fa-brands fa-dribbble color--dribbble fs-2"></i></a></li>
                        <li class="col"><a href="#" class="square--60 border br-dashed rounded-2"><i
                                    class="fa-brands fa-twitter color--twitter fs-2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer align-items-center justify-content-center">
                <p>Don't have an account yet?
                    <a href="{{ route('signup') }}" class="text-primary fw-medium ms-1">Sign Up</a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('mainNavbar');
        const scrollThreshold = window.innerHeight * 0.5; // 50% of viewport height
        
        window.addEventListener('scroll', function() {
            if (window.scrollY > scrollThreshold) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    });
</script>