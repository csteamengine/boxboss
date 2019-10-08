<tr>
    <td>{{ ucwords($item->name) }}</td>
    <td class="text-center">
        <label class="switch">
            <input type="checkbox" class="custom-control-input" data-id="{{$item->id}}" data-url="{{route('admin.auth.features.toggle', $item->id)}}" id="customSwitch{{$item->id}}" {{$item->is_active ? "checked" : ""}}>
            <span class="slider round"></span>
        </label>
    </td>
    <td>@include('backend.auth.features.includes.actions', ['item' => $item])</td>
</tr>
