<tr>
    <td>{{ ucwords($box->name) }}</td>
    <td>{{$box->permissions}}</td>
    <td>{{$box->owner->name}}</td>
    <td>@include('backend.boxes.includes.actions', ['item' => $box])</td>
</tr>
