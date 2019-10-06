@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

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
                    {{$user->boxesAdmined()->get()}}

                    <h1>All Boxes</h1>
                    {{$user->allBoxes()}}
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
