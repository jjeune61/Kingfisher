<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active  menu-title">
                    <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <li>
                    <a href="{{ route('authors') }}"> <i class="menu-icon fa fa-user"></i>Users </a>
                </li>
                <li>
                    <a href="{{ route('article') }}"> <i class="menu-icon fa fa-book"></i>Articles </a>
                </li>
                <li>
                    <a href="{{ route('category') }}"> <i class="menu-icon fa fa-tags"></i>Categories </a>
                </li>
                <li>
                    <a href="{{ route('comment') }}"> <i class="menu-icon fa fa-comments"></i>Comments </a>
                </li>
                <li>
                    <a href="{{ route('roles') }}"> <i class="menu-icon fa fa-users"></i>Roles </a>
                </li>
                <li>
                    <a href="{{ route('permissions') }}"> <i class="menu-icon fa fa-lock"></i>Permissions </a>
                </li>
                <li>
                    <a href="{{ route('audits') }}"> <i class="menu-icon fa fa-lock"></i>Audits </a>
                </li>
                <li>
                    <a href="{{ route('settings') }}"> <i class="menu-icon fa fa-gears"></i>Settings </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
