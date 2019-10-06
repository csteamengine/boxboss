@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@push('after-styles')
    <!-- Latest compiled and minified CSS -->
    {{style(mix('/css/snapappointments/bootstrap-select.css'))}}
@endpush

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>@lang('strings.backend.dashboard.welcome') {{ $logged_in_user->name }}!</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <h1>Boxes Owned</h1>
                    {{$user->boxesOwned()->get()}}

                    <h1>Boxes Coached at</h1>
                    {{$user->boxesCoached()->get()}}

                    <h1>Boxes as Admin</h1>
                    {{$user->boxesAdmined()}}
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection

@push('after-scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="{{asset('/js/snapappointments/bootstrap-select.min.js')}}"></script>

    <script>
        // To style only selects with the my-select class
        $('.box-select').selectpicker();
    </script>

@endpush
