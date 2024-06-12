<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    @include('admin.includes.navigation')
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    @include('admin.includes.header')
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            @include('admin.includes.breadcrumb')
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            @isset($content)
                @include($content)
            @endisset
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <!-- Required Js -->
    <script src="{{ asset('admin/dist/assets/js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('admin/dist/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/dist/assets/js/pcoded.min.js') }}"></script>

    <!-- Apex Chart -->


    <!-- custom-chart js -->
    <script src="{{ asset('admin/dist/assets/js/pages/dashboard-main.js  ') }}"></script>
</body>

</html>
