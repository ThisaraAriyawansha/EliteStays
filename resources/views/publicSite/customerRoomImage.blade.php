<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Room Images - BoomBitz</title>
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

        .image-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .image-card {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .image-card:hover {
            transform: scale(1.05);
        }

        .image-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            display: block;
        }

        .image-delete {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.7);
            border: none;
            color: #ffffff;
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .image-delete:hover {
            background: #dc3545;
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

            .btn-submit, .btn-cancel, .btn-delete {
                padding: 8px 16px;
                font-size: 0.9rem;
            }

            .image-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }

            .image-card img {
                height: 120px;
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
                        <h1 class="profile-title">Room Images - {{ $room->name }}</h1>
                    </div>

                    <!-- Image Upload Form -->
                    <form action="{{ route('customerRoomImagesUpload') }}?id={{ $room->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image_path" class="form-label">Upload New Image</label>
                            <input type="file" name="image_path" id="image_path" class="form-control" accept="image/*" required>
                            @error('image_path')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-buttons">
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-upload"></i> Upload Image
                            </button>
                            <a href="{{ route('customerManageRoom') }}" class="btn-cancel">
                                <i class="fas fa-times"></i> Back to Rooms
                            </a>
                        </div>
                    </form>
                    <br/>

                    <!-- Image Grid -->
                    @if ($images->isEmpty())
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h3 class="empty-text">No images uploaded for this room yet</h3>
                        </div>
                    @else
                        <div class="image-grid">
                            @foreach ($images as $image)
                                <div class="image-card">
                                    <img src="{{ asset($image->image_path) }}" alt="Room Image" onerror="this.src='{{ asset('assets/images/placeholder-room.jpg') }}';">
                                    <form action="{{ route('customerRoomImagesDelete') }}?id={{ $image->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="image-delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @include('layouts.publicFooter')
        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="fas fa-arrow-up"></i></a>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/popper.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/custom.js') }}" defer></script>
</body>
</html>
