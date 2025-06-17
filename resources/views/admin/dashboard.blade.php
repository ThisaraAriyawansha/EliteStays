@include('layouts.header')

<!-- main-content -->
<div class="main-content">
    <!-- main-content-wrap -->
    <div class="main-content-inner">
        <h3>Admin Dashboard</h3><br><br>

        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="tf-section-4 mb-30">

                <!-- Hotel Count -->
                <div class="wg-chart-default">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image type-white">
                                <i class="bi bi-building text-success" style="font-size: 2rem;"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Total Hotels</div>
                                <h4>{{ $hotelCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Hotel Count -->

                <!-- Room Count -->
                <div class="wg-chart-default">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image type-white">
                                <i class="bi bi-door-open text-primary" style="font-size: 2rem;"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Total Rooms</div>
                                <h4>{{ $roomCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Room Count -->

                <!-- Total Room Images Count -->
                <div class="wg-chart-default">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image type-white">
                                <i class="bi bi-images text-warning" style="font-size: 2rem;"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Total Room Images</div>
                                <h4>{{ $roomImageCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Total Room Images Count -->

            </div>
        </div>
        <!-- /main-content-wrap -->
    </div>
</div>

@include('layouts.footer')
