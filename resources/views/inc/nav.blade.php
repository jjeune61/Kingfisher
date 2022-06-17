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
                                <li> / </li>
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
                        <!-- Language Section -->
                        <!-- Search Section -->
                    </div>
                    <!-- Right Header Section -->
                </div>
            </div>
        <!-- Header Section -->
            <div class="row">
                <div class="navigation-section">
                    <nav class="navbar m-menu navbar-default">
                        <div class="container">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="text-center">
                                <ul class="nav navbar-nav main-nav">
                                    <li><a href="{{ route('landing') }}">Home</a></li>
                                    <li><a href="{{ route('articles') }}">Articles</a></li>
                                    @auth
                                    <li><a href="{{ route('comments') }}">Comment Section</a></li>
                                    @endauth
                                </ul>
                            </div>
                        </div>
                        <!-- .container -->
                    </nav>
                    <!-- .nav -->
                </div>
        </div>
        <!-- .navigation-section -->
    </div>
    <!-- .container -->
</section>
<!-- header_section_wrapper -->