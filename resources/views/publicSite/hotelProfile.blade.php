<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BoomBitz Hotels Details</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/headerboombitz.png') }}">

    <!-- All Plugins -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animation.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dropzone.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/flatpickr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/flickity.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/magnifypopup.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/rangeSlider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/prism.css') }}" rel="stylesheet">

    <!-- Fontawesome & Bootstrap Icons CSS -->
    <link href="{{ asset('assets/css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/fontawesome.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Custom Styles for Facebook-like Layout -->
    <style>
        :root {
            --primary-color: #1877f2;
            --secondary-color: #42b72a;
            --light-bg: #f0f2f5;
            --border-color: #dddfe2;
            --ikman-primary: #008bcf;
            --ikman-secondary: #f68b1e;
        }
        
        body {
            background-color: var(--light-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* Cover and Profile Section */
        .cover-container {
            position: relative;
            margin-bottom: 60px;
        }
        
        .cover-image {
            height: 350px;
            width: 100%;
            position: relative;
            overflow: hidden;
            border-radius: 0 0 8px 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        .cover-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        
        .cover-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60px;
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
        }
        
        .profile-picture {
            position: absolute;
            bottom: -50px;
            left: 20px;
            width: 150px;
            height: 150px;
            border-radius: 8px;
            border: 4px solid #fff;
            background-color: #fff;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }
        
        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .action-buttons {
            position: absolute;
            bottom: 10px;
            right: 20px;
        }
        
        .action-buttons .btn {
            margin-left: 8px;
            font-weight: 600;
            border-radius: 6px;
            padding: 8px 16px;
        }
        
        /* Info Section */
        .profile-header {
            padding: 15px 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
            margin-bottom: 16px;
        }
        
        .hotel-title-area {
            margin-left: 160px;
            padding-top: 6px;
        }
        
        .hotel-rating-badges {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 8px;
        }
        
        .badge-reviews {
            display: inline-flex;
            align-items: center;
            background-color: #f0f2f5;
            color: #050505;
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 14px;
        }
        
        .amenities-section {
            background: #fff;
            border-radius: 8px;
            padding: 16px 20px;
            margin-bottom: 16px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }
        
        .amenities-icons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 10px;
        }
        
        .amenity-item {
            display: flex;
            align-items: center;
            background-color: #f0f2f5;
            border-radius: 20px;
            padding: 6px 12px;
            font-size: 14px;
        }
        
        .amenity-item i {
            margin-right: 6px;
            color: var(--ikman-primary);
        }
        
        /* Room Cards */
        .room-section {
            margin-top: 20px;
        }
        
        .room-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
            margin-bottom: 16px;
            overflow: hidden;
        }
        
        .room-header {
            padding: 12px 20px;
            background-color: #f5f6f7;
            border-bottom: 1px solid var(--border-color);
        }
        
        .room-body {
            padding: 16px;
        }
        
        .room-thumb {
            width: 100%;
            height: 200px;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 12px;
        }
        
        .room-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .room-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 12px;
        }
        
        .room-tag {
            background-color: #e7f3ff;
            color: var(--primary-color);
            border-radius: 20px;
            padding: 3px 10px;
            font-size: 13px;
            font-weight: 500;
        }
        
        .amenities-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
            font-size: 14px;
        }
        
        .amenities-grid li {
            display: flex;
            align-items: center;
        }
        
        .amenities-grid i {
            width: 16px;
            margin-right: 8px;
            color: #65676b;
        }
        
        .pricing-option {
            background-color: #f9f9f9;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 16px;
            margin-top: 15px;
        }
        
        .option-header {
            margin-bottom: 12px;
            font-weight: 600;
        }
        
        .option-features {
            margin-bottom: 15px;
        }
        
        .option-features li {
            display: flex;
            align-items: center;
            margin-bottom: 6px;
            font-size: 14px;
        }
        
        .option-features i {
            width: 16px;
            margin-right: 8px;
        }
        
        .success-text {
            color: var(--secondary-color);
        }
        
        .price-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }
        
        .price {
            font-size: 24px;
            font-weight: 700;
            color: #1c1e21;
        }
        
        .price-tax {
            font-size: 13px;
            color: #65676b;
            margin-bottom: 12px;
        }
        
        .book-button {
            background-color: var(--ikman-secondary);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 8px 16px;
            font-weight: 600;
            transition: background-color 0.2s;
        }
        
        .book-button:hover {
            background-color: #e47d14;
        }
        
        .divider {
            height: 1px;
            background-color: var(--border-color);
            margin: 20px 0;
        }
        
        /* Mobile Responsiveness */
        @media (max-width: 767px) {
            .cover-image {
                height: 200px;
            }
            
            .profile-picture {
                width: 100px;
                height: 100px;
                bottom: -30px;
            }
            
            .hotel-title-area {
                margin-left: 110px;
            }
            
            .amenities-grid {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                position: relative;
                margin-top: 20px;
                right: auto;
                bottom: auto;
                display: flex;
                justify-content: flex-end;
            }
            
            .price-container {
                align-items: flex-start;
                margin-top: 15px;
            }
        }
    </style>
</head>
<body>
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>

    <div id="main-wrapper">
        <!-- Navigation -->
        @include('layouts.nav')
        <div class="clearfix"></div>

        <!-- Hotel Profile Section -->
        <section class="pt-3 ">
            <div class="container">
               <!-- Cover Image and Profile Picture -->
                <div class="cover-container">
                    <div class="cover-image">
                        <img src="{{ asset($hotel->image_path ?? 'assets/img/hotel/default-cover.jpg') }}" alt="{{ $hotel->name }}">
                        <div class="cover-overlay"></div>

                    </div>
                    <div class="profile-picture">
                        <img src="{{ asset($hotel->logo_path ?? 'assets/img/hotel/default-logo.jpg') }}" alt="{{ $hotel->name }} Logo">
                    </div>
                </div>

                <!-- Profile Info -->
                <div class="profile-header">
                    <div class="hotel-title-area">
                        <h1 class="fw-bold mb-1">{{ $hotel->name }}</h1>
                        <p class="text-muted mb-2">
                            <i class="fa-solid fa-location-dot me-2"></i>{{ $hotel->city }}, {{ $hotel->address }}
                            <a href="#" class="text-primary fw-medium ms-2">Show on Map</a>
                        </p>
                        <div class="hotel-rating-badges">
                            <span class="badge-reviews">
                                <i class="fa fa-star text-warning me-1"></i>
                                <i class="fa fa-star text-warning me-1"></i>
                                <i class="fa fa-star text-warning me-1"></i>
                                <i class="fa fa-star text-warning me-1"></i>
                                <i class="fa fa-star text-warning me-1"></i>
                                <span class="ms-1">4.8 (3,014 reviews)</span>
                            </span>
                            <span class="badge bg-success text-white">Health Protected</span>
                        </div>
                    </div>
                </div>

                <!-- About Section -->
                <div class="amenities-section">
                    <h5 class="fw-bold mb-3">About this property</h5>
                    <p class="mb-3">{{ $hotel->description }}</p>
                    
                    <h6 class="fw-semibold mb-2">Property amenities</h6>
                    <div class="amenities-icons">
                        <div class="amenity-item">
                            <i class="fa-solid fa-snowflake"></i> Cooling
                        </div>
                        <div class="amenity-item">
                            <i class="fa-solid fa-paw"></i> Pet Allow
                        </div>
                        <div class="amenity-item">
                            <i class="fa-solid fa-wifi"></i> Free WiFi
                        </div>
                        <div class="amenity-item">
                            <i class="fa-solid fa-utensils"></i> Food
                        </div>
                        <div class="amenity-item">
                            <i class="fa-solid fa-square-parking"></i> Parking
                        </div>
                        <div class="amenity-item">
                            <i class="fa-solid fa-spa"></i> Spa & Massage
                        </div>
                    </div>
                </div>

                <!-- Rooms Section -->
                <div class="col-xl-12 col-lg-12 col-md-12">
    @foreach ($hotel->rooms as $room)
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="fw-semibold mb-0">{{ $room->name }}</h6>
            </div>
            <div class="card-body">
                <div class="row align-items-start">
                    <div class="col-xl-3 col-lg-4 col-md-4">
                        <div class="roomavls-groups">
                            <div class="roomavls-thumb mb-2">
                                <img src="{{ asset($room->image_path ?? 'assets/img/hotel/default.jpg') }}" class="img-fluid rounded-2" alt="">
                            </div>
                            <div class="roomavls-caps">
                                <div class="roomavls-escols d-flex align-items-start mb-2">
                                    <span class="label bg-light-purple text-purple me-2">{{ $room->bed_type }}</span>
                                    <span class="label bg-light-purple text-purple">3 Sleeps</span>
                                </div>
                                <div class="roomavls-lists">
                                    <ul class="row align-items-center gx-2 gy-1 mb-0 p-0">
                                        <li class="col-6"><span class="text-muted-2 text-md"><i class="fa-brands fa-bity me-2"></i>City View</span></li>
                                        <li class="col-6"><span class="text-muted-2 text-md"><i class="fa-solid fa-ban-smoking me-2"></i>Non-Smoking</span></li>
                                        <li class="col-6"><span class="text-muted-2 text-md"><i class="fa-solid fa-vector-square me-2"></i>{{ $room->size }}sqft | 6 Floor</span></li>
                                        <li class="col-6"><span class="text-muted-2 text-md"><i class="fa-solid fa-wifi me-2"></i>Free Wi-Fi</span></li>
                                        <li class="col-6"><span class="text-muted-2 text-md"><i class="fa-solid fa-bath me-2"></i>Private Bathroom</span></li>
                                        <li class="col-6"><span class="text-muted-2 text-md"><i class="fa-solid fa-snowflake me-2"></i>Air Conditioning</span></li>
                                        <li class="col-6"><span class="text-muted-2 text-md"><i class="fa-solid fa-cash-register me-2"></i>Refrigerator</span></li>
                                        <li class="col-6"><span class="text-muted-2 text-md"><i class="fa-solid fa-tty me-2"></i>Telephone</span></li>
                                        <li class="col-12"><a href="#" class="text-primary fw-medium text-md">Show More Room Amenities</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-md-8">
                        <!-- Without Breakfast -->
                        <div class="d-block border br-dashed rounded-2 px-3 py-3 mb-3">
                            <div class="d-flex align-items-sm-end justify-content-between flex-sm-row flex-column">
                                <div class="typsofrooms-wrap">
                                    <div class="d-flex align-items-center">
                                        <h6 class="fs-6 fw-semibold mb-1 me-2">Your Choice</h6>
                                        <a href="#" class="text-muted fs-6"><i class="fa-solid fa-circle-question"></i></a>
                                    </div>
                                    <div class="typsofrooms-groups d-flex align-items-start">
                                        <div class="typsofrooms-brk1 mb-4">
                                            <ul class="row align-items-center g-1 mb-0 p-0">
                                                <li class="col-12"><span class="text-muted-2 text-md"><i class="fa-solid fa-mug-saucer me-2"></i>Breakfast for USD {{ $room->breakfast_price }} (Optional)</span></li>
                                                <li class="col-12"><span class="text-muted-2 text-md"><i class="fa-solid fa-ban-smoking me-2"></i> Deborah</span></li>
                                                <li class="col-12"><span class="text-success text-md"><i class="fa-solid fa-meteor me-2"></i>Instant Confirmation</span></li>
                                                <li class="col-12"><span class="text-muted-2 text-md"><i class="fa-brands fa-cc-visa me-2"></i>Prepay Online</span></li>
                                                <li class="col-12"><span class="text-success text-md"><i class="fa-solid fa-circle-check me-2"></i>Booking of Maximum {{ $room->total_rooms }} Rooms</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="typsofrooms-action col-auto">
                                    <div class="prcrounce-groups">
                                        <div class="d-flex align-items-center justify-content-start justify-content-sm-end">
                                            <div class="text-dark fw-semibold fs-4">USD {{ $room->price_per_night }}</div>
                                        </div>
                                    </div>
                                    <div class="prcrounce-groups-button d-flex flex-column align-items-start align-items-md-end mt-3">
                                        <div class="prcrounce-sngbuttons d-flex mb-2">
                                            <a href="{{ route('hotelDetails', ['id' => $hotel->id, 'room_id' => $room->id, 'breakfast' => 0]) }}"
                                               class="btn btn-sm btn-light-primary rounded-1 fw-medium px-4">
                                                Book at This Price
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- With Breakfast -->
                        <div class="d-block border br-dashed rounded-2 px-3 py-3">
                            <div class="d-flex align-items-sm-end justify-content-between flex-sm-row flex-column">
                                <div class="typsofrooms-wrap">
                                    <div class="d-flex align-items-center">
                                        <h6 class="fs-6 fw-semibold mb-1 me-2">Your Choice</h6>
                                        <a href="#" class="text-muted fs-6"><i class="fa-solid fa-circle-question"></i></a>
                                    </div>
                                    <div class="typsofrooms-groups d-flex align-items-start">
                                        <div class="typsofrooms-brk1 mb-4">
                                            <ul class="row align-items-center g-1 mb-0 p-0">
                                                <li class="col-12"><span class="text-success text-md"><i class="fa-solid fa-mug-saucer me-2"></i>Breakfast Included</span></li>
                                                <li class="col-12"><span class="text-muted-2 text-md"><i class="fa-solid fa-ban-smoking me-2"></i>Non-Refundable</span></li>
                                                <li class="col-12"><span class="text-success text-md"><i class="fa-solid fa-meteor me-2"></i>Instant Confirmation</span></li>
                                                <li class="col-12"><span class="text-muted-2 text-md"><i class="fa-brands fa-cc-visa me-2"></i>Prepay Online</span></li>
                                                <li class="col-12"><span class="text-success text-md"><i class="fa-solid fa-circle-check me-2"></i>Booking of Maximum {{ $room->total_rooms }} Rooms</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="typsofrooms-action col-auto">
                                    <div class="prcrounce-groups">
                                        <div class="d-flex align-items-center justify-content-start justify-content-sm-end">
                                            <div class="text-dark fw-semibold fs-4">USD {{ $room->price_per_night + $room->breakfast_price }}</div>
                                        </div>
                                    </div>
                                    <div class="prcrounce-groups-button d-flex flex-column align-items-start align-items-md-end mt-3">
                                        <div class="prcrounce-sngbuttons d-flex mb-2">
                                            <a href="{{ route('hotelDetails', ['id' => $hotel->id, 'room_id' => $room->id, 'breakfast' => 1]) }}"
                                               class="btn btn-sm btn-light-primary rounded-1 fw-medium px-4">
                                                Book at This Price
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
            </div>
        </section>

        <!-- Footer -->
        @include('layouts.publicFooter')

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="fa-solid fa-sort-up"></i></a>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/js/flickity.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/rangeslider.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/prism.js') }}"></script>
    <script src="{{ asset('assets/js/addadult.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });
    </script>
</body>
</html>

    <script>
        function bookRoom(hotelId, roomId, breakfast) {
            const url = `{{ route('hotelDetails') }}?id=${hotelId}&room_id=${roomId}&breakfast=${breakfast}`;
            window.location.href = url;
        }
    </script>
