<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Booking Details - BoomBitz</title>
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
        .profile-container { display: flex; flex-direction: column; min-height: 100vh; }
        .profile-content { display: flex; flex: 1; }
        .profile-sidebar {
            width: 280px; background: #ffffff; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 30px 0; border-right: 1px solid #e2e8f0; transition: all 0.3s ease;
        }
        .profile-nav { list-style: none; padding: 0; margin: 0; }
        .profile-nav li { margin-bottom: 8px; }
        .profile-nav a {
            display: flex; align-items: center; padding: 14px 25px; color: #4a5568;
            text-decoration: none; font-weight: 500; transition: all 0.3s ease; border-radius: 6px; margin: 0 15px;
        }
        .profile-nav a:hover, .profile-nav a.active {
            background: linear-gradient(90deg, #3490dc, #63b3ed); color: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-nav i { margin-right: 12px; width: 20px; text-align: center; font-size: 1.1rem; }
        .profile-main { flex: 1; padding: 40px; background: #f4f7fa; }
        .profile-card {
            background: #ffffff; border-radius: 12px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            padding: 30px; margin-bottom: 30px; transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .profile-card:hover { transform: translateY(-5px); box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1); }
        .profile-header {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 30px; padding-bottom: 20px; border-bottom: 1px solid #e2e8f0;
        }
        .profile-title { font-size: 1.75rem; font-weight: 700; color: #1a202c; margin: 0; }
        .detail-group { margin-bottom: 20px; }
        .detail-label {
            font-weight: 600; color: #718096; text-transform: uppercase;
            font-size: 0.85rem; letter-spacing: 0.5px; margin-bottom: 5px;
        }
        .detail-value {
            font-size: 1rem; color: #2d3748; background: #f9fafb;
            padding: 10px 15px; border-radius: 6px; border: 1px solid #e2e8f0;
        }
        .btn-back, .btn-update {
            background: linear-gradient(90deg, #6b7280, #9ca3af); color: #ffffff;
            border: none; padding: 8px 16px; border-radius: 6px; font-weight: 500;
            font-size: 0.9rem; transition: all 0.3s ease; display: inline-flex;
            align-items: center; gap: 6px; text-decoration: none;
        }
        .btn-update { background: linear-gradient(90deg, #3490dc, #63b3ed); }
        .btn-back:hover, .btn-update:hover {
            transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        .btn-back:hover { background: linear-gradient(90deg, #4b5563, #7c8ba1); }
        .btn-update:hover { background: linear-gradient(90deg, #2779bd, #4c9ed9); }
        .status-form { margin-top: 20px; }
        .status-form select { width: 200px; margin-right: 10px; padding: 8px; border-radius: 6px; }
        @media (max-width: 992px) {
            .profile-content { flex-direction: column; }
            .profile-sidebar { width: 100%; border-right: none; border-bottom: 1px solid #e2e8f0; }
            .profile-nav { display: flex; overflow-x: auto; padding-bottom: 15px; }
            .profile-nav li { margin-bottom: 0; margin-right: 10px; }
            .profile-nav a {
                border-left: none; border-bottom: 3px solid transparent; white-space: nowrap; padding: 12px 20px;
            }
            .profile-nav a:hover, .profile-nav a.active {
                border-left: none; border-bottom: 3px solid #3490dc; background: #f0f7ff; color: #3490dc;
            }
            .profile-main { padding: 20px; }
        }
        @media (max-width: 576px) {
            .profile-title { font-size: 1.5rem; }
            .detail-value { font-size: 0.9rem; padding: 8px 12px; }
            .btn-back, .btn-update { padding: 6px 12px; font-size: 0.85rem; }
            .status-form select { width: 100%; margin-bottom: 10px; }
        }

        .custom-select-wrapper {
        position: relative;
        width: 200px; /* Match existing form width */
        display: inline-block;
    }

    .custom-select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        width: 100%;
        padding: 10px 30px 10px 15px;
        font-family: 'Inter', sans-serif;
        font-size: 0.9rem;
        font-weight: 500;
        color: #2d3748;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .custom-select:hover {
        border-color: #3490dc;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .custom-select:focus {
        outline: none;
        border-color: #3490dc;
        box-shadow: 0 0 0 3px rgba(52, 144, 220, 0.2);
    }

    .select-arrow {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid #4a5568;
        pointer-events: none;
    }

    .custom-select option {
        font-family: 'Inter', sans-serif;
        font-weight: 500;
        background: #ffffff;
        color: #2d3748;
    }

    /* Responsive Adjustments */
    @media (max-width: 576px) {
        .custom-select-wrapper {
            width: 100%;
        }
        .custom-select {
            padding: 8px 25px 8px 12px;
            font-size: 0.85rem;
        }
        .select-arrow {
            right: 8px;
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
                        <h1 class="profile-title">Booking Details</h1>
                        <a href="{{ route('customerManageBooking') }}" class="btn-back">
                            <i class="fas fa-arrow-left"></i> Back to Bookings
                        </a>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Room</div>
                        <div class="detail-value">{{ $booking->room->name ?? 'N/A' }}</div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Check-In</div>
                        <div class="detail-value">{{ \Carbon\Carbon::parse($booking->checkin)->format('d M Y') }}</div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Check-Out</div>
                        <div class="detail-value">{{ \Carbon\Carbon::parse($booking->checkout)->format('d M Y') }}</div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Adults</div>
                        <div class="detail-value">{{ $booking->adults }}</div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Children</div>
                        <div class="detail-value">{{ $booking->children }}</div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Total Rooms</div>
                        <div class="detail-value">{{ $booking->rooms }}</div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Breakfast Included</div>
                        <div class="detail-value">{{ $booking->breakfast ? 'Yes' : 'No' }}</div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Total Price</div>
                        <div class="detail-value">${{ number_format($booking->total_price, 2) }}</div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Billing Name</div>
                        <div class="detail-value">{{ $booking->billing_name }}</div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Email</div>
                        <div class="detail-value">{{ $booking->email }}</div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Phone</div>
                        <div class="detail-value">{{ $booking->phone ?? 'N/A' }}</div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Passport Number</div>
                        <div class="detail-value">{{ $booking->passport_number ?? 'N/A' }}</div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Address</div>
                        <div class="detail-value">{{ $booking->address ?? 'N/A' }}</div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Country</div>
                        <div class="detail-value">{{ $booking->country ?? 'N/A' }}</div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">City/State</div>
                        <div class="detail-value">{{ $booking->city_state ?? 'N/A' }}</div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Postal Code</div>
                        <div class="detail-value">{{ $booking->postal_code ?? 'N/A' }}</div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Special Notes</div>
                        <div class="detail-value">{{ $booking->special_notes ?? 'N/A' }}</div>
                    </div>
                    <div class="detail-group">
                        <div class="detail-label">Status</div>
                        <div class="detail-value">{{ $booking->status->name ?? 'N/A' }}</div>
                    </div>
                    @if ($booking->room->hotel->customer_id == session('customer.id'))
                        <form action="{{ route('customerUpdateBookingStatus', $booking->id) }}" method="POST" class="status-form" id="updateBookingStatusForm" name="updateBookingStatusForm">
                            @csrf
                            @method('PATCH')
                            <div class="detail-group">
                                <div class="detail-label">Update Status</div>
                                <div class="custom-select-wrapper">
                                    <select name="status_id" class="form-control custom-select">
                                        @foreach (\App\Models\BookingStatus::all() as $status)
                                            <option value="{{ $status->id }}" {{ $booking->status_id == $status->id ? 'selected' : '' }}>
                                                {{ ucfirst($status->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                                @error('status_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn-update">
                                <i class="fas fa-save"></i> Update Status
                            </button>
                        </form>
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