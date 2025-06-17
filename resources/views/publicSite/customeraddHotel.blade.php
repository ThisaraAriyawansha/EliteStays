<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Hotel - BoomBitz</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animation.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dropzone.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/flatpickr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/flickity.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/magnifypopup.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/rangeSlider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/prism.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
    <style>
        /* Custom styles for modern upload fields */
        .upload-container {
            margin-bottom: 1.5rem;
        }
        
        .upload-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
            color: #333;
        }
        
        .upload-required {
            color: #dc3545;
        }
        
        .upload-box {
            border: 2px dashed #ced4da;
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        
        .upload-box:hover {
            border-color: #80bdff;
            background-color: #e9ecef;
        }
        
        .upload-box.dragover {
            border-color: #007bff;
            background-color: rgba(0, 123, 255, 0.1);
        }
        
        .upload-icon {
            font-size: 2.5rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }
        
        .upload-text {
            color: #6c757d;
            margin-bottom: 0.5rem;
        }
        
        .upload-hint {
            font-size: 0.875rem;
            color: #6c757d;
        }
        
        .upload-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .preview-item {
            position: relative;
            width: 120px;
            height: 120px;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .preview-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .preview-remove {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(0,0,0,0.6);
            color: white;
            border: none;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        
        .upload-input {
            position: absolute;
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            z-index: -1;
        }
        
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }
    </style>
<body>
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>

    <div id="main-wrapper">
        @include('layouts.nav')
        <div class="clearfix"></div>

        <!-- Dashboard Menu -->
                @include('layouts.profileNavbar')


        <!-- Add Hotel Form -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="card shadow-sm">

                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                <form action="{{ route('customer.storeHotel') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Hotel Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                                        @error('city')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                    <div class="upload-container">
                                    <label for="hotelImages" class="upload-label">
                                        Hotel Images <span class="upload-required">*</span>
                                    </label>
                                    <div class="upload-box" id="imageUploadBox">
                                        <div class="upload-icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </div>
                                        <div class="upload-text">
                                            Drag & drop your hotel images here or click to browse
                                        </div>
                                        <div class="upload-hint">
                                            Allowed formats: JPG, JPEG, PNG (Max 5MB each)
                                        </div>
                                        <input type="file" id="hotelImages" name="image_path" class="upload-input" accept="image/png, image/jpeg, image/jpg" required multiple>
                                    </div>
                                    <div class="upload-preview" id="imagePreview"></div>
                                    @error('image_path')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Modern Logo Upload Field -->
                                <div class="upload-container">
                                    <label for="hotelLogo" class="upload-label">
                                        Hotel Logo
                                    </label>
                                    <div class="upload-box" id="logoUploadBox">
                                        <div class="upload-icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </div>
                                        <div class="upload-text">
                                            Drag & drop your logo here or click to browse
                                        </div>
                                        <div class="upload-hint">
                                            Allowed formats: JPG, JPEG, PNG (Max 2MB)
                                        </div>
                                        <input type="file" id="hotelLogo" name="logo_path" class="upload-input" accept="image/png, image/jpeg, image/jpg">
                                    </div>
                                    <div class="upload-preview" id="logoPreview"></div>
                                    @error('logo_path')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Add Hotel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('layouts.publicFooter')
        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="fa-solid fa-sort-up"></i></a>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/js/flickity.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/rangeslider.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/prism.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Image upload handling
        const imageUploadBox = document.getElementById('imageUploadBox');
        const hotelImagesInput = document.getElementById('hotelImages');
        const imagePreview = document.getElementById('imagePreview');
        
        // Logo upload handling
        const logoUploadBox = document.getElementById('logoUploadBox');
        const hotelLogoInput = document.getElementById('hotelLogo');
        const logoPreview = document.getElementById('logoPreview');
        
        // Handle drag and drop for images
        setupUploadBox(imageUploadBox, hotelImagesInput, imagePreview, true);
        
        // Handle drag and drop for logo (single file)
        setupUploadBox(logoUploadBox, hotelLogoInput, logoPreview, false);
        
        function setupUploadBox(box, input, previewContainer, allowMultiple) {
            // Click handler
            box.addEventListener('click', function() {
                input.click();
            });
            
            // Drag and drop handlers
            box.addEventListener('dragover', function(e) {
                e.preventDefault();
                box.classList.add('dragover');
            });
            
            ['dragleave', 'dragend'].forEach(type => {
                box.addEventListener(type, function() {
                    box.classList.remove('dragover');
                });
            });
            
            box.addEventListener('drop', function(e) {
                e.preventDefault();
                box.classList.remove('dragover');
                
                if (e.dataTransfer.files.length) {
                    input.files = e.dataTransfer.files;
                    updatePreview(input, previewContainer, allowMultiple);
                }
            });
            
            // Input change handler
            input.addEventListener('change', function() {
                updatePreview(input, previewContainer, allowMultiple);
            });
        }
        
        function updatePreview(input, previewContainer, allowMultiple) {
            previewContainer.innerHTML = '';
            
            const files = input.files;
            if (!files.length) return;
            
            // If not allowing multiple, only show the first file
            const filesToShow = allowMultiple ? files : [files[0]];
            
            Array.from(filesToShow).forEach((file, index) => {
                if (!file.type.startsWith('image/')) {
                    // Show error for non-image files
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'alert alert-danger mt-2';
                    errorDiv.textContent = `File "${file.name}" is not an image.`;
                    previewContainer.appendChild(errorDiv);
                    return;
                }
                
                if (file.size > (allowMultiple ? 5 * 1024 * 1024 : 5 * 1024 * 1024)) {
                    // Show error for oversized files
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'alert alert-danger mt-2';
                    errorDiv.textContent = `File "${file.name}" exceeds size limit (${allowMultiple ? '5MB' : '5MB'}).`;
                    previewContainer.appendChild(errorDiv);
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewItem = document.createElement('div');
                    previewItem.className = 'preview-item';
                    
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'preview-image';
                    
                    const removeBtn = document.createElement('button');
                    removeBtn.className = 'preview-remove';
                    removeBtn.innerHTML = '&times;';
                    removeBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        previewItem.remove();
                        
                        // Update the files array
                        const newFiles = Array.from(input.files).filter((_, i) => i !== index);
                        const dataTransfer = new DataTransfer();
                        newFiles.forEach(file => dataTransfer.items.add(file));
                        input.files = dataTransfer.files;
                    });
                    
                    previewItem.appendChild(img);
                    previewItem.appendChild(removeBtn);
                    previewContainer.appendChild(previewItem);
                };
                reader.readAsDataURL(file);
            });
        }
    });
    </script>
</body>
</html>