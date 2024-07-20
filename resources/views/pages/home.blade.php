@php
    $course_videos = \App\Models\Courses::all();
@endphp

@extends('index')


@section('app_body')
    <section>
        <div class="hero-section">
            <img src="{{ asset('./src/banner/banner-1.jpg') }}" alt="home">
            <div class="hero-content">
                <h3 class="hero-text">Unleash your <span>inner star</span></h3>
            </div>
        </div>
    </section>
    {{-- courses  --}}
    <section>
        <div class="course-content">
            <button class="getstarted-button">
                <h3>Get Start now</h3>
            </button>
            <div class="course-text">
                <h3>With our premium courses</h3>
            </div>
        </div>
    </section>
    <section class="courses">
        <div>
            <h3>Courses</h3>
        </div>
        <div class="course-row">
            @foreach($course_videos as $course)
                <div class="course-row-box">
                    <img src="{{ asset('uploads/courses/'.$course->thumbnail) }}" alt="{{ $course->name }}" class="thumbnail-img">
                    <p class="course-name">{{ $course->name }}</p>
                    <p class="course-description">{!! $course->description !!}</p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="courses">
        <div>
            <h3>Trainding Courses</h3>
        </div>
        <div class="course-row">
            <div class="course-row-box">
                <img src="{{ asset('./src/banner/banner-1.jpg') }}" alt="courseimg">
                <p>Course Name</p>
            </div>
            <section>
    </section>
            <div class="course-row-box">
                <img src="{{ asset('./src/banner/banner-1.jpg') }}" alt="courseimg">
                <p>Course Name</p>
            </div>
            <div class="course-row-box">
                <img src="{{ asset('./src/banner/banner-1.jpg') }}" alt="courseimg">
                <p>Course Name</p>
            </div>
        </div>
    </section>
    
@endsection

@section('styles')
    <style>
        .hero-section {
            position: relative;
            width: 100%;
            height: 300px;
            overflow: hidden;
        }

        .hero-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 8px;
        }

        .course-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }

        .course-row-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 10px;
            max-width: 200px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .thumbnail-img {
            width: 100%;
            height: auto;
            max-width: 150px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .course-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .course-description {
            font-size: 0.9em;
            color: #555;
        }
    </style>
@endsection
