@extends('index')

@section('app_body')
    <div class="profile-view">
        <div class="profile-view-head">
            <img src="{{ asset('./src/banner/banner-3.jpg') }}" alt="Profile Banner" />
            <div class="profile-view-img">
                <img src="{{ asset('./src/banner/banner-3.jpg') }}" alt="Profile Picture" />
                <div class="edit-profile">
                    <h3>Name</h3>
                    <a href="{{ route('edit-profile') }}">
                        <button class="edit-button">
                            <h3>Edit</h3>
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="logout-section">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-button">
                    <h3>Log-Out</h3>
                </button>
            </form>
        </div>
    </div>
@endsection
