@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-3 mb-3 d-lg-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-lg-0">
                        <h1 class="mb-0 h2 fw-bold">Dashboard</h1>
                    </div>
                    {{-- <div class="d-flex">
                        <div class="input-group me-3">
                            <input class="form-control flatpickr" type="text" placeholder="Select Date"
                                aria-describedby="basic-addon2">

                            <span class="input-group-text" id="basic-addon2"><i class="fe fe-calendar"></i></span>
                        </div>
                        <a href="#" class="btn btn-primary">Setting</a>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                            <div>
                                <span class="text-success fw-semibold fs-6 text-uppercase fw-semibold ls-md">Sales</span>
                            </div>
                            <div>
                                <span class="fe fe-shopping-bag fs-3 text-primary"></span>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-1">{{ $totalSales }}</h2>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                            <div>
                                <span class="text-warning fw-semibold fs-6 text-uppercase fw-semibold ls-md">Courses</span>
                            </div>
                            <div>
                                <span class="fe fe-book-open fs-3 text-primary"></span>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-1">{{ $totalCourses }}</h2>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                            <div>
                                <span class="text-success fw-semibold fs-6 text-uppercase fw-semibold ls-md">Students</span>
                            </div>
                            <div>
                                <span class="fe fe-users fs-3 text-primary"></span>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-1">{{ $totalStudents }}</h2>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                            <div>
                                <span
                                    class="text-success fw-semibold fs-6 text-uppercase fw-semibold ls-md">Instructor</span>
                            </div>
                            <div>
                                <span class="fe fe-user-check fs-3 text-primary"></span>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-1">{{ $totalInstructors }}</h2>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card header -->
                    <div
                        class="card-header align-items-center card-header-height d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">Earnings</h4>
                        </div>

                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- Earning chart -->
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-xl-6 col-lg-12 col-md-12 col-12 mb-4">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Card header -->
                    <div class="card-header d-flex align-items-center justify-content-between card-header-height">
                        <h4 class="mb-0">Popular Instructors</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- List group -->
                        <ul class="list-group list-group-flush">
                            @foreach ($topInstructors as $instructor)
                                <li class="list-group-item px-4 pt-4">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-md avatar-indicators avatar-offline">
                                                <img alt="avatar"
                                                    src="{{ asset('storage/upload/images/avatar/avatar-' . rand(1, 7) . '.jpg') }}"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="col ms-n3">
                                            <h4 class="mb-0 h5">{{ $instructor->firstname }} {{ $instructor->lastname }}
                                            </h4>
                                            <span class="me-2 fs-6">
                                                <span
                                                    class="text-dark me-1 fw-semibold">{{ $instructor->total_courses_sold }}</span>
                                                Courses
                                            </span>
                                            <span class="me-2 fs-6">
                                                <span
                                                    class="text-dark me-1 fw-semibold">{{ number_format($instructor->total_students) }}</span>
                                                Students
                                            </span>
                                            <span class="fs-6">
                                                <span
                                                    class="text-dark me-1 fw-semibold">{{ number_format($instructor->total_reviews) }}</span>
                                                Reviews
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <span class="dropdown dropstart">
                                                <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                                    role="button" id="courseDropdown{{ $loop->iteration }}"
                                                    data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <span class="dropdown-menu"
                                                    aria-labelledby="courseDropdown{{ $loop->iteration }}">
                                                    <span class="dropdown-header">Settings</span>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-edit dropdown-item-icon"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-trash dropdown-item-icon"></i>
                                                        Remove
                                                    </a>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-12 col-md-12 col-12 mb-4">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Card header -->
                    <div class="card-header d-flex align-items-center justify-content-between card-header-height">
                        <h4 class="mb-0">Popular Courses</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- List group flush -->
                        <ul class="list-group list-group-flush">
                            @foreach ($topCourses as $course)
                                <li class="list-group-item px-0 pt-0">
                                    <div class="row">
                                        <!-- Col -->
                                        <div class="col-md-3 col-12 mb-3 mb-md-0">
                                            <a href="#">
                                                <img src="{{ asset('storage/upload/images/course/' . $course->course_image) }}"
                                                    alt="{{ $course->course_name }}" class="img-fluid rounded">
                                            </a>
                                        </div>
                                        <!-- Col -->
                                        <div class="col-md-8 col-10">
                                            <a href="#">
                                                <h5 class="text-primary-hover">{{ $course->course_name }}</h5>
                                            </a>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('storage/upload/images/avatar/' . $course->instructor_avatar) }}"
                                                    alt="{{ $course->instructor_firstname }} {{ $course->instructor_lastname }}"
                                                    class="rounded-circle avatar-xs me-2">
                                                <span class="fs-6">{{ $course->instructor_firstname }}
                                                    {{ $course->instructor_lastname }}</span>
                                            </div>
                                        </div>
                                        <div class="col-1 col-auto d-flex justify-content-center">
                                            <span class="dropdown dropstart">
                                                <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                                    role="button" id="courseDropdown{{ $course->course_id }}"
                                                    data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                                    aria-expanded="false">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <span class="dropdown-menu"
                                                    aria-labelledby="courseDropdown{{ $course->course_id }}">
                                                    <span class="dropdown-header">Settings</span>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-edit dropdown-item-icon"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-trash dropdown-item-icon"></i>
                                                        Remove
                                                    </a>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [{
                    label: 'Total Sales',
                    data: @json($totals),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
