<div class="table-responsive">
    <table id="staffTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>@lang('labels.backend.boxes.user.name')</th>
            <th>@lang('labels.backend.boxes.user.email')</th>
            <th>@lang('labels.backend.boxes.user.role')</th>
            <th>@lang('labels.general.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($staff as $user)
            @if($user->id != $logged_in_user->id)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->getBoxPermissions($box)}}</td>
                    <td>
                        TODO
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
