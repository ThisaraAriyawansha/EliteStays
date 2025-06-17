<!doctype html>
<html lang="en">


<!-- Mirrored from shreethemes.net/geotrip-live/geotrip/hotel-detail-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Feb 2025 18:59:35 GMT -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BoomBitz Hotels Details </title>
    <link rel="icon" type="image/x-icon" href="assets/img/headerboombitz.png">

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
</head>

<body>
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div id="preloader">
		<div class="preloader"><span></span><span></span></div>
	</div>


	<div id="main-wrapper">

		<!-- ============================================================== -->
		<!-- Top header  -->
		<!-- ============================================================== -->
		<!-- Start Navigation -->
  @include('layouts.nav')
	<!-- End Navigation -->
		<div class="clearfix"></div>
		<!-- ============================================================== -->
		<!-- Top header  -->
		<!-- ============================================================== -->


		<!-- ============================ Hotel Details Start ================================== -->
		<section class="pt-3 gray-simple">
			<div class="container">
				<div class="row">


					<!-- Gallery & Info -->
					<div class="container my-5">
					<!-- Hotel Overview Section -->


        <!-- Hotel Details Card with Input Fields and Price Calculation -->
<div class="col-xl-12 col-lg-12 col-md-12">
    <div class="card border-0 p-3 mb-4">
        <div class="crd-heaader d-md-flex align-items-center justify-content-between mb-3">
            <div class="crd-heaader-first">
                <div class="d-inline-flex align-items-center mb-1">
                    <span class="label bg-light-success text-success">Health Protected</span>
                    <div class="d-inline-block ms-2">
                        <i class="fa fa-star text-warning text-xs"></i>
                        <i class="fa fa-star text-warning text-xs"></i>
                        <i class="fa fa-star text-warning text-xs"></i>
                        <i class="fa fa-star text-warning text-xs"></i>
                        <i class="fa fa-star text-warning text-xs"></i>
                    </div>
                </div>
                <div class="d-block">
                    <h4 class="mb-0 hotel-name">{{ $hotel->name }}</h4>
                    <div>
                        <p class="text-md m-0 hotel-address">
                            <i class="fa-solid fa-location-dot me-2"></i>{{ $hotel->address }}, {{ $hotel->city }}.
                            <a href="#" class="text-primary fw-medium ms-2">Show on Map</a>
                        </p>
                    </div>
                    @if ($selectedRoom)
                        <h5 class="mt-2">Selected Room: {{ $selectedRoom->name }}</h5>
                    @endif
                </div>
            </div>
            <div class="crd-heaader-last my-md-0 my-2">
                <div class="drix-wrap d-flex flex-column align-items-md-end align-items-start text-end">
                    <div class="drix-first d-flex align-items-center text-end mb-2">
                        <a href="{{ route('hotelProfile') }}?id={{ $hotel->id }}" class="bg-light-primary text-primary rounded-1 fw-medium text-sm px-3 py-2 lh-base"><i class="fa-solid fa-hotel me-2"></i>Hotel Profile</a>
                        <a href="#" class="bg-light-info text-info rounded-1 fw-medium text-sm px-3 py-2 lh-base ms-2"><i class="fa-solid fa-bookmark me-2"></i>Bookmark</a>
                        <a href="#" class="bg-light-danger text-danger rounded-1 fw-medium text-sm px-3 py-2 lh-base ms-2"><i class="fa-solid fa-share-nodes me-2"></i>Share</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="crd-body">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-8 col-lg-7 col-md-12">
                    <div class="galleryGrid typeGrid_2 mb-lg-0 mb-3">
                        @if ($selectedRoom && $selectedRoom->images->isNotEmpty())
                            @foreach ($selectedRoom->images->take(4) as $index => $image)
                                <div class="galleryGrid__item {{ $index == 0 ? 'relative d-flex' : '' }}">
                                    <a href="{{ asset($image->image_path) }}" data-lightbox="roadtrip">
                                        <img src="{{ asset($image->image_path) }}" alt="Room Image" class="rounded-2 img-fluid">
                                    </a>
                                    @if ($index === 1 && $selectedRoom->images->count() > 4)
                                        <div class="position-absolute end-0 bottom-0 mb-3 me-3">
                                            <a href="{{ asset($selectedRoom->images[4]->image_path) }}" data-lightbox="roadtrip" class="btn btn-md btn-whites fw-medium text-dark">
                                                <i class="fa-solid fa-caret-right me-1"></i>{{ $selectedRoom->images->count() - 4 }} More Photos
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <div class="galleryGrid__item relative d-flex">
                                <a href="{{ asset('assets/img/hotel/unnamed.jpg') }}" data-lightbox="roadtrip">
                                    <img src="{{ asset('assets/img/hotel/unnamed.jpg') }}" alt="image" class="rounded-2 img-fluid">
                                </a>
                            </div>
                            <div class="galleryGrid__item position-relative">
                                <a href="{{ asset('assets/img/hotel/unnamed.jpg') }}" data-lightbox="roadtrip">
                                    <img src="{{ asset('assets/img/hotel/unnamed.jpg') }}" alt="image" class="rounded-2 img-fluid">
                                </a>
                                <div class="position-absolute end-0 bottom-0 mb-3 me-3">
                                    <a href="{{ asset('assets/img/hotel/unnamed.jpg') }}" data-lightbox="roadtrip" class="btn btn-md btn-whites fw-medium text-dark">
                                        <i class="fa-solid fa-caret-right me-1"></i>16 More Photos
                                    </a>
                                </div>
                            </div>
                            <div class="galleryGrid__item">
                                <a href="{{ asset('assets/img/hotel/unnamed.jpg') }}" data-lightbox="roadtrip">
                                    <img src="{{ asset('assets/img/hotel/unnamed.jpg') }}" alt="image" class="rounded-2 img-fluid">
                                </a>
                            </div>
                            <div class="galleryGrid__item">
                                <a href="{{ asset('assets/img/hotel/unnamed.jpg') }}" data-lightbox="roadtrip">
                                    <img src="{{ asset('assets/img/hotel/unnamed.jpg') }}" alt="image" class="rounded-2 img-fluid">
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-12">
                    <div class="card border br-dashed">
                        <div class="card-header">
                            <div class="crd-heady102 d-flex align-items-center justify-content-start">
                                <div class="square--30 circle bg-light-primary text-primary flex-shrink-0"><i class="fa-solid fa-percent"></i></div>
                                <div class="crd-heady102Title lh-1 ps-2">
                                </div>
                            </div>
                            <div class="crd-heady103">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-block mb-3 pricing-section">
                                @if ($selectedRoom)
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="text-dark fw-bold fs-3 me-2" id="total-price">
                                            USD {{ $breakfast ? ($selectedRoom->price_per_night + $selectedRoom->breakfast_price) : $selectedRoom->price_per_night }}
                                        </div>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="breakfast-checkbox" {{ $breakfast ? 'checked' : '' }}
                                               data-room-price="{{ $selectedRoom->price_per_night }}"
                                               data-breakfast-price="{{ $selectedRoom->breakfast_price }}"
                                               data-adult-price="{{ $selectedRoom->adult_price }}"
                                               data-children-price="{{ $selectedRoom->children_price }}"
                                               onchange="updatePrice()">
                                        <label class="form-check-label text-md" for="breakfast-checkbox">
                                            Include Breakfast (USD {{ $selectedRoom->breakfast_price }})
                                        </label>
                                    </div>
                                @else
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="text-dark fw-bold fs-3 me-2" id="total-price">USD 2999</div>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="breakfast-checkbox" disabled>
                                        <label class="form-check-label text-md" for="breakfast-checkbox">
                                            Include Breakfast (Not Available)
                                        </label>
                                    </div>
                                @endif
                            </div>
                            <div class="d-block">
                                <div class="form-group mb-4">
                                    <input type="text" class="form-control fw-bold" placeholder="Check-In & Check-Out" id="checkinout" readonly="readonly">
                                </div>
                                <div class="form-group mb-4">
                                    <div class="booking-form__input guests-input mixer-auto">
                                        <button name="guests-btn" id="guests-input-btn">1 Guest</button>
                                        <div class="guests-input__options" id="guests-input-options">
                                            <div>
                                                <span class="guests-input__ctrl minus" id="adults-subs-btn"><i class="fa-solid fa-minus"></i></span>
                                                <span class="guests-input__value"><span id="guests-count-adults">1</span> Adults</span>
                                                <span class="guests-input__ctrl plus" id="adults-add-btn"><i class="fa-solid fa-plus"></i></span>
                                            </div>
                                            <div>
                                                <span class="guests-input__ctrl minus" id="children-subs-btn"><i class="fa-solid fa-minus"></i></span>
                                                <span class="guests-input__value"><span id="guests-count-children">0</span> Children</span>
                                                <span class="guests-input__ctrl plus" id="children-add-btn"><i class="fa-solid fa-plus"></i></span>
                                            </div>
                                            <div>
                                                <span class="guests-input__ctrl minus" id="room-subs-btn"><i class="fa-solid fa-minus"></i></span>
                                                <span class="guests-input__value"><span id="guests-count-room">1</span> Rooms</span>
                                                <span class="guests-input__ctrl plus" id="room-add-btn"><i class="fa-solid fa-plus"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($selectedRoom)
                                    <div class="text-muted-2 text-md" id="base-price">
                                        Base room price per night: USD {{ $breakfast ? ($selectedRoom->price_per_night + $selectedRoom->breakfast_price) : $selectedRoom->price_per_night }}
                                    </div>
                                    <div class="text-muted-2 text-md" id="adult-price">
                                        Additional adult price per night: USD {{ $breakfast ? ($selectedRoom->adult_price + $selectedRoom->breakfast_price) : $selectedRoom->adult_price }}
                                    </div>
                                    <div class="text-muted-2 text-md" id="children-price">
                                        Children price per night: USD {{ $breakfast ? ($selectedRoom->children_price + $selectedRoom->breakfast_price) : $selectedRoom->children_price }}
                                    </div>
                                    <div class="text-dark fw-bold fs-3 me-2" id="total-guest-price">
                                        Total: USD {{ $breakfast ? ($selectedRoom->price_per_night + $selectedRoom->breakfast_price) : $selectedRoom->price_per_night }}
                                    </div>
                                @else
                                    <div class="text-muted-2 text-md" id="base-price">Base room price per night: USD 2999</div>
                                    <div class="text-muted-2 text-md" id="adult-price">Additional adult price per night: USD 2999</div>
                                    <div class="text-muted-2 text-md" id="children-price">Children price per night: USD 2999</div>
                                    <div class="text-dark fw-bold fs-3 me-2" id="total-guest-price">Total: USD 2999</div>
                                @endif
                                <div class="form-group mb-2">
                                    <a href="{{ route('makePayemt') }}?room_id={{ $selectedRoom ? $selectedRoom->id : '' }}&breakfast={{ $breakfast ? 1 : 0 }}&checkin=&checkout=&adults=1&children=0&rooms=1"
                                       class="btn btn-primary full-width fw-medium" id="check-availability-btn">Book Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="row align-items-center justify-content-start gx-2">
                                <div class="col-auto">
                                    <div class="square--40 rounded-2 bg-seegreen text-light">4.8</div>
                                </div>
                                <div class="col-auto text-start">
                                    <div class="text-md text-dark fw-medium">Exceptional</div>
                                    <div class="text-md text-muted-2">3,014 reviews</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

					<!-- Top Attractions -->
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="row align-items-center justify-content-between gx-4">
							<div class="col-xl-4 col-lg-4 col-md-4">
								<div class="card p-3 mb-4">
									<div class="nearestServ-wrap">
										<div class="nearestServ-head d-flex mb-1">
											<h6 class="fs-6 fw-semibold text-primary mb-1"><i class="fa-brands fa-servicestack me-2"></i>Top
												Attractions</h6>
										</div>
										<div class="nearestServ-caps">
											<ul class="row align-items-start g-2 p-0 m-0">
												<li class="col-12 text-muted-2">Hong Kong Disneyland (170m)</li>
												<li class="col-12 text-muted-2">Hong Kong Museum (250m)</li>
												<li class="col-12 text-muted-2">The Peak Tram (80m)</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4">
								<div class="card p-3 mb-4">
									<div class="nearestServ-wrap">
										<div class="nearestServ-head d-flex mb-1">
											<h6 class="fs-6 fw-semibold text-primary mb-1"><i class="fa-solid fa-jet-fighter me-2"></i>Nearest
												Airport & Metro</h6>
										</div>
										<div class="nearestServ-caps">
											<ul class="row align-items-start g-2 p-0 m-0">
												<li class="col-12 text-muted-2">Airport: Janghai Airport (370m)</li>
												<li class="col-12 text-muted-2">Airport: Shivalay Airport (2.4km)</li>
												<li class="col-12 text-muted-2">Metro: Mandpam (500m)</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4">
								<div class="card p-3 mb-4">
									<div class="nearestServ-wrap">
										<div class="nearestServ-head d-flex mb-1">
											<h6 class="fs-6 fw-semibold text-primary mb-1"><i
													class="fa-solid fa-martini-glass-empty me-2"></i>Cafe & Bars</h6>
										</div>
										<div class="nearestServ-caps">
											<ul class="row align-items-start g-2 p-0 m-0">
												<li class="col-12 text-muted-2">Cafe: Bekker Cofee Cafe (60m)</li>
												<li class="col-12 text-muted-2">Cafe: Levendaram restaurants (120m)</li>
												<li class="col-12 text-muted-2">Bar: The Blue Bar (90m)</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<!-- Rooms Details -->
					<!-- Room Options Section -->
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

					<!-- Service & Amenties -->
					

					<!-- Nearest Services -->
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="card mb-4">
							<div class="card-header">
								<h4 class="fs-5 mb-0">Nearest Services</h4>
							</div>
							<div class="card-body">
								<div class="row align-items-start mb-4">
									<div class="col-xl-2 col-lg-3 col-md-4">
										<h5 class="fs-6 fw-semibold mb-0">Transport</h5>
									</div>
									<div class="col-xl-10 col-lg-9 col-md-8">
										<div class="row align-items-start">

											<div class="col-xl-12 col-lg-12 col-md-12">
												<ul class="row align-items-center p-0 mb-0">
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first">Metro:<span class="text-dark ms-2">Lavender</span></div>
															<div class="explot-distance"><span class="text-muted">360m</span></div>
														</div>
													</li>
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first">Metro:<span class="text-dark ms-2">Jalan Besar MRT</span>
															</div>
															<div class="explot-distance"><span class="text-muted">80m</span></div>
														</div>
													</li>
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first">Airport:<span class="text-dark ms-2">Singapore Changi
																	Airport</span></div>
															<div class="explot-distance"><span class="text-muted">160m</span></div>
														</div>
													</li>
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first">Train:<span class="text-dark ms-2">Woodlands Train
																	Checkpoint</span></div>
															<div class="explot-distance"><span class="text-muted">200m</span></div>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="row align-items-start mb-4">
									<div class="col-xl-2 col-lg-3 col-md-4">
										<h5 class="fs-6 fw-semibold mb-0">Landmarks</h5>
									</div>
									<div class="col-xl-10 col-lg-9 col-md-8">
										<div class="row align-items-start">

											<div class="col-xl-12 col-lg-12 col-md-12">
												<ul class="row align-items-center p-0 mb-0">
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first"><span class="text-dark ms-2">Sentosa</span></div>
															<div class="explot-distance"><span class="text-muted">360m</span></div>
														</div>
													</li>
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first"><span class="text-dark ms-2">Gardens by the Bay</span></div>
															<div class="explot-distance"><span class="text-muted">80m</span></div>
														</div>
													</li>
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first"><span class="text-dark ms-2">S.E.A. Aquarium</span></div>
															<div class="explot-distance"><span class="text-muted">160m</span></div>
														</div>
													</li>
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first"><span class="text-dark ms-2">Singapore Flyer</span></div>
															<div class="explot-distance"><span class="text-muted">200m</span></div>
														</div>
													</li>
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first"><span class="text-dark ms-2">Wings Of Time</span></div>
															<div class="explot-distance"><span class="text-muted">200m</span></div>
														</div>
													</li>
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first"><span class="text-dark ms-2">Sands SkyPark</span></div>
															<div class="explot-distance"><span class="text-muted">200m</span></div>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="row align-items-start mb-4">
									<div class="col-xl-2 col-lg-3 col-md-4">
										<h5 class="fs-6 fw-semibold mb-0">Dining</h5>
									</div>
									<div class="col-xl-10 col-lg-9 col-md-8">
										<div class="row align-items-start">

											<div class="col-xl-12 col-lg-12 col-md-12">
												<ul class="row align-items-center p-0 mb-0">
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first"><span class="text-dark ms-2">SYMMETRY</span></div>
															<div class="explot-distance"><span class="text-muted">360m</span></div>
														</div>
													</li>
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first"><span class="text-dark ms-2">Tai Hwa Pork Noodle</span>
															</div>
															<div class="explot-distance"><span class="text-muted">80m</span></div>
														</div>
													</li>
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first"><span class="text-dark ms-2">Sungei Road Laksa</span></div>
															<div class="explot-distance"><span class="text-muted">160m</span></div>
														</div>
													</li>
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first"><span class="text-dark ms-2">The Dim Sum Place</span></div>
															<div class="explot-distance"><span class="text-muted">200m</span></div>
														</div>
													</li>
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first"><span class="text-dark ms-2">The Ramen Stall</span></div>
															<div class="explot-distance"><span class="text-muted">200m</span></div>
														</div>
													</li>
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first"><span class="text-dark ms-2">Taliwang Restaurant</span>
															</div>
															<div class="explot-distance"><span class="text-muted">200m</span></div>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="row align-items-start mb-4">
									<div class="col-xl-2 col-lg-3 col-md-4">
										<h5 class="fs-6 fw-semibold mb-0">Shopping</h5>
									</div>
									<div class="col-xl-10 col-lg-9 col-md-8">
										<div class="row align-items-start">

											<div class="col-xl-12 col-lg-12 col-md-12">
												<ul class="row align-items-center p-0 mb-0">
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first"><span class="text-dark ms-2">Bugis Street</span></div>
															<div class="explot-distance"><span class="text-muted">360m</span></div>
														</div>
													</li>
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first"><span class="text-dark ms-2">Mustafa Centre</span></div>
															<div class="explot-distance"><span class="text-muted">80m</span></div>
														</div>
													</li>
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first"><span class="text-dark ms-2">Bugis Junction</span></div>
															<div class="explot-distance"><span class="text-muted">160m</span></div>
														</div>
													</li>
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first"><span class="text-dark ms-2">Tekka Centre</span></div>
															<div class="explot-distance"><span class="text-muted">200m</span></div>
														</div>
													</li>
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first"><span class="text-dark ms-2">Orchard Central</span></div>
															<div class="explot-distance"><span class="text-muted">200m</span></div>
														</div>
													</li>
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first"><span class="text-dark ms-2">Ngee Ann City</span></div>
															<div class="explot-distance"><span class="text-muted">200m</span></div>
														</div>
													</li>
													<li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
														<div class="d-flex align-items-center justify-content-between mb-3">
															<div class="explot-first"><span class="text-dark ms-2">ION Orchard</span></div>
															<div class="explot-distance"><span class="text-muted">200m</span></div>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Guests Reviews -->
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="card mb-4">
							<div class="card-header">
								<h4 class="fs-5 mb-0">Guests Reviews</h4>
							</div>
							<div class="card-body">
								<div class="row align-items-center mb-4">
									<div class="col-xl-2 col-lg-3 col-md-4">
										<div class="rounded-3 bg-primary full-width">
											<div class="py-4 px-3 text-center">
												<h3 class="text-light display-2 fw-semibold mb-0">92</h3>
												<p class="text-light lh-base m-0">Extraordinary 786 Reviews</p>
											</div>
										</div>
									</div>
									<div class="col-xl-10 col-lg-9 col-md-8">
										<div class="row align-items-start">

											<div class="col-xl-12 col-lg-12 col-md-12">
												<ul class="row align-items-center p-0 mb-0 gy-3 gx-4">
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
														<div class="revs-wraps">
															<div class="revs-wraps-flex d-flex align-items-center justify-content-between mb-1">
																<span class="text-dark fw-semibold text-md">Dishes</span>
																<span class="text-dark fw-semibold text-md">8.7</span>
															</div>
															<div class="progress " role="progressbar" aria-label="Example" aria-valuenow="87"
																aria-valuemin="0" aria-valuemax="100" style="height: 7px">
																<div class="progress-bar bg-primary" style="width: 87%"></div>
															</div>
														</div>
													</li>
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
														<div class="revs-wraps">
															<div class="revs-wraps-flex d-flex align-items-center justify-content-between mb-1">
																<span class="text-dark fw-semibold text-md">Swimming</span>
																<span class="text-dark fw-semibold text-md">9.2</span>
															</div>
															<div class="progress " role="progressbar" aria-label="Example" aria-valuenow="92"
																aria-valuemin="0" aria-valuemax="100" style="height: 7px">
																<div class="progress-bar bg-primary" style="width: 92%"></div>
															</div>
														</div>
													</li>
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
														<div class="revs-wraps">
															<div class="revs-wraps-flex d-flex align-items-center justify-content-between mb-1">
																<span class="text-dark fw-semibold text-md">Rooms</span>
																<span class="text-dark fw-semibold text-md">8.8</span>
															</div>
															<div class="progress " role="progressbar" aria-label="Example" aria-valuenow="88"
																aria-valuemin="0" aria-valuemax="100" style="height: 7px">
																<div class="progress-bar bg-primary" style="width: 88%"></div>
															</div>
														</div>
													</li>
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
														<div class="revs-wraps">
															<div class="revs-wraps-flex d-flex align-items-center justify-content-between mb-1">
																<span class="text-dark fw-semibold text-md">Location</span>
																<span class="text-dark fw-semibold text-md">8.9</span>
															</div>
															<div class="progress " role="progressbar" aria-label="Example" aria-valuenow="89"
																aria-valuemin="0" aria-valuemax="100" style="height: 7px">
																<div class="progress-bar bg-primary" style="width: 89%"></div>
															</div>
														</div>
													</li>
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
														<div class="revs-wraps">
															<div class="revs-wraps-flex d-flex align-items-center justify-content-between mb-1">
																<span class="text-dark fw-semibold text-md">Services</span>
																<span class="text-dark fw-semibold text-md">9.2</span>
															</div>
															<div class="progress " role="progressbar" aria-label="Example" aria-valuenow="92"
																aria-valuemin="0" aria-valuemax="100" style="height: 7px">
																<div class="progress-bar bg-primary" style="width: 92%"></div>
															</div>
														</div>
													</li>
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
														<div class="revs-wraps">
															<div class="revs-wraps-flex d-flex align-items-center justify-content-between mb-1">
																<span class="text-dark fw-semibold text-md">Cleanliness</span>
																<span class="text-dark fw-semibold text-md">8.6</span>
															</div>
															<div class="progress " role="progressbar" aria-label="Example" aria-valuenow="86"
																aria-valuemin="0" aria-valuemax="100" style="height: 7px">
																<div class="progress-bar bg-primary" style="width: 86%"></div>
															</div>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								<div class="row align-items-center">
									<div class="col-xl-12 col-lg-12 col-md-12">
										<div class="gstRevws-groups">

											<!-- Single Reviwws -->
											<div class="single-gstRevws rounded-2 border p-2 d-flex align-items-start mb-3">
												<div class="single-gstRevws-thumb">
													<div class="rounded-2 overflow-hidden w-25 h-25">
														<img src="assets/img/team-1.jpg" class="img-fluid" alt="">
													</div>
												</div>
												<div class="single-gstRevws-caps ps-3">
													<div class="gstRevws-head d-flex align-items-start justify-content-between">
														<div class="dfls-headers">
															<h5 class="h6 text-dark fw-semibold mb-0">Adam Bluecart</h5>
															<p class="text-md mb-0">Canada</p>
														</div>
														<div class="dfls-arrios"><span class="text-muted text-md">10 July 2023</span></div>
													</div>
													<div class="dfls-secription">
														<p class="mb-0">In a free hour, But in certain circumstances and owing to the claims of
															duty or the obligations of business when our power of choice is untrammelled and when
															nothing prevents our being able to do what we like best, every pleasure is to be
															welcomed and every pain avoided.</p>
													</div>
												</div>
											</div>

											<!-- Single Reviwws -->
											<div class="single-gstRevws rounded-2 border p-2 d-flex align-items-start mb-3">
												<div class="single-gstRevws-thumb">
													<div
														class="rounded-2 bg-light-purple d-flex align-items-center justify-content-center overflow-hidden w-25 h-25">
														<h3 class="m-0 fs-1 fw-semibold text-purple">K</h3>
													</div>
												</div>
												<div class="single-gstRevws-caps ps-3">
													<div class="gstRevws-head d-flex align-items-start justify-content-between">
														<div class="dfls-headers">
															<h5 class="h6 text-dark fw-semibold mb-0">Adam Bluecart</h5>
															<p class="text-md mb-0">Canada</p>
														</div>
														<div class="dfls-arrios"><span class="text-muted text-md">10 July 2023</span></div>
													</div>
													<div class="dfls-secription">
														<p class="mb-0">In a free hour, But in certain circumstances and owing to the claims of
															duty or the obligations of business when our power of choice is untrammelled and when
															nothing prevents our being able to do what we like best, every pleasure is to be
															welcomed and every pain avoided.</p>
													</div>
												</div>
											</div>

											<!-- Single Reviwws -->
											<div class="single-gstRevws rounded-2 border p-2 d-flex align-items-start mb-3">
												<div class="single-gstRevws-thumb">
													<div class="rounded-2 overflow-hidden w-25 h-25">
														<img src="assets/img/team-3.jpg" class="img-fluid" alt="">
													</div>
												</div>
												<div class="single-gstRevws-caps ps-3">
													<div class="gstRevws-head d-flex align-items-start justify-content-between">
														<div class="dfls-headers">
															<h5 class="h6 text-dark fw-semibold mb-0">Adam Bluecart</h5>
															<p class="text-md mb-0">Canada</p>
														</div>
														<div class="dfls-arrios"><span class="text-muted text-md">10 July 2023</span></div>
													</div>
													<div class="dfls-secription">
														<p class="mb-0">In a free hour, But in certain circumstances and owing to the claims of
															duty or the obligations of business when our power of choice is untrammelled and when
															nothing prevents our being able to do what we like best, every pleasure is to be
															welcomed and every pain avoided.</p>
													</div>
												</div>
											</div>


											<!-- Single Reviwws -->
											<div class="show-morerewsbox mb-3">
												<div class="text-center" role="alert">
													<a href="#" class="fw-medium text-primary">Load More Guest Reviews<i
															class="fa-solid fa-caret-down ms-2"></i></a>
												</div>
											</div>



										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

					<!-- FAQ -->
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="row align-items-start justify-content-between gx-3">
							<div class="col-xl-3 col-lg-4 col-md-4">
								<div class="position-relative mb-4">
									<h4 class="lh-base">FAQ Regarding The {{ $hotel->name }}</h4>
								</div>

							</div>
							<div class="col-xl-9 col-lg-8 col-md-8">
								<div class="accordion accordion-flush" id="accordionFlushExample">
									<div class="accordion-item">
										<h2 class="accordion-header">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
												data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
												How To Book A resort with Booer.com?
											</button>
										</h2>
										<div id="flush-collapseOne" class="accordion-collapse collapse"
											data-bs-parent="#accordionFlushExample">
											<div class="accordion-body">In a professional context it often happens that private or corporate
												clients corder a publication to be made and presented with the actual content still not being
												ready. Think of a news blog that's filled with content hourly on the day of going live. However,
												reviewers tend to be distracted by comprehensible content, say, a random text copied from a
												newspaper or the internet. The are likely to focus on the text, disregarding the layout and its
												elements.</div>
										</div>
									</div>
									<div class="accordion-item">
										<h2 class="accordion-header">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
												data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
												Can We Pay After Check-out?
											</button>
										</h2>
										<div id="flush-collapseTwo" class="accordion-collapse collapse"
											data-bs-parent="#accordionFlushExample">
											<div class="accordion-body">In a professional context it often happens that private or corporate
												clients corder a publication to be made and presented with the actual content still not being
												ready. Think of a news blog that's filled with content hourly on the day of going live. However,
												reviewers tend to be distracted by comprehensible content, say, a random text copied from a
												newspaper or the internet. The are likely to focus on the text, disregarding the layout and its
												elements.</div>
										</div>
									</div>
									<div class="accordion-item">
										<h2 class="accordion-header">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
												data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
												Is This Collaborate with Oyo?
											</button>
										</h2>
										<div id="flush-collapseThree" class="accordion-collapse collapse"
											data-bs-parent="#accordionFlushExample">
											<div class="accordion-body">In a professional context it often happens that private or corporate
												clients corder a publication to be made and presented with the actual content still not being
												ready. Think of a news blog that's filled with content hourly on the day of going live. However,
												reviewers tend to be distracted by comprehensible content, say, a random text copied from a
												newspaper or the internet. The are likely to focus on the text, disregarding the layout and its
												elements.</div>
										</div>
									</div>
									<div class="accordion-item">
										<h2 class="accordion-header">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
												data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
												Can We get Any Transport For Walk?
											</button>
										</h2>
										<div id="flush-collapseFour" class="accordion-collapse collapse"
											data-bs-parent="#accordionFlushExample">
											<div class="accordion-body">In a professional context it often happens that private or corporate
												clients corder a publication to be made and presented with the actual content still not being
												ready. Think of a news blog that's filled with content hourly on the day of going live. However,
												reviewers tend to be distracted by comprehensible content, say, a random text copied from a
												newspaper or the internet. The are likely to focus on the text, disregarding the layout and its
												elements.</div>
										</div>
									</div>
									<div class="accordion-item">
										<h2 class="accordion-header">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
												data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
												Can We Get Any Extra Services?
											</button>
										</h2>
										<div id="flush-collapseFive" class="accordion-collapse collapse"
											data-bs-parent="#accordionFlushExample">
											<div class="accordion-body">In a professional context it often happens that private or corporate
												clients corder a publication to be made and presented with the actual content still not being
												ready. Think of a news blog that's filled with content hourly on the day of going live. However,
												reviewers tend to be distracted by comprehensible content, say, a random text copied from a
												newspaper or the internet. The are likely to focus on the text, disregarding the layout and its
												elements.</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- ============================ Hotel Details End ================================== -->


		<!-- ============================ Similar Hotels Start ================================== -->
		
		<!-- ============================ Similar Hotels End ================================== -->

		<!-- ============================ Footer Start ================================== -->
        @include('layouts.publicFooter')

		<!-- ============================ Footer End ================================== -->

		<!-- Log In Modal -->
		
		<!-- End Modal -->

	

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

	<script>
		lightbox.option({
			'resizeDuration': 200,
			'wrapAround': true
		})
	</script>
</body>


<!-- Mirrored from shreethemes.net/geotrip-live/geotrip/hotel-detail-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Feb 2025 18:59:35 GMT -->
</html>


    <script>
        function bookRoom(hotelId, roomId, breakfast) {
            const url = `{{ route('hotelDetails') }}?id=${hotelId}&room_id=${roomId}&breakfast=${breakfast}`;
            window.location.href = url;
        }
    </script>


<!-- JavaScript for Datepicker and Price Calculation -->
<script>
function initializeDatepicker() {
    // Initialize flatpickr for check-in and check-out dates
    flatpickr("#checkinout", {
        mode: "range",
        minDate: "today",
        dateFormat: "Y-m-d",
        onChange: function(selectedDates) {
            if (selectedDates.length === 2) {
                updatePrice();
            }
        }
    });
}



function updatePrice() {
    const checkbox = document.getElementById('breakfast-checkbox');
    const totalPriceEl = document.getElementById('total-price');
    const basePriceEl = document.getElementById('base-price');
    const adultPriceEl = document.getElementById('adult-price');
    const childrenPriceEl = document.getElementById('children-price');
    const totalGuestPriceEl = document.getElementById('total-guest-price');
    const checkAvailabilityBtn = document.getElementById('check-availability-btn');
    const checkinout = document.getElementById('checkinout');
    const adultsCount = parseInt(document.getElementById('guests-count-adults').textContent);
    const childrenCount = parseInt(document.getElementById('guests-count-children').textContent);
    const roomCount = parseInt(document.getElementById('guests-count-room').textContent);

    // Get pricing data
    const basePricePerNight = parseFloat(checkbox.dataset.roomPrice || 2999); // Price for 1 adult in 1 room per night
    const breakfastPricePerNight = parseFloat(checkbox.dataset.breakfastPrice || 0);
    const additionalAdultPricePerNight = parseFloat(checkbox.dataset.adultPrice || 0); // Extra adult per night
    const childrenPricePerNight = parseFloat(checkbox.dataset.childrenPrice || 0); // Child per night

    // Calculate number of nights
    let nights = 1;
    if (checkinout.value) {
        const [checkin, checkout] = checkinout.value.split(' to ');
        if (checkin && checkout) {
            const checkinDate = new Date(checkin);
            const checkoutDate = new Date(checkout);
            nights = Math.ceil((checkoutDate - checkinDate) / (1000 * 60 * 60 * 24));
            nights = nights > 0 ? nights : 1;
        }
    }

    // Calculate prices
    const basePriceWithBreakfast = basePricePerNight + (checkbox.checked ? breakfastPricePerNight : 0);
    const additionalAdultPriceWithBreakfast = additionalAdultPricePerNight + (checkbox.checked ? breakfastPricePerNight : 0);
    const childrenPriceWithBreakfast = childrenPricePerNight + (checkbox.checked ? breakfastPricePerNight : 0);

    // Base cost (1 adult per room)
    const baseCost = basePriceWithBreakfast * roomCount * nights;
    
    // Additional adults (beyond the 1 adult included in base price)
    const additionalAdults = Math.max(0, adultsCount - roomCount);
    const additionalAdultCost = additionalAdults * additionalAdultPriceWithBreakfast * nights;
    
    // Children cost
    const childrenCost = childrenCount * childrenPriceWithBreakfast * nights;
    
    // Total price
    const totalPrice = baseCost + additionalAdultCost + childrenCost;

    // Update displayed prices
    totalPriceEl.textContent = `USD ${totalPrice.toFixed(2)}`;
    basePriceEl.textContent = `Base price (1 adult/room/night): USD ${basePriceWithBreakfast.toFixed(2)}`;
    adultPriceEl.textContent = `Additional adult price/night: USD ${additionalAdultPriceWithBreakfast.toFixed(2)}`;
    childrenPriceEl.textContent = `Children price/night: USD ${childrenPriceWithBreakfast.toFixed(2)}`;
    totalGuestPriceEl.textContent = `Total for ${nights} night(s): USD ${totalPrice.toFixed(2)}`;

    // Update Check Availability link
    const roomId = checkbox.dataset.roomId || '';
    const checkin = checkinout.value ? checkinout.value.split(' to ')[0] : '';
    const checkout = checkinout.value ? checkinout.value.split(' to ')[1] || '' : '';
    const bookingRoute = checkAvailabilityBtn.getAttribute('data-booking-route') || '/makePayemt';
    
	const selectedRoomId = "{{ $selectedRoom ? $selectedRoom->id : '' }}";

	checkAvailabilityBtn.href = `{{ route('makePayemt') }}?room_id=${selectedRoomId}&breakfast=${checkbox.checked ? 1 : 0}&checkin=${checkin}&checkout=${checkout}&adults=${adultsCount}&children=${childrenCount}&rooms=${roomCount}&total=${totalPrice.toFixed(2)}`;}

// Initialize with default values and event listeners on page load
document.addEventListener('DOMContentLoaded', () => {
    initializeDatepicker();
    
    // Set default values for adults, children and rooms
    const adultsEl = document.getElementById('guests-count-adults');
    const childrenEl = document.getElementById('guests-count-children');
    const roomEl = document.getElementById('guests-count-room');
    const guestsBtn = document.getElementById('guests-input-btn');
    
    // Always set the values to ensure they're correct
    adultsEl.textContent = "1";
    childrenEl.textContent = "0";
    roomEl.textContent = "0";
    
    // Set initial button text
    guestsBtn.textContent = "1 Adult, 0 Children, 0 Room";
    
    // Initialize guest inputs after setting default values
    initializeGuestInputs();
    
    // Initialize breakfast checkbox event
    const breakfastCheckbox = document.getElementById('breakfast-checkbox');
    if (breakfastCheckbox) {
        breakfastCheckbox.addEventListener('change', updatePrice);
    }
    
    updatePrice();
});
</script>

<!-- Include flatpickr CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initial counts
    let adults = 1;
    let children = 0;
    let rooms = 0;

    // DOM elements
    const adultsCountElem = document.getElementById('guests-count-adults');
    const childrenCountElem = document.getElementById('guests-count-children');
    const roomsCountElem = document.getElementById('guests-count-room');

    const adultsAddBtn = document.getElementById('adults-add-btn');
    const adultsSubsBtn = document.getElementById('adults-subs-btn');
    const childrenAddBtn = document.getElementById('children-add-btn');
    const childrenSubsBtn = document.getElementById('children-subs-btn');
    const roomAddBtn = document.getElementById('room-add-btn');
    const roomSubsBtn = document.getElementById('room-subs-btn');

    // Update UI function
    function updateGuestUI() {
        adultsCountElem.textContent = adults;
        childrenCountElem.textContent = children;
        roomsCountElem.textContent = rooms;
        updatePrice(); // Call your price update function if needed
    }

    // Event listeners for adults
    adultsAddBtn.addEventListener('click', function() {
        adults++;
        updateGuestUI();
    });

    adultsSubsBtn.addEventListener('click', function() {
        if (adults > 1) {
            adults--;
            updateGuestUI();
        }
    });

    // Event listeners for children
    childrenAddBtn.addEventListener('click', function() {
        children++;
        updateGuestUI();
    });

    childrenSubsBtn.addEventListener('click', function() {
        if (children > 0) {
            children--;
            updateGuestUI();
        }
    });

    // Event listeners for rooms
    roomAddBtn.addEventListener('click', function() {
        rooms++;
        updateGuestUI();
    });

    roomSubsBtn.addEventListener('click', function() {
        if (rooms > 1) {
            rooms--;
            updateGuestUI();
        }
    });

    // Initialize UI on page load
    updateGuestUI();
});


</script>
