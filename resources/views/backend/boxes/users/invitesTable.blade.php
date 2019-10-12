<div class="table-responsive">
    <table id="invitesTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>@lang('labels.backend.boxes.user.email')</th>
            <th>@lang('labels.backend.boxes.user.expires')</th>
            <th>@lang('labels.backend.boxes.user.role')</th>
            <th>@lang('labels.general.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($invites as $invite)
            <tr>
                <td>{{$invite->email}}</td>
                <td>{{$invite->expires}}</td>
                <td>@lang('labels.backend.access.roles.names.'.$invite->role)</td>
                <td>
                    TODO
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
