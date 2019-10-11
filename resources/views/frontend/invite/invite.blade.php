{{$invite}}


<form action="{{route('frontend.invite.accept', $invite)}}" method="POST">
    @csrf
    <input class="btn btn-success" type="submit" value="Accept">
</form>


<form action="{{route('frontend.invite.decline', $invite)}}" method="POST">
    @csrf
    <input class="btn btn-outline-danger" type="submit" value="Decline">
</form>


