<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Rooms - BoomBitz</title>
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

        .table-responsive {
            border-radius: 12px;
            overflow-x: auto;
        }

        .table {
            background: #ffffff;
            border-radius: 12px;
            margin-bottom: 0;
        }

        .table th {
            font-weight: 600;
            color: #718096;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e2e8f0;
            padding: 15px;
        }

        .table td {
            vertical-align: middle;
            padding: 15px;
            font-size: 0.95rem;
            color: #2d3748;
            border-bottom: 1px solid #e2e8f0;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background: #f9fafb;
        }

        .room-image {
            width: 80px;
            height: 50px;
            object-fit: cover;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-update {
            background: linear-gradient(90deg, #3490dc, #63b3ed);
            color: #ffffff;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
        }

        .btn-update:hover {
            background: linear-gradient(90deg, #2b6cb0, #4c9ede);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-delete {
            background: linear-gradient(90deg, #dc3545, #ed6363);
            color: #ffffff;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-delete:hover {
            background: linear-gradient(90deg, #b02a37, #de4c4c);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 80px;
            color: #cbd5e0;
            margin-bottom: 25px;
        }

        .empty-text {
            font-size: 1.25rem;
            color: #718096;
            margin-bottom: 30px;
            font-weight: 500;
        }

        .empty-link {
            color: #3490dc;
            font-weight: 600;
            text-decoration: none;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .empty-link:hover {
            color: #2b6cb0;
            text-decoration: underline;
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

            .table th, .table td {
                font-size: 0.85rem;
                padding: 10px;
            }

            .room-image {
                width: 60px;
                height: 40px;
            }

            .btn-update, .btn-delete {
                padding: 6px 12px;
                font-size: 0.85rem;
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
                        <h1 class="profile-title">Manage Rooms</h1>
                    </div>

                    @if ($rooms->isEmpty())
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-bed"></i>
                            </div>
                            <h3 class="empty-text">You haven't added any rooms yet</h3>
                            <a href="{{ route('customerAddRoom') }}?hotel_id={{ Auth::user()->hotels->first()->id ?? '' }}" class="empty-link">
                                Add your first room <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Hotel</th>
                                        <th>Name</th>
                                        <th>Price/Night</th>
                                        <th>Adult Price</th>
                                        <th>Children Price</th>
                                        <th>Total Rooms</th>
                                        <th>Breakfast Price</th>
                                        <th>Size</th>
                                        <th>Bed Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rooms as $room)
                                        <tr>
                                            <td>
                                                @if ($room->image_path)
                                                    <img src="{{ asset($room->image_path) }}" alt="{{ $room->name }}" class="room-image" onerror="this.src='{{ asset('assets/images/placeholder-room.jpg') }}';">
                                                @else
                                                    <img src="{{ asset('assets/images/placeholder-room.jpg') }}" alt="Placeholder" class="room-image">
                                                @endif
                                            </td>
                                            <td>{{ $room->hotel->name ?? 'N/A' }}</td>
                                            <td>{{ $room->name }}</td>
                                            <td>${{ number_format($room->price_per_night, 2) }}</td>
                                            <td>${{ number_format($room->adult_price, 2) }}</td>
                                            <td>${{ number_format($room->children_price, 2) }}</td>
                                            <td>{{ $room->total_rooms }}</td>
                                            <td>{{ $room->breakfast_price ? '$' . number_format($room->breakfast_price, 2) : 'N/A' }}</td>
                                            <td>{{ $room->size }}</td>
                                            <td>{{ $room->bed_type }}</td>
                                            <td>
                                                <div style="display: flex; gap: 10px;">
                                                    <a href="{{ route('customerEditRoom') }}?id={{ $room->id }}" class="btn-update">
                                                        <i class="fas fa-edit"></i> Update
                                                    </a>

                                                <a href="{{ route('customerRoomImages') }}?id={{ $room->id }}" class="btn-delete">
                                                            <i class="fas fa-camera"></i> Images
                                                        </a>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @include('layouts.publicFooter')
        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="fas fa-arrow-up"></i></a>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/custom.js') }}" defer></script>
</body>
</html>
