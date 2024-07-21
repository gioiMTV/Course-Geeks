@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page Header -->
                <div class="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h1 class="mb-1 h2 fw-bold">
                            Students
                            <span class="fs-5">(1,22,105 )</span>
                        </h1>
                        <!-- Breadcrumb  -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">User</li>
                                <li class="breadcrumb-item active" aria-current="page"><a
                                        href="{{ route('students') }}">Students</a></li>
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
                    <!-- Tab Pane -->
                    <div class="tab-pane fade show active" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">
                        <div class="mb-4">
                            <input type="search" class="form-control" placeholder="Search Students">
                        </div>
                        <div class="row">
                            @foreach ($students as $student)
                                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                    <!-- Card -->
                                    <div class="card mb-4">
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <div class="text-center">
                                                <div class="position-relative">
                                                    <img src="{{asset('storage/upload/images/avatar/' . $student->avatar)}}"
                                                        class="rounded-circle avatar-xl mb-3" alt="">
                                                    <a href="#" class="position-absolute mt-8 ms-n5">
                                                        <span class="status bg-success"></span>
                                                    </a>
                                                </div>
                                                <h4 class="mb-0">{{$student->firstname}} {{$student->lastname}}</h4>
                                                <p class="mb-0">
                                                    <i class="fe fe-map-pin me-1 fs-6"></i>
                                                    {{$student->address}}
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2 mt-6">
                                                <span>Payments</span>
                                                <span class="text-dark">${{$student->total_payment}}</span>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2">
                                                <span>Joined at</span>
                                                <span>{{ $student->created_at->format('d M, Y') }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between pt-2">
                                                <span>Courses</span>
                                                <span class="text-dark">{{$student->courses_count}}</span>
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
