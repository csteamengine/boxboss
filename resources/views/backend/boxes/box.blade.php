@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.boxes.main'))

@push('after-styles')
    {!! style('https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css') !!}
    <link href='/css/fullcalendar/fullcalendar.css' rel='stylesheet' />

@endpush

@section('content')
    @include('backend.boxes.manage.add-staff-modal')
    @include('backend.boxes.manage.add-member-modal')
    <span class="display-4">
        {{$box->name}}
    </span>
    <div class="row d-sm-down-none">
        <div class="col">
            <div class="card-group mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-mail-bulk"></i>
                        </div>
                        <div class="row">
                            <div class="text-value mt-auto mb-auto">{{$box->requests()->count()}}</div>
                            <small class="text-muted text-uppercase font-weight-bold mt-auto mb-auto ml-2">Membership Requests</small>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="row">
                            <div class="text-value mt-auto mb-auto">{{$box->members()->count()}}</div>
                            <small class="text-muted text-uppercase font-weight-bold mt-auto mb-auto ml-2">Members</small>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-user-ninja"></i>
                        </div>
                        <div class="row">
                            <div class="text-value mt-auto mb-auto">{{$box->coaches()->count()}}</div>
                            <small class="text-muted text-uppercase font-weight-bold mt-auto mb-auto ml-2">Coaches</small>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-running"></i>
                        </div>
                        <div class="row">
                            <div class="text-value mt-auto mb-auto">15</div>
                            <small class="text-muted text-uppercase font-weight-bold mt-auto mb-auto ml-2">WOD Submissions</small>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-cash-register"></i>
                        </div>
                        <div class="row">
                            <div class="text-value mt-auto mb-auto">26</div>
                            <small class="text-muted text-uppercase font-weight-bold mt-auto mb-auto ml-2">Sales</small>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--col-->
    </div><!--row-->
    <div class="row d-md-none">
        <div class="col-6 col-sm-3">
            <div class="card">
                <div class="card-body p-3 d-flex align-items-center">
                    <i class="fa fa-envelope-open fa-3x m-auto text-primary"></i>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="card">
                <div class="card-body p-3 d-flex align-items-center">
                    <i class="fa fa-envelope-open fa-3x m-auto text-primary"></i>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="card">
                <div class="card-body p-3 d-flex align-items-center">
                    <i class="fa fa-envelope-open fa-3x m-auto text-primary"></i>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="card">
                <div class="card-body p-3 d-flex align-items-center">
                    <i class="fa fa-envelope-open fa-3x m-auto text-primary"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs" id="boxTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#wods" role="tab" aria-controls="profile" aria-selected="false">WODs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#calendar" role="tab" aria-controls="contact" aria-selected="false">Calendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#members" role="tab" aria-controls="home" aria-selected="true">Members</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#staff" role="tab" aria-controls="home" aria-selected="true">Staff</a>
                </li>
            </ul>
            <div class="tab-content" id="boxTabContent">
                <div class="tab-pane fade show active" id="wods" role="tabpanel" aria-labelledby="profile-tab">
                    WOD Management
                </div>
                <div class="tab-pane fade" id="calendar" role="tabpanel" aria-labelledby="contact-tab">
                    @include('backend.boxes.calendar.calendar')
                </div>
                <div class="tab-pane fade" id="members" role="tabpanel" aria-labelledby="home-tab">
                    @include('backend.boxes.users.members')
                </div>
                <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="home-tab">
                    @include('backend.boxes.staff.staff')
                </div>
            </div>
        </div><!--card-body-->
    </div><!--card-->
@endsection
@push('after-scripts')
    {!! script('https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js') !!}
    {!! script('https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js') !!}
    {!! script(mix('js/backend/boxes/manage.js')) !!}
@endpush
