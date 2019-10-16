<div class="table-responsive">
    <table id="membersTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>@lang('labels.backend.boxes.user.name')</th>
            <th>@lang('labels.backend.boxes.user.email')</th>
            <th>@lang('labels.backend.boxes.user.role')</th>
            <th>@lang('labels.general.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($members as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->getBoxPermissions($box)}}</td>
                <td>
                    @include('backend.boxes.manage.member-actions', ['user' => $user])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
