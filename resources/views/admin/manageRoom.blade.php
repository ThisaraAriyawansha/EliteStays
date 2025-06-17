@include('layouts.header')
<style>
/* Modal Styles */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%); /* Centering */
    width: 60%; /* Default width */
    max-width: 600px; /* Ensures it doesn't get too wide on large screens */
    height: 60%; /* Default height */
    max-height: 90vh; /* Prevents modal from exceeding viewport height */
    background-color: rgba(0, 0, 0, 0.9); /* Black with opacity */
    padding: 20px;
    border-radius: 10px; /* Optional: Add rounded corners */
    overflow: auto; /* Enables scrolling if needed */
}

/* Modal Content */
.modal-content {
    margin: auto;
    display: block;
    max-width: 90%;
    max-height: 100%;
}

/* Close Button */
.close {
    position: absolute;
    top: 10px;
    right: 15px;
    color: #fff;
    font-size: 30px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* Responsive Design */
@media screen and (max-width: 768px) {
    .modal {
        width: 90%; /* Increase width for small screens */
        height: auto; /* Auto height for content flexibility */
        max-width: 90%; /* Keep it within the screen limits */
    }

    .modal-content {
        max-width: 90%;
    }

    .close {
        font-size: 25px; /* Reduce close button size */
        top: 5px;
        right: 10px;
    }
}

@media screen and (max-width: 480px) {
    .modal {
        width: 95%; /* Almost full width for small phones */
        height: auto; /* Allow content to dictate height */
        padding: 15px;
    }

    .modal-content {
        max-width: 90%;
    }

    .close {
        font-size: 22px; /* Smaller close button */
        top: 5px;
        right: 8px;
    }
}


.button-container {
    display: flex;
    gap: 10px; /* Adjust spacing between buttons */
    justify-content: center; /* Center buttons horizontally */
}


.view-btn {
    background-color: #3498db; /* Blue color */
    color: white;
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}
.status-btn{
    background-color: #e74c3c; /* Red color */
    color: white;
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.delete-btn {
    background-color: #e74c3c; /* Red color */
    color: white;
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}/* View More Button Styles */
.view-more-btn {
    background-color: #2ecc71; /* Green color */
    color: white;
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

/* Button Hover Effects */
.view-btn:hover,
.view-more-btn:hover {
    opacity: 0.8; /* Slightly dim the button when hovered */
}


.update-btn {
    background-color:rgb(135, 141, 137); /* Green color */
    color: white;
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}
.wg-table {
        width: 100%;
        overflow-x: auto;
    }

    .table-container {
        width: 100%;
        overflow-x: auto;
    }

    .wg-table .table-title, .wg-table .product-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .wg-table .table-title li, .wg-table .product-item > div {
        flex: 1;
        text-align: left;
        min-width: 120px;
    }

    .wg-table .button-container {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .wg-table .body-text {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .image {
        width: 80px;
        height: auto;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .wg-table .table-title {
            display: none; /* Hide table headers on small screens */
        }

        .wg-table .product-item {
            display: flex;
            flex-wrap: wrap;
            border-bottom: 1px solid #ddd;
            padding: 10px;
        }

        .wg-table .product-item > div {
            flex: 100%;
            text-align: left;
        }

        .wg-table .image {
            width: 100%;
            max-width: 100px;
        }

        .wg-table .button-container {
            flex: 100%;
            display: flex;
            justify-content: flex-start;
            gap: 5px;
        }
    }
    

.search-form {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
    align-items: center;
    width: 100%;
    max-width: 400px;
    margin: auto;
    padding: 10px;
    background: transparent;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.search-input {
    flex: 1;
    padding: 10px;
    border: 2px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    outline: none;
    transition: all 0.3s ease-in-out;
}

.search-input:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

.search-button {
    padding: 10px 15px;
    background: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease-in-out;
}

.search-button:hover {
    background: #0056b3;
}

/* Responsive Design */
@media (max-width: 480px) {
    .search-form {
        flex-direction: column;
    }
    
    .search-input, 
    .search-button {
        width: 100%;
    }
}

</style>
<div class="main-content">
    <!-- main-content-wrap -->
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Manage Rooms</h3>
            </div>
            <!-- room-list -->
            <div class="wg-box">
                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops! There were some errors with your submission:</strong>
                        <ul class="mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Success Message -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Error Message -->
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="title-box">
                    <div class="body-text">Manage Rooms</div>
                </div>

                <!-- Search Form -->
                <form method="GET" action="{{ route('manageRoom') }}" class="search-form mb-4">
                    <input type="text" name="search" value="{{ request('search') }}" class="search-input" placeholder="Search by room name, hotel, or description...">
                    <button type="submit" class="search-button">🔍 Search</button>
                </form>

                <!-- Room Table -->
                <div class="wg-table">
                    <ul class="table-title flex gap-4 mb-4 px-4 py-3">
                        <li class="w-20"><div class="body-title">Hotel</div></li>
                        <li class="w-15"><div class="body-title">Name</div></li>
                        <li class="w-10"><div class="body-title">Price/Night</div></li>
                        <li class="w-10"><div class="body-title">Bed Type</div></li>
                        <li class="w-10"><div class="body-title">Size (sq ft)</div></li>
                        <li class="w-15"><div class="body-title">Description</div></li>
                        <li class="w-10"><div class="body-title">Status</div></li>
                        <li class="w-10"><div class="body-title">Action</div></li>
                    </ul>
                    <div class="table-container">
                        <ul class="flex flex-column">
                            @forelse ($rooms as $room)
                                <li class="product-item flex items-center gap-4 px-4 py-3 hover:bg-gray-50">
                                    <div class="body-text w-20">{{ $room->hotel->name ?? 'N/A' }}</div>
                                    <div class="body-text w-15">{{ $room->name }}</div>
                                    <div class="body-text w-10">${{ number_format($room->price_per_night, 2) }}</div>
                                    <div class="body-text w-10">{{ $room->bed_type }}</div>
                                    <div class="body-text w-10">{{ $room->size }}</div>
                                    <div class="body-text w-15 truncate">{{ $room->description }}</div>
                                    <div class="body-text w-10">
                                        <span id="status-{{ $room->id }}">{{ $room->status->name ?? 'Active' }}</span>
                                    </div>
                                    <div class="button-container w-10 flex-shrink-0">
                                        <a href="{{ route('admin.rooms.edit', $room->id) }}" class="update-btn btn btn-sm btn-primary">Update</a>
                                        <a href="{{ route('admin.rooms.images', $room->id) }}" class="update-btn  btn-sm btn-info">Add Image</a>
                                    </div>
                                </li>
                            @empty
                                <li class="product-item flex items-center gap-4 px-4 py-3">
                                    <div class="body-text w-100 text-center">No rooms found.</div>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <div class="divider"></div>

                <!-- Pagination -->
                <div class="flex items-center justify-between flex-wrap gap10">
                    <div class="text-tiny">Showing {{ $rooms->firstItem() }} to {{ $rooms->lastItem() }} of {{ $rooms->total() }} entries</div>
                    <ul class="wg-pagination">
                        @if ($rooms->onFirstPage())
                            <li class="disabled">
                                <span><i class="icon-chevron-left"></i></span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $rooms->previousPageUrl() }}"><i class="icon-chevron-left"></i></a>
                            </li>
                        @endif

                        @foreach ($rooms->getUrlRange(1, $rooms->lastPage()) as $page => $url)
                            <li class="{{ $page == $rooms->currentPage() ? 'active' : '' }}">
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($rooms->hasMorePages())
                            <li>
                                <a href="{{ $rooms->nextPageUrl() }}"><i class="icon-chevron-right"></i></a>
                            </li>
                        @else
                            <li class="disabled">
                                <span><i class="icon-chevron-right"></i></span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- /room-list -->
        </div>
        <!-- /main-content-wrap -->
    </div>
    @include('layouts.footer')

</div>











<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

