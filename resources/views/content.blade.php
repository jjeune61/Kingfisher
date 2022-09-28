@extends('layout.app')
@section('content')
<section id="entity_section" class="entity_section">
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="entity_wrapper">
    <div class="entity_title">
        <h1><a>{{ $articles->title }}</a></h1>
    </div>
    <!-- entity_title -->

    <div class="entity_meta"><a>{{ date('F j Y', strtotime($articles->created_at)) }}</a>, by: <a>{{ $articles->creator->name }}</a>
    </div>
    <!-- entity_meta -->
    <div class="entity_thumb">
        <img class="img-responsive" src="{{ asset('/article') }}/{{ $articles->main_image }}" alt="{{ $articles->title }} image">
    </div>
    <!-- entity_thumb -->

    <div class="entity_content">
        <p>
            {{$articles->short_description}}
        </p><hr>

        <p>
            {!! $articles->description !!}
        </p>
    </div>
    <!-- entity_content -->

    <div class="entity_footer">
        <div class="entity_tag">
            <span class="blank"><a href="#">Tech</a></span>
            <span class="blank"><a href="#">Transport</a></span>
            <span class="blank"><a href="#">Mobile</a></span>
            <span class="blank"><a href="#">Gadgets</a></span>
        </div>
        <!-- entity_tag -->
        <div class="entity_social">
            <span><i class="fa fa-heart" aria-hidden="true"></i><a href="{{ url('liked/' .$articles->id)}}" class="text-danger">{{$like}} Like</a> </span>
            <span><i class="fa fa-share-alt"></i>424 <a href="#">Shares</a> </span>
            <span><i class="fa fa-comments-o"></i>4 <a href="#">Comments</a> </span>
        </div>
        <!-- entity_social -->

    </div>
    <!-- entity_footer -->

</div>
<!-- entity_wrapper -->

<div class="related_news">
    <div class="entity_inner__title header_purple">
        <h2><a href="{{ url('/articles') }}/{{ $articles->category_id }}">Related Articles</a></h2>
    </div>
    <!-- entity_title -->

    <div class="row">
        @foreach ($related_articles as $related)
        <div class="col-md-6">
            <div class="media">
                <div class="media-left">
                    <a href="{{ url('/content') }}/{{ $related->slug }}">
                        <img class="media-object" src="{{ asset('article/') }}/{{ $related->list_image }}"alt="{{ $related->title }} image">
                    </a>
                </div>
                <div class="media-body">
                    <span class="tag purple"><a href="{{ url('/articles') }}/{{ $related->category_id }}" target="_self">{{ $related->category->name }}</a></span>

                    <h3 class="media-heading">
                        <a href="{{ url('/content') }}/{{ $related->slug }}" target="_self">{{ $related->title }}</a>
                    </h3>
                    <span class="media-date"><a>{{ date('F j Y', strtotime($articles->created_at)) }}</a>, by: <a>{{ $articles->creator->name }}</a></span>

                    <div class="media_social">
                        <span><a><i class="fa fa-eye"></i>{{ $related->view_count }}</a> Views</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Related news -->

<div class="widget_advertisement">
    <img class="img-responsive" src="assets/img/category_advertisement.jpg" alt="feature-top">
</div>
<!--Advertisement-->


<div class="widget_advertisement">
    <img class="img-responsive" src="assets/img/category_advertisement.jpg" alt="feature-top">
</div>
<!--Advertisement-->
</div>
<!--Left Section-->

<div class="col-md-4">
    <div class="widget">
        <div class="widget_title widget_black">
            <h2><a href="#">Popular News</a></h2>
        </div>
        @foreach ($shareData['popular'] as $popular)
            <div class="media">
                <div class="media-left">
                    <a href="{{ '/content' }}/{{ $popular->slug }}"><img class="media-object" src="{{ asset('article/') }}/{{ $popular->list_image }}" alt="{{ $popular->title }} image"></a>
                </div>
                <div class="media-body">
                    <h3 class="media-heading">
                        <a href="{{ '/content' }}/{{ $popular->slug }}" >{{ str_limit($popular->title, 20, '...') }}</a>
                    </h3> <span class="media-date"><a>{{ date('F j Y', strtotime($popular->created_at)) }}</a>
                    <br>by: <a>{{ $popular->creator->name }}</a></span>
                    <div class="widget_article_social">
                        <span>
                            Total Views: <a> {{ $popular->view_count }}</a>
                        </span> 
                    </div>
                </div>
            </div>
        @endforeach
        <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
    </div>
    <!-- Popular News -->

<div class="widget hidden-xs m30">
    <img class="img-responsive adv_img" src="assets/img/right_add1.jpg" alt="add_one">
    <img class="img-responsive adv_img" src="assets/img/right_add2.jpg" alt="add_one">
    <img class="img-responsive adv_img" src="assets/img/right_add3.jpg" alt="add_one">
    <img class="img-responsive adv_img" src="assets/img/right_add4.jpg" alt="add_one">
</div>
<!-- Advertisement -->
</div>
<!--Right Section-->
</div>
<!-- row -->
</div>
<!-- container -->
</section>
<!-- Entity Section Wrapper -->
@endsection