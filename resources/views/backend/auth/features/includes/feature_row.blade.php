<tr>
    <td>{{ ucwords($item->name) }}</td>
    <td class="text-center">
        <label class="switch switch-success m-0 pb-0 pt-1">
            <input type="checkbox" class="switch-input" data-id="{{$item->id}}" data-url="{{route('admin.auth.features.toggle', $item->id)}}" id="customSwitch{{$item->id}}" {{$item->is_active ? "checked" : ""}}>
            <span class="switch-slider"></span>
        </label>
    </td>
    <td>@include('backend.auth.features.includes.actions', ['item' => $item])</td>
</tr>
