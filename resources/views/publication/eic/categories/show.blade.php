@extends('publication.eic.layout.app')
@section('content')

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('back/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">


    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

    {{-- content --}}
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Categories</h1>
                    </div>
                </div>
            </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                            @endif

                            <div class="card-header">
                                <strong class="card-title">Category Table</strong>
                                <a href="{{ url('/publication/eic/category/create') }}" class="btn btn-primary pull-right">
                                    Create
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $i=>$category)
                                    <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        {{ Form::open(['method'=>'put','url'=>['/publication/eic/category/status/'. $category->id], 
                                        'style'=>'display:inline']) }}
                                        @if ($category->status === 1)
                                            {{ Form::submit('Unpublish', ['class'=>'btn btn-danger']) }}
                                            @else
                                            {{ Form::submit('Publish', ['class'=>'btn btn-success']) }}
                                        @endif
                                        {{ Form::close() }}
                                    </td>
                                    <td>
                                        <a href="{{ url('/publication/eic/category/edit/'.$category->id) }}" class="btn btn-primary">Edit</a>

                                        {{ Form::open(['method'=>'delete','url'=>['/publication/eic/category/delete/'. $category->id], 
                                        'style'=>'display:inline']) }}
                                        {{ Form::close() }}
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
            </div><!-- .animated -->
        </div><!-- .content -->

    {{-- scripts --}}
    <script src="{{ asset('back/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('back/assets/js/main.js') }}"></script>
    
    <script src="{{ asset('back/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/lib/data-table/pdfmake.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('back/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/lib/data-table/datatables-init.js') }}"></script>
@endsection
