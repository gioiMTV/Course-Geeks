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
                <div class="border-bottom pb-3 mb-3 d-md-flex align-items-center justify-content-between">
                    <div class="mb-3 mb-md-0">
                        <h1 class="mb-1 h2 fw-bold">Courses</h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('courses') }}">Courses</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">All</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Card -->
                <div class="card rounded-3">
                    <!-- Card header -->
                    <div class="card-header p-0">
                        <div>
                            <!-- Nav -->
                            <ul class="nav nav-lb-tab border-bottom-0" id="tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="courses-tab" data-bs-toggle="pill" href="#courses"
                                        role="tab" aria-controls="courses" aria-selected="true">All</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="p-4 row">
                        <!-- Form -->
                        <form class="d-flex align-items-center col-12 col-md-12 col-lg-12">
                            <span class="position-absolute ps-3 search-icon"><i class="fe fe-search"></i></span>
                            <input type="search" class="form-control ps-6" placeholder="Search Course">
                        </form>
                    </div>
                    {{-- <div>
                        <!-- Table -->
                        <div class="tab-content" id="tabContent">
                            <!--Tab pane -->
                            <div class="tab-pane fade show active" id="courses" role="tabpanel"
                                aria-labelledby="courses-tab">
                                <div class="table-responsive border-0 overflow-y-hidden">
                                    <table class="table mb-0 text-nowrap table-centered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Courses</th>
                                                <th>Instructor</th>

                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="{{route('course-detail', $course->id)}}" class="text-inherit">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <img src="{{asset('storage/upload/images/course/'.  $course->image)}}"
                                                                    alt="" class="img-4by3-lg rounded">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h4 class="mb-1 text-primary-hover">{{$course->title}}</h4>
                                                                <span>Added on 7 July, 2023</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{asset('storage/upload/images/avatar/'. $instructor->avatar)}}" alt=""
                                                            class="rounded-circle avatar-xs me-2">
                                                        <h5 class="mb-0">{{$instructor->firstname}} {{$instructor->lastname}}</h5>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="{{route('course-detail', $course->id)}}" class="text-inherit">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <img src="{{asset('storage/upload/images/course/'.  $course->image)}}"
                                                                    alt="" class="img-4by3-lg rounded">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h4 class="mb-1 text-primary-hover">{{$course->title}}</h4>
                                                                <span>Added on 6 July, 2023</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{asset('storage/upload/images/avatar/'. $instructor->avatar)}}" alt=""
                                                            class="rounded-circle avatar-xs me-2">
                                                        <h5 class="mb-0">{{$instructor->firstname}} {{$instructor->lastname}}</h5>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="{{route('course-detail', $course->id)}}" class="text-inherit">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <img src="{{asset('storage/upload/images/course/'.  $course->image)}}"
                                                                    alt="" class="img-4by3-lg rounded">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h4 class="mb-1 text-primary-hover">{{$course->title}}</h4>
                                                                <span>Added on 5 July, 2023</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{asset('storage/upload/images/avatar/'. $instructor->avatar)}}" alt=""
                                                            class="rounded-circle avatar-xs me-2">
                                                        <h5 class="mb-0">{{$instructor->firstname}} {{$instructor->lastname}}</h5>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="{{route('course-detail', $course->id)}}" class="text-inherit">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <img src="{{asset('storage/upload/images/course/'.  $course->image)}}"
                                                                    alt="" class="img-4by3-lg rounded">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h4 class="mb-1 text-primary-hover">{{$course->title}}</h4>
                                                                <span>Added on 5 July, 2023</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{asset('storage/upload/images/avatar/'. $instructor->avatar)}}" alt=""
                                                            class="rounded-circle avatar-xs me-2">
                                                        <h5 class="mb-0">{{$instructor->firstname}} {{$instructor->lastname}}</h5>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="{{route('course-detail', $course->id)}}" class="text-inherit">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <img src="{{asset('storage/upload/images/course/'.  $course->image)}}"
                                                                    alt="" class="img-4by3-lg rounded">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h4 class="mb-1 text-primary-hover">{{$course->title}}</h4>
                                                                <span>Added on 5 July, 2023</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{asset('storage/upload/images/avatar/'. $instructor->avatar)}}" alt=""
                                                            class="rounded-circle avatar-xs me-2">
                                                        <h5 class="mb-0">{{$instructor->firstname}} {{$instructor->lastname}}</h5>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="{{route('course-detail', $course->id)}}" class="text-inherit">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <img src="{{asset('storage/upload/images/course/'.  $course->image)}}"
                                                                    alt="" class="img-4by3-lg rounded">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h4 class="mb-1 text-primary-hover">{{$course->title}}</h4>
                                                                <span>Added on 5 July, 2023</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{asset('storage/upload/images/avatar/'. $instructor->avatar)}}" alt=""
                                                            class="rounded-circle avatar-xs me-2">
                                                        <h5 class="mb-0">{{$instructor->firstname}} {{$instructor->lastname}}</h5>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="{{route('course-detail', $course->id)}}" class="text-inherit">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <img src="{{asset('storage/upload/images/course/'.  $course->image)}}"
                                                                    alt="" class="img-4by3-lg rounded">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h4 class="mb-1 text-primary-hover">{{$course->title}}</h4>
                                                                <span>Added on 4 July, 2023</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{asset('storage/upload/images/avatar/'. $instructor->avatar)}}" alt=""
                                                            class="rounded-circle avatar-xs me-2">
                                                        <h5 class="mb-0">{{$instructor->firstname}} {{$instructor->lastname}}</h5>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="{{route('course-detail', $course->id)}}" class="text-inherit">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <img src="{{asset('storage/upload/images/course/'.  $course->image)}}"
                                                                    alt="" class="img-4by3-lg rounded">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h4 class="mb-1 text-primary-hover">{{$course->title}}</h4>
                                                                <span>Added on 3 July, 2023</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{asset('storage/upload/images/avatar/'. $instructor->avatar)}}" alt=""
                                                            class="rounded-circle avatar-xs me-2">
                                                        <h5 class="mb-0">{{$instructor->firstname}} {{$instructor->lastname}}</h5>
                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Card Footer -->
                    <div class="card-footer">
                        <nav>
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link mx-1 rounded" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                            fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                            fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div> --}}
                    <div>
                        <!-- Table -->
                        <div class="tab-content" id="tabContent">
                            <!-- Tab pane -->
                            <div class="tab-pane fade show active" id="courses" role="tabpanel"
                                aria-labelledby="courses-tab">
                                <div class="table-responsive border-0 overflow-y-hidden">
                                    <table class="table mb-0 text-nowrap table-centered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Courses</th>
                                                <th>Instructor</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="search-course">
                                            @foreach ($courses as $course)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('course-detail', $course->id) }}"
                                                            class="text-inherit">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <img src="{{ asset('storage/upload/images/course/' . $course->image) }}"
                                                                        alt="{{ $course->title }}"
                                                                        class="img-4by3-lg rounded">
                                                                </div>
                                                                <div class="ms-3">
                                                                    <h4 class="mb-1 text-primary-hover">{{ $course->title }}
                                                                    </h4>
                                                                    <span>Added on
                                                                        {{ $course->created_at->format('j F, Y') }}</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            @if ($course->instructor)
                                                                <img src="{{ asset('storage/upload/images/avatar/' . $course->instructor->avatar) }}"
                                                                    alt="{{ $course->instructor->firstname }} {{ $course->instructor->lastname }}"
                                                                    class="rounded-circle avatar-xs me-2">
                                                                <h5 class="mb-0">{{ $course->instructor->firstname }}
                                                                    {{ $course->instructor->lastname }}</h5>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <!-- Bạn có thể thêm các hành động khác tại đây nếu cần -->
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer">
                            <nav>
                                {{ $courses->links() }} <!-- Phân trang -->
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- <script>
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
                       

                        // Cập nhật HTML của #search-list với các khóa học mới
                        $('#search-course').html(html);
                        // console.log(response);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script> --}}
@endsection
