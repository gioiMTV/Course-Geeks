<!doctype html>
<html lang="en">

<!-- Mirrored from geeksui.codescandy.com/geeks/pages/dashboard/admin-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Jun 2024 14:59:18 GMT -->

<head>
    <link rel="stylesheet" href="{{asset('assets/libs/quill/dist/quill.snow.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/dist/flatpickr.min.css') }}">
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Codescandy" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/favicon.ico') }}" />

    <!-- darkmode js -->
    <script src="{{ asset('assets/js/vendors/darkMode.js') }}"></script>

    <!-- Libs CSS -->
    <link href="{{ asset('assets/fonts/feather/feather.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">

    <title>@yield('title')</title>

</head>

<body>
    <div id="db-wrapper">
        @include('blocks.admin.sibar')
        
        <main id="page-content">

            @include('blocks.admin.header')

            @yield('content')

        </main>
    </div>

    <!-- Script -->

    <!-- Libs JS -->
    <script src="{{ asset('assets/libs/%40popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>

    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/chart.js') }}"></script>
    <script src="{{ asset('assets/libs/flatpickr/dist/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/flatpickr.js') }}"></script>
    

    <script src="{{asset('assets/libs/quill/dist/quill.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/editor.js')}}"></script>
    <script src="{{asset('assets/js/vendors/validation.js')}}"></script>
</body>

</html>
