@extends('index')

@section('app_body')
    <section>
        <div class="hero-section">
            <div class="hero-content">

                <h3 class="hero-text">Course Name</span></h3>
            </div>
        </div>
    </section>
    {{-- courses  --}}
    <section>
        <div class="course-content">
            <button class="getstarted-button">
                <h3>Play Now</h3>
            </button>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row classes-description">
                <div>
                    <p>Lenght</p>
                    <p>131Min.</p>
                </div>
                <div>
                    <p>Students</p>
                    <p>3356</p>
                </div>
                <div>
                    <p>Rating</p>
                    <p>5
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="courses">
        <div class="classes-row">
            <div class="course-row-box">
                <img src="{{ asset('./src/banner/banner-1.jpg') }}" alt="courseimg">
                <div>
                    <h4>1. first lesson</h4>
                    <p>first lesson Description</p>
                </div>
            </div>
            <div class="course-row-box">
                <img src="{{ asset('./src/banner/banner-1.jpg') }}" alt="courseimg">
                <div>
                    <h4>1. first lesson</h4>
                    <p>first lesson Description</p>
                </div>
            </div>
            <div class="course-row-box">
                <img src="{{ asset('./src/banner/banner-1.jpg') }}" alt="courseimg">
                <div>
                    <h4>1. first lesson</h4>
                    <p>first lesson Description</p>
                </div>
            </div>
        </div>
    </section>
    <section class="courses">
        <div>
            <h3>Suggested Courses</h3>
        </div>
        <div class="course-row">
            <div class="course-row-box">
                <img src="{{ asset('./src/banner/banner-1.jpg') }}" alt="courseimg">
                <p>Course Name</p>
            </div>
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
