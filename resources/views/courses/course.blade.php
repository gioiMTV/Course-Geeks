@extends('layouts.user')
@section('title')
    {{ $title }}
@endsection
@section('content')

    <!-- Page header -->
    <section class="pt-lg-8 pb-8 bg-primary">
        <div class="container pb-lg-8">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <div>
                        <h1 class="text-white display-4 fw-semibold">{{ $course->title }}</h1>
                        <p class="text-white mb-6 lead">
                            {{ $course->preview }}
                        </p>
                        <div class="d-flex align-items-center">
                            <a href="#" class="bookmark text-white">
                                <i class="fe fe-bookmark fs-4 me-2"></i>
                                Bookmark
                            </a>

                            <span class="text-white ms-3">
                                <i class="fe fe-user"></i>
                                {{ $course->sale_count }} Enrolled
                            </span>
                            <div>
                                <span class="fs-6 ms-4 align-text-top">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= floor($course->review_avg_rate))
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                        @elseif ($i == ceil($course->review_avg_rate) && $course->review_avg_rate - floor($course->review_avg_rate) > 0)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-half text-warning"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M8 .753a.75.75 0 0 1 .59.306l1.902 2.576 4.09.63a.75.75 0 0 1 .416 1.279l-3.045 3.032.719 4.192a.75.75 0 0 1-1.088.791L8 12.347l-3.766 1.98a.75.75 0 0 1-1.088-.79l.719-4.192L.502 5.548a.75.75 0 0 1 .416-1.28l4.09-.63L7.41 1.06a.75.75 0 0 1 .59-.307zm0 10.944l-2.573 1.353.488-2.845a.75.75 0 0 1 .218-.456l2.12-2.013-2.945-.454a.75.75 0 0 1-.563-.41L4.012 3.57 5.26 5.97a.75.75 0 0 1 .207.45l.528 2.88-2.3-1.207a.75.75 0 0 1-.26-.276L2.11 3.214 5.7 3.5a.75.75 0 0 1 .582.41l1.28 2.424 2.852.439a.75.75 0 0 1 .438 1.283l-2.068 2.068.488 2.846a.75.75 0 0 1-.218.456L8 11.697z">
                                                </path>
                                            </svg>
                                        @endif
                                    @endfor
                                </span>
                                <span class="text-white">({{ $course->review_count }})</span>
                            </div>
                            <span class="text-white ms-4 d-none d-md-block">
                                @if ($course->level == 'Beginner')
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#DBD8E9" />
                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE" />
                                    </svg>
                                @elseif ($course->level == 'Intermediate')
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#DBD8E9" />
                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9" />
                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE" />
                                    </svg>
                                @elseif ($course->level == 'Advance')
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#DBD8E9">
                                        </rect>
                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9">
                                        </rect>
                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
                                        </rect>
                                    </svg>
                                @endif
                                <span class="align-middle">{{ $course->level }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page content -->
    <section class="pb-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 mt-n8 mb-4 mb-lg-0">
                    <!-- Card -->
                    <div class="card rounded-3">
                        <!-- Card header -->
                        <div class="card-header border-bottom-0 p-0">
                            <div>
                                <!-- Nav -->
                                <ul class="nav nav-lb-tab" id="tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="table-tab" data-bs-toggle="pill" href="#table"
                                            role="tab" aria-controls="table" aria-selected="true">Contents</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="description-tab" data-bs-toggle="pill" href="#description"
                                            role="tab" aria-controls="description" aria-selected="false">
                                            Description
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="review-tab" data-bs-toggle="pill" href="#review"
                                            role="tab" aria-controls="review" aria-selected="false">Reviews</a>
                                    </li>

                                    {{-- <li class="nav-item">
                                        <a class="nav-link" id="faq-tab" data-bs-toggle="pill" href="#faq"
                                            role="tab" aria-controls="faq" aria-selected="false">FAQ</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="tab-content" id="tabContent">
                                <div class="tab-pane fade show active" id="table" role="tabpanel"
                                    aria-labelledby="table-tab">
                                    <!-- Card -->
                                    <div class="accordion" id="courseAccordion">
                                        <div>
                                            <!-- List group -->
                                            <ul class="list-group list-group-flush">
                                                @if (!empty($course->section))
                                                    @foreach ($course->section as $section)
                                                        <li
                                                            class="list-group-item px-0 {{ $loop->first ? 'pt-0' : '' }} {{ $loop->last ? 'pb-0' : '' }}">
                                                            <!-- Toggle -->
                                                            <a class="h4 mb-0 d-flex align-items-center {{ $loop->first ? 'active collapsed' : '' }} "
                                                                data-bs-toggle="collapse"
                                                                href="#course{{ $loop->index }}"
                                                                aria-expanded="{{ $loop->first ? 'true' : '' }}"
                                                                aria-controls="course{{ $loop->index }}">
                                                                <div class="me-auto">{{ $section->name }}</div>
                                                                <!-- Chevron -->
                                                                <span class="chevron-arrow ms-4">
                                                                    <i class="fe fe-chevron-down fs-4"></i>
                                                                </span>
                                                            </a>
                                                            <!-- Row -->
                                                            <!-- Collapse -->
                                                            <div class="collapse {{ $loop->first ? 'show' : '' }}"
                                                                id="course{{ $loop->index }}"
                                                                data-bs-parent="#courseAccordion">
                                                                <div class="pt-3 pb-2">
                                                                    @foreach ($section->lecture as $lecture)
                                                                        <a href="{{ route('course-lecture', [$course->id, 1]) }}"
                                                                            class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                            <div class="text-truncate">
                                                                                <span
                                                                                    class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="12" height="12"
                                                                                        fill="currentColor"
                                                                                        class="bi bi-play-fill"
                                                                                        viewBox="0 0 16 16">
                                                                                        <path
                                                                                            d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z">
                                                                                    </svg>
                                                                                </span>
                                                                                <span>{{ $lecture->name }}</span>
                                                                            </div>
                                                                            <div class="text-truncate">
                                                                                <span>1m 7s</span>
                                                                            </div>
                                                                        </a>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <h4>Something Wrong</h4>
                                                @endif


                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                {{-- Description --}}
                                <div class="tab-pane fade" id="description" role="tabpanel"
                                    aria-labelledby="description-tab">
                                    <!-- Description -->
                                    {!! $course->description !!}
                                </div>
                                <!-- Reviews -->
                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <div class="mb-3">
                                        <h3 class="mb-4">How students rated this courses</h3>
                                        <div class="row align-items-center">
                                            <div class="col-auto text-center">
                                                <h3 class="display-2 fw-bold">
                                                    @if (floor($course->review_avg_rate) == $course->review_avg_rate)
                                                        {{ number_format($course->review_avg_rate, 0) }}
                                                    @else
                                                        {{ number_format($course->review_avg_rate, 1) }}
                                                    @endif
                                                </h3>
                                                <span class="fs-6">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= floor($course->review_avg_rate))
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                height="12" fill="currentColor"
                                                                class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                </path>
                                                            </svg>
                                                        @elseif ($i == ceil($course->review_avg_rate) && $course->review_avg_rate - floor($course->review_avg_rate) > 0)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                height="12" fill="currentColor"
                                                                class="bi bi-star-half text-warning" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M8 .753a.75.75 0 0 1 .59.306l1.902 2.576 4.09.63a.75.75 0 0 1 .416 1.279l-3.045 3.032.719 4.192a.75.75 0 0 1-1.088.791L8 12.347l-3.766 1.98a.75.75 0 0 1-1.088-.79l.719-4.192L.502 5.548a.75.75 0 0 1 .416-1.28l4.09-.63L7.41 1.06a.75.75 0 0 1 .59-.307zm0 10.944l-2.573 1.353.488-2.845a.75.75 0 0 1 .218-.456l2.12-2.013-2.945-.454a.75.75 0 0 1-.563-.41L4.012 3.57 5.26 5.97a.75.75 0 0 1 .207.45l.528 2.88-2.3-1.207a.75.75 0 0 1-.26-.276L2.11 3.214 5.7 3.5a.75.75 0 0 1 .582.41l1.28 2.424 2.852.439a.75.75 0 0 1 .438 1.283l-2.068 2.068.488 2.846a.75.75 0 0 1-.218.456L8 11.697z">
                                                                </path>
                                                            </svg>
                                                        @endif
                                                    @endfor
                                                </span>
                                                <p class="mb-0 fs-6">(Based on {{ $course->review_count }} reviews)</p>
                                            </div>

                                            <!-- Progress Bar -->
                                            <div class="col order-3 order-md-2">
                                                <div class="progress mb-3" style="height: 6px">
                                                    @if ($course->review_count > 0)
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: {{ ($starCountsArray[5] / $course->review_count) * 100 }}%"
                                                            aria-valuenow="{{ ($starCountsArray[5] / $course->review_count) * 100 }}"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    @else
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    @endif

                                                    {{-- Hiển thị số sao --}}
                                                    {{-- Ví dụ: 5 sao --}}
                                                </div>
                                                <!-- Các thanh tiến độ khác -->
                                                <div class="progress mb-3" style="height: 6px">
                                                    @if ($course->review_count > 0)
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: {{ ($starCountsArray[4] / $course->review_count) * 100 }}%"
                                                            aria-valuenow="{{ ($starCountsArray[4] / $course->review_count) * 100 }}"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    @else
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    @endif

                                                    {{-- 4 sao --}}
                                                </div>
                                                <div class="progress mb-3" style="height: 6px">
                                                    @if ($course->review_count > 0)
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: {{ ($starCountsArray[3] / $course->review_count) * 100 }}%"
                                                            aria-valuenow="{{ ($starCountsArray[3] / $course->review_count) * 100 }}"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    @else
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    @endif

                                                    {{-- 3 sao --}}
                                                </div>
                                                <div class="progress mb-3" style="height: 6px">
                                                    @if ($course->review_count > 0)
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: {{ ($starCountsArray[2] / $course->review_count) * 100 }}%"
                                                            aria-valuenow="{{ ($starCountsArray[2] / $course->review_count) * 100 }}"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    @else
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    @endif

                                                    {{-- 2 sao --}}
                                                </div>
                                                <div class="progress mb-0" style="height: 6px">
                                                    @if ($course->review_count > 0)
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: {{ ($starCountsArray[1] / $course->review_count) * 100 }}%"
                                                            aria-valuenow="{{ ($starCountsArray[1] / $course->review_count) * 100 }}"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    @else
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    @endif

                                                    {{-- 1 sao --}}
                                                </div>
                                            </div>

                                            <div class="col-md-auto col-6 order-2 order-md-3">
                                                <!-- Rating -->
                                                <div>
                                                    <span class="fs-6">
                                                        @for ($i = 0; $i < 5; $i++)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                height="12" fill="currentColor"
                                                                class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                            </svg>
                                                        @endfor

                                                    </span>
                                                    @if ($course->review_count > 0)
                                                        <span
                                                            class="ms-1">{{ ($starCountsArray[5] / $course->review_count) * 100 }}%</span>
                                                    @else
                                                        <span class="ms-1">0%</span>
                                                    @endif

                                                </div>
                                                <div>
                                                    <span class="fs-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                    </span>
                                                    @if ($course->review_count > 0)
                                                        <span
                                                            class="ms-1">{{ ($starCountsArray[4] / $course->review_count) * 100 }}%</span>
                                                    @else
                                                        <span class="ms-1">0%</span>
                                                    @endif

                                                </div>
                                                <div>
                                                    <span class="fs-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                    </span>
                                                    @if ($course->review_count > 0)
                                                        <span
                                                            class="ms-1">{{ ($starCountsArray[3] / $course->review_count) * 100 }}%</span>
                                                    @else
                                                        <span class="ms-1">0%</span>
                                                    @endif

                                                </div>
                                                <div>
                                                    <span class="fs-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                    </span>
                                                    @if ($course->review_count > 0)
                                                        <span
                                                            class="ms-1">{{ ($starCountsArray[2] / $course->review_count) * 100 }}%</span>
                                                    @else
                                                        <span class="ms-1">0%</span>
                                                    @endif

                                                </div>
                                                <div>
                                                    <span class="fs-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </svg>
                                                    </span>
                                                    @if ($course->review_count > 0)
                                                        <span
                                                            class="ms-1">{{ ($starCountsArray[1] / $course->review_count) * 100 }}%</span>
                                                    @else
                                                        <span class="ms-1">0%</span>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-5">
                                    <div class="mb-3">
                                        <div class="d-lg-flex align-items-center justify-content-between mb-5">
                                            <!-- Reviews -->
                                            <div class="mb-3 mb-lg-0">
                                                <h3 class="mb-0">Reviews</h3>
                                            </div>
                                            {{-- <div>
                                                <form class="form-inline">
                                                    <div class="d-flex align-items-center me-2">
                                                        <span class="position-absolute ps-3">
                                                            <i class="fe fe-search"></i>
                                                        </span>
                                                        <input type="search" class="form-control ps-6"
                                                            placeholder="Search Review">
                                                    </div>
                                                </form>
                                            </div> --}}
                                        </div>
                                        <!-- Rating -->
                                        <!-- Hiển thị danh sách các review -->
                                        <div id="review-container" style="max-height: 400px;  overflow-y: auto;">
                                            @if (!empty($reviews))
                                                @foreach ($reviews as $index => $review)
                                                    <div class="d-flex align-items-start border-bottom pb-4 mb-4">
                                                        <img src="{{ asset('storage/upload/images/avatar/' . $reviewUsers[$index]->avatar) }}"
                                                            alt="" class="rounded-circle avatar-lg">
                                                        <div class="ms-3">
                                                            <h4 class="mb-1">
                                                                {{ $reviewUsers[$index]->firstname }}
                                                                {{ $reviewUsers[$index]->lastname }}
                                                                <span
                                                                    class="ms-1 fs-6">{{ $review->created_at->diffForHumans() }}</span>
                                                            </h4>
                                                            <div class="mb-2">
                                                                <span class="fs-6">
                                                                    @for ($i = 0; $i < $review->rate; $i++)
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12"
                                                                            fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                            </path>
                                                                        </svg>
                                                                    @endfor
                                                                </span>
                                                            </div>
                                                            <p>{{ $review->content }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div id="pagination-links">
                                                    {{-- {{ $reviews->links() }} <!-- Hiển thị phân trang --> --}}
                                                </div>
                                            @else
                                                <h4>No comments yet</h4>
                                            @endif
                                        </div>

                                    </div>
                                </div>

                                <!-- Tab pane -->
                                {{-- <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                                    <!-- FAQ -->
                                    {!! $course->faq !!}
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 mt-lg-n8">
                    <!-- Card -->
                    <div class="card mb-3 mb-4">
                        <div class="p-1">
                            <div class="d-flex justify-content-center align-items-center rounded border-white border rounded-3 bg-cover"
                                style="background-image: url({{ asset('storage/upload/images/course/' . $course->image) }}); height: 210px">
                                <a href="{{ $course->course_media ? $course->course_media : 'https://www.youtube.com/watch?v=X_9iCjqTJv8'}}"
                                    class="icon-shape rounded-circle btn-play icon-xl glightbox ">
                                    <i class="bi bi-play-fill fs-3"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Price single page -->
                            <div class="mb-3">
                                <span class="text-dark fw-bold h2">${{ $course->price }}</span>
                            </div>
                            <div class="d-grid">
                                <a href="{{ route('course-lecture', [$course->id, 1]) }}" 
                                    class="btn btn-primary mb-2">Try on free</a>
                                <a href="{{ route('checkout', $course->id) }}" class="btn btn-outline-primary">Get Full
                                    Access</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="card mb-4">
                        <div>
                            <!-- Card header -->
                            <div class="card-header">
                                <h4 class="mb-0">What’s included</h4>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent">
                                    <i class="fe fe-play-circle align-middle me-2 text-primary"></i>
                                    {{ $lectures }} videos
                                </li>
                                <li class="list-group-item bg-transparent">
                                    <i class="fe fe-award me-2 align-middle text-success"></i>
                                    Certificate
                                </li>
                                <li class="list-group-item bg-transparent">
                                    <i class="fe fe-video align-middle me-2 text-secondary"></i>
                                    Watch Online
                                </li>
                                <li class="list-group-item bg-transparent border-bottom-0">
                                    <i class="fe fe-clock align-middle me-2 text-warning"></i>
                                    Lifetime access
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="card">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="position-relative">
                                    <img src="{{asset('storage/upload/images/avatar/' . $course->instructor->avatar)}}" alt="avatar"
                                        class="rounded-circle avatar-xl">
                                    <a href="#" class="position-absolute mt-2 ms-n3" data-bs-toggle="tooltip"
                                        data-placement="top" title="Verifed">
                                        <img src="{{asset('storage/upload/images/svg/checked-mark.svg')}}" alt="checked-mark"
                                            height="30" width="30">
                                    </a>
                                </div>
                                <div class="ms-4">
                                    <h4 class="mb-0">{{ $course->instructor->firstname }}
                                        {{ $course->instructor->lastname }}</h4>
                                    <p class="mb-1 fs-6">
                                        @if ($instructorFields)
                                            @foreach ($instructorFields as $instructorField)
                                                {{ $instructorField->name }}
                                            @endforeach
                                        @endif
                                    </p>
                                    @if ($averageRating)
                                        <p class="fs-6 mb-1 d-flex align-items-center">
                                            <span class="text-warning">
                                                @if (floor($averageRating) == $averageRating)
                                                    {{ number_format($averageRating, 0) }}
                                                @else
                                                    {{ number_format($averageRating, 1) }}
                                                @endif
                                            </span>
                                            <span class="mx-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </svg>
                                            </span>
                                            Instructor Rating
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="border-top row mt-3 border-bottom mb-3 g-0">
                                <div class="col">
                                    <div class="pe-1 ps-2 py-3">
                                        <h5 class="mb-0">{{ $totalSales }}</h5>
                                        <span>Students</span>
                                    </div>
                                </div>
                                <div class="col border-start">
                                    <div class="pe-1 ps-3 py-3">
                                        <h5 class="mb-0">{{ $totalCourses }}</h5>
                                        <span>Courses</span>
                                    </div>
                                </div>
                                <div class="col border-start">
                                    <div class="pe-1 ps-3 py-3">
                                        <h5 class="mb-0">{{ $totalReviews }}</h5>
                                        <span>Reviews</span>
                                    </div>
                                </div>
                            </div>
                            <p>{{ $course->instructor->preview->description }}</p>
                            <a href="{{ route('instructor-profile', $course->instructor->id) }}"
                                class="btn btn-outline-secondary btn-sm">View
                                Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card -->
            <div class="pt-8 pb-3">
                <div class="row d-md-flex align-items-center mb-4">
                    <div class="col-12">
                        <h2 class="mb-0">Related Courses</h2>
                    </div>
                </div>
                @if (isset($relatedCourses))
                    <div class="position-relative">
                        <ul class="controls" id="sliderFirstControls">
                            <li class="prev">
                                <i class="fe fe-chevron-left"></i>
                            </li>
                            <li class="next">
                                <i class="fe fe-chevron-right"></i>
                            </li>
                        </ul>
                        <div class="sliderFirst">
                            @foreach ($relatedCourses as $course)
                            <div class="item">
                                <!-- Card -->
                                <div class="card mb-4 card-hover">
                                    <a href="{{ route('course-detail', $course->id) }}">
                                        <img src="{{ asset('storage/upload/images/course/' . $course->image) }}" alt="course"
                                            class="card-img-top"/>
                                    </a>
                                    <!-- Card Body -->
                                    <div class="card-body" style="height: 188px; width: 305px;">
                                        <h4 class="mb-2 text-truncate-line-2" style="height: 48px; width: 257px"><a
                                                href="{{ route('course-detail', $course->id) }}"
                                                class="text-inherit">{{ $course->title }}</a></h4>
                                        <!-- List -->
                                        <ul class="mb-3 list-inline">
                                            <li class="list-inline-item">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                        fill="currentColor" class="bi bi-clock align-baseline"
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
                                                        <rect x="3" y="8" width="2" height="6" rx="1"
                                                            fill="#754FFE" />
                                                        <rect x="7" y="5" width="2" height="9" rx="1"
                                                            fill="#DBD8E9" />
                                                        <rect x="11" y="2" width="2" height="12" rx="1"
                                                            fill="#DBD8E9" />
                                                    </svg>
                                                @elseif ($course->level == 'Intermediate')
                                                    <svg class="me-1 mt-n1" width="16" height="16"
                                                        viewBox="0 0 16 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="3" y="8" width="2" height="6" rx="1"
                                                            fill="#754FFE" />
                                                        <rect x="7" y="5" width="2" height="9" rx="1"
                                                            fill="#754FFE" />
                                                        <rect x="11" y="2" width="2" height="12" rx="1"
                                                            fill="#DBD8E9" />
                                                    </svg>
                                                @elseif ($course->level == 'Advance')
                                                    <svg class="me-1 mt-n1" width="16" height="16"
                                                        viewBox="0 0 16 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="3" y="8" width="2" height="6" rx="1"
                                                            fill="#754FFE"></rect>
                                                        <rect x="7" y="5" width="2" height="9" rx="1"
                                                            fill="#754FFE"></rect>
                                                        <rect x="11" y="2" width="2" height="12" rx="1"
                                                            fill="#754FFE"></rect>
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
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="12" fill="currentColor"
                                                                    class="bi bi-star-fill text-warning"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                    </path>
                                                                </svg>
                                                            @elseif ($i == ceil($course->review_avg_rate) && $course->review_avg_rate - floor($course->review_avg_rate) > 0)
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="12" fill="currentColor"
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


                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
