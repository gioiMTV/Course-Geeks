@extends('layouts.user')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <section class="py-4 py-lg-6 bg-primary">
        <div class="container">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                    <div class="d-lg-flex align-items-center justify-content-between">
                        <!-- Content -->
                        <div class="mb-4 mb-lg-0">
                            <h1 class="text-white mb-1">Add New Course</h1>
                            <p class="mb-0 text-white lead">Just fill the form and create your courses.</p>
                        </div>
                        <div>
                            <a href="{{ route('dashboard-user') }}" class="btn btn-white">Back to Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Content -->
    <section class="pb-8">
        <div class="container">
            <div id="courseForm" class="bs-stepper">
                <div class="row">
                    <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                        <!-- Stepper Button -->
                        <div class="bs-stepper-header shadow-sm" role="tablist">
                            <div class="step" data-target="#test-l-1">
                                <button type="button" class="step-trigger" role="tab" id="courseFormtrigger1"
                                    aria-controls="test-l-1">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Basic Information</span>
                                </button>
                            </div>
                            <div class="bs-stepper-line"></div>
                            <div class="step" data-target="#test-l-2">
                                <button type="button" class="step-trigger" role="tab" id="courseFormtrigger2"
                                    aria-controls="test-l-2">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Courses Media</span>
                                </button>
                            </div>
                            <div class="bs-stepper-line"></div>
                            <div class="step" data-target="#test-l-3">
                                <button type="button" class="step-trigger" role="tab" id="courseFormtrigger3"
                                    aria-controls="test-l-3">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Curriculum</span>
                                </button>
                            </div>

                        </div>
                        <!-- Stepper content -->
                        <div class="bs-stepper-content mt-5">
                            {{-- <form id="courseFormPost" action="{{ route('handle-add-course', $userDetail->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- Content one -->
                                <div id="test-l-1" role="tabpanel" class="bs-stepper-pane fade"
                                    aria-labelledby="courseFormtrigger1">
                                    <!-- Card -->
                                    <div class="card mb-3">
                                        <div class="card-header border-bottom px-4 py-3">
                                            <h4 class="mb-0">Basic Information</h4>
                                        </div>
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <!-- Course Name -->
                                            <div class="mb-3">
                                                <label for="courseName" class="form-label">Course Name</label>
                                                <input id="courseName" class="form-control" type="text"
                                                    placeholder="Course Name" name="course-name">
                                                <small>Write a 20 character course name.</small>
                                                @error('course_name')
                                                    <div
                                                        style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <!-- Course Title -->
                                            <div class="mb-3">
                                                <label for="courseTitle" class="form-label">Course Title</label>
                                                <input id="courseTitle" class="form-control" type="text"
                                                    placeholder="Course Title" name="course-title">
                                                <small>Write a 60 character course title.</small>
                                                @error('course_title')
                                                    <div
                                                        style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Courses category</label>
                                                <select id="courseCategory" class="form-select" name="course-category">
                                                    <option value="">Select category</option>
                                                    @foreach ($courseCate as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <small>Help people find your courses by choosing categories that represent
                                                    your course.</small>
                                                @error('course_category')
                                                    <div
                                                        style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Courses level</label>
                                                <select id="courseLevel" class="form-select" name="course-level">
                                                    <option value="">Select level</option>
                                                    <option value="Intermediate">Intermediate</option>
                                                    <option value="Beginner">Beginner</option>
                                                    <option value="Advanced">Advanced</option>
                                                </select>
                                                @error('course_level')
                                                    <div
                                                        style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="courseDescript" class="form-label">Course Description</label>
                                                <input id="courseDescript" class="form-control" type="text"
                                                    placeholder="Course Description" name="course-description">
                                                <small>A brief summary of your courses.</small>
                                                @error('course_description')
                                                    <div
                                                        style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <button class="btn btn-primary" type="button"
                                        onclick="courseForm.next()">Next</button>
                                </div>
                                <div id="test-l-2" role="tabpanel" class="bs-stepper-pane fade"
                                    aria-labelledby="courseFormtrigger2">
                                    <!-- Card -->
                                    <div class="card mb-3 border-0">
                                        <div class="card-header border-bottom px-4 py-3">
                                            <h4 class="mb-0">Courses Media</h4>
                                        </div>
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="preview-video" class="form-label">Course Preview URL</label>
                                                <input type="url" class="form-control" id="preview-video"
                                                    placeholder="Image File" name="course-video-url">
                                                @error('course_video-url')
                                                    <div
                                                        style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <!-- Course Image -->
                                            <div class="mb-3">
                                                <label for="imageFile" class="form-label">Course Image</label>
                                                <input type="file" class="form-control" id="imageFile"
                                                    placeholder="Image File" name="course-image">
                                                @error('course_image')
                                                    <div
                                                        style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="preview" class="form-label">Preview</label>
                                                <input type="text" class="form-control" id="preview"
                                                    placeholder="Preview" name="course-preview">
                                                @error('course_preview')
                                                    <div
                                                        style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Price</label>
                                                <input type="number" class="form-control" id="price"
                                                    placeholder="Price" name="course-price">
                                                @error('course_price')
                                                    <div
                                                        style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-secondary" type="button"
                                            onclick="courseForm.previous()">Previous</button>
                                        <button class="btn btn-primary" type="button"
                                            onclick="courseForm.next()">Next</button>
                                    </div>
                                </div>
                                <!-- Content three -->
                                <div id="test-l-3" role="tabpanel" class="bs-stepper-pane fade"
                                    aria-labelledby="courseFormtrigger3">
                                    <!-- Card -->
                                    <div class="card mb-3 border-0">
                                        <div class="card-header border-bottom px-4 py-3">
                                            <h4 class="mb-0">Curriculum</h4>
                                        </div>
                                        <div class="container mt-5 card-body"
                                            style="max-height: 400px; overflow-y: auto;">
                                            <div id="sectionsContainer">
                                                <!-- Default Section -->
                                                <div class="bg-light rounded p-2 mb-4" id="section1">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h4>Section Name</h4>
                                                        <div>
                                                            <a href="#" class="me-1 text-inherit edit-section"
                                                                data-section-id="section1" data-bs-toggle="tooltip"
                                                                data-placement="top" title="Edit">
                                                                <i class="fe fe-edit fs-6"></i>
                                                            </a>
                                                            <a href="#" class="me-1 text-inherit delete-section"
                                                                data-section-id="section1" data-bs-toggle="tooltip"
                                                                data-placement="top" title="Delete">
                                                                <i class="fe fe-trash-2 fs-6"></i>
                                                            </a>
                                                            <a href="#" class="text-inherit" aria-expanded="true"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#section1Content"
                                                                aria-controls="section1Content">
                                                                <span class="chevron-arrow"><i
                                                                        class="fe fe-chevron-down"></i></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- List group for lectures -->
                                                    <div class="list-group list-group-flush border-top-0 collapse show"
                                                        id="section1Content">
                                                        <div class="list-group-item rounded px-3 text-nowrap mb-1"
                                                            id="section1Lecture1">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <h5 class="mb-0 text-truncate">
                                                                    <a href="#" class="text-inherit">
                                                                        <i class="fe fe-menu me-1 align-middle"></i>
                                                                        <span class="align-middle">Lecture Name</span>
                                                                    </a>
                                                                </h5>
                                                                <div>
                                                                    <a href="#"
                                                                        class="me-1 text-inherit edit-lecture"
                                                                        data-lecture-id="section1Lecture1"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="Edit">
                                                                        <i class="fe fe-edit fs-6"></i>
                                                                    </a>
                                                                    <a href="#"
                                                                        class="me-1 text-inherit delete-lecture"
                                                                        data-lecture-id="section1Lecture1"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="Delete">
                                                                        <i class="fe fe-trash-2 fs-6"></i>
                                                                    </a>
                                                                    <a href="#" class="text-inherit"
                                                                        aria-expanded="true" data-bs-toggle="collapse"
                                                                        data-bs-target="#section1Lecture1Content"
                                                                        aria-controls="section1Lecture1Content">
                                                                        <span class="chevron-arrow"><i
                                                                                class="fe fe-chevron-down"></i></span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div id="section1Lecture1Content" class="collapse show"
                                                                aria-labelledby="section1Lecture1"
                                                                data-bs-parent="#section1Content">
                                                                <label for="section1Lecture1Video"
                                                                    class="form-label"><small>Lecture Video</small></label>
                                                                <input type="file" class="form-control"
                                                                    id="section1Lecture1Video" placeholder="Lecture Video"
                                                                    name="sections[0][lectures][0][lectureVideo]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="#"
                                                        class="btn btn-outline-primary btn-sm mt-3 add-lecture"
                                                        data-section-id="section1" data-bs-toggle="modal"
                                                        data-bs-target="#addLectureModal">Add Lecture +</a>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                                data-bs-target="#addSectionModal">Add Section +</button>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mb-8">
                                        <button class="btn btn-secondary" type="button"
                                            onclick="courseForm.previous()">Previous</button>

                                        <button type="submit" id="submitCourseForm"
                                            class="btn btn-danger">Submit</button>


                                    </div>
                                </div>
                            </form> --}}
                            <form id="courseFormPost" action="{{ route('handle-add-course', $userDetail->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- Content one -->
                                <div id="test-l-1" role="tabpanel" class="bs-stepper-pane fade"
                                    aria-labelledby="courseFormtrigger1">
                                    <!-- Card -->
                                    <div class="card mb-3">
                                        <div class="card-header border-bottom px-4 py-3">
                                            <h4 class="mb-0">Basic Information</h4>
                                        </div>
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <!-- Course Name -->
                                            <div class="mb-3">
                                                <label for="courseName" class="form-label">Course Name</label>
                                                <input id="courseName" class="form-control" type="text"
                                                    placeholder="Course Name" name="course_name">
                                                <small>Write a 20 character course name.</small>
                                                @error('course_name')
                                                    <div
                                                        style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <!-- Course Title -->
                                            <div class="mb-3">
                                                <label for="courseTitle" class="form-label">Course Title</label>
                                                <input id="courseTitle" class="form-control" type="text"
                                                    placeholder="Course Title" name="course_title">
                                                <small>Write a 60 character course title.</small>
                                                @error('course_title')
                                                    <div
                                                        style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Courses category</label>
                                                <select id="courseCategory" class="form-select" name="course_category">
                                                    <option value="">Select category</option>
                                                    @foreach ($courseCate as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <small>Help people find your courses by choosing categories that represent
                                                    your course.</small>
                                                @error('course_category')
                                                    <div
                                                        style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Courses level</label>
                                                <select id="courseLevel" class="form-select" name="course_level">
                                                    <option value="">Select level</option>
                                                    <option value="Intermediate">Intermediate</option>
                                                    <option value="Beginner">Beginner</option>
                                                    <option value="Advanced">Advanced</option>
                                                </select>
                                                @error('course_level')
                                                    <div
                                                        style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="courseDescript" class="form-label">Course Description</label>
                                                <input id="courseDescript" class="form-control" type="text"
                                                    placeholder="Course Description" name="course_description">
                                                <small>A brief summary of your courses.</small>
                                                @error('course_description')
                                                    <div
                                                        style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <button class="btn btn-primary" type="button"
                                        onclick="courseForm.next()">Next</button>
                                </div>
                                <div id="test-l-2" role="tabpanel" class="bs-stepper-pane fade"
                                    aria-labelledby="courseFormtrigger2">
                                    <!-- Card -->
                                    <div class="card mb-3 border-0">
                                        <div class="card-header border-bottom px-4 py-3">
                                            <h4 class="mb-0">Courses Media</h4>
                                        </div>
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="preview-video" class="form-label">Course Preview URL</label>
                                                <input type="url" class="form-control" id="preview-video"
                                                    placeholder="Image File" name="course_video_url">
                                                @error('course_video_url')
                                                    <div
                                                        style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <!-- Course Image -->
                                            <div class="mb-3">
                                                <label for="imageFile" class="form-label">Course Image</label>
                                                <input type="file" class="form-control" id="imageFile"
                                                    placeholder="Image File" name="course_image">
                                                @error('course_image')
                                                    <div
                                                        style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="preview" class="form-label">Preview</label>
                                                <input type="text" class="form-control" id="preview"
                                                    placeholder="Preview" name="course_preview">
                                                @error('course_preview')
                                                    <div
                                                        style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Price</label>
                                                <input type="number" class="form-control" id="price"
                                                    placeholder="Price" name="course_price">
                                                @error('course_price')
                                                    <div
                                                        style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="button"
                                        onclick="courseForm.previous()">Previous</button>
                                    <button class="btn btn-primary" type="button"
                                        onclick="courseForm.next()">Next</button>
                                </div>
                                <!-- Content three -->
                                <div id="test-l-3" role="tabpanel" class="bs-stepper-pane fade"
                                    aria-labelledby="courseFormtrigger3">
                                    <!-- Card -->
                                    <div class="card mb-3 border-0">
                                        <div class="card-header border-bottom px-4 py-3">
                                            <h4 class="mb-0">Curriculum</h4>
                                            @if (session('msg'))
                                                <div class="alert alert-{{ session('alert-type') }}">
                                                    {{ session('msg') }}
                                                </div>
                                            @endif
                                            @error('sections')
                                                <div style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                    {{ $message }}</div>
                                            @enderror
                                            @error('sections.*.sectionName')
                                                <div style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                    {{ $message }}</div>
                                            @enderror
                                            @error('sections.*.lectures')
                                                <div style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                    {{ $message }}</div>
                                            @enderror
                                            @error('sections.*.lectures.*.lectureName')
                                                <div style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                    {{ $message }}</div>
                                            @enderror
                                            @error('sections.*.lectures.*.lectureVideo')
                                                <div style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="container mt-5 card-body"
                                            style="max-height: 400px; overflow-y: auto;">
                                            <div id="sectionsContainer">
                                                <!-- Default Section -->
                                                <div class="bg-light rounded p-2 mb-4" id="section1">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h4>Section Name</h4>
                                                        <div>
                                                            <a href="#" class="me-1 text-inherit edit-section"
                                                                data-section-id="section1" data-bs-toggle="tooltip"
                                                                data-placement="top" title="Edit">
                                                                <i class="fe fe-edit fs-6"></i>
                                                            </a>
                                                            <a href="#" class="me-1 text-inherit delete-section"
                                                                data-section-id="section1" data-bs-toggle="tooltip"
                                                                data-placement="top" title="Delete">
                                                                <i class="fe fe-trash-2 fs-6"></i>
                                                            </a>
                                                            <a href="#" class="text-inherit" aria-expanded="true"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#section1Content"
                                                                aria-controls="section1Content">
                                                                <span class="chevron-arrow"><i
                                                                        class="fe fe-chevron-down"></i></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- List group for lectures -->
                                                    <div class="list-group list-group-flush border-top-0 collapse show"
                                                        id="section1Content">
                                                        <div class="list-group-item rounded px-3 text-nowrap mb-1"
                                                            id="section1Lecture1">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <h5 class="mb-0 text-truncate">
                                                                    <a href="#" class="text-inherit">
                                                                        <i class="fe fe-menu me-1 align-middle"></i>
                                                                        <span class="align-middle">Lecture Name</span>
                                                                    </a>
                                                                </h5>
                                                                <div>
                                                                    <a href="#"
                                                                        class="me-1 text-inherit edit-lecture"
                                                                        data-lecture-id="section1Lecture1"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="Edit">
                                                                        <i class="fe fe-edit fs-6"></i>
                                                                    </a>
                                                                    <a href="#"
                                                                        class="me-1 text-inherit delete-lecture"
                                                                        data-lecture-id="section1Lecture1"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="Delete">
                                                                        <i class="fe fe-trash-2 fs-6"></i>
                                                                    </a>
                                                                    <a href="#" class="text-inherit"
                                                                        aria-expanded="true" data-bs-toggle="collapse"
                                                                        data-bs-target="#section1Lecture1Content"
                                                                        aria-controls="section1Lecture1Content">
                                                                        <span class="chevron-arrow"><i
                                                                                class="fe fe-chevron-down"></i></span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div id="section1Lecture1Content" class="collapse show"
                                                                aria-labelledby="section1Lecture1"
                                                                data-bs-parent="#section1Content">
                                                                <label for="section1Lecture1Video"
                                                                    class="form-label"><small>Lecture Video</small></label>
                                                                <input type="file" class="form-control"
                                                                    id="section1Lecture1Video" placeholder="Lecture Video"
                                                                    name="sections[0][lectures][0][lectureVideo]">
                                                                <input type="hidden"
                                                                    name="sections[0][lectures][0][lectureName]"
                                                                    value="Lecture Name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="#"
                                                        class="btn btn-outline-primary btn-sm mt-3 add-lecture"
                                                        data-section-id="section1" data-bs-toggle="modal"
                                                        data-bs-target="#addLectureModal">Add Lecture +</a>
                                                    <input type="hidden" name="sections[0][sectionName]"
                                                        value="Section Name">
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                                data-bs-target="#addSectionModal">Add Section +</button>
                                        </div>

                                    </div>
                                    <div class="d-flex justify-content-between mb-8">
                                        <button class="btn btn-secondary" type="button"
                                            onclick="courseForm.previous()">Previous</button>

                                        <button type="submit" id="submitCourseForm"
                                            class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Button trigger modal -->
    <button type="button" hidden class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <p>Tạo khóa học thành công! </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Section Modal -->
    <div class="modal fade" id="addSectionModal" tabindex="-1" aria-labelledby="addSectionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSectionModalLabel">Add Section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="newSectionName" class="form-control" placeholder="Section Name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveSectionButton" class="btn btn-primary">Save Section</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Lecture Modal -->
    <div class="modal fade" id="addLectureModal" tabindex="-1" aria-labelledby="addLectureModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLectureModalLabel">Add Lecture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="newLectureName" class="form-control" placeholder="Lecture Name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveLectureButton" class="btn btn-primary">Save Lecture</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set collapse elements to be shown by default
            function show() {
                document.querySelectorAll('.collapse.show').forEach(function(collapse) {
                    const target = collapse.getAttribute('data-bs-target');
                    if (target) {
                        document.querySelector(target).classList.add('show');
                    }
                });
            }

            // Add Section
            document.getElementById('saveSectionButton').addEventListener('click', function() {
                const sectionName = document.getElementById('newSectionName').value;
                if (sectionName.trim()) {
                    addSection(sectionName);
                    document.getElementById('newSectionName').value = '';
                    bootstrap.Modal.getInstance(document.getElementById('addSectionModal')).hide();
                }
            });

            // function addSection(name) {
            //     const sectionsContainer = document.getElementById('sectionsContainer');
            //     const sectionId = (document.querySelectorAll('.bg-light').length);
            //     const newSection = `
        //     <div class="bg-light rounded p-2 mb-4" id="${sectionId}">
        //         <div class="d-flex align-items-center justify-content-between">
        //             <h4>${name}</h4>
        //             <div>
        //                 <a href="#" class="me-1 text-inherit edit-section" data-section-id="${sectionId}" data-bs-toggle="tooltip" data-placement="top" title="Edit">
        //                     <i class="fe fe-edit fs-6"></i>
        //                 </a>
        //                 <a href="#" class="me-1 text-inherit delete-section" data-section-id="${sectionId}" data-bs-toggle="tooltip" data-placement="top" title="Delete">
        //                     <i class="fe fe-trash-2 fs-6"></i>
        //                 </a>
        //                 <a href="#" class="text-inherit" aria-expanded="true" data-bs-toggle="collapse" data-bs-target="#${sectionId}Content" aria-controls="${sectionId}Content">
        //                     <span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span>
        //                 </a>
        //             </div>
        //         </div>
        //         <div class="list-group list-group-flush border-top-0 collapse" id="${sectionId}Content"></div>
        //         <a href="#" class="btn btn-outline-primary btn-sm mt-3 add-lecture" data-section-id="${sectionId}" data-bs-toggle="modal" data-bs-target="#addLectureModal">Add Lecture +</a>
        //         <input type="hidden" name="sections[${sectionId}][sectionName]" value="${name}">
        //     </div>`;
            //     sectionsContainer.insertAdjacentHTML('beforeend', newSection);
            //     attachEventListeners();
            // }

            // Add Lecture
            document.getElementById('saveLectureButton').addEventListener('click', function() {
                const lectureName = document.getElementById('newLectureName').value;
                const sectionId = document.querySelector('#addLectureModal').getAttribute(
                    'data-section-id');
                if (lectureName.trim() && sectionId) {
                    addLecture(lectureName, sectionId);
                    document.getElementById('newLectureName').value = '';
                    bootstrap.Modal.getInstance(document.getElementById('addLectureModal')).hide();
                    show()
                }
            });

            // function addLecture(name, sectionId) {
            //     const sectionContent = document.getElementById(sectionId + 'Content');
            //     const lectureId = sectionId + 'Lecture' + (sectionContent.children.length + 1);
            //     const newLecture = `
        //     <div class="list-group-item rounded px-3 text-nowrap mb-1" id="${lectureId}">
        //         <div class="d-flex align-items-center justify-content-between">
        //             <h5 class="mb-0 text-truncate">
        //                 <a href="#" class="text-inherit">
        //                     <i class="fe fe-menu me-1 align-middle"></i>
        //                     <span class="align-middle">${name}</span>
        //                 </a>
        //             </h5>
        //             <div>
        //                 <a href="#" class="me-1 text-inherit edit-lecture" data-lecture-id="${lectureId}" data-bs-toggle="tooltip" data-placement="top" title="Edit">
        //                     <i class="fe fe-edit fs-6"></i>
        //                 </a>
        //                 <a href="#" class="me-1 text-inherit delete-lecture" data-lecture-id="${lectureId}" data-bs-toggle="tooltip" data-placement="top" title="Delete">
        //                     <i class="fe fe-trash-2 fs-6"></i>
        //                 </a>
        //                 <a href="#" class="text-inherit" aria-expanded="true" data-bs-toggle="collapse" data-bs-target="#${lectureId}Content" aria-controls="${lectureId}Content">
        //                     <span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span>
        //                 </a>
        //             </div>
        //         </div>
        //         <div id="${lectureId}Content" class="collapse show" aria-labelledby="${lectureId}" data-bs-parent="#${sectionId}Content">
        //             <label for="${lectureId}Video" class="form-label"><small>Lecture Video</small></label>
        //             <input type="file" class="form-control" id="${lectureId}Video" placeholder="Lecture Video" name="sections[${sectionId}][lectures][${lectureId}][lectureVideo] >
        //             <input type="hidden" name="sections[${sectionId}][lectures][${lectureId}][lectureName]" value="${name}">
        //         </div>
        //     </div>`;
            //     sectionContent.insertAdjacentHTML('beforeend', newLecture);
            //     attachEventListeners();
            // }
            function addSection(name) {
                const sectionsContainer = document.getElementById('sectionsContainer');
                const sectionIndex = sectionsContainer.querySelectorAll('.bg-light').length;
                const sectionId = 'section' + (sectionIndex + 1);

                const newSection = `
                    <div class="bg-light rounded p-2 mb-4" id="${sectionId}">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4>${name}</h4>
                            <div>
                                <a href="#" class="me-1 text-inherit edit-section" data-section-id="${sectionId}" data-bs-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="fe fe-edit fs-6"></i>
                                </a>
                                <a href="#" class="me-1 text-inherit delete-section" data-section-id="${sectionId}" data-bs-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="fe fe-trash-2 fs-6"></i>
                                </a>
                                <a href="#" class="text-inherit" aria-expanded="true" data-bs-toggle="collapse" data-bs-target="#${sectionId}Content" aria-controls="${sectionId}Content">
                                    <span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span>
                                </a>
                            </div>
                        </div>
                        <div class="list-group list-group-flush border-top-0 collapse show" id="${sectionId}Content">
                            <!-- Lectures will be added here -->
                        </div>
                        <a href="#" class="btn btn-outline-primary btn-sm mt-3 add-lecture" data-section-id="${sectionId}" data-bs-toggle="modal" data-bs-target="#addLectureModal">Add Lecture +</a>
                        <input type="hidden" name="sections[${sectionIndex}][sectionName]" value="${name}">
                    </div>`;
                sectionsContainer.insertAdjacentHTML('beforeend', newSection);
                attachEventListeners();
            }

            function addLecture(name, sectionId) {
                const sectionContent = document.getElementById(sectionId + 'Content');
                const lectureIndex = sectionContent.querySelectorAll('.list-group-item').length;
                const lectureId = sectionId + 'Lecture' + (lectureIndex + 1);
                const sectionIndex = parseInt(sectionId.replace('section', '')) - 1;

                const newLecture = `
                    <div class="list-group-item rounded px-3 text-nowrap mb-1" id="${lectureId}">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="mb-0 text-truncate">
                                <a href="#" class="text-inherit">
                                    <i class="fe fe-menu me-1 align-middle"></i>
                                    <span class="align-middle">${name}</span>
                                </a>
                            </h5>
                            <div>
                                <a href="#" class="me-1 text-inherit edit-lecture" data-lecture-id="${lectureId}" data-bs-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="fe fe-edit fs-6"></i>
                                </a>
                                <a href="#" class="me-1 text-inherit delete-lecture" data-lecture-id="${lectureId}" data-bs-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="fe fe-trash-2 fs-6"></i>
                                </a>
                                <a href="#" class="text-inherit" aria-expanded="true" data-bs-toggle="collapse" data-bs-target="#${lectureId}Content" aria-controls="${lectureId}Content">
                                    <span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span>
                                </a>
                            </div>
                        </div>
                        <div id="${lectureId}Content" class="collapse show" aria-labelledby="${lectureId}" data-bs-parent="#${sectionId}Content">
                            <label for="${lectureId}Video" class="form-label"><small>Lecture Video</small></label>
                            <input type="file" class="form-control" id="${lectureId}Video" placeholder="Lecture Video" name="sections[${sectionIndex}][lectures][${lectureIndex}][lectureVideo]">
                            <input type="hidden" name="sections[${sectionIndex}][lectures][${lectureIndex}][lectureName]" value="${name}">
                        </div>
                    </div>`;
                sectionContent.insertAdjacentHTML('beforeend', newLecture);
                attachEventListeners();
            }


            function attachEventListeners() {
                // Edit Section
                document.querySelectorAll('.edit-section').forEach(function(button) {
                    button.addEventListener('click', editSectionHandler);
                });

                // Delete Section
                document.querySelectorAll('.delete-section').forEach(function(button) {
                    button.addEventListener('click', deleteSectionHandler);
                });

                // Edit Lecture
                document.querySelectorAll('.edit-lecture').forEach(function(button) {
                    button.addEventListener('click', editLectureHandler);
                });

                // Delete Lecture
                document.querySelectorAll('.delete-lecture').forEach(function(button) {
                    button.addEventListener('click', deleteLectureHandler);
                });

                // Add Lecture
                document.querySelectorAll('.add-lecture').forEach(function(button) {
                    button.addEventListener('click', addLectureHandler);
                });
            }

            function deleteSectionHandler(event) {
                if (confirm('Are you sure you want to delete this section?')) {
                    this.closest('.bg-light.rounded.p-2.mb-4').remove();
                }
            }


            function editSectionHandler(event) {
                document.querySelectorAll('.edit-section').forEach(button => {
                    button.addEventListener('click', function(event) {
                        event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>
                        const sectionId = this.getAttribute('data-section-id');
                        const sectionNameElement = document.querySelector(`#${sectionId} h4`);
                        const sectionInput = document.querySelector(
                            `#${sectionId} input[name^="sections"][name$="[sectionName]"]`);

                        // console.log('Section ID:', sectionId);
                        // console.log('Section Name Element:', sectionNameElement);
                        // console.log('Section Input:', sectionInput);

                        const currentSectionName = sectionNameElement.textContent.trim();
                        const newSectionName = prompt('Enter new section name:',
                            currentSectionName);
                        if (newSectionName && newSectionName.trim() !== '') {
                            sectionNameElement.textContent = newSectionName;

                            // Chỉ cập nhật giá trị cho các trường không phải kiểu file
                            if (sectionInput) {
                                sectionInput.value = newSectionName;
                            }
                        }
                    });
                });
            }



            document.querySelectorAll('.edit-lecture').forEach(button => {
                button.addEventListener('click', editLectureHandler);
            });

            function editLectureHandler(event) {
                event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

                const lectureId = this.getAttribute('data-lecture-id');
                const lectureElement = document.querySelector(`#${lectureId}`);

                if (!lectureElement) {
                    console.error(`Lecture with ID ${lectureId} not found.`);
                    return;
                }

                const lectureNameElement = lectureElement.querySelector('h5 span');
                const hiddenInput = lectureElement.querySelector('input[name$="[lectureName]"]');

                if (!lectureNameElement || !hiddenInput) {
                    console.error(`Elements for lecture with ID ${lectureId} not found.`);
                    return;
                }

                const currentLectureName = lectureNameElement.textContent.trim();
                const newLectureName = prompt('Enter new lecture name:', currentLectureName);

                if (newLectureName && newLectureName.trim() !== '') {
                    lectureNameElement.textContent = newLectureName;
                    hiddenInput.value = newLectureName;
                }
            }


            function deleteLectureHandler(event) {
                if (confirm('Are you sure you want to delete this lecture?')) {
                    this.closest('.list-group-item.rounded.px-3.text-nowrap.mb-1').remove();
                }
            }

            function addLectureHandler(event) {
                const sectionId = this.getAttribute('data-section-id');
                document.querySelector('#addLectureModal').setAttribute('data-section-id', sectionId);
            }

            attachEventListeners();

            // document.getElementById('courseFormPost').addEventListener('submit', function(event) {
            //     event.preventDefault(); // Ngăn không cho form submit ngay lập tức

            //     // Lấy phần tử form
            //     let form = event.target;

            //     // Tạo đối tượng FormData từ phần tử form
            //     let formData = new FormData(form);

            //     let sectionsContainer = document.getElementById('sectionsContainer');
            //     let sections = sectionsContainer.querySelectorAll('.bg-light');
            //     let sectionsArray = []; // Tạo một mảng để chứa dữ liệu section

            //     sections.forEach(section => {
            //         let sectionName = section.querySelector('h4').innerText;
            //         let lectures = section.querySelectorAll('.list-group-item');
            //         let sectionData = {
            //             sectionName: sectionName,
            //             lectures: []
            //         };

            //         lectures.forEach(lecture => {
            //             let lectureName = lecture.querySelector('h5 a span.align-middle')
            //                 .innerText; // Lấy tên lecture
            //             let lectureVideo = lecture.querySelector('input[type="file"]')
            //                 .files[0]; // Nếu bạn cần file video

            //             sectionData.lectures.push({
            //                 lectureName: lectureName,
            //                 lectureVideo: lectureVideo // Hoặc lectureVideo.name nếu bạn chỉ cần tên file
            //             });
            //         });

            //         sectionsArray.push(sectionData);
            //     });

            //     // Thêm dữ liệu sections vào FormData dưới dạng JSON
            //     sectionsArray.forEach((section, index) => {
            //         formData.append(`sections[${index}][sectionName]`, section.sectionName);

            //         section.lectures.forEach((lecture, idx) => {
            //             formData.append(`sections[${index}][lectures][${idx}][lectureName]`,
            //                 lecture.lectureName);
            //             formData.append(
            //                 `sections[${index}][lectures][${idx}][lectureVideo]`,
            //                 lecture.lectureVideo);
            //         });
            //     });

            //     // console.log(formData);

            //     // Gửi FormData lên server bằng AJAX hoặc fetch API
            //     fetch(form.action, {
            //             method: 'POST',
            //             body: formData,
            //             headers: {
            //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
            //                     .getAttribute('content')
            //             }
            //         })
            //         .then(response => response.json())
            //         .then(data => {
            //             console.log(data);
            //             // Xử lý phản hồi từ server
            //         })
            //         .catch(error => {
            //             console.error('Error:', error);
            //         });
            // });


            // document.getElementById('courseFormPost').addEventListener('submit', function(event) {
            //     event.preventDefault(); // Ngăn không cho form submit ngay lập tức

            //     // Lấy phần tử form
            //     let form = event.target;

            //     // Tạo đối tượng FormData từ phần tử form
            //     let formData = new FormData(form);               
            //     let sectionsContainer = document.getElementById('sectionsContainer');
            //     let sections = sectionsContainer.querySelectorAll('.bg-light');
            //     let sectionsArray = []; // Tạo một mảng để chứa dữ liệu section

            //     sections.forEach((section, sectionIndex) => {
            //         let sectionName = section.querySelector('h4').innerText;
            //         let lectures = section.querySelectorAll('.list-group-item');
            //         let sectionData = {
            //             sectionName: sectionName,
            //             lectures: []
            //         };

            //         lectures.forEach((lecture, lectureIndex) => {
            //             let lectureName = lecture.querySelector('h5 a span.align-middle')
            //                 .innerText; // Lấy tên lecture
            //             let lectureVideo = lecture.querySelector('input[type="file"]')
            //                 .files[0]; // Nếu bạn cần file video

            //             sectionData.lectures.push({
            //                 lectureName: lectureName,
            //                 lectureVideo: lectureVideo // Hoặc lectureVideo.name nếu bạn chỉ cần tên file
            //             });
            //         });

            //         sectionsArray.push(sectionData);
            //     });



            //     // Thêm dữ liệu sections vào FormData
            //     sectionsArray.forEach((section, index) => {
            //         formData.append(`sections[${index}][sectionNameP]`, section.sectionName);

            //         section.lectures.forEach((lecture, idx) => {
            //             formData.append(`sections[${index}][lecturesP][${idx}][lectureNameP]`,
            //                 lecture.lectureName);
            //             formData.append(
            //                 `sections[${index}][lecturesP][${idx}][lectureVideoP]`,
            //                 lecture.lectureVideo);
            //         });
            //     });

            //     // Log dữ liệu formData để kiểm tra
            //     for (let [key, value] of formData.entries()) {
            //         console.log(key, value);
            //     }
            //     // console.log(form.action); // Kiểm tra URL

            //     this.submit();
            // });

            // document.getElementById('courseFormPost').addEventListener('submit', function(event) {
            //     event.preventDefault(); // Ngăn không cho form submit ngay lập tức

            //     // Lấy phần tử form
            //     let form = event.target;

            //     // Tạo đối tượng FormData từ phần tử form
            //     let formData = new FormData(form);

            //     let sectionsContainer = document.getElementById('sectionsContainer');
            //     let sections = sectionsContainer.querySelectorAll('.bg-light');
            //     let sectionsArray = []; // Tạo một mảng để chứa dữ liệu section

            //     sections.forEach((section, sectionIndex) => {
            //         let sectionName = section.querySelector('h4').innerText
            //             .trim(); // Trim để loại bỏ khoảng trắng không cần thiết
            //         let lectures = section.querySelectorAll('.list-group-item');
            //         let sectionData = {
            //             sectionNameP: sectionName, // Thay đổi tên khóa thành 'sectionNameP'
            //             lectures: []
            //         };

            //         lectures.forEach((lecture, lectureIndex) => {
            //             let lectureName = lecture.querySelector('h5 a span.align-middle')
            //                 .innerText
            //                 .trim(); // Trim để loại bỏ khoảng trắng không cần thiết
            //             let lectureVideo = lecture.querySelector('input[type="file"]')
            //                 .files[0]; // Nếu bạn cần file video

            //             sectionData.lectures.push({
            //                 lectureNameP: lectureName, // Thay đổi tên khóa thành 'lectureNameP'
            //                 lectureVideoP: lectureVideo // Thay đổi tên khóa thành 'lectureVideoP'
            //             });
            //         });

            //         sectionsArray.push(sectionData);
            //     });

            //     // Thêm dữ liệu sections vào FormData với hậu tố 'P'
            //     sectionsArray.forEach((section, index) => {
            //         formData.append(`sections[${index}][sectionNameP]`, section.sectionNameP);

            //         section.lectures.forEach((lecture, idx) => {
            //             formData.append(
            //                 `sections[${index}][lectures][${idx}][lectureNameP]`,
            //                 lecture.lectureNameP);

            //             // Kiểm tra xem có file không
            //             if (lecture.lectureVideoP) {
            //                 formData.append(
            //                     `sections[${index}][lectures][${idx}][lectureVideoP]`,
            //                     lecture.lectureVideoP);
            //             }
            //         });
            //     });


            //     // Log dữ liệu formData để kiểm tra
            //     for (let [key, value] of formData.entries()) {
            //         console.log(key, value);
            //     }

            //     // Gửi dữ liệu formData đi bằng Axios
            //     this.submit();
            // });

















        });
    </script>
@endsection
