@use Illuminate\Support\Facades\Auth;
<header id="header">
    <!-- Navbar -->
    <nav data-aos="zoom-out" data-aos-delay="800" class="navbar navbar-expand">
        <div class="container header">
            <!-- Navbar Brand-->
            <a class="navbar-brand" href="#">

                <img class="navbar-brand-regular" src="{{ asset('assets/img/logo/logo-white.png') }}" alt="brand-logo">
                <img class="navbar-brand-sticky" src="{{ asset('assets/img/logo/logo.png') }}" alt="sticky brand-logo">
            </a>
           
            <div class="ml-auto"></div>
            <!-- Navbar -->
            <ul class="navbar-nav items">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ url('home')}}">Home</a>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ url('blogs')}}">Blogs</a>

                </li>
                <li class="nav-item">
                    <a href="{{ url('features')}}" class="nav-link">Features </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Support</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ url('plans')}}">Plan & Pricing </a>

                </li>
            </ul>
            <!-- Navbar Toggler -->
            <ul class="navbar-nav toggle">
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#menu">
                        <i class="fas fa-bars toggle-icon m-0"></i>
                    </a>
                </li>
            </ul>

            @if (!(Auth::check()))
            <!-- Navbar Action Button -->
            @guest
            <ul class="navbar-nav action">
                <li class="nav-item ml-3">
                    <a href="/register" class="btn ml-lg-auto btn-bordered-white active">
                        Sign UP</a>
                </li>
            </ul>
            <ul class="navbar-nav action">
                <li class="nav-item ml-3">
                    <a href="/login" class="btn ml-lg-auto btn-bordered-white">
                        Sign In</a>
                </li>
            </ul>
            @endguest
            @auth
            <ul class="navbar-nav action">
                <li class="nav-item ml-3">
                    <a href="#" class="btn ml-lg-auto btn-bordered-white active">
                        Hello @if(!(Session::get('merchant_firstname')))
                        {{ Session::get('merchant_firstname') }}
                        @endif
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav action">
                <li class="nav-item ml-3">
                    <form method="post" action={{ route('logout') }}>
                        @csrf
                        <button type="submit" class="btn ml-lg-auto btn-bordered-white">
                            Logout</button>
                    </form>
                </li>
            </ul>
            @endauth
            @else
                 <ul class="navbar-nav action">
                <li class="nav-item ml-3">
                    <a href="/merchant/logout" class="btn ml-lg-auto btn-bordered-white active">
                        Sign Out</a>
                </li>
            </ul>
           @endif

        </div>
    </nav>
</header>
<!--  ***** Header End ***** -->
