@extends('layout.app')
@section('content')

<section id="entity_section" class="entity_section">
<div class="container">
<div class="row">
<div class="col-md-8">

<div class="entity_title text-center">
        <h1>Comment section</h1>
    </div><hr>
    <!-- entity_title -->

<div class="readers_comment">
    <div class="entity_comments">
        <div class="entity_comment_from">
            {{ Form::open(array('url'=>'/comments', 'method'=>'post')) }} 
                <div class="form-group">
                    {{ Form::text('comment', null, ['class'=>'form-control', 'id'=>'comment', 'placeholder'=>'Add comment...']) }}
                </div>
                <div>
                    <button type="submit" class="btn btn-submit green">Post</button>
                </div>
            {{ Form::close() }}
        </div>
        <!--Entity Comments From -->
    </div>
    <!--Entity Comments -->

    <div class="media">
        @forelse ($comments as $comment)
        <div class="media-body">
            <h2 class="media-heading">{{ $comment->name }}</h2>
            <span class="media-date"><a>{{ date('F, j Y', strtotime($comment->updated_at)) }}</a>
                <br>
                </span>
            {{ $comment->comment }}
        </div><hr>
        @empty
        <div class="media-body">
            No comments...
        </div><hr>
        @endforelse
    </div>
    <!-- media end -->
</div>
<!--Readers Comment-->
{{ $comments->links() }}
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
</div>
<!--Right Section-->
</div>
<!-- row -->
</div>
<!-- container -->
</section>
<!-- Entity Section Wrapper -->
@endsection