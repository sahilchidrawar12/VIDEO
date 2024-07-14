@extends('index')

@section('app_body')
    <section class="container ProfileSection signup">
        <div class="container">
            <div class="arrow"><i class="fa-solid fa-chevron-left"></i></div>
        </div>
        <form method="POST" action="{{ route('update-profile') }}">
            @csrf

        <div class="input-field">
            <p class="input">First Name</p>
            <br />
            <input type="text" placeholder="Type First Name" value="{{ old('name', $user->name) }}" required>
        </div>


        <div class="input-field">
            <p class="input">Email Address</p>
            <br />
            <input type="text" class="" placeholder="Type Email Address" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="input-field">
            <p class="input">Phone Number</p>
            <br />
            <input type="text" placeholder="Enter Phone Number" />
        </div>

        <div class="input-field">
            <p class="input">Age</p>
            <br />
            <input type="text" placeholder="Type Age" />
        </div>
        <div class="input-field">
            <p class="input">City</p>
            <br />
            <input type="text" placeholder="Type City Name" />
        </div>
        <div class="input-field">
            <p class="input">State</p>
            <br />
            <input type="text" placeholder="Type State Name" />
        </div>
        <div class="input-field">
            <p class="input">Pincode</p>
            <br />
            <input type="text" placeholder="Type Pincode" />
        </div>
        <div class="input-field">
            <p class="input">Certificate</p>
            <br />
            <input type="text" placeholder="Type Certificate Name" />
        </div>

        <div class="input-field">
            <p class="input">Profesion</p>
            <br />
            <input type="text" placeholder="Type Profession" />
        </div>

        <div class="input-field">
            <p class="input">About Me</p>
            <br />
            <input type="text" class="Yourself" placeholder="Write About Yourself" />
        </div>
        <div class="input-field">
            <button class="getstarted-button">
                <h3>Save</h3>
            </button>
        </div>
        <div>
            <button>save</button>
        </div>
</Form>
    </section>
@endsection
