@include('layouts.header')
<style>
/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 60%;
    max-width: 600px;
    height: 60%;
    max-height: 90vh;
    background-color: rgba(0, 0, 0, 0.9);
    padding: 20px;
    border-radius: 10px;
    overflow: auto;
}



.modal-content {
    margin: auto;
    display: block;
    max-width: 90%;
    max-height: 100%;
}

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

@media screen and (max-width: 768px) {
    .modal {
        width: 90%;
        height: auto;
        max-width: 90%;
    }

    .modal-content {
        max-width: 90%;
    }

    .close {
        font-size: 25px;
        top: 5px;
        right: 10px;
    }
}

@media screen and (max-width: 480px) {
    .modal {
        width: 95%;
        height: auto;
        padding: 15px;
    }

    .modal-content {
        max-width: 90%;
    }

    .close {
        font-size: 22px;
        top: 5px;
        right: 8px;
    }
}

.button-container {
    display: flex;
    gap: 10px;
    justify-content: center;
}

.view-btn {
    background-color: #3498db;
    color: white;
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.room-btn{
    background-color: #3498db;
    color: white;
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}


.status-btn {
    background-color: #e74c3c;
    color: white;
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.delete-btn {
    background-color: #e74c3c;
    color: white;
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.view-more-btn {
    background-color: #2ecc71;
    color: white;
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.view-btn:hover,
.view-more-btn:hover {
    opacity: 0.8;
}

.update-btn {
    background-color: rgb(135, 141, 137);
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

@media (max-width: 768px) {
    .wg-table .table-title {
        display: none;
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
    align-items: center;
    gap: 10px;
    width: 100%;
    max-width: 800px; /* Increased to accommodate all elements */
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
    min-width: 200px; /* Ensure input doesn't shrink too much */
}

.search-input:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

.entry-type-filter {
    padding: 10px;
    border: 2px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    outline: none;
    transition: all 0.3s ease-in-out;
    width: 200px; /* Fixed width for select to align properly */
}

.entry-type-filter:focus {
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

@media (max-width: 768px) {
    .search-form {
        flex-direction: column;
        align-items: stretch;
    }

    .search-input,
    .entry-type-filter,
    .search-button {
        width: 100%;
        min-width: unset; /* Remove min-width for smaller screens */
    }
}
</style>
<!-- main-content -->
<div class="main-content">
    <!-- main-content-wrap -->
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>View Hotel</h3>

            </div>
            <!-- product-list -->
            <div class="wg-box">
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

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success! </strong> {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error! </strong> {{ session('error') }}
                    </div>
                @endif
                <div class="title-box">
                    <div class="body-text">Manage Hotel</div>
                </div>


                <form method="GET" action="{{ route('manageHotel') }}" class="search-form">
                    <input type="text" name="search" value="{{ request('search') }}" class="search-input" placeholder="Search hotel name, address, or city...">
                    <select name="entry_type" class="entry-type-filter">
                        <option value="">All Entries</option>
                        <option value="user" {{ request('entry_type') == 'user' ? 'selected' : '' }}>User Entered</option>
                        <option value="customer" {{ request('entry_type') == 'customer' ? 'selected' : '' }}>Customer Entered</option>
                    </select>
                    <button type="submit" class="search-button">🔍 Search</button>
                </form>




                <div class="wg-table">
                <ul class="table-title flex gap-4 mb-4 px-4 py-3">
                    <li><div class="body-title">Image</div></li>
                    <li><div class="body-title">Name</div></li>
                    <li><div class="body-title">Address</div></li>
                    <li><div class="body-title">City</div></li>
                    <li><div class="body-title">Description</div></li>
                    <li><div class="body-title">Status</div></li>
                    <li><div class="body-title">Action</div></li>
                </ul>
                <div class="table-container">
            <ul class="flex flex-column">
            @forelse($hotels as $hotel)
        <li class="product-item flex items-center gap-4 px-4 py-3 hover:bg-gray-50">
            <div class="body-text flex-shrink-0">
                <img src="{{ asset($hotel->image_path) }}" alt="Image" class="image">
            </div>
            
            <div class="body-text flex-grow">{{ $hotel->name }}</div>

            <div class="body-text flex-grow">{{ $hotel->address }}</div>

            <div class="body-text flex-grow">{{ $hotel->city }}</div>

            <div class="body-text flex-grow">{{ $hotel->description }}</div>


            <div class="body-text flex-grow">
                <span id="status-{{ $hotel->id }}">{{ $hotel->status->name ?? 'N/A' }}</span>
            </div>


            <!-- Action Buttons -->
            <div class="button-container flex-shrink-0">
                <button class="view-btn" data-image="{{ asset($hotel->image_path) }}">View Image</button>
                <button class="update-btn" data-id="{{ $hotel->id }}">Update</button> 
                <a href="{{ route('addRoom', ['hotel_id' => $hotel->id]) }}" class="room-btn">Add Room</a>

            </div>
        </li>
        @endforeach
    </ul>
</div>

            </div>

            <div class="divider"></div>

            <div class="flex items-center justify-between flex-wrap gap10">
                    <div class="text-tiny">Showing {{ $hotels->firstItem() }} to {{ $hotels->lastItem() }} of {{ $hotels->total() }} entries</div>
                    <ul class="wg-pagination">
                        @if ($hotels->onFirstPage())
                            <li class="disabled">
                                <span><i class="icon-chevron-left"></i></span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $hotels->previousPageUrl() }}"><i class="icon-chevron-left"></i></a>
                            </li>
                        @endif

                        @foreach ($hotels->getUrlRange(1, $hotels->lastPage()) as $page => $url)
                            <li class="{{ $page == $hotels->currentPage() ? 'active' : '' }}">
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($hotels->hasMorePages())
                            <li>
                                <a href="{{ $hotels->nextPageUrl() }}"><i class="icon-chevron-right"></i></a>
                            </li>
                        @else
                            <li class="disabled">
                                <span><i class="icon-chevron-right"></i></span>
                            </li>
                        @endif
                    </ul>
                </div>


                <div class="divider"></div>

                
            </div>
            <!-- /product-list -->
        </div>
        <!-- /main-content-wrap -->
    </div>
    <!-- Modal Structure -->
<div id="imageModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="modalImage">
</div>
    @include('layouts.footer')
</div>
<!-- /main-content -->






<script>
    // Image Modal
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    const closeBtn = document.getElementsByClassName('close')[0];

    document.querySelectorAll('.view-btn').forEach(button => {
        button.addEventListener('click', function() {
            modal.style.display = 'block';
            modalImg.src = this.dataset.image;
        });
    });

    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });

    // Navigate to edit page on update button click
    document.querySelectorAll('.update-btn').forEach(button => {
        button.addEventListener('click', function() {
            window.location.href = `/hotels/${this.dataset.id}/edit`;
        });
    });
</script>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

