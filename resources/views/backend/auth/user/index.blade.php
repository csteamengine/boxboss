@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@push('after-styles')
    {!! style('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css') !!}
    {!! style('https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css') !!}
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.users.management') }} <small class="text-muted">{{ __('labels.backend.access.users.active') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.auth.user.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped" id="usersTable">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.access.users.table.last_name')</th>
                            <th>@lang('labels.backend.access.users.table.first_name')</th>
                            <th>@lang('labels.backend.access.users.table.email')</th>
                            <th>@lang('labels.backend.access.users.table.confirmed')</th>
                            <th>@lang('labels.backend.access.users.table.roles')</th>
                            <th>@lang('labels.backend.access.users.table.other_permissions')</th>
                            <th>@lang('labels.backend.access.users.table.social')</th>
                            <th>@lang('labels.backend.access.users.table.last_updated')</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>@include('backend.auth.user.includes.confirm', ['user' => $user])</td>
                                <td>{{ $user->roles_label }}</td>
                                <td>{{ $user->permissions_label }}</td>
                                <td>@include('backend.auth.user.includes.social-buttons', ['user' => $user])</td>
                                <td>{{ $user->updated_at->diffForHumans() }}</td>
                                <td>@include('backend.auth.user.includes.actions', ['user' => $user])</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection

@push('after-scripts')
    {!! script('https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js') !!}
    {!! script('https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js') !!}
    <script>
        $('#usersTable').DataTable();
    </script>
@endpush
