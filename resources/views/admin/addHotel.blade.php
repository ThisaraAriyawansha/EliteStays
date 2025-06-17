@include('layouts.header')
<!-- main-content -->
<div class="main-content">
    <!-- main-content-wrap -->
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Add a Hotel</h3>
            </div>
            <!-- new-category -->
            <div class="wg-box">
                <form id="addHotelForm" class="form-new-product form-style-1" method="POST" action="{{ route('hotels.store') }}" enctype="multipart/form-data">
                    @csrf

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

                    <h5>Add Hotel</h5>

                    <fieldset class="name">
                        <div class="body-title mb-10">Name <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter Name" name="name" id="name" value="{{ old('name') }}" required>
                    </fieldset>

                    <fieldset class="address">
                        <div class="body-title mb-10">Address <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter Address" name="address" id="address" value="{{ old('address') }}" required>
                    </fieldset>

                    <fieldset class="city">
                        <div class="body-title mb-10">City <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter City" name="city" id="city" value="{{ old('city') }}" required>
                    </fieldset>

                    <fieldset class="description">
                        <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter Description" name="description" id="description" value="{{ old('description') }}" required>
                    </fieldset>

                    <fieldset>
                        <div class="body-title">Upload Image (Allowed only JPG, JPEG & PNG files)<span class="tf-color-1">*</span></div>
                        <div class="upload-image flex-grow">
                            <div class="item up-load">
                                <label class="uploadfile" for="myFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="body-text">Drop your image here or select <span class="tf-color">click to browse</span></span>
                                    <input type="file" id="myFile" name="image_path" accept="image/png, image/jpeg, image/jpg" required>
                                    <div id="imagePreview" class="flex flex-wrap gap-2 mt-2"></div>
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="body-title">Upload Logo (Allowed only JPG, JPEG & PNG files)</div>
                        <div class="upload-image flex-grow">
                            <div class="item up-load">
                                <label class="uploadfile" for="logoFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="body-text">Drop your logo here or select <span class="tf-color">click to browse</span></span>
                                    <input type="file" id="logoFile" name="logo_path" accept="image/png, image/jpeg, image/jpg">
                                    <div id="logoPreview" class="flex flex-wrap gap-2 mt-2"></div>
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">Save</button>
                    </div>
                </form>
            </div>
            <!-- /new-category -->
        </div>
        <!-- /main-content-wrap -->
    </div>
</div>

@include('layouts.footer')

<script>
    // Image preview for main image
    document.getElementById("myFile").addEventListener("change", function (event) {
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

    // Image preview for logo
    document.getElementById("logoFile").addEventListener("change", function (event) {
        const previewContainer = document.getElementById("logoPreview");
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