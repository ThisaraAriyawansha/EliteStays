<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Find My Bookings</title>
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

  <!-- Include Select2 CSS -->

<!-- Include jQuery (if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<!-- Custom Red Border Style -->
<style>
    .select2-container--default .select2-selection--single {
        border: 2px solid #ff6666 !important; /* soft red */
        border-radius: 6px;
        height: 42px;
        padding: 6px 12px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 28px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 7px;
    }

    /* Responsive Fix */
    .select2-container {
        width: 100% !important;
    }
</style>

<body>
    <!-- Preloader -->
	<div id="preloader">
		<div class="preloader"><span></span><span></span></div>
	</div>
    <!-- Main wrapper -->
    <div id="main-wrapper">
        <!-- Navigation -->
        @include('layouts.nav')
        <div class="clearfix"></div>

        <!-- Hero Banner -->
        <div class="py-5 bg-primary position-relative">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="search-wrap position-relative">
                            <form method="GET" action="{{ route('hotelFilter') }}">
                                <div class="row align-items-end gy-3 gx-md-3 gx-sm-2">
                                    <div class="col-xl-8 col-lg-7 col-md-12">
                                        <div class="row gy-3 gx-md-3 gx-sm-2">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                                                <div class="form-group mb-0">
                                                    <label class="text-light text-uppercase opacity-75">Where</label>
                                                    <select class="goingto form-control fw-bold" name="leaving[]" multiple="multiple">
                                                        @foreach($filterOptions['cities'] as $city)
                                                            <option value="{{ $city }}" {{ in_array($city, $filters['leaving']) ? 'selected' : '' }}>
                                                                {{ $city }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group mb-0">
                                                    <label class="text-light text-uppercase opacity-75">Checkin & Checkout</label>
                                                    <input type="text" class="form-control fw-bold" placeholder="Check-In & Check-Out" id="checkinout" readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-12">
                                        <div class="row align-items-end gy-3 gx-md-3 gx-sm-2">
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                                <div class="form-group mb-0">
                                                    <label class="text-light text-uppercase opacity-75">Guests & Rooms</label>
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
                                                                <span class="guests-input__value"><span id="guests-count-room">0</span> Rooms</span>
                                                                <span class="guests-input__ctrl plus" id="room-add-btn"><i class="fa-solid fa-plus"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                                <div class="form-group mb-0">
                                                    <button type="submit" class="btn btn-whites text-primary full-width fw-medium"><i class="fa-solid fa-magnifying-glass me-2"></i>Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Searches List -->
        <section class="gray-simple">
            <div class="container">
                <div class="row justify-content-between gy-4 gx-xl-4 gx-lg-3 gx-md-3 gx-4 ">
                    <!-- Sidebar -->
                    <div class="col-xl-3 col-lg-4 col-md-12 ">
							<form class="filter-searchBar bg-white rounded-3" method="GET" action="{{ route('hotelFilter') }}">
								<div class="filter-searchBar-head border-bottom">
									<div class="searchBar-headerBody d-flex align-items-start justify-content-between px-3 py-3">
										<div class="searchBar-headerfirst">
											<h6 class="fw-bold fs-5 m-0">Room Filters</h6>
											<p class="text-md text-muted m-0">Showing <span id="room-count">{{ $roomCount }}</span> Rooms</p>
										</div>
										<div class="searchBar-headerlast text-end">
											<a href="{{ url()->current() }}" class="text-md fw-medium text-primary active">Clear All</a>
										</div>
									</div>
								</div>
								<div class="filter-searchBar-body">
									<!-- Hotel Name Filter -->
									<div class="searchBar-single px-3 py-3 border-bottom">
										<div class="searchBar-single-title d-flex mb-3">
											<h6 class="sidebar-subTitle fs-6 fw-medium m-0">Hotel Name</h6>
										</div>
										<div class="searchBar-single-wrap">
										<!-- Hotel Name Filter -->
											<select id="hotel_name" class="form-select select2-searchable" name="hotel_name">
												<option value="">All Hotels</option>
												@foreach($filterOptions['hotel_names'] as $hotelName)
													<option value="{{ $hotelName }}" {{ $filters['hotel_name'] == $hotelName ? 'selected' : '' }}>
														{{ $hotelName }}
													</option>
												@endforeach
											</select>
										</div>
									</div>
									<!-- Location Filter -->
									<div class="searchBar-single px-3 py-3 border-bottom">
										<div class="searchBar-single-title d-flex mb-3">
											<h6 class="sidebar-subTitle fs-6 fw-medium m-0">Location</h6>
										</div>
										<div class="searchBar-single-wrap">
											<select id="city" class="form-select select2-searchable" name="city">
												<option value="">All Cities</option>
												@foreach($filterOptions['cities'] as $city)
													<option value="{{ $city }}" {{ $filters['city'] == $city ? 'selected' : '' }}>
														{{ $city }}
													</option>
												@endforeach
											</select>
										</div>
									</div>
									<!-- Bed Types -->
									<div class="searchBar-single px-3 py-3 border-bottom">
										<div class="searchBar-single-title d-flex mb-3">
											<h6 class="sidebar-subTitle fs-6 fw-medium m-0">Bed Type</h6>
										</div>
										<div class="searchBar-single-wrap">
											<ul class="row align-items-center justify-content-between p-0 gx-3 gy-2 mb-0">
												@foreach($filterOptions['bed_types'] as $bedType)
													<li class="col-6">
														<input type="text" class="btn-check" id="bedtype-{{ \Illuminate\Support\Str::slug($bedType) }}"
															name="bed_type[]" value="{{ $bedType }}"
															{{ in_array($bedType, $filters['bed_type']) ? 'checked' : '' }}>
														<label class="btn btn-sm btn-secondary rounded-1 fw-medium full-width"
															for="bedtype-{{ \Illuminate\Support\Str::slug($bedType) }}">{{ $bedType }}</label>
													</li>
												@endforeach
											</ul>
										</div>
									</div>
									<!-- Price Range -->
									<div class="searchBar-single px-3 py-3 border-bottom">
										<div class="searchBar-single-title d-flex mb-3">
											<h6 class="sidebar-subTitle fs-6 fw-medium m-0">Pricing Range in USD</h6>
										</div>
										<div class="searchBar-single-wrap">
											<input type="text" class="js-range-slider" name="my_range" value="{{ explode(';', $filters['my_range'])[0] }};{{ explode(';', $filters['my_range'])[1] }}"
												data-skin="round" data-type="double" data-min="{{ $filterOptions['price_range']['min'] }}"
												data-max="{{ $filterOptions['price_range']['max'] }}" data-grid="false" data-prefix="$">
										</div>
									</div>
									<!-- Room Size -->
									<div class="searchBar-single px-4 py-3 border-bottom">
										<div class="searchBar-single-title d-flex mb-3">
											<h6 class="sidebar-subTitle fs-6 fw-medium m-0">Room Size (sqm)</h6>
										</div>
										<div class="searchBar-single-wrap">
											<input type="text" class="js-range-slider" name="size_range" value="{{ explode(';', $filters['size_range'])[0] }};{{ explode(';', $filters['size_range'])[1] }}"
												data-skin="round" data-type="double" data-min="{{ $filterOptions['size_range']['min'] }}"
												data-max="{{ $filterOptions['size_range']['max'] }}" data-grid="false" data-postfix="sqm">
										</div>
									</div>
									<!-- Breakfast Options -->
									<div class="searchBar-single px-3 py-3">
										<div class="searchBar-single-title d-flex mb-3">
											<h6 class="sidebar-subTitle fs-6 fw-medium m-0">Breakfast Options</h6>
										</div>
										<div class="searchBar-single-wrap">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" id="breakfast_included"
													name="breakfast_included" value="1"
													{{ $filters['breakfast_included'] ? 'checked' : '' }}>
												<label class="form-check-label" for="breakfast_included">Breakfast Included</label>
											</div>
										</div>
									</div>
									<!-- Filter Button -->
									<div class="searchBar-single px-3 py-3">
										<button type="submit" class="btn btn-primary full-width fw-medium">
											<i class="fa-solid fa-filter me-2"></i>Apply Filters
										</button>
									</div>
								</div>
							</form>
						</div>

                    <!-- All List -->
                    <div class="col-xl-9 col-lg-8 col-md-12">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <h5 class="fw-bold fs-6 mb-lg-0 mb-3">Showing <span id="room-count">{{ $roomCount }}</span> Room Results</h5>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-12">
                                <div class="d-flex align-items-center justify-content-start justify-content-lg-end flex-wrap">
                                    <div class="flsx-first me-2">

                                    </div>
                                    <div class="flsx-first mt-sm-0 mt-2">
                                        <ul class="nav nav-pills nav-fill p-1 small lights blukker bg-primary rounded-3 shadow-sm" id="filtersblocks" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link {{ $filters['sort'] == 'trending' ? 'active' : '' }} rounded-3" href="{{ route('hotelFilter', array_merge($filters, ['sort' => 'trending'])) }}">Trending</a>
                                            </li>

                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link {{ $filters['sort'] == 'lowprice' ? 'active' : '' }} rounded-3" href="{{ route('hotelFilter', array_merge($filters, ['sort' => 'lowprice'])) }}">Lowest Price</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center g-4 mt-2">
                            @foreach ($rooms as $room)
                                <!-- Single Room -->
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <div class="card list-layout-block rounded-3 p-3">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-3 col-md">
                                                <div class="cardImage__caps rounded-2 overflow-hidden h-100">
													<img class="img-fluid h-100 object-fit" src="{{ env('HOST_URL') . '/' . ltrim($room->image_path, '/') }}" alt="Room Image">                                                </div>
                                            </div>
                                            <div class="col-xl col-lg col-md">
                                                <div class="listLayout_midCaps mt-md-0 mt-3 mb-md-0 mb-3">
                                                    <h4 class="fs-5 fw-bold mb-1">{{ $room->name }}</h4>
                                                    <p class="text-muted-2 text-md">{{ $room->hotel->name }}, {{ $room->hotel->city }}</p>
                                                    <div class="detail ellipsis-container mt-3">
                                                        <span class="ellipsis">{{ $room->bed_type }}</span>
                                                        <span class="ellipsis">{{ $room->size }} sqm</span>
                                                        @if ($room->breakfast_price > 0)
                                                            <span class="ellipsis">Breakfast Included</span>
                                                        @endif
                                                    </div>
                                                    <div class="position-relative mt-3">
                                                        <div class="fw-medium text-dark">{{ $room->description }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-auto col-lg-auto col-md-auto text-right text-md-left d-flex align-items-start align-items-md-end flex-column">
                                                <div class="row align-items-center justify-content-start justify-content-md-end gx-2 mb-3">
                                                    <div class="col-auto text-start text-md-end">
                                                        <div class="text-md text-dark fw-medium">Excellent</div>
                                                        <div class="text-md text-muted-2">Based on availability</div>
                                                    </div>
                                                </div>
                                                <div class="position-relative mt-auto full-width">
                                                    <div class="d-flex align-items-center justify-content-start justify-content-md-end mb-1">
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-start justify-content-md-end">
                                                        <div class="text-dark fw-bold fs-3">USD {{ $room->price_per_night }}</div>
                                                    </div>
                                                    <div class="d-flex align-items-start align-items-md-end justify-content-start justify-content-md-end flex-column mb-2">
                                                        <div class="text-muted-2 text-sm">+USD {{ $room->breakfast_price }} for Breakfast (Optional)</div>
                                                        <div class="text-muted-2 text-sm">Per Night</div>
                                                    </div>
                                                    <div class="d-flex align-items-start align-items-md-end text-start text-md-end flex-column">
                                                        <a href="{{ route('hotelDetails', ['id' => $room->hotel->id, 'room_id' => $room->id, 'breakfast' => 1]) }}" class="btn btn-md btn-primary full-width fw-medium px-lg-4">Book<i class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Pagination -->
                            <div class="col-xl-12 col-lg-12 col-12">
                                <div class="pags card py-2 px-5">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination m-0 p-0">
                                            @if ($rooms->onFirstPage())
                                                <li class="page-item disabled">
                                                    <span class="page-link" aria-hidden="true"><i class="fa-solid fa-arrow-left-long"></i></span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $rooms->previousPageUrl() }}" aria-label="Previous">
                                                        <span aria-hidden="true"><i class="fa-solid fa-arrow-left-long"></i></span>
                                                    </a>
                                                </li>
                                            @endif
                                            @foreach ($rooms->getUrlRange(1, $rooms->lastPage()) as $page => $url)
                                                <li class="page-item {{ $page == $rooms->currentPage() ? 'active' : '' }}">
                                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endforeach
                                            @if ($rooms->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $rooms->nextPageUrl() }}" aria-label="Next">
                                                        <span aria-hidden="true"><i class="fa-solid fa-arrow-right-long"></i></span>
                                                    </a>
                                                </li>
                                            @else
                                                <li class="page-item disabled">
                                                    <span class="page-link" aria-hidden="true"><i class="fa-solid fa-arrow-right-long"></i></span>
                                                </li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        @include('layouts.publicFooter')

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="fa-solid fa-sort-up"></i></a>
    </div>

    <!-- Scripts -->
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
</body>
</html>

<script>
	document.addEventListener('DOMContentLoaded', function() {
    // Initialize Select2 for the city multi-select
    $('.goingto').select2({
        placeholder: 'Select cities',
        allowClear: true,
        width: '100%'
    });

    // Initialize price range slider
    const priceSlider = document.querySelector('input[name="my_range"]');
    if (priceSlider) {
        const min = parseFloat(priceSlider.dataset.min);
        const max = parseFloat(priceSlider.dataset.max);
        const [from, to] = priceSlider.value.split(';').map(val => parseFloat(val));
        
        $(priceSlider).ionRangeSlider({
            skin: 'round',
            type: 'double',
            min: min,
            max: max,
            from: from,
            to: to,
            grid: false,
            prefix: 'LKR ',
            step: 100, // Adjusted for LKR
            onFinish: function(data) {
                priceSlider.value = data.from + ';' + data.to;
            }
        });
    }

    // Initialize size range slider
    const sizeSlider = document.querySelector('input[name="size_range"]');
    if (sizeSlider) {
        const min = parseFloat(sizeSlider.dataset.min);
        const max = parseFloat(sizeSlider.dataset.max);
        const [from, to] = sizeSlider.value.split(';').map(val => parseFloat(val));
        
        $(sizeSlider).ionRangeSlider({
            skin: 'round',
            type: 'double',
            min: min,
            max: max,
            from: from,
            to: to,
            grid: false,
            postfix: ' sqm',
            step: 1,
            onFinish: function(data) {
                sizeSlider.value = data.from + ';' + data.to;
            }
        });
    }

    // Handle filter form submission (sidebar)
    const filterForm = document.querySelector('.filter-searchBar form');
    if (filterForm) {
        filterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(filterForm);
            const params = new URLSearchParams(formData);
            window.location.href = window.location.pathname + '?' + params.toString();
        });
    }

    // Handle search form submission (hero banner)
    const searchForm = document.querySelector('.search-wrap form');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(searchForm);
            const params = new URLSearchParams(formData);
            window.location.href = window.location.pathname + '?' + params.toString();
        });
    }
});
</script>


<script>
$(document).ready(function() {
    $('.select2-searchable').select2({
        placeholder: "Select an option",
        allowClear: true,
        width: '100%' // Ensures it fits the container
    });
});
</script>
