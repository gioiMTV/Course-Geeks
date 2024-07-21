@extends('layouts.user')

@section('title')
    {{ $title }}
@endsection

@php
    $footer = true;
@endphp

@section('content')
    <section class="mt-6 course-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="tab-content content" id="course-tabContent">
                        <div class="tab-pane fade show active" id="course-intro" role="tabpanel"
                            aria-labelledby="course-intro-tab">   
                            <div class="embed-responsive position-relative w-100 d-block overflow-hidden p-0"
                                style="height: 600px">
                                <video id="lecture-video"
                                    class="position-absolute top-0 end-0 start-0 end-0 bottom-0 h-100 w-100" width="560"
                                    height="315" controls poster="{{ asset('storage/upload/images/course/'. $course->image) }}">
                                    @if ($lectureNow !== $firstLecture)
                                        <source src="{{ asset('storage/upload/videos/' . $lectureNow->video) }}" type="video/mp4">
                                    @else
                                        <source src="{{ asset('storage/upload/videos/' . $firstLecture->video) }}" type="video/mp4">
                                    @endif
                                    Trình duyệt của bạn không hỗ trợ video tag.
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="card course-sidebar" id="courseAccordion">
        <ul class="list-group list-group-flush" style="height: 850px" data-simplebar>
            <li class="list-group-item">
                <h4 class="mb-0">Table of Content</h4>
            </li>
            @if ($sections)
                @foreach ($sections as $section)
                    <li class="list-group-item">
                        <a class="d-flex align-items-center h4 mb-0 {{ $section->id == $lectureNow->section->id ? 'collapsed' : '' }}"
                            data-bs-toggle="collapse" href="#course-{{ $loop->index }}" role="button"
                            aria-expanded="{{ $section->id == $lectureNow->section->id ? 'true' : 'false' }}"
                            aria-controls="course-{{ $loop->index }}">
                            <div class="me-auto">{{ $section->name }}</div>
                            <span class="chevron-arrow ms-4">
                                <i class="fe fe-chevron-down fs-4"></i>
                            </span>
                        </a>
                        <div class="collapse {{ $section->id == $lectureNow->section->id ? 'show' : '' }}"
                            id="course-{{ $loop->index }}" data-bs-parent="#courseAccordion">
                            <div class="py-4 nav" id="course-tabOne" role="tablist" aria-orientation="vertical"
                                style="display: inherit">
                                @foreach ($section->lecture as $lecture)
                                    @php
                                        $lectureId = $lecture->id;
                                        $isLectureNow = $lectureNow === $lecture;
                                        // Check if the lecture is completed by the student
                                        $isCompleted = $lecture
                                            ->progress()
                                            ->where('student_id', $studentId)
                                            ->where('progress_now', 100)
                                            ->exists();

                                        // Determine if the lecture is clickable
                                        if ($isSelf || $isAdmin) {
                                            $isCompleted = true;
                                            $isSell = true;
                                        }
                                        $isClickable = $isLectureNow || ($isCompleted && $isSell);
                                    @endphp
                                    <a class="mb-2 d-flex justify-content-between align-items-center {{ $isClickable ? '' : 'text-inherit' }}"
                                        id="course-{{ $lecture->name }}-tab" data-bs-toggle="pill"
                                        href="#course-{{ $lecture->name }}" role="tab"
                                        aria-controls="course-{{ $lecture->name }}"
                                        aria-selected="{{ $isLectureNow ? 'true' : 'false' }}"
                                        data-video-src="{{ asset('storage/upload/videos/' . $lecture->video) }}"
                                        data-lecture-id="{{ $lectureId }}"
                                        @if (!$isClickable) onclick="return false;" @endif>
                                        <div class="text-truncate">
                                            <span
                                                class="icon-shape bg-light text-{{ $isLectureNow || ($isCompleted && $isSell) ? 'primary' : 'secondary' }} icon-sm rounded-circle me-2">
                                                <i
                                                    class="fe {{ $isLectureNow || ($isCompleted && $isSell) ? 'fe-play' : 'fe-lock' }} fs-6"></i>
                                            </span>
                                            <span>{{ $lecture->name }}</span>
                                        </div>
                                        <div class="text-truncate">
                                            <span>{{ formatDuration($lecture->duration) }}</span>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </li>
                @endforeach
            @endif

        </ul>
    </section>
    
    
@endsection

<script>

    document.addEventListener('DOMContentLoaded', function() {
        const videoElement = document.getElementById('lecture-video');
        let lectureId = "{{ $lectureIdNow }}";
        const studentId = "{{ $studentId }}";

        document.querySelectorAll('[data-video-src]').forEach(link => {
            link.addEventListener('click', function(event) {
                if (!this.classList.contains('text-inherit')) {
                    event.preventDefault();
                    const newVideoSrc = this.getAttribute('data-video-src');
                    lectureId = this.getAttribute('data-lecture-id');
                    const sourceElement = videoElement.querySelector('source');
                    sourceElement.setAttribute('src', newVideoSrc);
                    videoElement.load();
                }
            });

            link.addEventListener('mouseenter', function() {
                if (!this.classList.contains('text-inherit')) {
                    this.style.cursor = 'pointer';
                }
            });

            link.addEventListener('mouseleave', function() {
                this.style.cursor = 'auto';
            });
        });

        videoElement.addEventListener('ended', function() {
            document.querySelectorAll('[data-video-src]').forEach(link => {
                if (!link.classList.contains('text-inherit')) {
                    lectureId = link.getAttribute(
                        'data-lecture-id'); // Lấy lectureId từ data-lecture-id của link
                }
            });

            const data = {
                student_id: studentId,
                lecture_id: lectureId,

            };

            $.ajax({
                type: 'POST',
                url: '/update-progress',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Progress updated successfully:', response);
                    // localStorage.setItem('viewed_' + lectureId, 'true');
                    unlockNextLecture(lectureId);
                },
                error: function(error) {
                    console.error('Error updating progress:', error);
                }
            });
        });

        function unlockNextLecture(currentLectureId) {
            const allLinks = document.querySelectorAll('[data-video-src]');
            let foundCurrent = false;

            allLinks.forEach(link => {
                if (foundCurrent && !link.classList.contains('text-inherit')) {
                    link.onclick = function(event) {
                        event.preventDefault();
                        const newVideoSrc = this.getAttribute('data-video-src');
                        lectureId = this.getAttribute('data-lecture-id');
                        const sourceElement = videoElement.querySelector('source');
                        sourceElement.setAttribute('src', newVideoSrc);
                        videoElement.load();
                    };
                    link.style.cursor = 'pointer';
                    foundCurrent = true;
                    return;
                }

                if (link.getAttribute('data-lecture-id') == currentLectureId) {
                    foundCurrent = true;
                }
            });

            // Find the next lecture id to unlock
            let nextLectureId = Number(currentLectureId) + 1;

            // Check if there is a link with the next lecture id
            let nextLink = document.querySelector(`[data-lecture-id="${nextLectureId}"]`);
            if (nextLink) {

                const newVideoSrc = nextLink.getAttribute('data-video-src');
                lectureId = nextLink.getAttribute('data-lecture-id');
                const sourceElement = videoElement.querySelector('source');
                sourceElement.setAttribute('src', newVideoSrc);
                videoElement.load();

                nextLink.style.cursor = 'pointer';

                // Update icon and text color for the unlocked lecture
                nextLink.classList.remove('text-inherit');
                nextLink.querySelector('.icon-shape i').classList.remove('text-secondary');
                nextLink.querySelector('.icon-shape i').classList.add('text-primary');
                nextLink.querySelector('.icon-shape i').classList.remove('fe-lock');
                nextLink.querySelector('.icon-shape i').classList.add('fe-play');
            }
        }
    });

</script>
