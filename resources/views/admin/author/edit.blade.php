@extends('admin.layout.app')
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
                <strong class="card-title">Update</strong>
            </div>
            <div class="card-body">
                <div id="pay-invoice">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">User infromation Update</h3>
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
                        {{ Form::model($author, ['route' => ['author-update', $author->id],'method'=>'put']) }} 

                        <div class="form-group">
                            {{Form::label('name', 'Name', ['class' => 'control-label mb-1'])}}
                            {{Form::text('name', $author->name,['class'=>'form-control', 'id'=>'name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('email', 'Email', ['class' => 'control-label mb-1'])}}
                            {{Form::text('email',$author->email ,['class'=>'form-control', 'id'=>'email'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('password', 'Password', ['class' => 'control-label mb-1'])}}
                        {{-- {{Form::password('password', ['class'=>'form-control', 'id'=>'password'])}} --}} {{-- cant output password --}}
                            {{Form::input('password', 'password', $author->password,['class'=>'form-control', 'id'=>'password'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('userTypes', 'User Type', array('class'=>'control-label mb-1'))}}
                            {{ Form::select('userTypes', $userTypes, $author->user_type, ['class'=>'myselect', 'data-placeholder'=>'Select User Type']) }}
                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Update</span>
                            </button>
                        </div>

                        {{  Form::close()  }}
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection