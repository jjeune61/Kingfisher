@extends('admin.layout.app')
@section('content')

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
                            <h3 class="text-center">Permissions</h3>
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
                        {{ Form::model($permission, ['route' => ['permission-update', $permission->id],'method'=>'put']) }} 

                            <div class="form-group">
                                {{Form::label('name', 'Name', ['class' => 'control-label mb-1'])}}
                                {{Form::text('name', $permission->name,['class'=>'form-control', 'id'=>'name','placeholder'=>'name'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('display_name', 'Display Name', ['class' => 'control-label mb-1'])}}
                                {{Form::text('display_name', $permission->display_name,['class'=>'form-control', 'id'=>'display_name', 'placeholder'=>'display_name'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('description', 'Description', ['class' => 'control-label mb-1'])}}
                                {{Form::textarea('description', $permission->description,['class'=>'form-control', 'id'=>'description','placeholder'=>'description'])}}
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