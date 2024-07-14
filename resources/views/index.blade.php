<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
</head>


<body>
    {{-- header  --}}
    <nav class="head-nav">
        <div class="container">
            <input id="responsive-menu" type="checkbox">
            <label for="responsive-menu"> <img src="{{ asset('./src/icon/bell.svg') }}" alt="bell">
            </label>
            {{-- <span id="menu-icon"></span> --}}
            <div id="overlay"></div>
            {{-- <ul id="social-media">
                <li>
                    <a href="https://dribbble.com/erinesullivan">
                        <i class="fab fa-dribbble"></i>
                        <span class="screen-reader-text">Dribbble</span>
                    </a>
                </li>
                <li>
                    <a href="http://codepen.io/erinesullivan/">
                        <i class="fab fa-codepen"></i>
                        <span class="screen-reader-text">CodePen</span>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/erin_e_sullivan">
                        <i class="fab fa-twitter"></i>
                        <span class="screen-reader-text">Twitter</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/in/erinesullivan1">
                        <i class="fab fa-linkedin"></i>
                        <span class="screen-reader-text">LinkedIn</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/erin_e_sullivan/">
                        <i class="fab fa-instagram"></i>
                        <span class="screen-reader-text">Instagram</span>
                    </a>
                </li>
            </ul> --}}
        </div>
    </nav>


    @yield('app_body')


    <nav class="purple-nav">
        <div>
            <a href="{{ url('/') }}" class="nav-link">
                <img src="{{ asset('./src/icon/3.svg') }}" alt="home">
                <p>Home</p>
            </a>
        </div>
        <div>
            <a href="{{ url('/classes') }}" class="nav-link">
                <img src="{{ asset('./src/icon/2.svg') }}" alt="home">
                <p>Class</p>

            </a>
        </div>
        <div>
            <a href="{{ url('/competition') }}" class="nav-link">
                <img src="{{ asset('./src/icon/2.svg') }}" alt="home">
                <p>Competition</p>

            </a>
        </div>

        <div>

            <a href="{{ url('/profile') }}" class="nav-link">
                {{-- <img src="{{ asset('./src/icon/5.svg') }}" alt="home"> --}}
                <img src="{{ asset('./src/icon/3.svg') }}" alt="home">
                <p>Profile</p>



            </a>
        </div>
        <div class="subscription-section">
            <div class="subscription-content">
                <form action="{{ route('subscribe') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Subscribe Now</button>
                </form>
            </div>
        </div>

    </nav>
</body>

</html>
