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
        <div class="subscription-section">
            <div class="subscription-content">
                <h3>Start Your Subscription Today</h3>
                <p>Unlock premium content and more!</p>
                <a href="{{ route('subscribe') }}" class="btn btn-primary">Subscribe Now</a>
            </div>
        </div>
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
