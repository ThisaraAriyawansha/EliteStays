<!doctype html>
<html lang="en">


<!-- Mirrored from shreethemes.net/geotrip-live/geotrip/booking-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Feb 2025 18:59:47 GMT -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>BoomBitz</title>
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

	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
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


		<!-- ============================ Booking Page ================================== -->
		<section class="pt-4 gray-simple position-relative">
			<div class="container">

				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div id="stepper" class="bs-stepper stepper-outline mb-5">
							<div class="bs-stepper-header">
								<!-- Step 1 -->
								<div class="step active" data-target="#step-1">
									<div class="text-center">
										<button type="button" class="step-trigger mb-0" id="steppertrigger1">
											<span class="bs-stepper-circle">1</span>
										</button>
										<h6 class="bs-stepper-label d-none d-md-block">Tour Review</h6>
									</div>
								</div>
								<div class="line"></div>

								<!-- Step 2 -->
								<div class="step" data-target="#step-2">
									<div class="text-center">
										<button type="button" class="step-trigger mb-0" id="steppertrigger2">
											<span class="bs-stepper-circle">2</span>
										</button>
										<h6 class="bs-stepper-label d-none d-md-block">Traveler Info</h6>
									</div>
								</div>
								<div class="line"></div>

								<!-- Step 3 -->
								<div class="step" data-target="#step-3">
									<div class="text-center">
										<button type="button" class="step-trigger mb-0" id="steppertrigger3">
											<span class="bs-stepper-circle">3</span>
										</button>
										<h6 class="bs-stepper-label d-none d-md-block">Make Payment</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row align-items-start">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="row align-items-start">
							<div class="col-xl-8 col-lg-8 col-md-12">
								<div class="card p-3 mb-xl-0 mb-lg-0 mb-3">

									<!-- Booking Info -->
									<div class="card-box list-layout-block border br-dashed rounded-3 p-2">
										<div class="row">

											<div class="col-xl-4 col-lg-3 col-md">
												<div class="cardImage__caps rounded-2 overflow-hidden h-100">
													<img class="img-fluid h-100 object-fit" src="assets/img/hotel/hotel-1.jpg" alt="image">
												</div>
											</div>

											<div class="col-xl col-lg col-md">
												<div class="listLayout_midCaps mt-md-0 mt-3 mb-md-0 mb-3">
													<div class="d-flex align-items-center justify-content-start">
														<div class="d-inline-block">
															<i class="fa fa-star text-warning text-xs"></i>
															<i class="fa fa-star text-warning text-xs"></i>
															<i class="fa fa-star text-warning text-xs"></i>
															<i class="fa fa-star text-warning text-xs"></i>
															<i class="fa fa-star text-warning text-xs"></i>
														</div>
													</div>
													<h4 class="fs-5 fw-bold mb-1">Hotel Chancellor@Orchard</h4>
													<ul class="row g-2 p-0">
														<li class="col-auto">
															<p class="text-muted-2 text-md">Waterloo and Southwark</p>
														</li>
														<li class="col-auto">
															<p class="text-muted-2 text-md fw-bold">.</p>
														</li>
														<li class="col-auto">
															<p class="text-muted-2 text-md">9.8 km from Sri Lanka Airport</p>
														</li>
													</ul>
													<div class="d-flex align-items-center mb-3">
														<div class="col-auto">
															<div class="square--40 rounded-2 bg-primary text-light fw-semibold">4.8</div>
														</div>
														<div class="col-auto text-start ps-2">
															<div class="text-md text-dark fw-medium">Exceptional</div>
															<div class="text-md text-muted-2">3,014 reviews</div>
														</div>
													</div>
													<div class="position-relative mt-3">
														<div class="d-flex flex-wrap align-items-center">
															<div class="d-inline-flex align-items-center border br-dashed rounded-2 p-2 me-2 mb-2">
																<div class="export-icon text-muted-2"><i class="fa-solid fa-bed"></i></div>
																<div class="export ps-2">
																	<span class="mb-0 text-muted-2 fw-semibold me-1">03</span><span
																		class="mb-0 text-muted-2 text-md">Beds</span>
																</div>
															</div>
															<div class="d-inline-flex align-items-center border br-dashed rounded-2 p-2 me-2 mb-2">
																<div class="export-icon text-muted-2"><i class="fa-solid fa-bath"></i></div>
																<div class="export ps-2">
																	<span class="mb-0 text-muted-2 fw-semibold me-1">02</span><span
																		class="mb-0 text-muted-2 text-md">Baths</span>
																</div>
															</div>
															<div class="d-inline-flex align-items-center border br-dashed rounded-2 p-2 me-2 mb-2">
																<div class="export-icon text-muted-2"><i
																		class="fa-solid fa-house-flood-water-circle-arrow-right"></i></div>
																<div class="export ps-2">
																	<span class="mb-0 text-muted-2 fw-semibold me-1">5</span><span
																		class="mb-0 text-muted-2 text-md">Floor</span>
																</div>
															</div>
															<div class="d-inline-flex align-items-center border br-dashed rounded-2 p-2 me-2 mb-2">
																<div class="export-icon text-muted-2"><i class="fa-solid fa-user-group"></i></div>
																<div class="export ps-2 text-muted-2">
																	<span class="mb-0 text-muted-2 fw-semibold me-1">04</span><span
																		class="mb-0 text-muted-2 text-md">Guests</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<!-- Flight info -->
									<div class="flight-boxyhc mt-4">
										<h4 class="fs-5">Flight Detail</h4>
										<div class="flights-accordion">
											<div class="flights-list-item bg-white border rounded-3 p-2">
												<div class="row gy-4 align-items-center justify-content-between">

													<div class="col">
														<div class="row">
															<div class="col-xl-12 col-lg-12 col-md-12">
																<div class="d-flex align-items-center mb-2">
																	<span class="label bg-light-primary text-primary me-2">Departure</span>
																	<span class="text-muted text-sm">26 Jun 2023</span>
																</div>
															</div>
															<div class="col-xl-12 col-lg-12 col-md-12">
																<div class="row gx-lg-5 gx-3 gy-4 align-items-center">

																	<div class="col-sm-auto">
																		<div class="d-flex align-items-center justify-content-start">
																			<div class="d-start fl-pic">
																				<img class="img-fluid" src="assets/img/air-4.png" width="45" alt="image">
																			</div>
																			<div class="d-end fl-title ps-2">
																				<div class="text-dark fw-medium">Qutar Airways</div>
																				<div class="text-sm text-muted">First Class</div>
																			</div>
																		</div>
																	</div>

																	<div class="col">
																		<div class="row gx-3 align-items-center">
																			<div class="col-auto">
																				<div class="text-dark fw-bold">07:40</div>
																				<div class="text-muted text-sm fw-medium">DOH</div>
																			</div>

																			<div class="col text-center">
																				<div class="flightLine departure">
																					<div></div>
																					<div></div>
																				</div>
																				<div class="text-muted text-sm fw-medium mt-3">Direct</div>
																			</div>

																			<div class="col-auto">
																				<div class="text-dark fw-bold">12:20</div>
																				<div class="text-muted text-sm fw-medium">DEL</div>
																			</div>
																		</div>
																	</div>

																	<div class="col-md-auto">
																		<div class="text-dark fw-medium">4H 40M</div>
																		<div class="text-muted text-sm fw-medium">2 Stop</div>
																	</div>
																</div>
															</div>
														</div>

														<div class="row mt-4">
															<div class="col-xl-12 col-lg-12 col-md-12">
																<div class="d-flex align-items-center mb-2">
																	<span class="label bg-light-success text-success me-2">Return</span>
																	<span class="text-muted text-sm">26 Jun 2023</span>
																</div>
															</div>

															<div class="col-xl-12 col-lg-12 col-md-12">
																<div class="row gx-lg-5 gx-3 gy-4 align-items-center">
																	<div class="col-sm-auto">
																		<div class="d-flex align-items-center justify-content-start">
																			<div class="d-start fl-pic">
																				<img class="img-fluid" src="assets/img/air-1.png" width="45" alt="image">
																			</div>
																			<div class="d-end fl-title ps-2">
																				<div class="text-dark fw-medium">Qutar Airways</div>
																				<div class="text-sm text-muted">Business</div>
																			</div>
																		</div>
																	</div>

																	<div class="col">
																		<div class="row gx-3 align-items-center">
																			<div class="col-auto">
																				<div class="text-dark fw-bold">14:10</div>
																				<div class="text-muted text-sm fw-medium">DEL</div>
																			</div>

																			<div class="col text-center">
																				<div class="flightLine return">
																					<div></div>
																					<div></div>
																				</div>
																				<div class="text-muted text-sm fw-medium mt-3">Direct</div>
																			</div>

																			<div class="col-auto">
																				<div class="text-dark fw-bold">19:30</div>
																				<div class="text-muted text-sm fw-medium">DOH</div>
																			</div>
																		</div>
																	</div>

																	<div class="col-md-auto">
																		<div class="text-dark fw-medium">5H 30M</div>
																		<div class="text-muted text-sm fw-medium">2 Stop</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<!-- Good to Know -->
									<div class="flight-boxyhc mt-4">
										<h4 class="fs-5">Good To Know</h4>
										<div class="effloration-wrap">
											<p>All Prices are in Indian Rupees and are subject to change without prior notice. In the case FIT
												flight inclusive package, the full amount of the flight will be payable at the time of booking.
											</p>
											<ul class="row align-items-center g-1 mb-0 p-0">
												<li class="col-12"><span class="text-success text-md"><i
															class="fa-solid fa-circle-dot me-2"></i>Free Cancellation till 10 Aug 2023</span></li>
												<li class="col-12"><span class="text-muted-2 text-md"><i
															class="fa-solid fa-circle-dot me-2"></i>10 days: 100%</span></li>
												<li class="col-12"><span class="text-muted-2 text-md"><i
															class="fa-solid fa-circle-dot me-2"></i>10 to 15 days: 75% + Non Refundable
														Component</span></li>
												<li class="col-12"><span class="text-muted-2 text-md"><i
															class="fa-solid fa-circle-dot me-2"></i>15 to 30 days: 30% + Non Refundable
														Component</span></li>
												<li class="col-12"><span class="text-success text-md"><i
															class="fa-solid fa-circle-dot me-2"></i>10Hotel / Air: 100% in case of non-refundable
														ticket / Hotel Room</span></li>
												<li class="col-12"><span class="text-muted-2 text-md"><i
															class="fa-solid fa-circle-dot me-2"></i>10Cruise / Visa: On Actuals</span></li>
											</ul>
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
													<p class="text-dark fw-semibold lh-base text-md mb-0">27 Aug 2023</p>
													<span class="text-dark text-md">From 14:40</span>
												</div>
											</div>
											<div class="col-6">
												<div class="gray rounded-2 p-2">
													<span class="d-block text-muted-3 text-sm fw-medium text-uppercase mb-2">Check-Out</span>
													<p class="text-dark fw-semibold lh-base text-md mb-0">31 Aug 2023</p>
													<span class="text-dark text-md">By 11:50</span>
												</div>
											</div>
										</div>
										<div class="row align-items-center justify-content-between mb-4">
											<div class="col-12">
												<p class="text-muted-2 text-sm text-uppercase fw-medium mb-1">Total Length of Stay:</p>
												<div class="d-flex align-items-center">
													<div class="square--30 circle text-seegreen bg-light-seegreen"><i
															class="fa-regular fa-calendar"></i></div><span class="text-dark fw-semibold ms-2">3 Days \
														2 Night</span>
												</div>
											</div>
										</div>
										<div class="row align-items-center justify-content-between">
											<div class="col-12">
												<p class="text-muted-2 text-sm text-uppercase fw-medium mb-1">You Selected</p>
												<div class="d-flex align-items-center flex-column">
													<p class="mb-0">King Bed Appolo Resort with 3 Rooms. <a href="#"
															class="fw-medum text-primary">Change your Selection</a></p>
												</div>
											</div>
										</div>
									</div>

									<div class="bott-block d-block mb-3">
										<h5 class="fw-semibold fs-6">Your Price Summary</h5>
										<ul class="list-group list-group-borderless">
											<li class="list-group-item d-flex justify-content-between align-items-center">
												<span class="fw-medium mb-0">Rooms & Offers</span>
												<span class="fw-semibold">LKR750.52</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center">
												<span class="fw-medium mb-0">Total Discount<span
														class="badge rounded-1 text-bg-danger smaller mb-0 ms-2">10% off</span></span>
												<span class="fw-semibold">-LKR7.50</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center">
												<span class="fw-medium mb-0">8% Taxes % Fees</span>
												<span class="fw-semibold">LKR10.10</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center">
												<span class="fw-medium text-success mb-0">Total Price</span>
												<span class="fw-semibold text-success">LKR772.40</span>
											</li>
										</ul>
									</div>
									<div class="bott-block">
										<button class="btn fw-medium btn-primary full-width" type="button">Request To Book</button>
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="text-center d-flex align-items-center justify-content-center mt-4">
							<a href="{{ route('bookingTravelerInfo') }}" class="btn btn-md btn-primary fw-semibold">Next<i
									class="fa-solid fa-arrow-right ms-2"></i></a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ============================ Booking Page End ================================== -->


		<!-- ============================ Footer Start ================================== -->
        @include('layouts.publicFooter')

		<!-- ============================ Footer End ================================== -->

		<!-- Log In Modal -->
		<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
				<div class="modal-content" id="loginmodal">
					<div class="modal-header">
						<h4 class="modal-title fs-6">Sign In / Register</h4>
						<a href="#" class="text-muted fs-4" data-bs-dismiss="modal" aria-label="Close"><i
								class="fa-solid fa-square-xmark"></i></a>
					</div>
					<div class="modal-body">
						<div class="modal-login-form py-4 px-md-3 px-0">
							<form>

								<div class="form-floating mb-4">
									<input type="email" class="form-control" placeholder="name@example.com">
									<label>User Name</label>
								</div>
								<div class="form-floating mb-4">
									<input type="password" class="form-control" placeholder="Password">
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
										<a href="JavaScript:Void(0);" class="text-primary fw-medium">Forget Password?</a>
									</div>
								</div>
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
						<p>Don't have an account yet?<a href="signup.html" class="text-primary fw-medium ms-1">Sign Up</a></p>
					</div>
				</div>
			</div>
		</div>
		<!-- End Modal -->

		<!-- Choose Currency Modal -->
	


		<!-- Choose Countries Modal -->


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

	<script src="assets/js/custom.js"></script>
	<!-- ============================================================== -->
	<!-- This page plugins -->
	<!-- ============================================================== -->

</body>


<!-- Mirrored from shreethemes.net/geotrip-live/geotrip/booking-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Feb 2025 18:59:48 GMT -->
</html>