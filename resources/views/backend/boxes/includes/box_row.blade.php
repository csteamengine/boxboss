<tr>
    <td>{{ ucwords($box->name) }}</td>
    <td class="text-center">
        @if($box->is_active)
            <i class="fa fa-arrow-circle-up fa-2x text-success"></i>
        @else
            <i class="fa fa-arrow-circle-down fa-2x text-danger"></i>
        @endif
    </td>
    <td>
        @if(sizeof($box->owners))
            {{implode(', ', json_decode($box->owners->pluck('name')))}}
        @else
            None
        @endif
    </td>
    <td>@include('backend.boxes.includes.actions', ['item' => $box])</td>
</tr>
