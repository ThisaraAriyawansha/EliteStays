<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Room - BoomBitz</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f7fa;
            color: #2d3748;
            line-height: 1.6;
        }

        .profile-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .profile-content {
            display: flex;
            flex: 1;
        }

        .profile-sidebar {
            width: 280px;
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 30px 0;
            border-right: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .profile-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .profile-nav li {
            margin-bottom: 8px;
        }

        .profile-nav a {
            display: flex;
            align-items: center;
            padding: 14px 25px;
            color: #4a5568;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: 6px;
            margin: 0 15px;
        }

        .profile-nav a:hover,
        .profile-nav a.active {
            background: linear-gradient(90deg, #3490dc, #63b3ed);
            color: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-nav i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }

        .profile-main {
            flex: 1;
            padding: 40px;
            background: #f4f7fa;
        }

        .profile-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            padding: 30px;
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .profile-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1a202c;
            margin: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #718096;
            font-size: 0.95rem;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 10px;
            font-size: 1rem;
            color: #2d3748;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #3490dc;
            box-shadow: 0 0 8px rgba(52, 144, 220, 0.2);
            outline: none;
        }

        .btn-submit {
            background: linear-gradient(90deg, #3490dc, #63b3ed);
            color: #ffffff;
            border: none;
            padding: 10px 24px;
            border-radius: 6px;
            font-weight: 500;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-submit:hover {
            background: linear-gradient(90deg, #2b6cb0, #4c9ede);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-cancel {
            background: #e2e8f0;
            color: #2d3748;
            border: none;
            padding: 10px 24px;
            border-radius: 6px;
            font-weight: 500;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-cancel:hover {
            background: #cbd5e0;
            transform: translateY(-2px);
        }

        .form-buttons {
            display: flex;
            gap: 15px;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .profile-content {
                flex-direction: column;
            }

            .profile-sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid #e2e8f0;
            }

            .profile-nav {
                display: flex;
                overflow-x: auto;
                padding-bottom: 15px;
            }

            .profile-nav li {
                margin-bottom: 0;
                margin-right: 10px;
            }

            .profile-nav a {
                border-left: none;
                border-bottom: 3px solid transparent;
                white-space: nowrap;
                padding: 12px 20px;
            }

            .profile-nav a:hover,
            .profile-nav a.active {
                border-left: none;
                border-bottom: 3px solid #3490dc;
                background: #f0f7ff;
                color: #3490dc;
            }

            .profile-main {
                padding: 20px;
            }
        }

        @media (max-width: 576px) {
            .profile-title {
                font-size: 1.5rem;
            }

            .btn-submit, .btn-cancel {
                padding: 8px 16px;
                font-size: 0.9rem;
            }

            .form-buttons {
                flex-direction: column;
                gap: 8px;
            }
        }
    </style>
</head>
<body>
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>

    <div id="main-wrapper" class="profile-container">
        @include('layouts.nav')
        <div class="clearfix"></div>

        @include('layouts.profileNavbar')

        <div class="profile-content">


            <!-- Main Content -->
            <div class="profile-main">
                <div class="profile-card">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="profile-header">
                        <h1 class="profile-title">Add Room to {{ $hotel->name }}</h1>
                    </div>

                    <form action="{{ route('customerStoreRoom') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">Room Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price_per_night" class="form-label">Price Per Night ($)</label>
                                    <input type="number" name="price_per_night" id="price_per_night" class="form-control" value="{{ old('price_per_night') }}" step="0.01" required>
                                    @error('price_per_night')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="adult_price" class="form-label">Adult Price ($)</label>
                                    <input type="number" name="adult_price" id="adult_price" class="form-control" value="{{ old('adult_price') }}" step="0.01" required>
                                    @error('adult_price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="children_price" class="form-label">Children Price ($)</label>
                                    <input type="number" name="children_price" id="children_price" class="form-control" value="{{ old('children_price') }}" step="0.01" required>
                                    @error('children_price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="total_rooms" class="form-label">Total Rooms</label>
                                    <input type="number" name="total_rooms" id="total_rooms" class="form-control" value="{{ old('total_rooms') }}" required>
                                    @error('total_rooms')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="breakfast_price" class="form-label">Breakfast Price ($) (Optional)</label>
                                    <input type="number" name="breakfast_price" id="breakfast_price" class="form-control" value="{{ old('breakfast_price') }}" step="0.01">
                                    @error('breakfast_price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="size" class="form-label">Room Size (e.g., 300 sq ft)</label>
                                    <input type="text" name="size" id="size" class="form-control" value="{{ old('size') }}" required>
                                    @error('size')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bed_type" class="form-label">Bed Type (e.g., King, Queen)</label>
                                    <select name="bed_type" id="bed_type" class="form-control" required>
                                        <option value="" disabled {{ old('bed_type') ? '' : 'selected' }}>Select Bed Type</option>
                                        <option value="Single" {{ old('bed_type') == 'Single' ? 'selected' : '' }}>Single</option>
                                        <option value="Double" {{ old('bed_type') == 'Double' ? 'selected' : '' }}>Double</option>
                                        <option value="Queen" {{ old('bed_type') == 'Queen' ? 'selected' : '' }}>Queen</option>
                                        <option value="King" {{ old('bed_type') == 'King' ? 'selected' : '' }}>King</option>
                                        <option value="Twin" {{ old('bed_type') == 'Twin' ? 'selected' : '' }}>Twin</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-label">Description (Optional)</label>
                            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status_id" class="form-label">Status</label>
                            <select name="status_id" id="status_id" class="form-control" required>
                                <option value="" disabled selected>Select Status</option>
                                <!-- Replace with dynamic statuses from your Status model -->
                                <option value="1" {{ old('status_id') == 1 ? 'selected' : '' }}>Available</option>
                                <option value="2" {{ old('status_id') == 2 ? 'selected' : '' }}>Unavailable</option>
                            </select>
                            @error('status_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image_path" class="form-label">Room Image (Optional)</label>
                            <input type="file" name="image_path" id="image_path" class="form-control" accept="image/*">
                            @error('image_path')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-buttons">
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-save"></i> Save Room
                            </button>
                            <a href="{{ route('customer.updateHotel') }}" class="btn-cancel">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('layouts.publicFooter')
        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="fas fa-arrow-up"></i></a>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>