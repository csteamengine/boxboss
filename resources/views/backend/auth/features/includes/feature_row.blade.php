<tr>
    <td>{{ ucwords($feature->name) }}</td>
    <td class="text-center">
        <label class="switch switch-success m-0 pb-0 pt-1">
            <input type="checkbox" class="switch-input" data-id="{{$feature->id}}" data-url="{{route('admin.auth.features.toggle', $feature->id)}}" id="customSwitch{{$feature->id}}" {{$feature->is_active ? "checked" : ""}}>
            <span class="switch-slider"></span>
        </label>
    </td>
    <td>@include('backend.auth.features.includes.actions', ['item' => $feature])</td>
</tr>
