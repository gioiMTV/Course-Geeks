<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/libs/quill/dist/quill.snow.css">
    <link rel="stylesheet" href="../assets/libs/glightbox/dist/css/glightbox.min.css">
    <link rel="stylesheet" href="../assets/libs/bs-stepper/dist/css/bs-stepper.min.css">
    {{-- <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script> --}}
{{-- <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet"> --}}

    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Codescandy" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/favicon.ico') }}" />

    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- darkmode js -->
    <script src="{{ asset('assets/js/vendors/darkMode.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- Thư viện GLightbox từ CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <!-- Libs CSS -->
    <link href="{{ asset('assets/fonts/feather/feather.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet" />
    <!-- Bao gồm thư viện GLightbox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet ">
    <link href="../assets/libs/dragula/dist/dragula.min.css" rel="stylesheet ">
    <!-- Thêm các thẻ khác của bạn -->
    {{-- <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css"> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="canonical" href="index.html" />
    <link href="{{ asset('assets/libs/tiny-slider/dist/tiny-slider.css') }}" rel="stylesheet" />
    <title>@yield('title')</title>
</head>

<body>
    <main>
        @if (!isset($header))
            @include('blocks.users.header')
        @endif
        @yield('content')
    </main>

    @if (!isset($footer) || !isset($header))
        @include('blocks.users.footer')
    @endif


    <!-- Scripts -->
    <!-- Libs JS -->
    <script src="{{ asset('assets/libs/%40popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="{{ asset('assets/libs/tiny-slider/dist/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/libs/tippy.js/dist/tippy-bundle.umd.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/tnsSlider.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/tooltip.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('assets/js/vendors/validation.js') }}"></script>
    <!-- Bao gồm thư viện GLightbox -->
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <!-- Bootstrap JS và Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>

    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>

    <script src="{{asset('assets/js/vendors/file-upload.js')}}"></script>
    <script src="{{asset('assets/libs/glightbox/dist/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/glight.js')}}"></script>
    <script src="{{asset('assets/libs/bs-stepper/dist/js/bs-stepper.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/beStepper.js')}}"></script>
    <script src="{{asset('assets/js/vendors/customDragula.js')}}"></script>
    <script src="{{asset('assets/js/vendors/editor.js')}}"></script>
    <script src="{{asset('assets/libs/file-upload-with-preview/dist/file-upload-with-preview.iife.js')}}"></script>
    <script src="{{asset('assets/libs/%40yaireo/tagify/dist/tagify.min.js')}}"></script>
    <script src="{{asset('assets/libs/quill/dist/quill.min.js')}}"></script>
    <script src="{{asset('assets/libs/dragula/dist/dragula.min.js')}}"></script>
    <!-- Theme JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="{{asset('assets/js/vendors/chart.js')}}"></script>
    {{-- aa --}}

<!-- CSS của Bootstrap -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/4.4.3/dragula.min.js"></script>

<!-- JavaScript của Bootstrap và Popper.js -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>




    <script src="../assets/js/vendors/customDragula.js"></script>
    <script src="../assets/js/vendors/editor.js"></script>

</body>

</html>
