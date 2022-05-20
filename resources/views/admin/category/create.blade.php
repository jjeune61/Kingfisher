@extends('admin.layout.app')
@section('content')

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
                            <h3 class="text-center">Category</h3>
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
                        {!! Form::open(['url' => 'admin/category/store', 'method'=>'post']) !!}
                            <div class="form-group">
                                {{Form::label('name', 'Name', ['class' => 'control-label mb-1'])}}
                                {{Form::text('name', '',['class'=>'form-control', 'id'=>'name'])}}
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