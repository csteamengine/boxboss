<tr>
    <td>{{ ucwords($item->name) }}</td>
    <td>
        <!-- Default checked -->
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" data-id="{{$item->id}}" data-url="{{route('admin.auth.features.toggle', $item->id)}}" id="customSwitch{{$item->id}}" {{$item->is_active ? "checked" : ""}}>
            <label class="custom-control-label" for="customSwitch1"></label>
        </div>
    </td>
    <td>@include('backend.auth.features.includes.actions', ['item' => $item])</td>
</tr>
