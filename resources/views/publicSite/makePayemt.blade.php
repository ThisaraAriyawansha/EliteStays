<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BoomBitz</title>
  <link rel="icon" type="image/x-icon" href="assets/img/headerboombitz.png">
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
  <link href="assets/css/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/fontawesome.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>
    <div id="main-wrapper">
        @include('layouts.nav')
        <section class="pt-4 gray-simple position-relative">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="div-title d-flex align-items-center mb-3">
                            <h4>Billing Details</h4>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('roombooking') }}" method="POST" id="roombooking" name="roombooking">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $roomId }}">
                            <input type="hidden" name="breakfast" value="{{ $breakfast == 'Included' ? 1 : 0 }}">
                            <input type="hidden" name="checkin" value="{{ $checkin }}">
                            <input type="hidden" name="checkout" value="{{ $checkout }}">
                            <input type="hidden" name="adults" value="{{ $adults }}">
                            <input type="hidden" name="children" value="{{ $children }}">
                            <input type="hidden" name="rooms" value="{{ $rooms }}">
                            <input type="hidden" name="total" value="{{ $totalPrice }}">
                            <div class="row align-items-start">
                                <div class="col-xl-8 col-lg-8 col-md-12">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <h4>Basic Detail</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Billing Name</label>
                                                        <input type="text" name="billing_name" class="form-control" placeholder="Billing Name" value="{{ old('billing_name') }}">
                                                        @error('billing_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Phone</label>
                                                        <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}">
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Passport Number</label>
                                                        <input type="text" name="passport_number" class="form-control" placeholder="Passport Number" value="{{ old('passport_number') }}">
                                                        @error('passport_number')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Address</label>
                                                        <input type="text" name="address" class="form-control" placeholder="Address" value="{{ old('address') }}">
                                                        @error('address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Country</label>
                                                        <input type="text" name="country" class="form-control" placeholder="Country" value="{{ old('country') }}">
                                                        @error('country')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">City/State</label>
                                                        <input type="text" name="city_state" class="form-control" placeholder="City" value="{{ old('city_state') }}">
                                                        @error('city_state')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Postal Code</label>
                                                        <input type="text" name="postal_code" class="form-control" placeholder="Postal Code" value="{{ old('postal_code') }}">
                                                        @error('postal_code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Special Notes</label>
                                                        <textarea name="special_notes" class="form-control ht-200">{{ old('special_notes') }}</textarea>
                                                        @error('special_notes')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <div class="side-block card rounded-2 p-3">
                                        <h5 class="fw-semibold fs-6">Reservation Summary</h5>
                                        <div class="mid-block rounded-2 border br-dashed p-2 mb-3">
                                            <div class="row align-items-center justify-content-between g-2 mb-4">
                                                <div class="col-6">
                                                    <div class="gray rounded-2 p-2">
                                                        <span class="d-block text-muted-3 text-sm fw-medium text-uppercase mb-2">Check-In</span>
                                                        <p class="text-dark fw-semibold lh-base text-md mb-0">{{ \Carbon\Carbon::parse($checkin)->format('d M Y') }}</p>
                                                        <span class="text-dark text-md">From 14:40</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="gray rounded-2 p-2">
                                                        <span class="d-block text-muted-3 text-sm fw-medium text-uppercase mb-2">Check-Out</span>
                                                        <p class="text-dark fw-semibold lh-base text-md mb-0">{{ \Carbon\Carbon::parse($checkout)->format('d M Y') }}</p>
                                                        <span class="text-dark text-md">By 11:50</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row align-items-center justify-content-between mb-4">
                                                <div class="col-12">
                                                    <p class="text-muted-2 text-sm text-uppercase fw-medium mb-1">Total Length of Stay:</p>
                                                    <div class="d-flex align-items-center">
                                                        <div class="square--30 circle text-seegreen bg-light-seegreen">
                                                            <i class="fa-regular fa-calendar"></i>
                                                        </div>
                                                        <span class="text-dark fw-semibold ms-2">{{ $staySummary }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row align-items-center justify-content-between">
                                                <div class="col-12">
                                                    <p class="text-muted-2 text-sm text-uppercase fw-medium mb-1">You Selected</p>
                                                    <div class="d-flex align-items-center flex-column">
                                                        <p class="mb-0">
                                                            You Selected {{ $rooms }} Room{{ $rooms > 1 ? 's' : '' }}.
                                                            Breakfast: {{ $breakfast }}.
                                                            Guests: {{ $adults }} Adult{{ $adults > 1 ? 's' : '' }}, {{ $children }} Child{{ $children > 1 ? 'ren' : '' }}.
                                                            <a href="{{ route('hotelFilter') }}" class="fw-medium text-primary">Change your Selection</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bott-block d-block mb-3">
                                            <h5 class="fw-semibold fs-6">Your Price Summary</h5>
                                            <ul class="list-group list-group-borderless">
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <span class="fw-medium text-success mb-0">Total Price</span>
                                                    <span class="fw-semibold text-success">USD {{ number_format($totalPrice, 2) }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bott-block">
                                            <button type="submit" class="btn fw-medium btn-primary full-width">Request To Book</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        @include('layouts.publicFooter')
        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="fa-solid fa-sort-up"></i></a>
    </div>
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
    <script src="assets/js/custom.js"></script>
</body>
</html>

<script>$(document).ready(function() {
    // Example: Populate hidden fields if needed
    const urlParams = new URLSearchParams(window.location.search);
    const roomId = urlParams.get('room_id');
    const breakfast = urlParams.get('breakfast');
    const checkin = urlParams.get('checkin');
    const checkout = urlParams.get('checkout');
    const adults = urlParams.get('adults');
    const children = urlParams.get('children');
    const rooms = urlParams.get('rooms');
    const total = urlParams.get('total');

    if (roomId) $('input[name="room_id"]').val(roomId);
    if (breakfast) $('input[name="breakfast"]').val(breakfast);
    if (checkin) $('input[name="checkin"]').val(checkin);
    if (checkout) $('input[name="checkout"]').val(checkout);
    if (adults) $('input[name="adults"]').val(adults);
    if (children) $('input[name="children"]').val(children);
    if (rooms) $('input[name="rooms"]').val(rooms);
    if (total) $('input[name="total"]').val(total);
});
</script>