{{$invite}}
<a href="{{route('frontend.invite.view', $invite->token)}}">Accept Invite</a>

<p>If you are having trouble viewing this email, copy and paste this URL into your browser:</p>
<p>
    <strong>
        {{route('frontend.invite.view', $invite->token)}}
    </strong>
</p>
