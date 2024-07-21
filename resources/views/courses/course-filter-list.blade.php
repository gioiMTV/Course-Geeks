@extends('layouts.user')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <style>
        .pagination {
            display: flex;
            list-style-type: none;
        }

        .pagination li {
            margin: 5px;
            cursor: pointer;
        }
    </style>
    <!-- Page header -->
    <section class="bg-primary py-4 py-lg-6">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div>
                        <h1 class="mb-0 text-white display-4"><a href="{{ route('course-category', 0) }}" class="nav-link">All
                                courses</a></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content -->
    <section class="py-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
                    <div class="row d-md-flex justify-content-between align-items-center">
                        <div class="col-md-6 col-lg-8 col-xl-9">
                            <h4 class="mb-3 mb-md-0">Displaying {{ $courses->count() }} out of {{ $totalCourse }} courses
                            </h4>
                        </div>
                        <div class="d-inline-flex col-md-6 col-lg-4 col-xl-3">
                            {{-- <div class="me-2">
                                <!-- Nav -->
                                <div class="nav btn-group flex-nowrap" role="tablist">
                                    <button class="btn btn-outline-secondary active" data-bs-toggle="tab"
                                        data-bs-target="#tabPaneGrid" role="tab" aria-controls="tabPaneGrid"
                                        aria-selected="true">
                                        <span class="fe fe-grid"></span>
                                    </button>
                                    <button class="btn btn-outline-secondary" data-bs-toggle="tab"
                                        data-bs-target="#tabPaneList" role="tab" aria-controls="tabPaneList"
                                        aria-selected="false">
                                        <span class="fe fe-list"></span>
                                    </button>
                                </div>
                            </div> --}}
                            <!-- List  -->
                            <select id="sortCourses" class="form-select">
                                <option value="">Sort by</option>
                                <option value="newest" {{ $sort == 'newest' ? 'selected' : '' }}>Newest</option>
                                <option value="low_to_high" {{ $sort == 'low_to_high' ? 'selected' : '' }}>Price : Low to
                                    high</option>
                                <option value="high_to_low" {{ $sort == 'high_to_low' ? 'selected' : '' }}>Price : High to
                                    low</option>
                                <option value="highest_rated" {{ $sort == 'highest_rated' ? 'selected' : '' }}>Highest Rated
                                </option>
                            </select>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-12 mb-4 mb-lg-0">
                    <!-- Card -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h4 class="mb-0">Filter</h4>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <span class="dropdown-header px-0 mb-2">Category</span>
                            <div class="form-check mb-1">
                                <input type="checkbox" class="form-check-input course-category-checkbox" id="0"
                                    value="0" {{ $newCategory == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="0">All</label>
                            </div>
                            @if ($courseCate)
                                @foreach ($courseCate as $cate)
                                    <div class="form-check mb-1">
                                        <input type="checkbox" class="form-check-input course-category-checkbox"
                                            name="course_category" id="{{ $cate->id }}" value="{{ $cate->id }}"
                                            {{ $newCategory == $cate->id ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="{{ $cate->id }}">{{ $cate->name }}</label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <!-- Card body -->
                        <div class="card-body border-top">
                            <span class="dropdown-header px-0 mb-2">Ratings</span>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" class="form-check-input" id="starRadio1" name="customRadio"
                                    value="5" {{ $newRate == '5' ? 'checked' : '' }}>
                                <label class="form-check-label" for="starRadio1">
                                    <span class="fs-6 align-top me-1">
                                        @for ($i = 0; $i < 5; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                        @endfor
                                    </span>
                                    <span class="fs-6">4.5 & UP</span>
                                </label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" class="form-check-input" id="starRadio2" name="customRadio"
                                    value="4" {{ $newRate == '4' ? 'checked' : '' }}>
                                <label class="form-check-label" for="starRadio2">
                                    <span class="fs-6 align-top me-1">
                                        @for ($i = 0; $i < 5; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                        @endfor
                                    </span>
                                    <span class="fs-6">4.0 & UP</span>
                                </label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" class="form-check-input" id="starRadio3" name="customRadio"
                                    value="3.5" {{ $newRate == '3.5' ? 'checked' : '' }}>
                                <label class="form-check-label" for="starRadio3">
                                    <span class="fs-6 align-top me-1">
                                        @for ($i = 0; $i < 5; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                        @endfor
                                    </span>
                                    <span class="fs-6">3.5 & UP</span>
                                </label>
                            </div>
                        </div>

                        <!-- Card body -->
                        <div class="card-body border-top">
                            <span class="dropdown-header px-0 mb-2">Level</span>
                            <div class="form-check mb-1">
                                <input type="checkbox" class="form-check-input course-level-checkbox" name="course_level"
                                    id="Beginner" value="Beginner" {{ $newLevel == 'Beginner' ? 'checked' : '' }}>
                                <label class="form-check-label" for="Beginner">Beginner</label>
                            </div>
                            <div class="form-check mb-1">
                                <input type="checkbox" class="form-check-input course-level-checkbox" name="course_level"
                                    id="Intermediate" value="Intermediate"
                                    {{ $newLevel == 'Intermediate' ? 'checked' : '' }}>
                                <label class="form-check-label" for="Intermediate">Intermediate</label>
                            </div>
                            <div class="form-check mb-1">
                                <input type="checkbox" class="form-check-input course-level-checkbox" name="course_level"
                                    id="Advance" value="Advance" {{ $newLevel == 'Advance' ? 'checked' : '' }}>
                                <label class="form-check-label" for="Advance">Advance</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab content -->
                <div class="col-xl-9 col-lg-9 col-md-8 col-12">
                    <div class="tab-content">
                        <!-- Tab pane -->
                        <div class="tab-pane fade show active pb-4" id="tabPaneGrid" role="tabpanel"
                            aria-labelledby="tabPaneGrid">
                            <div class="row" id="course-container">
                                {{-- @foreach ($courses as $course)
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <!-- Card -->
                                        <div class="card mb-4 card-hover">
                                            <a href="{{ route('course-detail', $course->id) }}">
                                                <img src="{{ asset('assets/images/course/' . $course->image) }}"
                                                    style="height: 181.15px; width:305px " alt="course"
                                                    class="card-img-top" />
                                            </a>
                                            <!-- Card Body -->
                                            <div class="card-body" style="height: 188px; width: 305px;">
                                                <h4 class="mb-2 text-truncate-line-2" style="height: 48px; width: 257px">
                                                    <a href="{{ route('course-detail', $course->id) }}"
                                                        class="text-inherit">{{ $course->title }}</a>
                                                </h4>
                                                <!-- List -->
                                                <ul class="mb-3 list-inline">
                                                    <li class="list-inline-item">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                height="12" fill="currentColor"
                                                                class="bi bi-clock align-baseline" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                                <path
                                                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                            </svg>
                                                        </span>
                                                        <span>3h 56m</span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        @if ($course->level == 'Beginner')
                                                            <svg class="me-1 mt-n1" width="16" height="16"
                                                                viewBox="0 0 16 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="3" y="8" width="2" height="6"
                                                                    rx="1" fill="#754FFE" />
                                                                <rect x="7" y="5" width="2" height="9"
                                                                    rx="1" fill="#DBD8E9" />
                                                                <rect x="11" y="2" width="2" height="12"
                                                                    rx="1" fill="#DBD8E9" />
                                                            </svg>
                                                        @elseif ($course->level == 'Intermediate')
                                                            <svg class="me-1 mt-n1" width="16" height="16"
                                                                viewBox="0 0 16 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="3" y="8" width="2" height="6"
                                                                    rx="1" fill="#754FFE" />
                                                                <rect x="7" y="5" width="2" height="9"
                                                                    rx="1" fill="#754FFE" />
                                                                <rect x="11" y="2" width="2" height="12"
                                                                    rx="1" fill="#DBD8E9" />
                                                            </svg>
                                                        @elseif ($course->level == 'Advance')
                                                            <svg class="me-1 mt-n1" width="16" height="16"
                                                                viewBox="0 0 16 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="3" y="8" width="2" height="6"
                                                                    rx="1" fill="#754FFE"></rect>
                                                                <rect x="7" y="5" width="2" height="9"
                                                                    rx="1" fill="#754FFE"></rect>
                                                                <rect x="11" y="2" width="2" height="12"
                                                                    rx="1" fill="#754FFE"></rect>
                                                            </svg>
                                                        @endif
                                                        {{ $course->level }}
                                                    </li>

                                                </ul>
                                                <div class="lh-1">
                                                    @if ($course->review_count != 0)
                                                        <span class="align-text-top">
                                                            <span class="fs-6">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= floor($course->review_avg_rate))
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12"
                                                                            fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                            </path>
                                                                        </svg>
                                                                    @elseif ($i == ceil($course->review_avg_rate) && $course->review_avg_rate - floor($course->review_avg_rate) > 0)
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12"
                                                                            fill="currentColor"
                                                                            class="bi bi-star-half text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path fill-rule="evenodd"
                                                                                d="M8 .753a.75.75 0 0 1 .59.306l1.902 2.576 4.09.63a.75.75 0 0 1 .416 1.279l-3.045 3.032.719 4.192a.75.75 0 0 1-1.088.791L8 12.347l-3.766 1.98a.75.75 0 0 1-1.088-.79l.719-4.192L.502 5.548a.75.75 0 0 1 .416-1.28l4.09-.63L7.41 1.06a.75.75 0 0 1 .59-.307zm0 10.944l-2.573 1.353.488-2.845a.75.75 0 0 1 .218-.456l2.12-2.013-2.945-.454a.75.75 0 0 1-.563-.41L4.012 3.57 5.26 5.97a.75.75 0 0 1 .207.45l.528 2.88-2.3-1.207a.75.75 0 0 1-.26-.276L2.11 3.214 5.7 3.5a.75.75 0 0 1 .582.41l1.28 2.424 2.852.439a.75.75 0 0 1 .438 1.283l-2.068 2.068.488 2.846a.75.75 0 0 1-.218.456L8 11.697z">
                                                                            </path>
                                                                        </svg>
                                                                    @endif
                                                                @endfor
                                                            </span>
                                                        </span>
                                                        <span class="text-warning">
                                                            @if (floor($course->review_avg_rate) == $course->review_avg_rate)
                                                                {{ number_format($course->review_avg_rate, 0) }}
                                                            @else
                                                                {{ number_format($course->review_avg_rate, 1) }}
                                                            @endif
                                                        </span>
                                                        <span class="fs-6">({{ $course->review_count }},
                                                            {{ $course->sale_count }})</span>
                                                    @else
                                                        <span class="fs-6">({{ 0 }},
                                                            {{ $course->sale_count }})</span>
                                                    @endif
                                                </div>
                                                <!-- Price -->
                                                <div class="lh-1 mt-3">
                                                    <span class="text-dark fw-bold">${{ $course->price }}</span>
                                                </div>
                                            </div>
                                            <!-- Card Footer -->
                                            <div class="card-footer">
                                                <div class="row align-items-center g-0">
                                                    <div class="col-auto">
                                                        <a href="{{ route('instructor-profile', $course->instructor->id) }}">
                                                            <img src="{{ asset('assets/images/avatar/' . $course->instructor->avatar) }}"
                                                                class="rounded-circle avatar-xs" alt="Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="col ms-2">
                                                        <a class="nav-link"
                                                            href="{{ route('instructor-profile', $course->instructor->id) }}">
                                                            <span>{{ $course->instructor->firstname }}
                                                                {{ $course->instructor->lastname }}</span>
                                                        </a>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="#" class="text-reset bookmark">
                                                            <i class="fe fe-bookmark fs-4"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach --}}
                                @foreach ($courses as $course)
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <!-- Card -->
                                        <div class="card mb-4 card-hover">
                                            <a href="{{ route('course-detail', $course->id) }}">
                                                <img src="{{ asset('storage/upload/images/course/' . $course->image) }}"
                                                    alt="course" class="card-img-top" />
                                            </a>
                                            <!-- Card Body -->
                                            <div class="card-body" style="height: 188px; width: 305px;">
                                                <h4 class="mb-2 text-truncate-line-2" style="height: 48px; width: 257px">
                                                    <a href="{{ route('course-detail', $course->id) }}"
                                                        class="text-inherit">{{ $course->title }}</a>
                                                </h4>
                                                <!-- List -->
                                                <ul class="mb-3 list-inline">
                                                    <li class="list-inline-item">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                height="12" fill="currentColor"
                                                                class="bi bi-clock align-baseline" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                                <path
                                                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                            </svg>
                                                        </span>
                                                        <span>3h 56m</span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        @if ($course->level == 'Beginner')
                                                            <svg class="me-1 mt-n1" width="16" height="16"
                                                                viewBox="0 0 16 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="3" y="8" width="2" height="6"
                                                                    rx="1" fill="#754FFE" />
                                                                <rect x="7" y="5" width="2" height="9"
                                                                    rx="1" fill="#DBD8E9" />
                                                                <rect x="11" y="2" width="2" height="12"
                                                                    rx="1" fill="#DBD8E9" />
                                                            </svg>
                                                        @elseif ($course->level == 'Intermediate')
                                                            <svg class="me-1 mt-n1" width="16" height="16"
                                                                viewBox="0 0 16 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="3" y="8" width="2" height="6"
                                                                    rx="1" fill="#754FFE" />
                                                                <rect x="7" y="5" width="2" height="9"
                                                                    rx="1" fill="#754FFE" />
                                                                <rect x="11" y="2" width="2" height="12"
                                                                    rx="1" fill="#DBD8E9" />
                                                            </svg>
                                                        @elseif ($course->level == 'Advance')
                                                            <svg class="me-1 mt-n1" width="16" height="16"
                                                                viewBox="0 0 16 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="3" y="8" width="2" height="6"
                                                                    rx="1" fill="#754FFE"></rect>
                                                                <rect x="7" y="5" width="2" height="9"
                                                                    rx="1" fill="#754FFE"></rect>
                                                                <rect x="11" y="2" width="2" height="12"
                                                                    rx="1" fill="#754FFE"></rect>
                                                            </svg>
                                                        @endif
                                                        {{ $course->level }}
                                                    </li>

                                                </ul>
                                                <div class="lh-1">
                                                    @if ($course->review_count != 0)
                                                        <span class="align-text-top">
                                                            <span class="fs-6">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= floor($course->review_avg_rate))
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12"
                                                                            fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                            </path>
                                                                        </svg>
                                                                    @elseif ($i == ceil($course->review_avg_rate) && $course->review_avg_rate - floor($course->review_avg_rate) > 0)
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12"
                                                                            fill="currentColor"
                                                                            class="bi bi-star-half text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path fill-rule="evenodd"
                                                                                d="M8 .753a.75.75 0 0 1 .59.306l1.902 2.576 4.09.63a.75.75 0 0 1 .416 1.279l-3.045 3.032.719 4.192a.75.75 0 0 1-1.088.791L8 12.347l-3.766 1.98a.75.75 0 0 1-1.088-.79l.719-4.192L.502 5.548a.75.75 0 0 1 .416-1.28l4.09-.63L7.41 1.06a.75.75 0 0 1 .59-.307zm0 10.944l-2.573 1.353.488-2.845a.75.75 0 0 1 .218-.456l2.12-2.013-2.945-.454a.75.75 0 0 1-.563-.41L4.012 3.57 5.26 5.97a.75.75 0 0 1 .207.45l.528 2.88-2.3-1.207a.75.75 0 0 1-.26-.276L2.11 3.214 5.7 3.5a.75.75 0 0 1 .582.41l1.28 2.424 2.852.439a.75.75 0 0 1 .438 1.283l-2.068 2.068.488 2.846a.75.75 0 0 1-.218.456L8 11.697z">
                                                                            </path>
                                                                        </svg>
                                                                    @endif
                                                                @endfor
                                                            </span>
                                                        </span>
                                                        <span class="text-warning">
                                                            @if (floor($course->review_avg_rate) == $course->review_avg_rate)
                                                                {{ number_format($course->review_avg_rate, 0) }}
                                                            @else
                                                                {{ number_format($course->review_avg_rate, 1) }}
                                                            @endif
                                                        </span>
                                                        <span class="fs-6">({{ $course->review_count }},
                                                            {{ $course->sale_count }})</span>
                                                    @else
                                                        <span class="fs-6">({{ 0 }},
                                                            {{ $course->sale_count }})</span>
                                                    @endif
                                                </div>
                                                <!-- Price -->
                                                <div class="lh-1 mt-3">
                                                    <span class="text-dark fw-bold">${{ $course->price }}</span>
                                                </div>
                                            </div>
                                            <!-- Card Footer -->
                                            <div class="card-footer">
                                                <div class="row align-items-center g-0">
                                                    <div class="col-auto">
                                                        <a
                                                            href="{{ route('instructor-profile', $course->instructor->id) }}">
                                                            <img src="{{ asset('storage/upload/images/avatar/' . $course->instructor->avatar) }}"
                                                                class="rounded-circle avatar-xs" alt="Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="col ms-2">
                                                        <a class="nav-link"
                                                            href="{{ route('instructor-profile', $course->instructor->id) }}">
                                                            <span>{{ $course->instructor->firstname }}
                                                                {{ $course->instructor->lastname }}</span>
                                                        </a>
                                                    </div>
                                                    <div class="col-auto">
                                                        @if (Auth::check())
                                                            @if ($user->role == 0)
                                                                @if ($userDetail->id === null)
                                                                    <a href="{{ route('student-profile', $user->id) }}">
                                                                        <i class="fe fe-bookmark fs-4"></i>
                                                                    </a>
                                                                @elseif ($userDetail && $userDetail->id)
                                                                    <button type="button"
                                                                        class="text-reset bookmark-button btn-unstyled"
                                                                        data-course-id="{{ $course->id }}"
                                                                        student-id="{{ $userDetail->id }}"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top">
                                                                        <i
                                                                            class="fe fe-bookmark fs-4 {{ in_array($course->id, $bookmarkedCourseIds) ? 'bi-bookmark-fill' : '' }}"></i>
                                                                    </button>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                                {{ $courses->links() }}


                            </div>
                        </div>
                        <!-- Tab pane -->
                        {{-- <div class="tab-pane fade pb-4" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">
                            @foreach ($courses as $course)
                                @if ($loop->index == 5)
                                @break
                            @endif
                            <!-- Card -->
                            <div class="card mb-4 card-hover">
                                <div class="row g-0">
                                    <a class="col-12 col-md-12 col-xl-3 col-lg-3 bg-cover img-left-rounded"
                                        style="background-image: url({{ asset('assets/images/course/' . $course->image) }})"
                                        href="{{ route('course-detail', $course->id) }}">
                                        <img src="{{ asset('assets/images/course/' . $course->image) }}"
                                            alt="..." class="img-fluid d-lg-none invisible">
                                    </a>
                                    <div class="col-lg-9 col-md-12 col-12">
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <h4 class="mb-2 text-truncate-line-2" style="height: 48px; width: 257px">
                                                <a href="{{ route('course-detail', $course->id) }}"
                                                    class="text-inherit">{{ $course->title }}</a>
                                            </h4>
                                            <!-- List inline -->
                                            <ul class="mb-5 list-inline">
                                                <li class="list-inline-item">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-clock align-baseline" viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z">
                                                            </path>
                                                            <path
                                                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <span>3h 56m</span>
                                                </li>
                                                <li class="list-inline-item">
                                                    @if ($course->level == 'Beginner')
                                                        <svg class="me-1 mt-n1" width="16" height="16"
                                                            viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect x="3" y="8" width="2" height="6"
                                                                rx="1" fill="#754FFE" />
                                                            <rect x="7" y="5" width="2" height="9"
                                                                rx="1" fill="#DBD8E9" />
                                                            <rect x="11" y="2" width="2" height="12"
                                                                rx="1" fill="#DBD8E9" />
                                                        </svg>
                                                    @elseif ($course->level == 'Intermediate')
                                                        <svg class="me-1 mt-n1" width="16" height="16"
                                                            viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect x="3" y="8" width="2" height="6"
                                                                rx="1" fill="#754FFE" />
                                                            <rect x="7" y="5" width="2" height="9"
                                                                rx="1" fill="#754FFE" />
                                                            <rect x="11" y="2" width="2" height="12"
                                                                rx="1" fill="#DBD8E9" />
                                                        </svg>
                                                    @elseif ($course->level == 'Advance')
                                                        <svg class="me-1 mt-n1" width="16" height="16"
                                                            viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect x="3" y="8" width="2" height="6"
                                                                rx="1" fill="#754FFE"></rect>
                                                            <rect x="7" y="5" width="2" height="9"
                                                                rx="1" fill="#754FFE"></rect>
                                                            <rect x="11" y="2" width="2" height="12"
                                                                rx="1" fill="#754FFE"></rect>
                                                        </svg>
                                                    @endif
                                                    {{ $course->level }}
                                                </li>
                                                <li class="list-inline-item">
                                                    @if ($course->review_count != 0)
                                                        <span class="align-text-top lh-1">
                                                            <span class="fs-6">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= floor($course->review_avg_rate))
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12"
                                                                            fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                            </path>
                                                                        </svg>
                                                                    @elseif ($i == ceil($course->review_avg_rate) && $course->review_avg_rate - floor($course->review_avg_rate) > 0)
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12"
                                                                            fill="currentColor"
                                                                            class="bi bi-star-half text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path fill-rule="evenodd"
                                                                                d="M8 .753a.75.75 0 0 1 .59.306l1.902 2.576 4.09.63a.75.75 0 0 1 .416 1.279l-3.045 3.032.719 4.192a.75.75 0 0 1-1.088.791L8 12.347l-3.766 1.98a.75.75 0 0 1-1.088-.79l.719-4.192L.502 5.548a.75.75 0 0 1 .416-1.28l4.09-.63L7.41 1.06a.75.75 0 0 1 .59-.307zm0 10.944l-2.573 1.353.488-2.845a.75.75 0 0 1 .218-.456l2.12-2.013-2.945-.454a.75.75 0 0 1-.563-.41L4.012 3.57 5.26 5.97a.75.75 0 0 1 .207.45l.528 2.88-2.3-1.207a.75.75 0 0 1-.26-.276L2.11 3.214 5.7 3.5a.75.75 0 0 1 .582.41l1.28 2.424 2.852.439a.75.75 0 0 1 .438 1.283l-2.068 2.068.488 2.846a.75.75 0 0 1-.218.456L8 11.697z">
                                                                            </path>
                                                                        </svg>
                                                                    @endif
                                                                @endfor
                                                            </span>
                                                        </span>
                                                        <span class="text-warning">
                                                            @if (floor($course->review_avg_rate) == $course->review_avg_rate)
                                                                {{ number_format($course->review_avg_rate, 0) }}
                                                            @else
                                                                {{ number_format($course->review_avg_rate, 1) }}
                                                            @endif
                                                        </span>
                                                        <span class="fs-6">({{ $course->review_count }},
                                                            {{ $course->sale_count }})</span>
                                                    @else
                                                        <span class="fs-6">({{ 0 }},
                                                            {{ $course->sale_count }})</span>
                                                    @endif
                                                </li>
                                            </ul>
                                            <!-- Row -->
                                            <div class="row align-items-center g-0">
                                                <div class="col-auto">
                                                    <a href="{{ route('instructor-profile', $course->instructor->id) }}">
                                                        <img src="{{ asset('assets/images/avatar/' . $course->instructor->avatar) }}"
                                                            class="rounded-circle avatar-xs" alt="Avatar">
                                                    </a>
                                                </div>
                                                <div class="col ms-2">
                                                    <a class="nav-link"
                                                        href="{{ route('instructor-profile', $course->instructor->id) }}">
                                                        <span>{{ $course->instructor->firstname }}
                                                            {{ $course->instructor->lastname }}</span>
                                                    </a>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="text-reset bookmark">
                                                        <i class="fe fe-bookmark fs-4"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div id="pagination-links">
                            {{ $courses->appends(['tab' => 'tabPaneList'])->links() }}
                            <!-- Hiển thị phân trang với tab parameter -->
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>











@endsection
