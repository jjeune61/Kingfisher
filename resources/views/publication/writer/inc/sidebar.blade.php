<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active  menu-title">
                    <a href="{{ route('writerDashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Writer Dashboard </a>
                </li>
                <li>
                    <a href="{{ route('writerArticles') }}"> <i class="menu-icon fa fa-book"></i>My Articles </a>
                </li>
                <li>
                    <a href="{{ route('writerArticleDrafts') }}"> <i class="menu-icon fa fa-book"></i>Drafts</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>