@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.access.roles.management'))

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
                    @lang('labels.backend.access.roles.management')
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.auth.role.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table" id="roleTable">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.access.roles.table.role')</th>
                            <th>@lang('labels.backend.access.roles.table.permissions')</th>
                            <th>@lang('labels.backend.access.roles.table.number_of_users')</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ ucwords($role->name) }}</td>
                                    <td>
                                        @if($role->id === 1)
                                            @lang('labels.general.all')
                                        @else
                                            @if($role->permissions->count())
                                                @foreach($role->permissions as $permission)
                                                    {{ ucwords($permission->name) }}
                                                @endforeach
                                            @else
                                                @lang('labels.general.none')
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{ $role->users->count() }}</td>
                                    <td>@include('backend.auth.role.includes.actions', ['role' => $role])</td>
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
        $('#roleTable').DataTable();
    </script>
@endpush
