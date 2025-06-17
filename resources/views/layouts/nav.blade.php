<div class="header header-dark">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand mob-show" href="{{ route('home') }}"><img src="" class="logo" alt="">EliteStays</a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        <li class="currencyDropdown me-2">
                            <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#currencyModal"><span
                                    class="fw-medium">LKR</span></a>
                        </li>
                        <li class="languageDropdown me-2">
                            <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#countryModal"><img
                                    src="assets/img/flag/slfag.png" class="img-fluid" width="17" alt="Country"></a>
                        </li>
                        <li>
                            <a href="#" class="bg-light-primary text-primary rounded" data-bs-toggle="modal"
                                data-bs-target="#login"><i class="fa-regular fa-circle-user fs-6"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">

                    <li class="active"><a href="{{ route('home') }}"><i class="fa-solid fa-umbrella-beach me-2"></i>Home</a></li>
                    <li><a href="{{ route('flights') }}"><i class="fa-solid fa-jet-fighter me-2"></i>Flights</a></li>
                    <li><a href="{{ route('hotelFilter') }}"><i class="fa-solid fa-spa me-2"></i>Hotels</a></li>
                    <li><a href="{{ route('property') }}"><i class="fa-solid fa-house-circle-check me-2"></i>Rental</a></li>

                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">
                    <li class="currencyDropdown me-2">
                        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#currencyModal"><span
                                class="fw-medium">LKR</span></a>
                    </li>
                    <li class="languageDropdown me-2">
                        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#countryModal"><img
                                src="assets/img/flag/slfag.png" class="img-fluid" width="17" alt="Country"></a>
                    </li>
                    @if (session('customer'))
                        <li class="list-buttons light">
                            <a href="{{ route('customer.profile') }}" class="bg-light-primary text-primary rounded">
                                <i class="fa-regular fa-user fs-6 me-2"></i>Profile
                            </a>
                        </li>
                    @else
                        <li class="list-buttons light">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#login">
                                <i class="fa-regular fa-circle-user fs-6 me-2"></i>Sign In / Register
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>


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