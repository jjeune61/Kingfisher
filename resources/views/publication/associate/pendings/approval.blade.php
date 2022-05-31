@extends('publication.associate.layout.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Continue Work</strong>
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
                        {{ Form::model($article, ['route' => ['associatePending-approve', $article->id],'method'=>'put']) }} 
                            <div class="form-group">
                                {{Form::label('title', 'Title', ['class' => 'control-label mb-1'])}}
                                {{Form::text('title', $article->title,['class'=>'form-control', 'id'=>'title'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('category', 'Category', ['class' => 'control-label mb-1'])}}
                                {{ Form::select('category_id', $categories, $article->category_id, ['class'=>'form-control myselect', 'data-placeholder'=>'Select Category']) }}

                            </div>
                            <div class="form-group">
                                {{Form::label('short_description', 'Short Description', ['class' => 'control-label mb-1'])}}
                                {{Form::textarea('short_description', $article->short_description,['class'=>'form-control', 'id'=>'short_description'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('description', 'Description', ['class' => 'control-label mb-1'])}}
                                {{Form::textarea('description', $article->description,['class'=>'form-control', 'id'=>'article-ckeditor'])}}
                            </div>
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Approve</span>
                                    <span id="payment-button-sending" style="display:none;">Approving...</span>
                                </button>
                            </div>
                        
                        {{  Form::close()  }}

                        {{ Form::model($article, ['route' => ['associatePending-disapprove', $article->id],'method'=>'post']) }} 
                        {{Form::submit('Disapprove',['class'=>'btn btn-danger btn-block', 'id'=>'payment-button'])}}
                        {{  Form::close()  }}
                    </div>
                </div>
            </div>
        </div> <!-- .card -->
    </div>
</div>
@endsection