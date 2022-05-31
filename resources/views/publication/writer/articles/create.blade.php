@extends('publication.writer.layout.app')
@section('content')

<script src="{{ asset('back/assets/js/lib/chosen/chosen.jquery.min.js') }}">
<script src="{{ asset('back/assets/js/lib/chosen/chosen.jquery.js') }}">
<link rel="stylesheet" href="{{ asset('back/assets/css/lib/chosen/chosen.min.css') }}">
<link rel="stylesheet" href="{{ asset('back/assets/css/lib/chosen/chosen.css') }}">

<script>
    jQuery (document).ready(function(){
        jQuery (".myselect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Create</strong>
            </div>
            <div class="card-body">
                <div id="pay-invoice">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">Article</h3>
                        </div>
                        @if(count($errors)>0)
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <hr>
                        {!! Form::open(['url' => 'publication/writer/articles/store', 'method'=>'post']) !!}
                            <div class="form-group">
                                {{Form::label('title', 'Title', ['class' => 'control-label mb-1'])}}
                                {{Form::text('title', '',['class'=>'form-control', 'id'=>'title'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('category', 'Category', ['class' => 'control-label mb-1'])}}
                                {{ Form::select('category_id', $categories, null, ['class'=>'form-control myselect', 'placeholder'=>'Select Category']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('short_description', 'Short Description', ['class' => 'control-label mb-1'])}}
                                {{Form::textarea('short_description', '',['class'=>'form-control', 'id'=>'short_description'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('description', 'Description', ['class' => 'control-label mb-1'])}}
                                {{Form::textarea('description', '',['class'=>'form-control', 'id'=>'article-ckeditor'])}}
                            </div>
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Submit</span>
                                    <span id="payment-button-sending" style="display:none;">Creating…</span>
                                </button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div> <!-- .card -->
    </div>
</div>
@endsection