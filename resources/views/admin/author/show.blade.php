@extends('admin.layout.app')
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
                        <h1>Users</h1>
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
                              <strong class="card-title">Users Table</strong>
                              <a href="{{ url('/admin/authors/create') }}" class="btn btn-primary pull-right">
                                Create
                              </a>
                          </div>
                          <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                              <thead>
                                <tr >
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Status</th>
                                  <th>Type</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($authors as $i=>$author)
                                <tr>
                                  <td>{{ ++$i }}</td>
                                  <td>{{ $author->name }}</td>
                                  <td>{{ $author->email }}</td>
                                  <td class="text-center">
                                    {{ Form::open(['method'=>'put','url'=>['/admin/authors/status/'. $author->id],'style'=>'display:inline']) }}
                                        @if ($author->status === 1)
                                            {{ Form::submit('Deactivate', ['class'=>'btn btn-danger']) }}
                                            @else
                                            {{ Form::submit('Activate', ['class'=>'btn btn-success']) }}
                                        @endif
                                        {{ Form::close() }}
                                  </td>
                                  <td>
                                    @if($author->user_type === 1)
                                      Admin
                                    @elseif ($author->user_type === 2)
                                      Student
                                    @elseif ($author->user_type === 3)
                                      Writer
                                    @elseif ($author->user_type === 4)
                                      Section Editor
                                    @elseif ($author->user_type === 5)
                                      Creatives Editor
                                    @elseif ($author->user_type === 6)
                                      Associate Editor	
                                    @elseif ($author->user_type === 7)
                                      Editor in Chief
                                    @else
                                      {{ $author->user_type }}
                                    @endif
                                  </td>
                                  <td class="text-center">
                                    <a href="{{ url('/admin/authors/edit/'.$author->id) }}" class="btn btn-primary">Edit</a>

                                    {{ Form::open(['method'=>'delete','url'=>['/admin/authors/delete/'. $author->id], 
                                      'style'=>'display:inline']) }}
                                    {{ Form::submit('delete', ['class'=>'btn btn-danger']) }}
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
    {{-- <script src="{{ asset('back/assets/js/vendor/jquery-2.1.4.min.js') }}"></script> --}}
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
