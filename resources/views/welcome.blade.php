@extends('layout.app')
@section('content')
<section id="feature_news_section" class="feature_news_section">
    
    <div class="container">
        <div class="row">
            <div class="article_title header_black">
                <h2><a>Featured</a></h2>
            </div>
            <div class="col-md-7" style="margin-bottom: 3%">
                <div class="feature_article_wrapper">
                    @forelse ($featured as $featured)
                    <div class="feature_article_img">
                        
                        <a href="{{ url('/content') }}/{{ $featured->slug }}" target="_self"><img class="img-responsive top_static_article_img" 
                            src="{{ asset('article/') }}/{{ $featured->main_image }}"
                            alt="{{ $featured->title }} image">
                        </a>
                        
                    </div>
                    <!-- feature_article_img -->
                    <div class="feature_article_inner">
                        <div class="tag_lg red"><a>{{ $featured->category->name }}</a></div>
                        <div class="feature_article_title">
                            <h1><a href="{{ url('/content') }}/{{ $featured->slug }}" target="_self">{{ str_limit($featured->title, 25, '...') }}</a></h1>
                        </div>
                        <!-- feature_article_title -->

                        <div class="feature_article_date"><a target="_self">{{ $featured->creator->name }}</a>,
                            <a target="_self">{{ date('F j Y', strtotime($featured->created_at)) }}</a></div>
                        <!-- feature_article_date -->

                        <div class="feature_article_content">
                            {{ str_limit($featured->short_description, 50, '...') }}
                        </div>
                        <!-- feature_article_content -->
                        @empty
                            <h1>No Featured Post</h1>
                        @endforelse
                    </div>
                    <!-- feature_article_inner -->

                </div>
                <!-- feature_article_wrapper -->
            </div>
            <!-- col-md-7 -->

            @foreach ( $top_viewed as $popular)
            <div class="col-md-5" style="margin-bottom: 3%">
                <div class="feature_static_wrapper">
                    <div class="feature_article_img">
                        <a href="{{ url('/content') }}/{{ $popular->slug }}" target="_self">
                            <img class="img-responsive" src="{{ asset('article/') }}/{{ $popular->main_image }}" alt="{{ $popular->title }} image">
                        </a>
                        
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="tag_lg red"><a href="category.html">{{ $popular->category->name }}</a></div>
                        <div class="feature_article_title">
                            <h1><a href="{{ url('/content') }}/{{ $popular->slug }}" target="_self">{{ str_limit($popular->title, 25, '...') }}</a></h1>
                        </div>
                        <!-- feature_article_title -->

                        <div class="feature_article_date"><a target="_self">{{ $popular->creator->name }}</a>,
                        <a target="_self"></a>{{ date('F j Y', strtotime($popular->created_at)) }}</div>
                        <!-- feature_article_date -->

                        <div class="feature_article_content">
                            {{ str_limit($popular->short_description, 50, '...') }}
                        </div>
                        <!-- feature_article_content -->
                        <!-- article_social -->

                    </div>
                    <!-- feature_article_inner -->

                </div>
                <!-- feature_static_wrapper -->

            </div>
            <!-- col-md-5 -->
            @endforeach
        </div>
        <!-- Row -->

    </div>
    <!-- container -->

</section>
<!-- Feature News Section -->

<section id="category_section" class="category_section">
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="category_section mobile">
    <div class="article_title header_purple">
        <h2><a href="{{ url('/articles') }}" target="_self">Latest</a></h2>
    </div>
    <!----article_title------>
    @foreach ($latest_article as $latest)
    <div class="category_article_wrapper">
        <div class="row">
            <div class="col-md-6">
                <div class="top_article_img">
                    <a href="{{ url('/content') }}/{{ $latest->slug }}" target="_self"><img class="img-responsive"
                        src="{{ asset('article/') }}/{{ $latest->thumb_image }}" alt="{{ $latest->title }} image">
                    </a>
                </div>
                <!----top_article_img------>
            </div>
            <div class="col-md-6">
                <span class="tag purple">{{ $latest->category->name }}</span>
                <div class="category_article_title">
                    <h2><a href="{{ url('/content') }}/{{ $latest->slug }}" target="_self">{{ str_limit($latest->title, 25, '...') }}</a></h2>
                </div>
                <!----category_article_title------>
                <br>
                <div class="category_article_date">{{ date('F j Y', strtotime($latest->created_at)) }}</a>, 
                    by: <a>{{ $latest->creator->name }}</a></div>
                <!----category_article_date------>
                <div class="category_article_content">
                    {{ str_limit($latest->short_description, 50, '...') }}
                </div>
                <!----category_article_content------>
            </div>
        </div>
    </div>
    @endforeach
    <p class="divider"><a href="#">More News&nbsp;&raquo;</a></p>
</div>
<!-- Mobile News Section -->
</div>
<!-- Left Section -->

<div class="col-md-4">
<div class="widget">
    <div class="widget_title widget_black">
        <h2><a>Popular News</a></h2>
    </div>
    @foreach ($shareData['popular'] as $popular)
        <div class="media">
            <div class="media-left">
                <a href="{{ '/content' }}/{{ $popular->slug }}"><img class="media-object" src="{{ asset('article/') }}/{{ $popular->list_image }}" alt="{{ $popular->title }} image"></a>
            </div>
            <div class="media-body">
                <h3 class="media-heading">
                    <a href="{{ '/content' }}/{{ $popular->slug }}" target="_self">{{ str_limit($popular->title, 20, '...') }}</a>
                </h3> <span class="media-date"><a>{{ date('F j Y', strtotime($popular->created_at)) }}</a>
                <br>by: <a>{{ $popular->creator->name }}</a></span>
                <div class="widget_article_social">
                    <span>
                        Total Views: <a target="_self"> {{ $popular->view_count }}</a>
                    </span> 
                </div>
            </div>
        </div>
    @endforeach
    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
</div>
<!-- Popular News -->

{{-- <div class="widget hidden-xs m30">
    <img class="img-responsive adv_img" src="{{ asset('front/img/right_add1.jpg') }}" alt="add_one">
    <img class="img-responsive adv_img" src="{{ asset('front/img/right_add2.jpg') }}" alt="add_one">
    <img class="img-responsive adv_img" src="{{ asset('front/img/right_add3.jpg') }}" alt="add_one">
    <img class="img-responsive adv_img" src="{{ asset('front/img/right_add4.jpg') }}" alt="add_one">
</div>

<div class="widget hidden-xs m30">
    <img class="img-responsive widget_img" src="{{ asset('front/img/right_add5.jpg') }}" alt="add_one">
</div> --}}
<!-- Advertisement -->


</div>
<!-- Right Section -->

</div>
<!-- Row -->

</div>
<!-- Container -->

</section>
<!-- Category News Section -->


@endsection