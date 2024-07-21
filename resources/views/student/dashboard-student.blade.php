@extends('layouts.user')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <section class="pt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <!-- Bg -->
                    <div class="pt-8 rounded-top-md"
                        style="background: url({{ asset('storage/upload/images/background/profile-bg.jpg') }}) no-repeat; background-size: cover; height: 100px">
                    </div>
                    <div class="card rounded-0 rounded-bottom px-4 pt-2 pb-4">
                        <div class="d-flex align-items-end justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                                    <img src="{{ asset('storage/upload/images/avatar/' . $userDetail->avatar) }}"
                                        class="avatar-xl rounded-circle border border-4 border-white" alt="avatar">
                                </div>
                                <div class="lh-1">
                                    <h2 class="mb-0">
                                        {{ $userDetail->firstname }}
                                        {{ $userDetail->lastname }}

                                    </h2>
                                    <p class="mb-0 d-block">{{ $user->email }}</p>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('student-profile', $user->id) }}"
                                    class="btn btn-primary btn-sm d-none d-md-block">Account
                                    Setting</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content -->
    <section class="pb-5 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Side Navbar -->
                    <ul class="nav nav-lb-tab mb-6" id="tab" role="tablist">
                        <li class="nav-item ms-0" role="presentation">
                            <a class="nav-link active" id="bookmarked-tab" data-bs-toggle="pill" href="#bookmarked"
                                role="tab" aria-controls="bookmarked" aria-selected="true">Bookmarked</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="currentlyLearning-tab" data-bs-toggle="pill" href="#currentlyLearning"
                                role="tab" aria-controls="currentlyLearning" aria-selected="false">
                                Learning
                            </a>
                        </li>

                    </ul>
                    <!-- Tab content -->
                    <div class="tab-content" id="tabContent">
                        <div class="tab-pane fade show active" id="bookmarked" role="tabpanel"
                            aria-labelledby="bookmarked-tab">
                            <div class="row">
                                @if (isset($bookmarkedCourses))
                                    @foreach ($bookmarkedCourses as $course)
                                        <div class="col-md-3 mb-4">
                                            <!-- Card -->
                                            <div class="card mb-4 card-hover">
                                                <a href="{{ route('course-detail', $course->id) }}">
                                                    <img src="{{ asset('assets/images/course/' . $course->image) }}"
                                                        style="height: 181.15px; width:100%;" alt="course"
                                                        class="card-img-top" />
                                                </a>
                                                <!-- Card Body -->
                                                <div class="card-body" style="height: 188px; width: 100%;">
                                                    <h4 class="mb-2 text-truncate-line-2"
                                                        style="height: 48px; width: 100%;">
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
                                                            @if (Auth::check())
                                                                @if ($user->role == 0)
                                                                    @if ($userDetail->id === null)
                                                                        <a href="{{ route('dashboard-user') }}">
                                                                            <i class="fe fe-bookmark fs-4"></i>
                                                                        </a>
                                                                    @elseif ($userDetail && $userDetail->id)
                                                                        <button type="button"
                                                                            class="text-reset bookmark-button btn-unstyled"
                                                                            data-course-id="{{ $course->id }}"
                                                                            student-id="{{ $userDetail->id }}"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top">
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
                                    <div class="col-12">
                                        {{ $bookmarkedCourses->links() }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="tab-pane fade" id="currentlyLearning" role="tabpanel"
                            aria-labelledby="currentlyLearning-tab">
                            <div class="row">
                                @if (isset($coursePurchased))
                                    @foreach ($coursePurchased as $course)
                                        <div class="col-md-3 mb-4">
                                            <!-- Card -->
                                            <div class="card mb-4 card-hover">
                                                <a href="{{ route('course-detail', $course->id) }}">
                                                    <img src="{{ asset('assets/images/course/' . $course->image) }}"
                                                        style="height: 181.15px; width:100%;" alt="course"
                                                        class="card-img-top" />
                                                </a>
                                                <!-- Card Body -->
                                                <div class="card-body" style="height: 188px; width: 100%;">
                                                    <h4 class="mb-2 text-truncate-line-2"
                                                        style="height: 48px; width: 100%;">
                                                        <a href="{{ route('course-detail', $course->id) }}"
                                                            class="text-inherit">{{ $course->title }}</a>
                                                    </h4>
                                                    <!-- List -->
                                                    <ul class="mb-3 list-inline">
                                                        <li class="list-inline-item">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="12" fill="currentColor"
                                                                    class="bi bi-clock align-baseline"
                                                                    viewBox="0 0 16 16">
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
                                                            @if (Auth::check())
                                                                @if ($user->role == 0)
                                                                    @if ($userDetail->id === null)
                                                                        <a href="{{ route('dashboard-user') }}">
                                                                            <i class="fe fe-bookmark fs-4"></i>
                                                                        </a>
                                                                    @elseif ($userDetail && $userDetail->id)
                                                                        <button type="button"
                                                                            class="text-reset bookmark-button btn-unstyled"
                                                                            data-course-id="{{ $course->id }}"
                                                                            student-id="{{ $userDetail->id }}"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top">
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
                                    <div class="col-12">
                                        {{ $coursePurchased->links() }}
                                    </div>
                                @endif
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
