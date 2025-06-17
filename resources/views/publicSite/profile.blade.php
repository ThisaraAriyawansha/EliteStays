<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Profile - BoomBitz</title>
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
    <link href="{{ asset('assets/css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>

    <div id="main-wrapper">
        @include('layouts.nav')
        <div class="clearfix"></div>

        <!-- Dashboard Menu -->
        @include('layouts.profileNavbar')


        <!-- Profile Content -->
        <section class="pt-5 gray-simple position-relative">
            <div class="container">
                

                <!-- Success/Error Messages -->
                @if (session('success'))
                    <div class="alert alert-success text-center mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger text-center mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row align-items-start justify-content-between gx-xl-4">
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="card rounded-2 me-xl-5 mb-4">
                            <div class="card-top bg-primary position-relative">
                                <div class="position-absolute end-0 top-0 mt-4 me-3">
                                    <a href="{{ route('customer.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="square--40 circle bg-light-dark text-light"><i class="fa-solid fa-right-from-bracket"></i></a>
                                    <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                <div class="py-5 px-3">
                                    <div class="crd-thumbimg text-center">
                                        <div class="p-2 d-flex align-items-center justify-content-center brd">
                                            <img src="{{ $customerModel->image_path ? asset( $customerModel->image_path) : asset('assets/images/default-avatar.png') }}" alt="Profile Image" class="avatar avatar-xl" id="uploadfile-1-preview">
                                        </div>
                                    </div>
                                    <div class="crd-capser text-center">
                                        <h5 class="mb-0 text-light fw-semibold">{{ $customerModel->username ?? 'Guest' }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-middle px-4 py-5">
                                <div class="crdapproval-groups">
                                    <div class="crdapproval-single d-flex align-items-center justify-content-start mb-4">
                                        <div class="crdapproval-item">
                                            <div class="square--50 circle bg-light-success text-success"><i class="fa-solid fa-envelope-circle-check fs-5"></i></div>
                                        </div>
                                        <div class="crdapproval-caps ps-2">
                                            <p class="fw-semibold text-dark lh-2 mb-0">Verified Email</p>
                                            <p class="text-md text-muted lh-1 mb-0">{{ $customerModel->created_at->format('d M Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="crdapproval-single d-flex align-items-center justify-content-start mb-4">
                                        <div class="crdapproval-item">
                                            <div class="square--50 circle {{ $customerModel->mobile ? 'bg-light-success text-success' : 'bg-light-danger text-danger' }}"><i class="fa-solid {{ $customerModel->mobile ? 'fa-check' : 'fa-times' }} fs-5"></i></div>
                                        </div>
                                        <div class="crdapproval-caps ps-2">
                                            <p class="fw-semibold text-dark lh-2 mb-0">Verified Mobile Number</p>
                                        </div>
                                    </div>
                                    <div class="crdapproval-single d-flex align-items-center justify-content-start">
                                        <div class="crdapproval-item">
                                            <div class="square--50 circle {{ $customerModel->first_name && $customerModel->last_name ? 'bg-light-success text-success' : 'bg-light-danger text-danger' }}"><i class="fa-solid {{ $customerModel->first_name && $customerModel->last_name ? 'fa-check' : 'fa-times' }} fs-5"></i></div>
                                        </div>
                                        <div class="crdapproval-caps ps-2">
                                            <p class="fw-semibold text-dark lh-2 mb-0">Complete Basic Info</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-middle mt-5 mb-4 px-4">
                                <div class="revs-wraps mb-3">
                                    <div class="revs-wraps-flex d-flex align-items-center justify-content-between mb-1">
                                        <span class="text-dark fw-semibold text-md">Complete Your Profile</span>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="Example" aria-valuenow="{{ $completionPercentage }}" aria-valuemin="0" aria-valuemax="100" style="height: 7px">
                                        <div class="progress-bar" style="width: {{ $completionPercentage }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <!-- Personal Information -->
                        <form id="personalInfoForm" name="personalInfoForm" action="{{ route('customer.updateProfile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h4><i class="fa-solid fa-file-invoice me-2"></i>Personal Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center justify-content-start">
                                        <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                            <div class="d-flex align-items-center">
                                            <div class="crd-thumbimg text-center">
                                                <div class="p-2 d-flex align-items-center justify-content-center brd">
                                                    <img src="{{ $customerModel->image_path ? asset( $customerModel->image_path) : asset('assets/images/default-avatar.png') }}" alt="Profile Image" class="avatar avatar-xl" id="uploadfile-1-preview">
                                                </div>
                                            </div>
                                                <label class="btn btn-sm btn-light-primary px-4 fw-medium mb-0" for="uploadfile-1">Change</label>
                                                <input id="uploadfile-1" name="profile_image" class="form-control d-none" type="file" accept="image/jpeg,image/png,image/webp">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">First Name</label>
                                                <input type="text" name="first_name" class="form-control" value="{{ $customerModel['first_name'] ?? '' }}">                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" name="last_name" class="form-control" value="{{ $customerModel['last_name'] ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Email ID</label>
                                                <input type="text" class="form-control" value="{{ $customerModel['email'] }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Mobile</label>
                                                <input type="text" name="mobile" class="form-control" value="{{ $customerModel['mobile'] ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Date of Birth</label>
                                        <input type="date" name="dob" class="form-control" value="{{ $customerModel['dob'] ?? '' }}">  
                                        </div>
                                        </div>


                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">About Info</label>
                                                <textarea name="about" class="form-control ht-120">{{ $customerModel['about'] ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-md btn-primary mb-0">Update Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Update Email -->
                        <form id="updateEmailForm" name="updateEmailForm" action="{{ route('customer.updateEmail') }}" method="POST">
                            @csrf
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h4><i class="fa-solid fa-envelope-circle-check me-2"></i>Update Your Email</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center justify-content-start">
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Email Address</label>
                                                <input type="email" name="email" class="form-control" placeholder="Update your new email" value="{{ $customerModel['email'] }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-md btn-primary mb-0">Update Email</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Update Password -->
                        <form id="updatePasswordForm" name="updatePasswordForm" action="{{ route('customer.updatePassword') }}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa-solid fa-lock me-2"></i>Update Password</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center justify-content-start">
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Old Password</label>
                                                <input type="password" name="old_password" class="form-control" placeholder="*********">
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">New Password</label>
                                                <input type="password" name="password" class="form-control" placeholder="*********">
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Confirm Password</label>
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="*********">
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-md btn-primary mb-0">Change Password</button>
                                            </div>
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
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Profile image preview
            $('#uploadfile-1').on('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#uploadfile-1-preview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</body>
</html>