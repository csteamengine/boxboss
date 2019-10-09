<tr>
    <td>{{ ucwords($box->name) }}</td>
    <td class="text-center">
        <label class="switch switch-success m-0 pb-0 pt-1">
            <input type="checkbox" class="switch-input" data-id="{{$box->id}}" data-url="{{route('admin.auth.features.toggle', $box->id)}}" id="customSwitch{{$box->id}}" {{$box->is_active ? "checked" : ""}}>
            <span class="switch-slider"></span>
        </label>
    </td>
    <td>@include('backend.boxes.includes.actions', ['item' => $box])</td>
</tr>
