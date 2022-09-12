<!DOCTYPE html>
<html>
<head>
    @include('inc.head')
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar">
    <div id="main-wrapper">

    <!-- Page Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>
    <!-- preloader -->

    <div class="uc-mobile-menu-pusher">
        <div class="content-wrapper">
            @include('inc.nav1')
            @yield('content')
            @include('inc.footer')
        </div>
        <!-- #content-wrapper -->
    </div>
    <!-- .offcanvas-pusher -->

        <a href="#" class="crunchify-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
        
        @include('inc.nav2')
        
    </div>
    <!-- #main-wrapper -->
@include('inc.scriptjs')
</body>
</html>