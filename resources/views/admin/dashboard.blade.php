@extends('admin.layout.app')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    
</div>

<div class="content mt-3">

    {{-- <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
          <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div> --}}
{{-- message alert --}}

   
    <div class="col-xl-6 col-lg-6 text-center">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-user text-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Accounts</div>
                        <div class="stat-digit">{{ $users }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-6 text-center">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-book text-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Articles</div>
                        <div class="stat-digit">{{ $articles }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-6 col-lg-6 text-center">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-layout-grid2 text-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Categories</div>
                        <div class="stat-digit">{{ $categories }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-6 text-center">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-comment-alt text-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Forums</div>
                        <div class="stat-digit">{{$comments}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col text-center">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-eye text-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Article Views</div>
                        <div class="stat-digit">{{ $articleviews }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection