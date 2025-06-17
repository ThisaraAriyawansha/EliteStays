<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EliteStays</title>

    <!-- All Plugins -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animation.css" rel="stylesheet">
    <link href="assets/css/dropzone.min.css" rel="stylesheet">
    <link href="assets/css/flatpickr.min.css" rel="stylesheet">
    <link href="assets/css/flickity.min.css" rel="stylesheet">
    <link href="assets/css/lightbox.min.css" rel="stylesheet">
    <link href="assets/css/magnifypopup.css" rel="stylesheet">
    <link href="assets/css/select2.min.css" rel="stylesheet">
    <link href="assets/css/rangeSlider.min.css" rel="stylesheet">
    <link href="assets/css/prism.css" rel="stylesheet">

    <!-- Fontawesome & Bootstrap Icons CSS -->
    <link href="assets/css/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/fontawesome.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&display=swap" rel="stylesheet">

</head>

<body>

    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>


    <div id="main-wrapper">


  @include('layouts.nav')

        <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->


        <!-- ============================ Hero Banner  Start================================== -->
        <div class="image-cover hero-header bg-white" style="background:url(https://plus.unsplash.com/premium_photo-1666254114402-cd16bc302aea?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8c3JpbGFua2F8ZW58MHx8MHx8fDA%3D) no-repeat center center fixed; background-size: cover; height: 120vh; " data-overlay="7">
            <div class="container h-140">
                <!-- Booking Form -->
                <div class="row justify-content-center align-items-center h-120">
                    <div class="col-xl-8 col-lg-9 col-md-10 col-sm-12">
                        <div class="position-relative text-center mb-4" style="font-family: 'Poppins', sans-serif;">
                            <h1 class="display-4 fw-bold">Book Your Dream Stay with <span class="position-relative z-4">EliteStays<span class="position-absolute top-50 start-50 translate-middle-none d-none d-md-block mt-4"></span></span></h1>
                            <p class="fs-5 fw-light">Discover and reserve luxurious accommodations worldwide. Plan your perfect getaway with EliteStays.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================ Hero Banner End ================================== -->


        <!-- ============================ Popular Hotels Start ================================== -->
        <section>
            <div class="container">

                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                        <div class="secHeading-wrap text-center mb-5">
                            <h2>Popular Resorts In Sri Lanka</h2>
                            <p>Cicero famously orated against his political opponent Lucius Sergius Catilina.</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center g-xl-4 g-lg-4 g-md-3 g-4">
                    @foreach ($hotels as $hotel)
                        <!-- Single Hotel -->
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="pop-touritem">
                                <a href="{{ route('hotelProfile') }}?id={{ $hotel->id }}" class="card rounded-3 border m-0">
                                    <div class="flight-thumb-wrapper">
                                        <div class="popFlights-item-overHidden">
                                            <img src="{{ env('HOST_URL') . '/' . ltrim($hotel->image_path, '/') }}" class="img-fluid" alt="{{ $hotel->name }}">
                                        </div>  
                                    </div>
                                    <div class="touritem-middle position-relative p-3">
                                        <div class="touritem-flexxer">
                                            <h4 class="city fs-title m-0 fw-bold">
                                                <span>{{ $hotel->name }}</span>
                                            </h4>
                                            <p class="detail ellipsis-container">
                                                <span class="ellipsis-item__normal">{{ $hotel->city }}</span>
                                                <span class="separate ellipsis-item__normal"></span>
                                                <span class="ellipsis-item">{{ $hotel->address }}</span>
                                            </p>

                                            <!-- Room Details -->
                                            <div class="room-details mt-3">
                                                <h5 class="fs-6 fw-bold">Available Rooms</h5>
                                                @if ($hotel->rooms->isEmpty())
                                                    <p class="text-muted">No rooms available</p>
                                                @else
                                                    <ul class="list-unstyled">
                                                        @foreach ($hotel->rooms as $room)
                                                            <li class="mb-2">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <div>
                                                                        <strong>{{ $room->name }}</strong>
                                                                        <small class="d-block text-muted">{{ $room->bed_type }} | {{ $room->size }} sq ft</small>
                                                                    </div>
                                                                    <div>
                                                                        <span class="text-success fw-bold">${{ number_format($room->price_per_night, 2) }}/night</span>
                                                                        @if ($room->breakfast_price > 0)
                                                                            <small class="d-block text-muted">+ ${{ number_format($room->breakfast_price, 2) }} Breakfast</small>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>

                                            <div class="touritem-centrio mt-4">

                                                <div class="aments-lists mt-2">
                                                    <ul class="p-0 row gx-3 gy-2 align-items-start flex-wrap">
                                                        <li class="col-auto text-dark text-md text-muted-2 d-inline-flex align-items-center">
                                                            <i class="fa-solid fa-check text-success me-1"></i>Cooling
                                                        </li>
                                                        <li class="col-auto text-dark text-md text-muted-2 d-inline-flex align-items-center">
                                                            <i class="fa-solid fa-check text-success me-1"></i>Pet Allow
                                                        </li>
                                                        <li class="col-auto text-dark text-md text-muted-2 d-inline-flex align-items-center">
                                                            <i class="fa-solid fa-check text-success me-1"></i>Free WiFi
                                                        </li>
                                                        <li class="col-auto text-dark text-md text-muted-2 d-inline-flex align-items-center">
                                                            <i class="fa-solid fa-check text-success me-1"></i>Food
                                                        </li>
                                                        <li class="col-auto text-dark text-md text-muted-2 d-inline-flex align-items-center">
                                                            <i class="fa-solid fa-check text-success me-1"></i>Parking
                                                        </li>
                                                        <li class="col-auto text-dark text-md text-muted-2 d-inline-flex align-items-center">
                                                            <i class="fa-solid fa-check text-success me-1"></i>Spa & Massage
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /row -->
            </div>
        </section>
        <!-- ============================ Popular Hotels Start ================================== -->


        <!-- ============================ Popular Routes Design Start ================================== -->
        <section class="gray-simple">
            <div class="container">

                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                        <div class="secHeading-wrap text-center mb-5">
                            <h2>Hot International Routes</h2>
                            <p>Cicero famously orated against his political opponent Lucius Sergius Catilina.</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center gy-4 gx-3">

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="pop-touritem">
                            <a href="#" class="card rounded-3 h-100 m-0">
                                <div class="flight-thumb-wrapper">
                                    <div class="popFlights-item-overHidden">
                                        <img src="assets/img/destination/tr-1.jpg" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="touritem-middle position-relative p-3">
                                    <div class="touritem-flexxer">
                                        <h4 class="city fs-6 m-0 fw-bold">
                                            <span>New York</span>
                                            <span class="svg-icon svg-icon-muted svg-icon-2hx px-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4 7H4C3.4 7 3 7.4 3 8C3 8.6 3.4 9 4 9H17.4V7ZM6.60001 15H20C20.6 15 21 15.4 21 16C21 16.6 20.6 17 20 17H6.60001V15Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.3"
                                                        d="M17.4 3V13L21.7 8.70001C22.1 8.30001 22.1 7.69999 21.7 7.29999L17.4 3ZM6.6 11V21L2.3 16.7C1.9 16.3 1.9 15.7 2.3 15.3L6.6 11Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>Los Angeles</span>
                                        </h4>
                                        <p class="detail ellipsis-container">
                                            <span class="ellipsis-item__normal">Round-trip</span>
                                            <span class="separate ellipsis-item__normal"></span>
                                            <span class="ellipsis-item">3 days</span>
                                        </p>
                                    </div>
                                    <div class="flight-foots">
                                        <h5 class="fs-5 low-price m-0"><span class="tag-span">From</span> <span class="price">LKR 492</span>
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="pop-touritem">
                            <a href="#" class="card rounded-3 h-100 m-0">
                                <div class="flight-thumb-wrapper">
                                    <div class="popFlights-item-overHidden">
                                        <img src="assets/img/destination/tr-2.jpg" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="touritem-middle position-relative p-3">
                                    <div class="touritem-flexxer">
                                        <h4 class="city fs-6 m-0 fw-bold">
                                            <span>San Diego</span>
                                            <span class="svg-icon svg-icon-muted svg-icon-2hx px-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4 7H4C3.4 7 3 7.4 3 8C3 8.6 3.4 9 4 9H17.4V7ZM6.60001 15H20C20.6 15 21 15.4 21 16C21 16.6 20.6 17 20 17H6.60001V15Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.3"
                                                        d="M17.4 3V13L21.7 8.70001C22.1 8.30001 22.1 7.69999 21.7 7.29999L17.4 3ZM6.6 11V21L2.3 16.7C1.9 16.3 1.9 15.7 2.3 15.3L6.6 11Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>San Jose</span>
                                        </h4>
                                        <p class="detail ellipsis-container">
                                            <span class="ellipsis-item__normal">Round-trip</span>
                                            <span class="separate ellipsis-item__normal"></span>
                                            <span class="ellipsis-item">3 days</span>
                                        </p>
                                    </div>
                                    <div class="flight-foots">
                                        <h5 class="fs-5 low-price m-0"><span class="tag-span">From</span> <span class="price">LKR 492</span>
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="pop-touritem">
                            <a href="#" class="card rounded-3 h-100 m-0">
                                <div class="flight-thumb-wrapper">
                                    <div class="popFlights-item-overHidden">
                                        <img src="assets/img/destination/tr-3.jpg" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="touritem-middle position-relative p-3">
                                    <div class="touritem-flexxer">
                                        <h4 class="city fs-6 m-0 fw-bold">
                                            <span>Dallas</span>
                                            <span class="svg-icon svg-icon-muted svg-icon-2hx px-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4 7H4C3.4 7 3 7.4 3 8C3 8.6 3.4 9 4 9H17.4V7ZM6.60001 15H20C20.6 15 21 15.4 21 16C21 16.6 20.6 17 20 17H6.60001V15Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.3"
                                                        d="M17.4 3V13L21.7 8.70001C22.1 8.30001 22.1 7.69999 21.7 7.29999L17.4 3ZM6.6 11V21L2.3 16.7C1.9 16.3 1.9 15.7 2.3 15.3L6.6 11Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>Philadelphia</span>
                                        </h4>
                                        <p class="detail ellipsis-container">
                                            <span class="ellipsis-item__normal">Round-trip</span>
                                            <span class="separate ellipsis-item__normal"></span>
                                            <span class="ellipsis-item">3 days</span>
                                        </p>
                                    </div>
                                    <div class="flight-foots">
                                        <h5 class="fs-5 low-price m-0"><span class="tag-span">From</span> <span class="price">LKR 492</span>
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="pop-touritem">
                            <a href="#" class="card rounded-3 h-100 m-0">
                                <div class="flight-thumb-wrapper">
                                    <div class="popFlights-item-overHidden">
                                        <img src="assets/img/destination/tr-4.jpg" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="touritem-middle position-relative p-3">
                                    <div class="touritem-flexxer">
                                        <h4 class="city fs-6 m-0 fw-bold">
                                            <span>Nashville</span>
                                            <span class="svg-icon svg-icon-muted svg-icon-2hx px-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4 7H4C3.4 7 3 7.4 3 8C3 8.6 3.4 9 4 9H17.4V7ZM6.60001 15H20C20.6 15 21 15.4 21 16C21 16.6 20.6 17 20 17H6.60001V15Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.3"
                                                        d="M17.4 3V13L21.7 8.70001C22.1 8.30001 22.1 7.69999 21.7 7.29999L17.4 3ZM6.6 11V21L2.3 16.7C1.9 16.3 1.9 15.7 2.3 15.3L6.6 11Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>Chicago</span>
                                        </h4>
                                        <p class="detail ellipsis-container">
                                            <span class="ellipsis-item__normal">Round-trip</span>
                                            <span class="separate ellipsis-item__normal"></span>
                                            <span class="ellipsis-item">3 days</span>
                                        </p>
                                    </div>
                                    <div class="flight-foots">
                                        <h5 class="fs-5 low-price m-0"><span class="tag-span">From</span> <span class="price">LKR 492</span>
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="pop-touritem">
                            <a href="#" class="card rounded-3 h-100 m-0">
                                <div class="flight-thumb-wrapper">
                                    <div class="popFlights-item-overHidden">
                                        <img src="assets/img/destination/tr-5.jpg" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="touritem-middle position-relative p-3">
                                    <div class="touritem-flexxer">
                                        <h4 class="city fs-6 m-0 fw-bold">
                                            <span>San Francisco</span>
                                            <span class="svg-icon svg-icon-muted svg-icon-2hx px-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4 7H4C3.4 7 3 7.4 3 8C3 8.6 3.4 9 4 9H17.4V7ZM6.60001 15H20C20.6 15 21 15.4 21 16C21 16.6 20.6 17 20 17H6.60001V15Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.3"
                                                        d="M17.4 3V13L21.7 8.70001C22.1 8.30001 22.1 7.69999 21.7 7.29999L17.4 3ZM6.6 11V21L2.3 16.7C1.9 16.3 1.9 15.7 2.3 15.3L6.6 11Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>Houston</span>
                                        </h4>
                                        <p class="detail ellipsis-container">
                                            <span class="ellipsis-item__normal">Round-trip</span>
                                            <span class="separate ellipsis-item__normal"></span>
                                            <span class="ellipsis-item">3 days</span>
                                        </p>
                                    </div>
                                    <div class="flight-foots">
                                        <h5 class="fs-5 low-price m-0"><span class="tag-span">From</span> <span class="price">LKR 492</span>
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="pop-touritem">
                            <a href="#" class="card rounded-3 h-100 m-0">
                                <div class="flight-thumb-wrapper">
                                    <div class="popFlights-item-overHidden">
                                        <img src="assets/img/destination/tr-10.jpg" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="touritem-middle position-relative p-3">
                                    <div class="touritem-flexxer">
                                        <h4 class="city fs-6 m-0 fw-bold">
                                            <span>San Antonio</span>
                                            <span class="svg-icon svg-icon-muted svg-icon-2hx px-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4 7H4C3.4 7 3 7.4 3 8C3 8.6 3.4 9 4 9H17.4V7ZM6.60001 15H20C20.6 15 21 15.4 21 16C21 16.6 20.6 17 20 17H6.60001V15Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.3"
                                                        d="M17.4 3V13L21.7 8.70001C22.1 8.30001 22.1 7.69999 21.7 7.29999L17.4 3ZM6.6 11V21L2.3 16.7C1.9 16.3 1.9 15.7 2.3 15.3L6.6 11Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>Columbus</span>
                                        </h4>
                                        <p class="detail ellipsis-container">
                                            <span class="ellipsis-item__normal">Round-trip</span>
                                            <span class="separate ellipsis-item__normal"></span>
                                            <span class="ellipsis-item">3 days</span>
                                        </p>
                                    </div>
                                    <div class="flight-foots">
                                        <h5 class="fs-5 low-price m-0"><span class="tag-span">From</span> <span class="price">LKR 492</span>
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="pop-touritem">
                            <a href="#" class="card rounded-3 h-100 m-0">
                                <div class="flight-thumb-wrapper">
                                    <div class="popFlights-item-overHidden">
                                        <img src="assets/img/destination/tr-9.jpg" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="touritem-middle position-relative p-3">
                                    <div class="touritem-flexxer">
                                        <h4 class="city fs-6 m-0 fw-bold">
                                            <span>Los Angeles</span>
                                            <span class="svg-icon svg-icon-muted svg-icon-2hx px-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4 7H4C3.4 7 3 7.4 3 8C3 8.6 3.4 9 4 9H17.4V7ZM6.60001 15H20C20.6 15 21 15.4 21 16C21 16.6 20.6 17 20 17H6.60001V15Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.3"
                                                        d="M17.4 3V13L21.7 8.70001C22.1 8.30001 22.1 7.69999 21.7 7.29999L17.4 3ZM6.6 11V21L2.3 16.7C1.9 16.3 1.9 15.7 2.3 15.3L6.6 11Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>Kansas City</span>
                                        </h4>
                                        <p class="detail ellipsis-container">
                                            <span class="ellipsis-item__normal">Round-trip</span>
                                            <span class="separate ellipsis-item__normal"></span>
                                            <span class="ellipsis-item">3 days</span>
                                        </p>
                                    </div>
                                    <div class="flight-foots">
                                        <h5 class="fs-5 low-price m-0"><span class="tag-span">From</span> <span class="price">LKR 492</span>
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="pop-touritem">
                            <a href="#" class="card rounded-3 h-100 m-0">
                                <div class="flight-thumb-wrapper">
                                    <div class="popFlights-item-overHidden">
                                        <img src="assets/img/destination/tr-6.jpg" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="touritem-middle position-relative p-3">
                                    <div class="touritem-flexxer">
                                        <h4 class="city fs-6 m-0 fw-bold">
                                            <span>New Orleans</span>
                                            <span class="svg-icon svg-icon-muted svg-icon-2hx px-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4 7H4C3.4 7 3 7.4 3 8C3 8.6 3.4 9 4 9H17.4V7ZM6.60001 15H20C20.6 15 21 15.4 21 16C21 16.6 20.6 17 20 17H6.60001V15Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.3"
                                                        d="M17.4 3V13L21.7 8.70001C22.1 8.30001 22.1 7.69999 21.7 7.29999L17.4 3ZM6.6 11V21L2.3 16.7C1.9 16.3 1.9 15.7 2.3 15.3L6.6 11Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>Los Angeles</span>
                                        </h4>
                                        <p class="detail ellipsis-container">
                                            <span class="ellipsis-item__normal">Round-trip</span>
                                            <span class="separate ellipsis-item__normal"></span>
                                            <span class="ellipsis-item">3 days</span>
                                        </p>
                                    </div>
                                    <div class="flight-foots">
                                        <h5 class="fs-5 low-price m-0"><span class="tag-span">From</span> <span class="price">LKR 492</span>
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ============================ Popular Routes Design Start ================================== -->


        <!-- ============================ Best Locations Design Start ================================== -->
        <section>
            <div class="container">

                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                        <div class="secHeading-wrap text-center mb-5">
                            <h2>Trending destinations</h2>
                            <p>Travellers searching for Sri Lanka also booked these.</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center gy-4 gx-3">

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="cardCities cursor rounded-2">
                            <div class="cardCities-image ratio ratio-4">
                                <img src="assets/img/city/colombo.jpg" class="img-fluid object-fit" alt="image">
                            </div>

                            <div class="citiesCard-content d-flex flex-column justify-content-between text-center px-4 py-4">
                                <div class="cardCities-bg"></div>

                                <div class="citiesCard-topcaps">
                                    <div class="d-flex align-items-center justify-content-center flex-wrap">
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">10 Hotels</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">25 Flights</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">17 Cars</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">22 Tours</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">36 Activities</div>
                                    </div>
                                </div>

                                <div class="citiesCard-bottomcaps">
                                    <h4 class="text-light fs-3 mb-3">Colombo</h4>
                                    <button class="btn btn-whitener full-width fw-medium">Discover<i
                                            class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="cardCities cursor rounded-2">
                            <div class="cardCities-image ratio ratio-4">
                                <img src="assets/img/city/kandy.jpg" class="img-fluid object-fit" alt="image">
                            </div>

                            <div class="citiesCard-content d-flex flex-column justify-content-between text-center px-4 py-4">
                                <div class="cardCities-bg"></div>

                                <div class="citiesCard-topcaps">
                                    <div class="d-flex align-items-center justify-content-center flex-wrap">
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">10 Hotels</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">25 Flights</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">17 Cars</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">22 Tours</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">36 Activities</div>
                                    </div>
                                </div>

                                <div class="citiesCard-bottomcaps">
                                    <h4 class="text-light fs-3 mb-3">Kandy</h4>
                                    <button class="btn btn-whitener full-width fw-medium">Discover<i
                                            class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="cardCities cursor rounded-2">
                            <div class="cardCities-image ratio ratio-4">
                                <img src="assets/img/city/ella.jpg" class="img-fluid object-fit" alt="image">
                            </div>

                            <div class="citiesCard-content d-flex flex-column justify-content-between text-center px-4 py-4">
                                <div class="cardCities-bg"></div>

                                <div class="citiesCard-topcaps">
                                    <div class="d-flex align-items-center justify-content-center flex-wrap">
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">10 Hotels</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">25 Flights</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">17 Cars</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">22 Tours</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">36 Activities</div>
                                    </div>
                                </div>

                                <div class="citiesCard-bottomcaps">
                                    <h4 class="text-light fs-3 mb-3">Ella</h4>
                                    <button class="btn btn-whitener full-width fw-medium">Discover<i
                                            class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="cardCities cursor rounded-2">
                            <div class="cardCities-image ratio ratio-4">
                                <img src="assets/img/city/negombo.jpeg" class="img-fluid object-fit" alt="image">
                            </div>

                            <div class="citiesCard-content d-flex flex-column justify-content-between text-center px-4 py-4">
                                <div class="cardCities-bg"></div>

                                <div class="citiesCard-topcaps">
                                    <div class="d-flex align-items-center justify-content-center flex-wrap">
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">10 Hotels</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">25 Flights</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">17 Cars</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">22 Tours</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">36 Activities</div>
                                    </div>
                                </div>

                                <div class="citiesCard-bottomcaps">
                                    <h4 class="text-light fs-3 mb-3">Negombo</h4>
                                    <button class="btn btn-whitener full-width fw-medium">Discover<i
                                            class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="cardCities cursor rounded-2">
                            <div class="cardCities-image ratio ratio-4">
                                <img src="assets/img/city/sigiriya.jpg" class="img-fluid object-fit" alt="image">
                            </div>

                            <div class="citiesCard-content d-flex flex-column justify-content-between text-center px-4 py-4">
                                <div class="cardCities-bg"></div>

                                <div class="citiesCard-topcaps">
                                    <div class="d-flex align-items-center justify-content-center flex-wrap">
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">10 Hotels</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">25 Flights</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">17 Cars</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">22 Tours</div>
                                        <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">36 Activities</div>
                                    </div>
                                </div>

                                <div class="citiesCard-bottomcaps">
                                    <h4 class="text-light fs-3 mb-3">Sigiriya</h4>
                                    <button class="btn btn-whitener full-width fw-medium">Discover<i
                                            class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ============================ Best Locations Design Start ================================== -->


        <!-- ============================ Video Helps End ================================== -->
        <section class="bg-cover" style="background:url(assets/img/banner-6.jpg)no-repeat;" data-overlay="5">
            <div class="ht-150"></div>
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12">

                        <div class="video-play-wrap text-center">
                            <div class="video-play-btn d-flex align-items-center justify-content-center">
                                <a href="https://www.youtube.com/watch?v=A8EI6JaFbv4" data-bs-toggle="modal" data-bs-target="#popup-video" class="square--90 circle bg-white fs-2 text-primary"><i class="fa-solid fa-play"></i></a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="ht-150"></div>
        </section>
        <!-- ============================ Video Helps End ================================== -->


        <!-- ============================ Our Partners =========================== -->
        <section class="py-5 gray-simple">
            <div class="container">
                <div
                    class="row align-items-center justify-content-center row-cols-lg-6 row-cols-md-5 row-cols-sm-5 row-cols-3 gx-3 gy-3">

                    <div class="col">
                        <div class="px-2 opacity-75 text-center">
                            <img src="assets/img/BookingMyFare.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col">
                        <div class="px-2 opacity-75 text-center">
                            <img src="assets/img/siliconradon.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col">
                        <div class="px-2 opacity-75 text-center">
                            <img src="assets/img/itiic.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col">
                        <div class="px-2 opacity-75 text-center">
                            <img src="assets/img/MegaOffers.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col">
                        <div class="px-2 opacity-75 text-center">
                            <img src="assets/img/RoyalHavenwood.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <!-- <div class="col">
                        <div class="px-2 opacity-75 text-center">
                            <img src="assets/img/brand/logo-1.png" class="img-fluid" alt="">
                        </div>
                    </div> -->

                </div>
            </div>
        </section>
        <!-- ============================ Our Partners =========================== -->


        <!-- ============================ Flexible features End ================================== -->
        <section>
            <div class="container">

                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                        <div class="secHeading-wrap text-center mb-5">
                            <h2>Why Move To BoomBitz</h2>
                            <p>Cicero famously orated against his political opponent Lucius Sergius Catilina.</p>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center justify-content-between">

                    <div class="col-xl-5 col-lg-5 col-md-6">
                        <div class="position-relative">
                            <img src="assets/img/img-1.png" class="img-fluid rounded-3 position-relative z-1" alt="">
                        </div>

                    </div>

                    <div class="col-xl-5 col-lg-6 col-md-6">
                        <div class="featuresList-box">

                            <div class="featuresList-single mb-4">
                                <div class="featuresList-counter d-inline-block mb-3"><span
                                        class="bg-success text-light rounded-pill fw-medium py-1 px-3">01</span></div>
                                <div class="featuresList-caption">
                                    <h5 class="fw-bold fs-6 mb-2">Get The Superb Discount</h5>
                                    <p class="fw-light fs-6">Rigid proponents of content strategy may shun the use of dummy copy but then
                                        designers might want to ask them to provide style sheets.</p>
                                </div>
                            </div>

                            <div class="featuresList-single mb-4">
                                <div class="featuresList-counter d-inline-block mb-3"><span
                                        class="bg-warning text-light rounded-pill fw-medium py-1 px-3">02</span></div>
                                <div class="featuresList-caption">
                                    <h5 class="fw-bold fs-6 mb-2">100% Price Transparency</h5>
                                    <p class="fw-light fs-6">Rigid proponents of content strategy may shun the use of dummy copy but then
                                        designers might want to ask them to provide style sheets.</p>
                                </div>
                            </div>

                            <div class="featuresList-single mb-4">
                                <div class="featuresList-counter d-inline-block mb-3"><span
                                        class="bg-purple text-light rounded-pill fw-medium py-1 px-3">03</span></div>
                                <div class="featuresList-caption">
                                    <h5 class="fw-bold fs-6 mb-2">Top Class destination</h5>
                                    <p class="fw-light fs-6">Rigid proponents of content strategy may shun the use of dummy copy but then
                                        designers might want to ask them to provide style sheets.</p>
                                </div>
                            </div>

                            <div class="featuresList-single">
                                <div class="featuresList-counter d-inline-block mb-3"><span
                                        class="bg-primary text-light rounded-pill fw-medium py-1 px-3">04</span></div>
                                <div class="featuresList-caption">
                                    <h5 class="fw-bold fs-6 mb-2">Friendly Chat Support</h5>
                                    <p class="fw-light fs-6">Rigid proponents of content strategy may shun the use of dummy copy but then
                                        designers might want to ask them to provide style sheets.</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ============================ Flexible features End ================================== -->


        <!-- ================================ Article Section Start ======================================= -->
        <section class="pt-1">
            <div class="container">

                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                        <div class="secHeading-wrap text-center mb-5">
                            <h2>Trending & Popular Articles</h2>
                            <p>Cicero famously orated against his political opponent Lucius Sergius Catilina.</p>
                        </div>
                    </div>
                </div>


                <div class="row justify-content-center g-4">

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="blogGrid-wrap d-flex flex-column h-100">
                            <div class="blogGrid-pics">
                                <a href="#" class="d-block"><img src="assets/img/blog-1.jpg" class="img-fluid rounded" alt="Blog image"></a>
                            </div>
                            <div class="blogGrid-caps pt-3">
                                <div class="d-flex align-items-center mb-1"><span
                                        class="label text-success bg-light-success">Destination</span></div>
                                <h4 class="fw-bold fs-6 lh-base"><a href="#" class="text-dark">Make Your Next Journey Delhi To Paris in
                                        Comfirtable And Best Price</a></h4>
                                <p class="mb-3">Think of a news blog that's filled with content hourly on the Besides, random text risks
                                    to be unintendedly humorous or offensive day of going live.</p>
                                <a class="text-primary fw-medium" href="#">Read More<i class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="blogGrid-wrap d-flex flex-column h-100">
                            <div class="blogGrid-pics">
                                <a href="#" class="d-block"><img src="assets/img/blog-2.jpg" class="img-fluid rounded" alt="Blog image"></a>
                            </div>
                            <div class="blogGrid-caps pt-3">
                                <div class="d-flex align-items-center mb-1"><span
                                        class="label text-success bg-light-success">Journey</span></div>
                                <h4 class="fw-bold fs-6 lh-base"><a href="#" class="text-dark">Make Your Next Journey Delhi To Paris in
                                        Comfirtable And Best Price</a></h4>
                                <p class="mb-3">Think of a news blog that's filled with content hourly on the Besides, random text risks
                                    to be unintendedly humorous or offensive day of going live.</p>
                                <a class="text-primary fw-medium" href="#">Read More<i class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="blogGrid-wrap d-flex flex-column h-100">
                            <div class="blogGrid-pics">
                                <a href="#" class="d-block"><img src="assets/img/blog-3.jpg" class="img-fluid rounded" alt="Blog image"></a>
                            </div>
                            <div class="blogGrid-caps pt-3">
                                <div class="d-flex align-items-center mb-1"><span
                                        class="label text-success bg-light-success">Business</span></div>
                                <h4 class="fw-bold fs-6 lh-base"><a href="#" class="text-dark">Make Your Next Journey Delhi To Paris in
                                        Comfirtable And Best Price</a></h4>
                                <p class="mb-3">Think of a news blog that's filled with content hourly on the Besides, random text risks
                                    to be unintendedly humorous or offensive day of going live.</p>
                                <a class="text-primary fw-medium" href="#">Read More<i class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ================================ Article Section Start ======================================= -->


        <!-- ============================ Call To Action Start ================================== -->
        <div class="position-relative bg-cover bg-primary" style="background:url(assets/img/bg.jpg)no-repeat;" data-overlay="5">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="calltoAction-wraps position-relative py-5 px-4">
                            <div class="ht-40"></div>
                            <div class="row align-items-center justify-content-center">
                                <div class="col-xl-8 col-lg-9 col-md-10 col-sm-11 text-center">

                                    <div class="calltoAction-title mb-5">
                                        <h4 class="text-light fs-2 fw-bold lh-base m-0">Subscribe & Get<br>Special Discount with BoomBitz
                                        </h4>
                                    </div>
                                    <div class="newsletter-forms mt-md-0 mt-4">
                                        <form>
                                            <div class="row align-items-center justify-content-between bg-white rounded-3 p-2 gx-0">

                                                <div class="col-xl-9 col-lg-8 col-md-8">
                                                    <div class="form-group m-0">
                                                        <input type="text" class="form-control bold ps-1 border-0" placeholder="Enter Your Mail!">
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-md-4">
                                                    <div class="form-group m-0">
                                                        <button type="button" class="btn btn-primary fw-medium full-width">Submit<i
                                                                class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <div class="ht-40"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================ Call To Action Start ================================== -->


        <!-- ============================ Footer Start ================================== -->
        @include('layouts.publicFooter')

        <!-- ============================ Footer End ================================== -->

        <!-- Log In Modal -->
        
        <!-- End Modal -->

        <!-- Choose Currency Modal -->
        <!-- <div class="modal modal-lg fade" id="currencyModal" tabindex="-1" aria-labelledby="currenyModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fs-6" id="currenyModalLabel">Select Your Currency</h4>
                        <a href="#" class="text-muted fs-4" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fa-solid fa-square-xmark"></i></a>
                    </div>
                    <div class="modal-body">
                        <div class="allCurrencylist">

                            <div class="suggestedCurrencylist-wrap mb-4">
                                <div class="d-inline-block mb-0 ps-3">
                                    <h5 class="fs-6 fw-bold">Suggested Currency For you</h5>
                                </div>
                                <div class="suggestedCurrencylists">
                                    <ul
                                        class="row align-items-center justify-content-start row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-2 gy-2 gx-3 m-0 p-0">
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">United State Dollar</div>
                                                <div class="text-muted-2 text-md text-uppercase">USD</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Pound Sterling</div>
                                                <div class="text-muted-2 text-md text-uppercase">GBP</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency active" href="#">
                                                <div class="text-dark text-md fw-medium">Indian Rupees</div>
                                                <div class="text-muted-2 text-md text-uppercase">Inr</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Euro</div>
                                                <div class="text-muted-2 text-md text-uppercase">EUR</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Australian Dollar</div>
                                                <div class="text-muted-2 text-md text-uppercase">aud</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Thai Baht</div>
                                                <div class="text-muted-2 text-md text-uppercase">thb</div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="suggestedCurrencylist-wrap">
                                <div class="d-inline-block mb-0 ps-3">
                                    <h5 class="fs-6 fw-bold">All Currencies</h5>
                                </div>
                                <div class="suggestedCurrencylists">
                                    <ul
                                        class="row align-items-center justify-content-start row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-2 gy-2 gx-3 m-0 p-0">
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">United State Dollar</div>
                                                <div class="text-muted-2 text-md text-uppercase">USD</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Property currency</div>
                                                <div class="text-muted-2 text-md text-uppercase">GBP</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Argentine Peso</div>
                                                <div class="text-muted-2 text-md text-uppercase">EUR</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Azerbaijani Manat</div>
                                                <div class="text-muted-2 text-md text-uppercase">Inr</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Australian Dollar</div>
                                                <div class="text-muted-2 text-md text-uppercase">aud</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Bahraini Dinar</div>
                                                <div class="text-muted-2 text-md text-uppercase">thb</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Brazilian Real</div>
                                                <div class="text-muted-2 text-md text-uppercase">USD</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Bulgarian Lev</div>
                                                <div class="text-muted-2 text-md text-uppercase">GBP</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Canadian Dollar</div>
                                                <div class="text-muted-2 text-md text-uppercase">EUR</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Chilean Peso</div>
                                                <div class="text-muted-2 text-md text-uppercase">Inr</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Colombian Peso</div>
                                                <div class="text-muted-2 text-md text-uppercase">aud</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Danish Krone</div>
                                                <div class="text-muted-2 text-md text-uppercase">thb</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Egyptian Pound</div>
                                                <div class="text-muted-2 text-md text-uppercase">USD</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Hungarian Forint</div>
                                                <div class="text-muted-2 text-md text-uppercase">GBP</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Japanese Yen</div>
                                                <div class="text-muted-2 text-md text-uppercase">EUR</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Jordanian Dinar</div>
                                                <div class="text-muted-2 text-md text-uppercase">Inr</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Kuwaiti Dinar</div>
                                                <div class="text-muted-2 text-md text-uppercase">aud</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Malaysian Ringgit</div>
                                                <div class="text-muted-2 text-md text-uppercase">thb</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCurrency" href="#">
                                                <div class="text-dark text-md fw-medium">Singapore Dollar</div>
                                                <div class="text-muted-2 text-md text-uppercase">thb</div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> -->


        <!-- Choose Countries Modal -->
        <!-- <div class="modal modal-lg fade" id="countryModal" tabindex="-1" aria-labelledby="countryModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fs-6" id="countryModalLabel">Select Your Country</h4>
                        <a href="#" class="text-muted fs-4" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fa-solid fa-square-xmark"></i></a>
                    </div>
                    <div class="modal-body">
                        <div class="allCountrieslist">

                            <div class="suggestedCurrencylist-wrap mb-4">
                                <div class="d-inline-block mb-0 ps-3">
                                    <h5 class="fs-6 fw-bold">Suggested Countries For you</h5>
                                </div>
                                <div class="suggestedCurrencylists">
                                    <ul
                                        class="row align-items-center justify-content-start row-cols-xl-4 row-cols-lg-3 row-cols-2 gy-2 gx-3 m-0 p-0">
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/united-states.png" class="img-fluid circle"
                                                        width="35" alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">United State Dollar</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/united-kingdom.png" class="img-fluid circle"
                                                        width="35" alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Pound Sterling</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry active" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/flag.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Indian Rupees</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/belgium.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Euro</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/brazil.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Australian Dollar</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/china.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Thai Baht</div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="suggestedCurrencylist-wrap">
                                <div class="d-inline-block mb-0 ps-3">
                                    <h5 class="fs-6 fw-bold">All Countries</h5>
                                </div>
                                <div class="suggestedCurrencylists">
                                    <ul
                                        class="row align-items-center justify-content-start row-cols-xl-4 row-cols-lg-3 row-cols-2 gy-2 gx-3 m-0 p-0">
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/united-states.png" class="img-fluid circle"
                                                        width="35" alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">United State Dollar</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/vietnam.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Property currency</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/turkey.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Argentine Peso</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/spain.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Azerbaijani Manat</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/japan.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Australian Dollar</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/flag.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Bahraini Dinar</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/portugal.png" class="img-fluid circle"
                                                        width="35" alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Brazilian Real</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/italy.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Bulgarian Lev</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/germany.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Canadian Dollar</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/france.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Chilean Peso</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/european.png" class="img-fluid circle"
                                                        width="35" alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Colombian Peso</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/china.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Danish Krone</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/brazil.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Egyptian Pound</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/belgium.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Hungarian Forint</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/turkey.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Japanese Yen</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/spain.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Jordanian Dinar</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/germany.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Kuwaiti Dinar</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/france.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Malaysian Ringgit</div>
                                            </a>
                                        </li>
                                        <li class="col">
                                            <a class="selectCountry" href="#">
                                                <div class="d-inline-block"><img src="assets/img/flag/brazil.png" class="img-fluid circle" width="35"
                                                        alt=""></div>
                                                <div class="text-dark text-md fw-medium ps-2">Singapore Dollar</div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Video Modal -->
        <div class="modal fade" id="popup-video" tabindex="-1" role="dialog" aria-labelledby="popupvideo" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" id="popupvideo">
                    <iframe class="embed-responsive-item full-width" height="480" src="https://www.youtube.com/embed/qN3OueBm9F4?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <!-- End Video Modal -->

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="fa-solid fa-sort-up"></i></a>


    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/dropzone.min.js"></script>
    <script src="assets/js/flatpickr.js"></script>
    <script src="assets/js/flickity.pkgd.min.js"></script>
    <script src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/rangeslider.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/counterup.min.js"></script>
    <script src="assets/js/prism.js"></script>

    <script src="assets/js/addadult.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->

</body>



</html>