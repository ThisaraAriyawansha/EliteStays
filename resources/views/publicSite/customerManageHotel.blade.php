<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Hotel - BoomBitz</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Inter', sans-serif;
            background: #f9fafb;
            color: #4b5563;
            line-height: 1.5;
            font-size: 0.95rem;
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

        /* Sidebar Styling */
        .profile-sidebar {
            width: 240px;
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
            padding: 20px 0;
            border-right: 1px solid rgba(226, 232, 240, 0.4);
            transition: all 0.3s ease;
        }

        .profile-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .profile-nav li {
            margin-bottom: 4px;
        }

        .profile-nav a {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: 6px;
            margin: 0 12px;
            font-size: 0.9rem;
        }

        .profile-nav a:hover,
        .profile-nav a.active {
            background: #3b82f6;
            color: #ffffff;
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.12);
        }

        .profile-nav i {
            margin-right: 10px;
            width: 18px;
            text-align: center;
            font-size: 0.95rem;
        }

        /* Main Content Styling */
        .profile-main {
            flex: 1;
            padding: 30px;
            background: #f9fafb;
        }

        .profile-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
            padding: 28px;
            margin-bottom: 24px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border: 1px solid rgba(226, 232, 240, 0.3);
        }

        .profile-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
        }

        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
            padding-bottom: 18px;
            border-bottom: 1px solid #e5e7eb;
        }

        .profile-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1f2937;
            margin: 0;
            position: relative;
        }

        .profile-title:after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 30px;
            height: 2px;
            background: #3b82f6;
            border-radius: 2px;
        }

        .header-buttons {
            display: flex;
            gap: 12px;
        }

        /* Alert Styling */
        .alert {
            border-radius: 8px;
            border: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
            margin-bottom: 20px;
            padding: 14px 18px;
            font-size: 0.9rem;
        }

        .alert-success {
            background-color: #f0fdf4;
            color: #166534;
            border-left: 3px solid #10b981;
        }

        .alert-danger {
            background-color: #fef2f2;
            color: #b91c1c;
            border-left: 3px solid #ef4444;
        }

        .btn-close {
            opacity: 0.5;
            transition: opacity 0.2s;
            font-size: 0.8rem;
        }

        .btn-close:hover {
            opacity: 0.8;
        }

        /* Hotel Info Styling */
        .hotel-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
            margin-bottom: 30px;
        }

        .hotel-detail {
            margin-bottom: 20px;
            background: #f9fafb;
            padding: 16px;
            border-radius: 8px;
            transition: all 0.2s ease;
            border: 1px solid rgba(226, 232, 240, 0.4);
        }

        .hotel-detail:hover {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
            background: #fff;
            transform: translateY(-1px);
        }

        .hotel-detail-label {
            font-weight: 500;
            color: #6b7280;
            font-size: 0.75rem;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .hotel-detail-value {
            color: #4b5563;
            font-size: 0.95rem;
            font-weight: 500;
            line-height: 1.4;
        }

        /* Image Styling */
        .hotel-images {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 30px;
        }

        .hotel-image-container,
        .hotel-logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
            min-width: 260px;
        }

        .image-wrapper {
            position: relative;
            width: 100%;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .image-wrapper:hover {
            transform: scale(1.01);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        .hotel-image {
            border-radius: 10px;
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .hotel-logo {
            border-radius: 10px;
            width: 100%;
            max-width: 160px;
            height: 100px;
            object-fit: contain;
            background: #f9fafb;
            padding: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
            transition: all 0.2s ease;
            border: 1px solid rgba(226, 232, 240, 0.6);
        }

        .hotel-logo:hover {
            transform: scale(1.03);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .image-caption {
            margin-top: 12px;
            font-size: 0.8rem;
            color: #6b7280;
            font-weight: 500;
            text-align: center;
        }

        /* Buttons */
        .btn-edit, .btn-add-room {
            background: #3b82f6;
            color: #ffffff;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.85rem;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            box-shadow: 0 2px 6px rgba(59, 130, 246, 0.12);
        }

        .btn-edit:hover, .btn-add-room:hover {
            background: #2563eb;
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(59, 130, 246, 0.15);
        }

        .btn-edit i, .btn-add-room i {
            font-size: 0.8rem;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: linear-gradient(to bottom, #f9fafb, #ffffff);
            border-radius: 12px;
            box-shadow: inset 0 0 20px rgba(226, 232, 240, 0.4);
        }

        .empty-icon {
            font-size: 70px;
            color: #9ca3af;
            margin-bottom: 24px;
            transition: all 0.4s ease;
        }

        .empty-state:hover .empty-icon {
            transform: translateY(-3px);
            color: #3b82f6;
        }

        .empty-text {
            font-size: 1.2rem;
            color: #6b7280;
            margin-bottom: 30px;
            font-weight: 500;
        }

        .empty-link {
            background: #3b82f6;
            color: #ffffff;
            font-weight: 500;
            text-decoration: none;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            padding: 10px 20px;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.15);
        }

        .empty-link:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
            color: #ffffff;
            text-decoration: none;
        }

        .empty-link i {
            transition: transform 0.2s ease;
        }

        .empty-link:hover i {
            transform: translateX(3px);
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .profile-content {
                flex-direction: column;
            }

            .profile-sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid #e5e7eb;
                padding: 15px 0;
            }

            .profile-nav {
                display: flex;
                overflow-x: auto;
                padding-bottom: 12px;
                margin: 0 8px;
            }

            .profile-nav li {
                margin-bottom: 0;
                margin-right: 8px;
            }

            .profile-nav a {
                white-space: nowrap;
                padding: 8px 16px;
                margin: 0 4px;
                font-size: 0.85rem;
            }

            .profile-main {
                padding: 20px 16px;
            }

            .hotel-image-container, 
            .hotel-logo-container {
                min-width: 220px;
            }

            .hotel-image {
                height: 160px;
            }

            .hotel-detail {
                padding: 12px;
            }
        }

        @media (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .header-buttons {
                width: 100%;
                justify-content: flex-start;
            }

            .profile-title:after {
                bottom: -6px;
            }

            .hotel-detail-value {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            .profile-title {
                font-size: 1.3rem;
            }

            .btn-edit, .btn-add-room {
                padding: 7px 14px;
                font-size: 0.8rem;
                border-radius: 5px;
            }

            .hotel-info {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .image-caption {
                font-size: 0.75rem;
            }

            .profile-card {
                padding: 20px 16px;
                border-radius: 10px;
            }

            .hotel-image {
                height: 140px;
            }

            .empty-text {
                font-size: 1rem;
            }

            .empty-link {
                font-size: 0.85rem;
                padding: 8px 16px;
            }
        }

        /* Top Scroll Button */
        #back2Top {
            position: fixed;
            bottom: 15px;
            right: 15px;
            background: #3b82f6;
            color: #ffffff;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            text-align: center;
            line-height: 36px;
            font-size: 1rem;
            box-shadow: 0 2px 10px rgba(59, 130, 246, 0.2);
            transition: all 0.2s ease;
            opacity: 0;
            visibility: hidden;
            z-index: 999;
        }

        #back2Top.show {
            opacity: 1;
            visibility: visible;
        }

        #back2Top:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.25);
        }

        /* Admin Cards Stats */
        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(226, 232, 240, 0.5);
            transition: all 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.06);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            background: rgba(59, 130, 246, 0.08);
        }

        .stat-icon i {
            font-size: 20px;
            color: #3b82f6;
        }

        .stat-number {
            font-size: 24px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #6b7280;
            font-weight: 500;
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
            <!-- Main Profile Content -->
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

                    @if ($hotel)
                        <div class="profile-header">
                            <h1 class="profile-title">Hotel Details</h1>
                            <div class="header-buttons">
                                <a href="{{ route('customer.updateHotel') }}" class="btn-edit">
                                    <i class="fas fa-edit"></i> Edit Hotel
                                </a>
                                <a href="{{ route('customerAddRoom') }}?hotel_id={{ $hotel->id }}" class="btn-add-room">
                                    <i class="fas fa-plus"></i> Add Room
                                </a>
                            </div>
                        </div>
                        
                        <div class="hotel-info">
                            <div>
                                <div class="hotel-detail">
                                    <div class="hotel-detail-label">Hotel Name</div>
                                    <div class="hotel-detail-value">{{ $hotel->name }}</div>
                                </div>
                                
                                <div class="hotel-detail">
                                    <div class="hotel-detail-label">Description</div>
                                    <div class="hotel-detail-value">{{ $hotel->description ?? 'No description provided' }}</div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="hotel-detail">
                                    <div class="hotel-detail-label">Address</div>
                                    <div class="hotel-detail-value">{{ $hotel->address ?? 'No address provided' }}</div>
                                </div>
                                
                                <div class="hotel-detail">
                                    <div class="hotel-detail-label">City</div>
                                    <div class="hotel-detail-value">{{ $hotel->city ?? 'No city provided' }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="hotel-images">
                            <div class="hotel-image-container">
                                <div class="image-wrapper">
                                    @if ($hotel->image_path)
                                        <img src="{{ asset($hotel->image_path) }}" alt="Hotel Image" class="hotel-image" onerror="this.src='{{ asset('assets/images/placeholder-hotel.jpg') }}';">
                                    @else
                                        <img src="{{ asset('assets/images/placeholder-hotel.jpg') }}" alt="Hotel Placeholder" class="hotel-image">
                                    @endif
                                </div>
                                <div class="image-caption">Hotel Image</div>
                            </div>
                            <div class="hotel-logo-container">
                                @if ($hotel->logo_path)
                                    <img src="{{ asset($hotel->logo_path) }}" alt="Hotel Logo" class="hotel-logo" onerror="this.src='{{ asset('assets/images/placeholder-logo.png') }}';">
                                @else
                                    <img src="{{ asset('assets/images/placeholder-logo.png') }}" alt="Logo Placeholder" class="hotel-logo">
                                @endif
                                <div class="image-caption">Hotel Logo</div>
                            </div>
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-hotel"></i>
                            </div>
                            <h3 class="empty-text">You haven't added any hotels yet</h3>
                            <a href="{{ route('customeraddHotel') }}" class="empty-link">
                                Add your first hotel <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    @endif
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
    <script>
        // Top scroll button show/hide
        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                $('#back2Top').addClass('show');
            } else {
                $('#back2Top').removeClass('show');
            }
        });
        
        // Smooth scroll to top
        $('#back2Top').click(function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop: 0}, 500);
        });
    </script>
</body>
</html>