<section id="header_section_wrapper" class="header_section_wrapper">
    <div class="container">
        <div class="header-section">
            <div class="row">
                <div class="col-md-4">
                    <div class="left_section">
                                            <span class="date">
                                                {{ date('l') }} / 
                                            </span>
                        <!-- Date -->
                                            <span class="time">
                                                {{ date('F j Y') }}
                                            </span>
                        <!-- Time -->
                        <div class="social">
                            <a class="icons-sm fb-ic" href="https://www.facebook.com/angsalaksak" target="blank"><i class="fa fa-facebook"></i></a>
                            <!--Twitter-->
                            <a class="icons-sm tw-ic" href="https://twitter.com/angsalaksak" target="blank"><i class="fa fa-twitter"></i></a>
                            <!--Google +-->
                            <a class="icons-sm inst-ic" href="https://www.instagram.com/angsalaksak/?fbclid=IwAR2S9-frvG8BQrIw2NsYkAu8CV2B3eDtV8ROAgWN1B4PwdBG6M7sRfUzMTc" target="blank"><i class="fa fa-instagram"> </i></a>
                            <!--Linkedin-->
                            <a class="icons-sm tmb-ic" href="https://angsalaksak.tumblr.com/?fbclid=IwAR3bdkvt8ksA538dC2lMXcwHvtrdb3fEjjnSWDT4b7RRkHJzbbQIFU_DLPI" target="blank"><i class="fa fa-tumblr"> </i></a>
                        </div>
                        <!-- Top Social Section -->
                    </div>
                    <!-- Left Header Section -->
                </div>

                <div class="col-md-4">
                    <div class="logo">
                        <a href="{{ route('landing') }}"><img src="{{ asset('others/') }}/{{ $shareData['web_logo'] }}" alt="The kingfisher Logo"></a>
                    </div>
                    <!-- Logo Section -->
                </div>

                <div class="col-md-4">
                    <div class="right_section">
                        <ul class="nav navbar-nav">
                            @guest
                                @if (Route::has('login'))
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                @endif
                                @if (Route::has('register'))
                                <li><a href="{{ url('/register') }}">Register</a></li>
                                @endif
                            @else
                            <li class="dropdown lang">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> {{ Auth::user()->name }}
                                        <i class="fa fa-angle-down"></i></button>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    @if(Auth::user()->user_type !==2)
                                        <li><a class="dropdown-item" 
                                            @if(Auth::user()->user_type == 1)
                                                href="{{ route('dashboard') }}"
                                            @elseif (Auth::user()->user_type == 3)
                                                href="{{ route('writerDashboard') }}"
                                            @endif
                                        >Dashboard</a></li>
                                    @endif

                                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                                    <li><a class="dropdown-item">Your Content</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                            @endguest
                        </ul>
                        <!-- user dropdown Section (language section)-->

                        <ul class="nav-cta hidden-xs">
                            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i
                                    class="fa fa-search"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="head-search">
                                            <form role="form">
                                                <!-- Input Group -->
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Type Something"> <span class="input-group-btn">
                                                                            <button type="submit"
                                                                                    class="btn btn-primary">Search
                                                                            </button>
                                                                        </span></div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- Search Section -->
                    </div>
                    <!-- Right Header Section -->
                </div>
                
            </div>
        </div>
        <!-- Header Section -->

        <div class="navigation-section">
            <nav class="navbar m-menu navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="#navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav">
                            <li><a href="{{ route('landing') }}">Home</a></li>
                            <li class="dropdown m-menu-fw"><a href="{{ route('articles') }}" data-toggle="dropdown" class="dropdown-toggle">Articles
                                <span><i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="m-menu-content">
                                            <ul class="col-sm-3">
                                                <li class="dropdown-header">Categories</li>
                                                <li><a href="{{ url('/articles') }}">General</a></li>
                                            @forelse ($shareData['categories'] as $category)
                                                <li><a href="{{ url('/articles') }}/{{ $category->id }}">{{ $category->name }}</a></li>
                                            @empty
                                                <li>No categories</li>
                                            @endforelse
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>      
                            @auth
                            <li><a href="{{ route('comments') }}">Comment Section</a></li>
                            @endauth
                        </ul>
                    </div>
                    <!-- .navbar-collapse -->
                </div>
                <!-- .container -->
            </nav>
            <!-- .nav -->
        </div>
        <!-- .navigation-section -->
    </div>
    <!-- .container -->
</section>