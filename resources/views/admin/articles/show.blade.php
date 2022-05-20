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
                        <h1>Articles</h1>
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
                              <strong class="card-title">Articles Table</strong>
                              <a href="{{ url('/admin/articles/create') }}" class="btn btn-primary pull-right">
                                Create
                              </a>
                          </div>
                          <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Image</th>
                                  <th>Title</th>
                                  <th>Author</th>
                                  <th>Category</th>
                                  <th>Total View</th>
                                  <th>Status</th>
                                  <th>is_Featured</th>
                                  <th>Options</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($articles as $i=>$article)
                                <tr>
                                  <td>{{ ++$i }}</td>
                                  <td>
                                    @if(file_exists(public_path('/article/').$article->list_image))
                                    <img src="{{ asset('article') }}/{{ $article->thumb_image }}" class="img img-responsive">

                                    @endif
                                  </td>
                                  <td>{{ $article->title }}</td>
                                  <td>{{ $article->creator->name }}</td>
                                  <td>{{ $article->category->name}}</td>
                                  <td>{{ $article->view_count }}</td>
                                  <td>
                                    {{ Form::open(['method'=>'put','url'=>['/admin/articles/status/'. $article->id], 
                                        'style'=>'display:inline']) }}
                                        @if ($article->status === 1)
                                            {{ Form::submit('Unpublish', ['class'=>'btn btn-danger']) }}
                                            @else
                                            {{ Form::submit('Publish', ['class'=>'btn btn-success']) }}
                                        @endif
                                        {{ Form::close() }}
                                  </td>
                                  <td>
                                    {{ Form::open(['method'=>'put','url'=>['/admin/articles/hot/news/'. $article->id], 
                                        'style'=>'display:inline']) }}
                                        @if ($article->hot_news === 1)
                                            {{ Form::submit('No', ['class'=>'btn btn-danger']) }}
                                            @else
                                            {{ Form::submit('Yes', ['class'=>'btn btn-success']) }}
                                        @endif
                                        {{ Form::close() }}
                                  </td>
                                  <td>
                                    <a href="{{ url('/admin/articles/edit/'.$article->id) }}" class="btn btn-primary">Edit</a>

                                    {{ Form::open(['method'=>'delete','url'=>['/admin/articles/delete/'. $article->id], 
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
