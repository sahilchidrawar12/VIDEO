@php
    $course_videos = \App\Models\Course_Videos::all();
@endphp

@extends('index')

@section('app_body')
    <section>
        <!-- Hero section -->
        <!-- Your hero section HTML here -->
    </section>

    <section class="container">
        <h3>Your Courses</h3>
        <div class="myClasses">
            @foreach ($course_videos as $video)
                <div class="myClasses-box">
                    <img src="{{ asset('uploads/course_videos/' . $video->thumbnail) }}" alt="courseimg">
                    <div>
                        <p>{{ $video->name }}</p>
                        <a href="{{ asset('uploads/course_videos/' . $video->file) }}" target="_blank" class="getstarted-button">
                            <h3>Play</h3>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
