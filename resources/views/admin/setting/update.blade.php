@extends('admin.layout.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Settings</strong>
            </div>
            <div class="card-body">
                <div id="pay-invoice">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">System settings</h3>
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
                        {{ Form::open(['url' => '/admin/settings/update','method'=>'put', 'enctype'=>'multipart/form-data']) }} 

                            <div class="form-group">
                                {{  Form::label('name', 'System Name', array('class' => 'control-label mb-1'))   }}
                                {{  Form::text('name', $system_name,['class'=>'form-control', 'id'=>'name'])  }}
                            </div>
                            <div class="form-group">
                                {{Form::label('favicon', 'Favicon', ['class' => 'control-label mb-1'])}}
                                {{Form::file('favicon',['class'=>'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('web_logo', 'Website Logo', ['class' => 'control-label mb-1'])}}
                                {{Form::file('web_logo',['class'=>'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('admin_logo', 'Admin Logo', ['class' => 'control-label mb-1'])}}
                                {{Form::file('admin_logo',['class'=>'form-control'])}}
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