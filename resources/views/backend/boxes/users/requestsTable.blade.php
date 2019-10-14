<div class="table-responsive">
    <table id="membershipTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>@lang('labels.backend.boxes.user.name')</th>
            <th>@lang('labels.backend.boxes.user.email')</th>
            <th>@lang('labels.general.actions')</th>
        </tr>
        </thead>
        <tbody>
            @foreach($requests as $request)
                <tr>
                    <td>{{$request->user()->name}}</td>
                    <td>{{$request->user()->email}}</td>
                    <td>
                        @include('backend.boxes.manage.request-actions', ['request' => $request])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
