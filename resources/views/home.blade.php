@extends('layouts.backend.master')


@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('content')
    @if (auth()->user()->hasRole('User'))
        @include('student_home')
    @else
        @include('admin_home')
    @endif
@endsection

@section('script')
    <script src="{{ asset('jambasangsang/backend/vendors/chart.js/dist/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('jambasangsang/backend/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('jambasangsang/backend/assets/js/widgets.js') }}"></script>
    <script src="{{ asset('jambasangsang/backend/vendors/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('jambasangsang/backend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('jambasangsang/backend/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
@endsection
