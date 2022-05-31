    {{-- categorie --}}
    <div class="navigation-section">
        <div class="container">
        <ul class="nav navbar-nav main-nav text-uppercase text-center font-weight-bold">
                <li><a href="{{ url('/articles') }}">General</a></li>
            @forelse ($shareData['categories'] as $category)
                <li><a href="{{ url('/articles') }}/{{ $category->id }}">{{ $category->name }}</a></li>
            @empty
                <li>No categories</li>
            @endforelse
        </ul>
    </div>
    </div>