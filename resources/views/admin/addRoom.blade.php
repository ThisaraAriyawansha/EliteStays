@include('layouts.header')

<!-- main-content -->
<div class="main-content">
    <!-- main-content-wrap -->
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Add a Room</h3>
            </div>
            <!-- new-room -->
            <div class="wg-box">
                <form id="addRoomForm" class="form-new-product form-style-1" method="POST" action="{{ route('admin.rooms.store') }}" enctype="multipart/form-data">
                    @csrf

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

                    <h5>Add Room Details</h5>

                    <!-- Hotel Selection -->
                <!-- Hotel Selection -->
                <fieldset class="hotel_id">
                    <div class="body-title mb-10">Hotel <span class="tf-color-1">*</span></div>
                    <div class="select flex-grow">
                        <select class="" name="hotel_id" id="hotel_id" required>
                            <option value="">Select a Hotel</option>
                            @foreach ($hotels as $hotel)
                                <option value="{{ $hotel->id }}" {{ $selectedHotelId == $hotel->id ? 'selected' : '' }}>{{ $hotel->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </fieldset>

                    <!-- Room Name -->
                    <fieldset class="name">
                        <div class="body-title mb-10">Room Name <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="e.g., Deluxe Suite" name="name" id="name" value="{{ old('name') }}" required>
                    </fieldset>

                    <!-- Price Per Night -->
                    <fieldset class="price_per_night">
                        <div class="body-title mb-10">Price Per Night (USD) <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="number" step="0.01" placeholder="e.g., 150.00" name="price_per_night" id="price_per_night" value="{{ old('price_per_night') }}" required>
                    </fieldset>

                    <!-- Adult Price -->
                    <fieldset class="adult_price">
                        <div class="body-title mb-10">Adult Price (USD) <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="number" step="0.01" placeholder="e.g., 50.00" name="adult_price" id="adult_price" value="{{ old('adult_price') }}" required>
                    </fieldset>

                    <!-- Children Price -->
                    <fieldset class="children_price">
                        <div class="body-title mb-10">Children Price (USD) <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="number" step="0.01" placeholder="e.g., 30.00" name="children_price" id="children_price" value="{{ old('children_price') }}" required>
                    </fieldset>

                    <!-- Total Rooms -->
                    <fieldset class="total_rooms">
                        <div class="body-title mb-10">Total Rooms <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="number" min="1" placeholder="e.g., 10" name="total_rooms" id="total_rooms" value="{{ old('total_rooms') }}" required>
                    </fieldset>

                    <!-- Breakfast Price -->
                    <fieldset class="breakfast_price">
                        <div class="body-title mb-10">Breakfast Price (USD)</div>
                        <input class="mb-10" type="number" step="0.01" placeholder="e.g., 15.00" name="breakfast_price" id="breakfast_price" value="{{ old('breakfast_price') }}">
                    </fieldset>

                    <!-- Room Size -->
                    <fieldset class="size">
                        <div class="body-title mb-10">Room Size (sq ft) <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="number" step="0.1" placeholder="e.g., 400.5" name="size" id="size" value="{{ old('size') }}" required>
                    </fieldset>

                    <!-- Bed Type -->
                    <fieldset class="bed_type">
                        <div class="body-title mb-10">Bed Type <span class="tf-color-1">*</span></div>
                        <select class="" name="bed_type" id="bed_type" required>
                            <option value="">Select Bed Type</option>
                            <option value="Single" {{ old('bed_type') == 'Single' ? 'selected' : '' }}>Single</option>
                            <option value="Double" {{ old('bed_type') == 'Double' ? 'selected' : '' }}>Double</option>
                            <option value="Queen" {{ old('bed_type') == 'Queen' ? 'selected' : '' }}>Queen</option>
                            <option value="King" {{ old('bed_type') == 'King' ? 'selected' : '' }}>King</option>
                            <option value="Twin" {{ old('bed_type') == 'Twin' ? 'selected' : '' }}>Twin</option>
                        </select>
                    </fieldset>

                    <!-- Description -->
                    <fieldset class="description">
                        <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                        <textarea class="mb-10" placeholder="Enter room description" name="description" id="description" rows="5" required>{{ old('description') }}</textarea>
                    </fieldset>

                    <!-- Image Upload -->
                    <fieldset>
                        <div class="body-title">Upload Room Image (Optional, JPG, JPEG, PNG only)</div>
                        <div class="upload-image flex-grow">
                            <div class="item up-load">
                                <label class="uploadfile" for="roomImage">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="body-text">Drop your image here or select <span class="tf-color">click to browse</span></span>
                                    <input type="file" id="roomImage" name="image_path" accept="image/png, image/jpeg, image/jpg">
                                    <div id="imagePreview" class="flex flex-wrap gap-2 mt-2"></div>
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">Save Room</button>
                    </div>
                </form>
            </div>
            <!-- /new-room -->
        </div>
        <!-- /main-content-wrap -->
    </div>
    @include('layouts.footer')
</div>

<script>
    document.getElementById("roomImage").addEventListener("change", function (event) {
        const previewContainer = document.getElementById("imagePreview");
        previewContainer.innerHTML = ""; // Clear previous previews

        const files = event.target.files;
        if (files.length > 0) {
            Array.from(files).forEach((file) => {
                if (file.type.startsWith("image/")) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const img = document.createElement("img");
                        img.src = e.target.result;
                        img.classList.add("w-24", "h-24", "object-cover", "rounded", "border", "p-1", "shadow-sm");
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    });
</script>