    {{-- categorie --}}
    <div class="navigation-section">
        <nav class="navbar m-menu navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="text-center">
                    <ul class="nav navbar-nav main-nav">
                        <li><a href="{{ url('/articles') }}">General</a></li>
                        @forelse ($shareData['categories'] as $category)
                        <li><a href="{{ url('/articles') }}/{{ $category->id }}">{{ $category->name }}</a></li>
                        @empty
                        <li>No categories</li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <!-- .container -->
        </nav>
        <!-- .nav -->
    </div>