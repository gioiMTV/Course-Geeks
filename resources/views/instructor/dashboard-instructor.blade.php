@extends('layouts.user')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <section class="pt-5 pb-5">
        <div class="container">
            <!-- User info -->
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <!-- Bg -->
                    <div class="rounded-top"
                        style="background: url({{ asset('storage/upload/images/background/profile-bg.jpg') }}) no-repeat; background-size: cover; height: 100px">
                    </div>
                    <div class="card px-4 pt-2 pb-4 shadow-sm rounded-top-0 rounded-bottom-0 rounded-bottom-md-2">
                        <div class="d-flex align-items-end justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                                    <img src="{{ asset('storage/upload/images/avatar/' . $userDetail->avatar) }}"
                                        class="avatar-xl rounded-circle border border-2 border-white img-uploaded"
                                        alt="avatar" />
                                </div>
                                <div class="lh-1">
                                    <h2 class="mb-0">
                                        {{ $userDetail->firstname }}
                                        {{ $userDetail->lastname }}
                                    </h2>
                                    <p class="mb-0 d-block current-email">{{ $user->email }}</p>
                                </div>
                            </div>
                            <div>
                                <a href="{{route('add-course')}}" class="btn btn-primary d-none d-md-block">Create New
                                    Course</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->

            <div class="row mt-0 mt-md-4">
                <div class="col-lg-3 col-md-4 col-12">
                    <!-- User profile -->
                    <nav class="navbar navbar-expand-md shadow-sm mb-4 mb-lg-0 sidenav">
                        <!-- Menu -->
                        <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
                        <!-- Button -->
                        <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light"
                            type="button" data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fe fe-menu"></span>
                        </button>
                        <!-- Collapse -->
                        <div class="collapse navbar-collapse" id="sidenav">
                            <div class="navbar-nav flex-column">
                                <span class="navbar-header">Dashboard</span>
                                <ul class="list-unstyled ms-n2 mb-4">
                                    <!-- Nav item -->
                                    <li class="nav-item active">
                                        <a id="dashboard-link" class="nav-link" style="width:233px" href="#">
                                            <i class="fe fe-home nav-icon"></i>
                                            My Dashboard
                                        </a>
                                    </li>
                                    <!-- Nav item -->
                                    <li class="nav-item">
                                        <a id="course-link" class="nav-link"  href="#" style="width:233px">
                                            <i class="fe fe-book nav-icon"></i>
                                            My Courses
                                        </a>
                                    </li>
                                    <!-- Nav item -->
                                    <li class="nav-item">
                                        <a id="payout-link" class="nav-link" style="width:233px" href="#">
                                            <i class="fe fe-dollar-sign nav-icon"></i>
                                            Payouts
                                        </a>
                                    </li>
                                </ul>
                                <!-- Navbar header -->
                                <span class="navbar-header">Account Settings</span>
                                <ul class="list-unstyled ms-n2 mb-0">
                                    <!-- Nav item -->
                                    <li class="nav-item">
                                        <a id="edit-profile-link" class="nav-link" style="width:233px" href="#">
                                            <i class="fe fe-settings nav-icon"></i>
                                            Edit Profile
                                        </a>
                                    </li>
                                    <!-- Nav item -->
                                    <li class="nav-item">
                                        <a id="security-link" class="nav-link" style="width:233px" href="#">
                                            <i class="fe fe-user nav-icon"></i>
                                            Security
                                        </a>
                                    </li>
                                    <!-- Nav item -->
                                    <li class="nav-item">
                                        <a id="delete-link" class="nav-link" style="width:233px" href="#">
                                            <i class="fe fe-trash nav-icon"></i>
                                            Delete Profile
                                        </a>
                                    </li>
                                    <!-- Nav item -->
                                    <li class="nav-item">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="nav-link" style="width:233px" style="width:278px; height:32px">
                                                <i class="fe fe-power nav-icon"></i>
                                                Sign Out
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <!-- Card -->
                    <div class="" id="dashboard-card">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-12">
                                <!-- Card -->
                                <div class="card mb-4">
                                    <div class="p-4">
                                        <span class="fs-6 text-uppercase fw-semibold badge bg-success ms-2">Earning this
                                            month</span>
                                        <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">${{ $revenue }}
                                        </h2>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12 col-12">
                                <!-- Card -->
                                <div class="card mb-4">
                                    <div class="p-4">
                                        <span class="fs-6 text-uppercase fw-semibold badge bg-info ms-2">Student this
                                            month</span>
                                        <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">{{ $totalStudents }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-12">
                                <!-- Card -->
                                <div class="card mb-4">
                                    <div class="p-4">
                                        <span class="fs-6 text-uppercase fw-semibold badge bg-warning ms-2">The sales
                                            performance</span>
                                        <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">{{ $courseSold }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="h4 mb-0">Earnings</h3>
                            </div>
                            <!-- Card body -->
                            <canvas id="revenueChart"></canvas>
                        </div>
                        <!-- Card -->

                        <div class="card mb-4">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="h4 mb-0">Best Selling Courses</h3>
                            </div>
                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table mb-0 table-hover table-centered text-nowrap">
                                    <!-- Table Head -->
                                    <thead class="table-light">
                                        <tr>
                                            <th>Courses</th>
                                            <th>Sales</th>
                                            <th>Amount</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <!-- Table Body -->
                                    <tbody>
                                        @foreach ($topCourses as $course)
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ asset('storage/upload/images/course/' . $course->image) }}"
                                                                alt="course" class="rounded img-4by3-lg">
                                                            <h5 class="ms-3 text-primary-hover mb-0">{{ $course->title }}
                                                            </h5>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>{{ $course->total_sales }}</td>
                                                <td>${{ number_format($course->total_revenue, 2) }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <!-- Card for Course-->
                    <div class="d-none" id="course-card">
                        <div class="card mb-4">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">Courses</h3>
                                <span>Manage your courses and its update like live, draft and insight.</span>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- Form -->
                                <form class="row gx-3">
                                    <div class="col-lg-9 col-md-7 col-12 mb-lg-0 mb-2">
                                        <input type="text" class="form-control" placeholder="Search Your Courses"
                                            id="search-course-input">
                                    </div>

                                </form>
                            </div>
                            <!-- Table -->
                            <div class="table-responsive overflow-y-hidden">
                                <table class="table mb-0 text-nowrap table-hover table-centered text-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Courses</th>
                                            <th>Students</th>
                                            <th>Rating</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="search-list">
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <a href="{{ route('course-detail', $course->id) }}">
                                                                <img src="{{ asset('storage/upload/images/course/' . $course->image) }}"
                                                                    alt="course" class="rounded img-4by3-lg">
                                                            </a>
                                                        </div>
                                                        <div class="ms-3">
                                                            <h4 class="mb-1 h5">
                                                                <a href="{{ route('course-detail', $course->id) }}"
                                                                    class="text-inherit">{{ $course->title }}</a>
                                                            </h4>
                                                            <ul class="list-inline fs-6 mb-0">
                                                                <li class="list-inline-item">
                                                                    <span class="align-text-bottom">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="10" height="10"
                                                                            fill="currentColor" class="bi bi-clock"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z">
                                                                            </path>
                                                                            <path
                                                                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z">
                                                                            </path>
                                                                        </svg>
                                                                    </span>
                                                                    <span>1h 30m</span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    @if ($course->level == 'Beginner')
                                                                        <svg class="me-1 mt-n1" width="16"
                                                                            height="16" viewBox="0 0 16 16"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect x="3" y="8" width="2"
                                                                                height="6" rx="1"
                                                                                fill="#754FFE" />
                                                                            <rect x="7" y="5" width="2"
                                                                                height="9" rx="1"
                                                                                fill="#DBD8E9" />
                                                                            <rect x="11" y="2" width="2"
                                                                                height="12" rx="1"
                                                                                fill="#DBD8E9" />
                                                                        </svg>
                                                                    @elseif ($course->level == 'Intermediate')
                                                                        <svg class="me-1 mt-n1" width="16"
                                                                            height="16" viewBox="0 0 16 16"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect x="3" y="8" width="2"
                                                                                height="6" rx="1"
                                                                                fill="#754FFE" />
                                                                            <rect x="7" y="5" width="2"
                                                                                height="9" rx="1"
                                                                                fill="#754FFE" />
                                                                            <rect x="11" y="2" width="2"
                                                                                height="12" rx="1"
                                                                                fill="#DBD8E9" />
                                                                        </svg>
                                                                    @elseif ($course->level == 'Advance')
                                                                        <svg class="me-1 mt-n1" width="16"
                                                                            height="16" viewBox="0 0 16 16"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect x="3" y="8" width="2"
                                                                                height="6" rx="1"
                                                                                fill="#754FFE"></rect>
                                                                            <rect x="7" y="5" width="2"
                                                                                height="9" rx="1"
                                                                                fill="#754FFE"></rect>
                                                                            <rect x="11" y="2" width="2"
                                                                                height="12" rx="1"
                                                                                fill="#754FFE"></rect>
                                                                        </svg>
                                                                    @endif
                                                                    {{ $course->level }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $course->total_students }}</td>
                                                <td>
                                                    <span class="lh-1">
                                                        <span class="text-warning">
                                                            @if (floor($course->review_avg_rate) == $course->review_avg_rate)
                                                                {{ number_format($course->review_avg_rate, 0) }}
                                                            @else
                                                                {{ number_format($course->review_avg_rate, 1) }}
                                                            @endif
                                                        </span>
                                                        <span class="mx-1 align-text-top">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="11"
                                                                height="11" fill="currentColor"
                                                                class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                        ({{ $course->review_count }}, {{ $course->sale_count }})
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="dropdown dropstart">
                                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle"
                                                            href="#" role="button" id="courseDropdown"
                                                            data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                                            aria-expanded="false">
                                                            <i class="fe fe-more-vertical"></i>
                                                        </a>
                                                        <span class="dropdown-menu" aria-labelledby="courseDropdown">
                                                            <span class="dropdown-header">Setting</span>
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
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                   

                 

                    <!-- Card -->
                    <div class="d-none" id="payout-card">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">Payout Method</h3>
                                <p class="mb-0">Order Dashboard is a quick overview of all current orders.</p>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="alert bg-light-warning text-dark-warning alert-dismissible fade show"
                                    role="alert">
                                    <strong>payout@geeks.com</strong>
                                    <p class="mb-0">Your selected payout method was confirmed on Next Payout on 15 July,
                                        2020</p>
                                    <!-- Button -->
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <div class="row mt-6">
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-12 mb-3 mb-lg-0">
                                        <div class="text-center">
                                            <!-- PayOut chart -->
                                            <div id="payoutChart" class="apex-charts"></div>
                                            <h4 class="mb-1">Your Earning this month</h4>
                                            <h5 class="mb-0 display-4 fw-bold">$3,210</h5>
                                            <p class="px-4">Update your payout method in settings</p>
                                            <a href="#" class="btn btn-primary">Withdraw Earning</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                                        <!-- Check box -->
                                        <div class="border p-4 rounded-3 mb-3">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio1" name="customRadio"
                                                    class="form-check-input" checked>
                                                <label class="form-check-label" for="customRadio1">
                                                    <img src="{{ asset('storage/upload/images/brand/paypal-small.svg') }}"
                                                        alt="paypal">
                                                </label>
                                                <p>Your paypal account has been authorized for payouts.</p>
                                                <a href="#" class="btn btn-outline-primary">Remove Account</a>
                                            </div>
                                        </div>
                                        <!-- Check box -->
                                        <div class="border p-4 rounded-3 mb-3">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio2" name="customRadio"
                                                    class="form-check-input">
                                                <label class="form-check-label ps-1" for="customRadio2">
                                                    <img
                                                        src="{{ asset('storage/upload/images/brand/payoneer.svg"') }} alt="payoneer">
                                                </label>
                                            </div>
                                        </div>
                                        <!-- Check box -->
                                        <div class="border p-4 rounded-3">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio3" name="customRadio"
                                                    class="form-check-input">
                                                <label class="form-check-label ps-1 h4" for="customRadio3">Bank
                                                    Transfer</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card header -->
                            <div class="card-header border-bottom-0">
                                <h3 class="h4 mb-3">Withdraw History</h3>
                                <div class="row align-items-center">
                                    <div class="col-lg-3 col-md-6 pe-md-0 mb-2 mb-lg-0">
                                        <!-- Custom select -->
                                        <select class="form-select">
                                            <option value="">30 days</option>
                                            <option value="Last 7 days">2 Months</option>
                                            <option value="High Rated">6 Months</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-6 pe-md-0 mb-2 mb-lg-0">
                                        <!-- Custom select -->
                                        <select class="form-select">
                                            <option value="">Oct 2020</option>
                                            <option value="Jan 2021">Jan 2021</option>
                                            <option value="May 2021">May 2021</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-2 mb-lg-0">
                                        <!-- Custom select -->
                                        <select class="form-select">
                                            <option value="">Transaction Type</option>
                                            <option value="cash transactions">Cash Transactions</option>
                                            <option value="non-cash transactions">Non Cash Transactions</option>
                                            <option value="credit transactions">Credit Transactions</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-md-6 text-lg-end">
                                        <!-- Button -->
                                        <a href="#" class="btn btn-outline-secondary btn-icon" download="">
                                            <i class="fe fe-download"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table mb-0 text-nowrap table-hover table-centered table-with-checkbox">
                                    <thead class="table-light">
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="checkAll">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Method</th>
                                            <th>Status</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="withdrawTwo">
                                                    <label class="form-check-label" for="withdrawTwo"></label>
                                                </div>
                                            </td>
                                            <td>#1060</td>
                                            <td>PayPal</td>
                                            <td>
                                                <span class="badge bg-warning">Pending</span>
                                            </td>
                                            <td>$1200</td>
                                            <td>Sept 15, 2020</td>
                                            <td>
                                                <span class="dropdown dropstart">
                                                    <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                                        role="button" id="paymentDropdown" data-bs-toggle="dropdown"
                                                        data-bs-offset="-20,20" aria-expanded="false">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <span class="dropdown-menu" aria-labelledby="paymentDropdown">
                                                        <span class="dropdown-header">Setting</span>
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
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="withdrawThree">
                                                    <label class="form-check-label" for="withdrawThree"></label>
                                                </div>
                                            </td>
                                            <td>#1038</td>
                                            <td>PayPal</td>
                                            <td>
                                                <span class="badge bg-success">Paid</span>
                                            </td>
                                            <td>$2000</td>
                                            <td>Aug 15, 2020</td>
                                            <td>
                                                <span class="dropdown dropstart">
                                                    <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                                        role="button" id="paymentDropdown1" data-bs-toggle="dropdown"
                                                        data-bs-offset="-20,20" aria-expanded="false">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <span class="dropdown-menu" aria-labelledby="paymentDropdown1">
                                                        <span class="dropdown-header">Setting</span>
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
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="withdrawFour">
                                                    <label class="form-check-label" for="withdrawFour"></label>
                                                </div>
                                            </td>
                                            <td>#1016</td>
                                            <td>PayPal</td>
                                            <td>
                                                <span class="badge bg-success">Paid</span>
                                            </td>
                                            <td>$3590</td>
                                            <td>July 15, 2020</td>
                                            <td>
                                                <span class="dropdown dropstart">
                                                    <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                                        role="button" id="paymentDropdown2" data-bs-toggle="dropdown"
                                                        data-bs-offset="-20,20" aria-expanded="false">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <span class="dropdown-menu" aria-labelledby="paymentDropdown2">
                                                        <span class="dropdown-header">Setting</span>
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
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="withdrawFive">
                                                    <label class="form-check-label" for="withdrawFive"></label>
                                                </div>
                                            </td>
                                            <td>#1008</td>
                                            <td>PayPal</td>
                                            <td>
                                                <span class="badge bg-success">Paid</span>
                                            </td>
                                            <td>$4500</td>
                                            <td>Aug 15, 2020</td>
                                            <td>
                                                <span class="dropdown dropstart">
                                                    <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                                        role="button" id="paymentDropdown3" data-bs-toggle="dropdown"
                                                        data-bs-offset="-20,20" aria-expanded="false">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <span class="dropdown-menu" aria-labelledby="paymentDropdown3">
                                                        <span class="dropdown-header">Setting</span>
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
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="withdrawSix">
                                                    <label class="form-check-label" for="withdrawSix"></label>
                                                </div>
                                            </td>
                                            <td>#1002</td>
                                            <td>PayPal</td>
                                            <td>
                                                <span class="badge bg-success">Paid</span>
                                            </td>
                                            <td>$4500</td>
                                            <td>May 15, 2020</td>
                                            <td>
                                                <span class="dropdown dropstart">
                                                    <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                                        role="button" id="paymentDropdown4" data-bs-toggle="dropdown"
                                                        data-bs-offset="-20,20" aria-expanded="false">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <span class="dropdown-menu" aria-labelledby="paymentDropdown4">
                                                        <span class="dropdown-header">Setting</span>
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
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="withdrawSeven">
                                                    <label class="form-check-label" for="withdrawSeven"></label>
                                                </div>
                                            </td>
                                            <td>#982</td>
                                            <td>PayPal</td>
                                            <td>
                                                <span class="badge bg-success">Paid</span>
                                            </td>
                                            <td>$1232</td>
                                            <td>April 15, 2020</td>
                                            <td>
                                                <span class="dropdown dropstart">
                                                    <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                                        role="button" id="paymentDropdown5" data-bs-toggle="dropdown"
                                                        data-bs-offset="-20,20" aria-expanded="false">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <span class="dropdown-menu" aria-labelledby="paymentDropdown5">
                                                        <span class="dropdown-header">Setting</span>
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
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="withdrawEight">
                                                    <label class="form-check-label" for="withdrawEight"></label>
                                                </div>
                                            </td>
                                            <td>#970</td>
                                            <td>PayPal</td>
                                            <td>
                                                <span class="badge bg-danger">Cancel</span>
                                            </td>
                                            <td>$4235</td>
                                            <td>March 15, 2020</td>
                                            <td>
                                                <span class="dropdown dropstart">
                                                    <a class="btn-icon btn btn-ghost btn-sm rounded-circle"
                                                        href="#" role="button" id="paymentDropdown6"
                                                        data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                                        aria-expanded="false">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <span class="dropdown-menu" aria-labelledby="paymentDropdown6">
                                                        <span class="dropdown-header">Setting</span>
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
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="withdrawNine">
                                                    <label class="form-check-label" for="withdrawNine"></label>
                                                </div>
                                            </td>
                                            <td>#965</td>
                                            <td>PayPal</td>
                                            <td>
                                                <span class="badge bg-success">Paid</span>
                                            </td>
                                            <td>$1231</td>
                                            <td>Feb 15, 2020</td>
                                            <td>
                                                <span class="dropdown dropstart">
                                                    <a class="btn-icon btn btn-ghost btn-sm rounded-circle"
                                                        href="#" role="button" id="paymentDropdown7"
                                                        data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                                        aria-expanded="false">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <span class="dropdown-menu" aria-labelledby="paymentDropdown7">
                                                        <span class="dropdown-header">Setting</span>
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
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="withdrawTen">
                                                    <label class="form-check-label" for="withdrawTen"></label>
                                                </div>
                                            </td>
                                            <td>#953</td>
                                            <td>PayPal</td>
                                            <td>
                                                <span class="badge bg-success">Paid</span>
                                            </td>
                                            <td>$5435</td>
                                            <td>Jan 15, 2020</td>
                                            <td>
                                                <span class="dropdown dropstart">
                                                    <a class="btn-icon btn btn-ghost btn-sm rounded-circle"
                                                        href="#" role="button" id="paymentDropdown8"
                                                        data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                                        aria-expanded="false">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <span class="dropdown-menu" aria-labelledby="paymentDropdown8">
                                                        <span class="dropdown-header">Setting</span>
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
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-footer">
                                    <nav>
                                        <ul class="pagination justify-content-center mb-0">
                                            <li class="page-item disabled">
                                                <a class="page-link mx-1 rounded" href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10"
                                                        height="10" fill="currentColor" class="bi bi-chevron-left"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z">
                                                    </svg>
                                                </a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link mx-1 rounded" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link mx-1 rounded" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link mx-1 rounded" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link mx-1 rounded" href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10"
                                                        height="10" fill="currentColor" class="bi bi-chevron-right"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card -->
                    <div class="card d-none" id="profile-card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Profile Details</h3>
                            <p class="mb-0">You have full control to manage your own account setting.</p>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="d-lg-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center mb-4 mb-lg-0">
                                    <img src="{{ asset('storage/upload/images/avatar/' . $userDetail->avatar) }}"
                                        class="avatar-xl rounded-circle img-uploaded" alt="avatar" />
                                    <div class="ms-3">
                                        <h4 class="mb-0">Your avatar</h4>
                                        <p class="mb-0">PNG or JPG no bigger than 800px wide and tall.</p>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-outline-secondary btn-sm"
                                        id="update-avatar-btn">Update</a>
                                    <a href="#" class="btn btn-outline-danger btn-sm"
                                        id="delete-avatar-btn">Delete</a>
                                </div>
                            </div>

                            <!-- Hidden form for file upload -->
                            <form id="upload-avatar-form" style="display: none;" enctype="multipart/form-data">
                                @csrf
                                <input type="file" id="avatar-file" name="avatar" accept="image/*">
                            </form>

                            <hr class="my-5" />
                            <div>
                                <h4 class="mb-0">Personal Details</h4>
                                <p class="mb-4">Edit your personal information and address.</p>
                                <!-- Form -->
                                <form class="row gx-3 needs-validation"
                                    action="{{ route('post-student-profile', ['id' => $user->id]) }}" method="POST">
                                    @csrf
                                    @if (session('msg'))
                                        <div class="alert alert-{{ session('alert-type') }}">
                                            {{ session('msg') }}
                                        </div>
                                    @endif

                                    <!-- First name -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="fname">First Name</label>
                                        <input type="text" id="fname" class="form-control"
                                            placeholder="First Name" required name="fname"
                                            value="{{ old('fname', $userDetail->firstname) }}" />
                                        @error('fname')
                                            <div style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Last name -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="lname">Last Name</label>
                                        <input type="text" id="lname" class="form-control"
                                            placeholder="Last Name" required name="lname"
                                            value="{{ old('lname', $userDetail->lastname) }}" />
                                        @error('lname')
                                            <div style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Phone -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="phone">Phone</label>
                                        <input type="text" id="phone" class="form-control"
                                            placeholder="Phone" required name="phone"
                                            value="{{ old('phone', $userDetail->phone) }}" />
                                        @error('phone')
                                            <div style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Address -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="address">Address</label>
                                        <input type="text" id="address" class="form-control"
                                            placeholder="Address" required name="address"
                                            value="{{ old('address', $userDetail->address) }}" />
                                        @error('address')
                                            <div style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <!-- Button -->
                                        <button class="btn btn-primary" type="submit">Update Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Card for Security -->
                    <div class="card d-none" id="security-card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Security</h3>
                            <p class="mb-0">Edit your account settings and change your password here.</p>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form cập nhật email -->
                            <h4 class="mb-0">Địa chỉ Email</h4>
                            <p>
                                Địa chỉ email hiện tại của bạn là
                                <span class="text-success current-email" id="current-email">{{ $user->email }}</span>
                            </p>
                            <form class="row" novalidate id="update-email-form">
                                @csrf
                                <div class="mb-3 col-lg-6 col-md-12 col-12">
                                    <label class="form-label" for="email">Địa chỉ email mới</label>
                                    <input id="email" type="email" name="email" class="form-control"
                                        placeholder="" required />
                                    <button type="submit" class="btn btn-primary mt-2">Cập nhật thông tin</button>
                                </div>
                            </form>
                            <hr class="my-5" />
                            <div>
                                <h4 class="mb-0">Change Password</h4>
                                <p>We will email you a confirmation when changing your password, so please expect that email
                                    after submitting.</p>
                                <!-- Form -->
                                <div class="container mt-5">
                                    <form class="row needs-validation" method="POST"
                                        action="{{ route('change.password') }}" novalidate id="change-password-form">
                                        @csrf
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <!-- Mật khẩu hiện tại -->
                                            <div class="mb-3">
                                                <label class="form-label" for="currentpassword">Mật khẩu hiện
                                                    tại</label>
                                                <input id="currentpassword" type="password" name="currentpassword"
                                                    class="form-control" placeholder="" required />
                                            </div>
                                            <!-- Mật khẩu mới -->
                                            <div class="mb-3 password-field">
                                                <label class="form-label" for="newpassword">Mật khẩu mới</label>
                                                <input id="newpassword" type="password" name="newpassword"
                                                    class="form-control mb-2" placeholder="" required />
                                            </div>
                                            <div class="mb-3">
                                                <!-- Xác nhận mật khẩu mới -->
                                                <label class="form-label" for="confirmpassword">Xác nhận mật khẩu
                                                    mới</label>
                                                <input id="confirmpassword" type="password" name="confirmpassword"
                                                    class="form-control mb-2" placeholder="" required />
                                            </div>
                                            <!-- Nút lưu -->
                                            <button type="submit" class="btn btn-primary">Lưu mật khẩu</button>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <p class="mb-0">
                                                Không nhớ mật khẩu hiện tại?
                                                <a href="{{ route('forget-password') }}">Đặt lại mật khẩu qua email</a>
                                            </p>
                                        </div>
                                    </form>
                                </div>

                                <!-- CSRF Token -->
                                <meta name="csrf-token" content="{{ csrf_token() }}">

                                <!-- Modal -->
                                <div class="modal fade" id="successModal" tabindex="-1"
                                    aria-labelledby="successModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="successModalLabel">Thay đổi mật khẩu thành
                                                    công</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Đóng"></button>
                                            </div>
                                            <div class="modal-body">
                                                Mật khẩu của bạn đã được thay đổi thành công.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Đóng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>

                    <!-- Card -->
                    <div class="card d-none" id="delete-card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Delete your account</h3>
                            <p class="mb-0">Delete or Close your account permanently.</p>
                        </div>
                        <!-- Card body -->
                        <div class="card-body p-4">
                            <span class="text-danger h4">Warning</span>
                            <p>If you close your account, you will be unsubscribed from all your courses, and will lose
                                access forever.</p>
                            <form id="delete-account-form" method="POST" action="{{ route('delete.account') }}">
                                @csrf
                                <button type="button" class="btn btn-danger" onclick="confirmDelete()">Close My
                                    Account</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        
        const labels = @json($labels);
        const data = {
            labels: labels,
            datasets: [{
                label: 'Revenue',
                data: @json($revenueByMonth),
                fill: false,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                tension: 0.1
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var revenueChart = new Chart(
            document.getElementById('revenueChart'),
            config
        );


        // search

        function customRound(num) {
            // Kiểm tra nếu phần thập phân của số nhỏ hơn 0.1 thì làm tròn xuống số nguyên gần nhất
            if (num % 1 < 0.1) {
                return Math.floor(num);
            }
            // Nếu không, làm tròn đến 1 chữ số thập phân
            return Math.round(num * 10) / 10;
        }
        $(document).ready(function() {
            $('#search-course-input').on('keyup', function() {
                var query = $(this).val();
                var instructorId = "{{ $userDetail->id }}";
                $.ajax({
                    url: "{{ route('search.course') }}",
                    type: 'GET',
                    data: {
                        query: query,
                        instructor_id: instructorId
                    },
                    success: function(response) {
                        var courses = response; // Dữ liệu JSON chứa danh sách các khóa học
                        // Xây dựng lại HTML từ dữ liệu courses
                        var html = '';
                        // Đường dẫn cơ sở cho ảnh được tạo bằng Blade và chuyển vào JavaScript
                        const basePath = '{{ asset('storage/upload/images/course/') }}';
                        courses.forEach(function(course) {
                            // Check if review_avg_rate is a valid number
                            var avgRate = customRound(course.review_avg_rate);
                            var imageUrl = basePath + '/' + course.image;
                            html += '<tr>' +
                                '<td>' +
                                '<div class="d-flex align-items-center">' +
                                '<div>' +
                                '<a href="' + imageUrl + '">' +
                                '<img src="' + imageUrl +
                                '" alt="course" class="rounded img-4by3-lg">' +
                                '</a>' +
                                '</div>' +
                                '<div class="ms-3">' +
                                '<h4 class="mb-1 h5">' +
                                '<a href="' + imageUrl + '" class="text-inherit">' +
                                course.title + '</a>' +
                                '</h4>' +
                                '<ul class="list-inline fs-6 mb-0">' +
                                '<li class="list-inline-item">' +
                                '<span class="align-text-bottom">' +
                                '<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">' +
                                '<path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"></path>' +
                                '<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"></path>' +
                                '</svg>' +
                                '</span>' +
                                '<span>1h 30m</span>' +
                                '</li>';

                            // Conditional logic for level icons
                            if (course.level == 'Beginner') {
                                html += '<li class="list-inline-item">' +
                                    '<svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                                    '<rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />' +
                                    '<rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9" />' +
                                    '<rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />' +
                                    '</svg>' +
                                    'Beginner' +
                                    '</li>';
                            } else if (course.level == 'Intermediate') {
                                html += '<li class="list-inline-item">' +
                                    '<svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                                    '<rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />' +
                                    '<rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />' +
                                    '<rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />' +
                                    '</svg>' +
                                    'Intermediate' +
                                    '</li>';
                            } else if (course.level == 'Advance') {
                                html += '<li class="list-inline-item">' +
                                    '<svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                                    '<rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>' +
                                    '<rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE"></rect>' +
                                    '<rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE"></rect>' +
                                    '</svg>' +
                                    'Advance' +
                                    '</li>';
                            }

                            html += '</ul>' +
                                '</div>' +
                                '</div>' +
                                '</td>' +
                                '<td>' + course.total_students + '</td>' +
                                '<td>' +
                                '<span class="lh-1">';


                            html += '<span class="text-warning">' + avgRate + '</span>';


                            html += '<span class="mx-1 align-text-top">' +
                                '<svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">' +
                                '<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>' +
                                '</svg>' +
                                '</span>' +
                                '(' + course.review_count + ', ' + course.sale_count +
                                ')' +
                                '</span>' +
                                '</td>' +
                                '<td>' +
                                '<span class="dropdown dropstart">' +
                                '<a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="courseDropdown" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">' +
                                '<i class="fe fe-more-vertical"></i>' +
                                '</a>' +
                                '<span class="dropdown-menu" aria-labelledby="courseDropdown">' +
                                '<span class="dropdown-header">Setting</span>' +
                                '<a class="dropdown-item" href="#">' +
                                '<i class="fe fe-edit dropdown-item-icon"></i>' +
                                'Edit' +
                                '</a>' +
                                '<a class="dropdown-item" href="#">' +
                                '<i class="fe fe-trash dropdown-item-icon"></i>' +
                                'Remove' +
                                '</a>' +
                                '</span>' +
                                '</span>' +
                                '</td>' +
                                '</tr>';
                        });

                        // Cập nhật HTML của #search-list với các khóa học mới
                        $('#search-list').html(html);
                        // console.log(response);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });

        //
    </script>
@endsection
