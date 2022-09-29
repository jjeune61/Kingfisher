@extends('layout.app')
@section('content')

<div class="container">
    <div class="category_article_wrapper">
        @forelse ($search as $searches)
        <div class="row">
            <div class="col-md-6">
                <div class="top_article_img">
                    <a href="{{ url('/content') }}/{{ $searches->slug }}" target="_self">
                    <img class="img-responsive" src="{{ asset('article/') }}/{{ $searches->thumb_image }}" alt="{{ $searches->title }} image">
                    </a>
                </div>
                <!----article_img------>
            </div>
            <div class="col-md-6">
                <span class="tag green">{{ $searches->category->name }}</span>
                <div class="category_article_title">
                    <h2><a href="{{ url('/content') }}/{{ $searches->slug }}" target="_self">{{ str_limit($searches->title, 25, '...') }}</a></h2>
                </div>
                <!----category_article_title------>
                <div class="category_article_date"><a href="#">{{ date('F j Y', strtotime($searches->created_at)) }}</a>, by: <a href="#">{{ $searches->creator->name }}</a></div>
                <!----category_article_date------>
                <div class="category_article_content">
                    {{ str_limit($searches->short_description, 50, '...') }}
                </div>
                <!----category_article_content------>
                <div class="media_social">
                    <span><a>{{ $searches->view_count }}</a> Views</span>
                    <span><a>4</a> Comments</span>
                </div>
                <!----media_social------>
            </div>
        </div>
        @empty
            <h1>No result found</h1>
        @endforelse
    </div>
    {{ $search->links() }}
</div>

@endsection