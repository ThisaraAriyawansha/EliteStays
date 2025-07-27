        <div class="dashboard-menus border-top d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <ul class="user-Dashboard-menu">
                            <li class="active"><a href="{{ route('customer.profile') }}"><i class="fa-regular fa-id-card me-2"></i>My Profile</a></li>
                            <li><a href="{{ route('customeraddHotel') }}"><i class="fa-solid fa-ticket me-2"></i>Add Hotel</a></li>
                            <li><a href="{{ route('customerManageHotel') }}"><i class="fa-solid fa-user-group me-2"></i>Manage Hotel</a></li>
                            <li><a href="{{ route('customerManageRoom') }}"><i class="fa-solid fa-wallet me-2"></i>Manage Room</a></li>
                            <li><a href="{{ route('customerManageBooking') }}"><i class="fa-solid fa-shield-heart me-2"></i>Booking</a></li>
                            <li><a href="{{ route('customer.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-power-off me-2"></i>Sign Out</a></li>
                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                        <button class="btn btn-dark fw-medium full-width d-block d-lg-none" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasDashboard" aria-controls="offcanvasDashboard"><i
                                class="fa-solid fa-gauge me-2"></i>Dashboard Navigation</button>
                        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                            id="offcanvasDashboard" aria-labelledby="offcanvasScrollingLabel">
                            <div class="offcanvas-header gray-simple">
                                <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Dashboard Menu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body p-0">
                                <ul class="user-Dashboard-longmenu">
                                    <li class="active"><a href="{{ route('customer.profile') }}"><i class="fa-regular fa-id-card me-2"></i>My Profile</a></li>
                                    <li><a href="{{ route('customeraddHotel') }}"><i class="fa-solid fa-ticket me-2"></i>Add Hotel</a></li>
                                    <li><a href="{{ route('customerManageHotel') }}"><i class="fa-solid fa-user-group me-2"></i>Manage Hotel</a></li>
                                    <li><a href="{{ route('customerManageRoom') }}"><i class="fa-solid fa-wallet me-2"></i>Manage Room</a></li>
                                    <li><a href="{{ route('customerManageBooking') }}"><i class="fa-solid fa-shield-heart me-2"></i>Booking</a></li>
                                    <li><a href="{{ route('customer.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"><i class="fa-solid fa-power-off me-2"></i>Sign Out</a></li>
                                    <form id="logout-form-mobile" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>