{{-- Navbar for minimize responsive--}}
<div class="uc-mobile-menu uc-mobile-menu-effect">
    <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas"
            id="uc-mobile-menu-close-btn">&times;</button>
    <div>
        <div>
            <ul id="menu">
                <li><a href="{{ route('landing') }}">Home</a></li>
                <li class="dropdown m-menu-fw"><a href="{{ route('articles') }}" data-toggle="dropdown" class="dropdown-toggle">Articles
                    <span><i class="fa fa-angle-down"></i></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="m-menu-content">
                                <ul class="col-sm-3">
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
    </div>
</div>
<!-- .uc-mobile-menu -->