<tr>
    <td>{{ ucwords($box->name) }}</td>
    <td>{{$box->permissions}}</td>
    <td>{{$box->short_description}}</td>
    <td>@include('backend.boxes.includes.actions', ['item' => $box])</td>
</tr>
