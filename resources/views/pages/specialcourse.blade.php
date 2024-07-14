@extends('index')
@section('app_body')
    <div class="special-course-page">
        <h2>Checkout</h2>
        <div class="special-course-price">
            <img src="{{ asset('./src/banner/banner-1.jpg') }}" alt="course-box">
            <div class="special-course-pr">
                <p>All Courses</p>
                <p>5000</p>

            </div>
        </div>


        <div class="specialoffer">
            <img src="{{ asset('./src/icon/offer.svg') }}" alt="course-box">
            <h2>Offers</h2>
        </div>
        <div class="Coupon-section">
            <input type="text" placeholder="Enter Coupon Code">
            <button class="apply-button">
                <h3>APPLY</h3>
            </button>
        </div>


        <div class="specialoffer">
            <img src="{{ asset('./src/icon/bill.svg') }}" alt="course-box">
            <h2>Bill Details</h2>
        </div>
    </div>
@endsection
