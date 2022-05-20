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
                            <h3 class="text-center">Roles</h3>
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
                        {{ Form::model($role, ['route' => ['role-update', $role->id],'method'=>'put']) }} 

                            <div class="form-group">
                                {{Form::label('name', 'Name', ['class' => 'control-label mb-1'])}}
                                {{Form::text('name', $role->name,['class'=>'form-control', 'id'=>'name','placeholder'=>'name'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('display_name', 'Display Name', ['class' => 'control-label mb-1'])}}
                                {{Form::text('display_name', $role->display_name,['class'=>'form-control', 'id'=>'display_name', 'placeholder'=>'display_name'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('description', 'Description', ['class' => 'control-label mb-1'])}}
                                {{Form::textarea('description', $role->description,['class'=>'form-control', 'id'=>'description','placeholder'=>'description'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('permission', 'Permission', array('class'=>'control-label mb-1'))}}
                                {{ Form::select('permission[]', $permission, $selectedPermission, ['class'=>'myselect', 'data-placeholder'=>'Select Permission(s)']) }}
                            </div>
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Update</span>
                                    <span id="payment-button-sending" style="display:none;">Updating…</span>
                                </button>
                            </div>
                        
                        {{  Form::close()  }}
                    </div>
                </div>
            </div>
        </div> <!-- .card -->
    </div>
</div>
@endsection