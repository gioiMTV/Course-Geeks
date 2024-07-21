@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h1 class="mb-1 h2 fw-bold">
                            Instructor
                            <span class="fs-5">(12,105)</span>
                        </h1>
                        <!-- Breadcrumb  -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">User</li>
                                <li class="breadcrumb-item active" aria-current="page"><a
                                        href="{{ route('instructors') }}">Instructor</a></li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Tab -->
                <div class="tab-content">
                    <!-- Tab pane -->
                    <div class="tab-pane fade show active" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">
                        <div class="mb-4">
                            <input type="search" class="form-control" placeholder="Search Instructor">
                        </div>
                        <div class="row">
                            @foreach ($instructors as $instructor)
                                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                    <!-- Card -->
                                    <div class="card mb-4">
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <div class="text-center">
                                                <img src="{{ asset('storage/upload/images/avatar/' . $instructor->avatar) }}"
                                                    class="rounded-circle avatar-xl mb-3" alt="">
                                                <h4 class="mb-0">{{ $instructor->firstname }} {{ $instructor->lastname }}
                                                </h4>
                                                <p class="mb-0">{{ $instructor->instructor_field }}</p>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2 mt-4">
                                                <span>Students</span>
                                                <span class="text-dark">{{ $instructor->students_count }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2">
                                                <span>Instructor Rating</span>
                                                <span class="text-warning">
                                                    @if (floor($instructor->average_rating) == $instructor->average_rating)
                                                        {{ number_format($instructor->average_rating, 0) }}
                                                    @else
                                                        {{ number_format($instructor->average_rating, 1) }}
                                                    @endif
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="11"
                                                            height="11" fill="currentColor"
                                                            class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-between pt-2">
                                                <span>Courses</span>
                                                <span class="text-dark">{{ $instructor->courses_count }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
