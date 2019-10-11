@if($invites->count() == 0)
No Invites
@endif

@foreach($invites as $invite)
    <div class="row">
        <h1>{{$invite->box()->first()->name}}</h1>
        <h2>{{$invite->role}}</h2>
        <div class="col-6">
            {{ html()->modelForm($invite, "POST", route('frontend.invites.accept'))->class('form-horizontal')->open() }}
                {{html()->hidden('token', $invite->token)}}
                {{html()->hidden('invite_id', $invite->id)}}
{{--                TODO add accept button--}}
                {{ form_submit('Accept') }}
            {{ html()->closeModelForm()}}
        </div>
        <div class="col-6">
            {{ html()->modelForm($invite, "POST", route('frontend.invites.decline'))->class('form-horizontal')->open() }}
                {{html()->hidden('token', $invite->token)}}
                {{html()->hidden('invite_id', $invite->id)}}
                {{--                TODO add accept button--}}
                {{ form_submit('Decline') }}
            {{ html()->closeModelForm()}}
        </div>
    </div>
@endforeach
