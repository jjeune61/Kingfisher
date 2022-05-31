@extends('publication.writer.layout.app')
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
                        <h1>Drafts</h1>
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
                              <strong class="card-title">Drafts Table</strong>
                          </div>
                          <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Title</th>
                                  <th>Author</th>
                                  <th>Category</th>
                                  <th>Publication Status</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @forelse ($drafts as $i=>$draft)
                                  <tr>
                                  <td>{{ ++$i }}</td>
                                  <td>{{ $draft->title }}</td>
                                  <td>{{ $draft->creator->name }}</td>
                                  <td>{{ $draft->category->name}}</td>
                                  <td>{{ $draft->publication_status}}</td>
                                  <td><a href="{{ url('/publication/writer/drafts/edit/'.$draft->id) }}" class="btn btn-primary">View</a></td>
                                </tr>
                                @empty
                                <tr>
                                    <p>no drafts...</p>
                                </tr>
                                @endforelse
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
