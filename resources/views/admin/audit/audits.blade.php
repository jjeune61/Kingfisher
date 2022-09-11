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
                        <h1>Audits</h1>
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
                            <strong class="card-title">Audits list</strong>
                        </div>
                        <div class="card-body">
                                <ul>
                                    @forelse ($audits as $audit)
                                    <li>
                                        @lang('article.updated.metadata', $audit->getMetadata())
                                
                                        @foreach ($audit->getModified() as $attribute => $modified)
                                        <ul>
                                            <li>@lang('article.'.$audit->event.'.modified.'.$attribute, $modified)</li>
                                        </ul>
                                        @endforeach
                                    </li>
                                    @empty
                                    <p>@lang('article.unavailable_audits')</p>
                                    @endforelse
                                </ul>
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
