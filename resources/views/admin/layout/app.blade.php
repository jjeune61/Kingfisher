<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    @include('admin.inc.head')
</head>
<body>
    {{-- sidebar --}}
    @include('admin.inc.sidebar')

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        {{-- header --}}
    @include('admin.inc.header')

    @yield('content')

    </div><!-- /#right-panel -->
    {{-- scripts --}}
    @include('admin.inc.scriptjs')
    
    <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>
</body>
</html>
