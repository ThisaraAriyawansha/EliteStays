@include('layouts.header')
<style>
    /* Modal Styles */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1000; /* Sit on top */
        padding-top: 60px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    .modal-content {
        margin: auto;
        display: block;
        max-width: 80%;
        max-height: 80%;
    }

    .close {
        position: absolute;
        top: 20px;
        right: 35px;
        color: #fff;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    .button-container {
    display: flex;
    gap: 10px; /* Adjust spacing between buttons */
}

.view-btn {
    background-color: #3498db; /* Blue color */
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
}


    
</style>
<!-- main-content -->
<div class="main-content">
    <!-- main-content-wrap -->
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>View Images</h3>
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
                    <div class="body-text">Manage Images</div>
                </div>

                <div class="wg-table">
                    <ul class="table-title flex gap-4 mb-14 px-4 py-3">
                        <li><div class="body-title">Image</div></li>
                        <li><div class="body-title">Type</div></li>
                        <li><div class="body-title">Action</div></li>
                    </ul>
                    <ul class="flex flex-column">
                        @foreach($images as $image)
                        <li class="product-item gap-2 px-4 py-3 hover:bg-gray-50">
                            <div class="flex items-center justify-between gap-4 flex-grow">
                                <!-- Display Image -->
                                <div class="body-text">
                                    <img src="{{ asset(''.$image->image_path) }}" alt="Image" style="width: 100px; height: auto;" />
                                </div>
                                
                                <!-- Display Type -->
                                <div class="body-text">{{ $image->tvType->name }}</div>

                                <!-- Action Button -->
                                <div class="button-container">
                                    <button class="view-btn" data-image="{{ asset(''.$image->image_path) }}">View</button>
                                    <button class="delete-btn" data-id="{{ $image->id }}">Delete</button>
                                </div>

                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="divider"></div>

                <div class="flex items-center justify-between flex-wrap gap10">
                    <div class="text-tiny">Showing {{ $images->firstItem() }} to {{ $images->lastItem() }} of {{ $images->total() }} entries</div>
                    <ul class="wg-pagination">
                        <!-- Pagination Controls -->
                        @if ($images->onFirstPage())
                            <li class="disabled">
                                <span><i class="icon-chevron-left"></i></span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $images->previousPageUrl() }}"><i class="icon-chevron-left"></i></a>
                            </li>
                        @endif

                        @foreach ($images->getUrlRange(1, $images->lastPage()) as $page => $url)
                            <li class="{{ $page == $images->currentPage() ? 'active' : '' }}">
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($images->hasMorePages())
                            <li>
                                <a href="{{ $images->nextPageUrl() }}"><i class="icon-chevron-right"></i></a>
                            </li>
                        @else
                            <li class="disabled">
                                <span><i class="icon-chevron-right"></i></span>
                            </li>
                        @endif
                    </ul>
                </div>
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
    function showEntries() {
        const rows = document.querySelectorAll('#ListingsTable tbody tr'); // Target the ListingsTable
        let entries = document.getElementById('col_num').value;

        // Set default value of 30 if input is empty or invalid
        if (!entries || entries <= 0) {
            entries = 30;
        }

        rows.forEach((row, index) => {
            if (index < entries) {
                row.style.display = ''; // Show row
            } else {
                row.style.display = 'none'; // Hide row
            }
        });
    }
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".delete-btn").forEach(button => {
            button.addEventListener("click", function () {
                let imageId = this.getAttribute("data-id");

                if (confirm("Are you sure you want to delete this image?")) {
                    fetch(`/admin/deleteImage/${imageId}`, {
                        method: "POST", // Using POST because DELETE might not work without a form
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({ _method: "DELETE" }) 
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data); // Debugging
                        if (data.success) {
                            alert("Image deleted successfully!");
                            location.reload();
                        } else {
                            alert("Error: " + data.error);
                        }
                    })
                    .catch(error => console.error("Error:", error));

                }
            });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the modal
        const modal = document.getElementById("imageModal");
        const modalImg = document.getElementById("modalImage");
        const span = document.getElementsByClassName("close")[0];

        // Function to open the modal with the image
        function openModal(imageSrc) {
            modal.style.display = "block";
            modalImg.src = imageSrc;
        }

        // Function to close the modal
        function closeModal() {
            modal.style.display = "none";
        }

        // Add event listeners to all "View" buttons
        document.querySelectorAll(".view-btn").forEach(button => {
            button.addEventListener("click", function () {
                const imageSrc = this.getAttribute("data-image");
                openModal(imageSrc);
            });
        });

        // Close the modal when the close button is clicked
        span.addEventListener("click", closeModal);

        // Close the modal when clicking outside the image
        window.addEventListener("click", function (event) {
            if (event.target === modal) {
                closeModal();
            }
        });
    });
</script>
