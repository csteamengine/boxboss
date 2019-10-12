@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.boxes.main'))

@push('after-styles')
    {!! style('https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css') !!}
@endpush

@section('content')
    @include('backend.boxes.manage.add-user-modal')
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
                        <div class="text-value">15</div>
                        <small class="text-muted text-uppercase font-weight-bold">New Messages</small>
                        <div class="progress progress-xs mt-3 mb-0">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="text-value">350</div>
                        <small class="text-muted text-uppercase font-weight-bold">Members</small>
                        <div class="progress progress-xs mt-3 mb-0">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-user-ninja"></i>
                        </div>
                        <div class="text-value">5</div>
                        <small class="text-muted text-uppercase font-weight-bold">Coaches</small>
                        <div class="progress progress-xs mt-3 mb-0">
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-running"></i>
                        </div>
                        <div class="text-value">15</div>
                        <small class="text-muted text-uppercase font-weight-bold">WOD Submissions</small>
                        <div class="progress progress-xs mt-3 mb-0">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%"
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-4">
                            <i class="fa fa-cash-register"></i>
                        </div>
                        <div class="text-value">26</div>
                        <small class="text-muted text-uppercase font-weight-bold">Products sold</small>
                        <div class="progress progress-xs mt-3 mb-0">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 25%"
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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
        {{--        <div class="card-header"></div>--}}
        <div class="card-body">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#members" role="tab" aria-controls="home" aria-selected="true">Members</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#staff" role="tab" aria-controls="profile" aria-selected="false">Staff</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#invites" role="tab" aria-controls="contact" aria-selected="false">Invites</a>
                </li>
                @if(FeatureFlag::isActive('invite_management'))
                    <div class="col float-right">
                        @include('backend.boxes.manage.box-header-buttons')
                    </div><!--col-->
                @endif
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="members" role="tabpanel" aria-labelledby="home-tab">
                    <div class="col">
                        @include('backend.boxes.includes.membersTable', ['members' => $box->members()->get()])
                    </div>
                </div>
                <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="col">
                        @include('backend.boxes.includes.staffTable', ['staff' => $box->staff()])
                    </div>
                </div>
                <div class="tab-pane fade" id="invites" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="col">
                        @include('backend.boxes.includes.invitesTable', ['invites' => $box->invites()->get()])
                    </div>
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
