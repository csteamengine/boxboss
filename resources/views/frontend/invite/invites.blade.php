@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    @if($invites->count() == 0)
        No Invites
    @else
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Box</th>
                <th scope="col">Role</th>
                <th scope="col">Expires</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invites as $invite)
                <tr>
                    <td>{{$invite->box()->first()->name}}</td>
                    <td>{{$invite->role}}</td>
                    <td>{{$invite->expires}}</td>
                    <td>
                        <div class="row">
                            {{ html()->modelForm($invite, "POST", route('frontend.invites.accept'))->class('form-horizontal')->open() }}
                            {{html()->hidden('token', $invite->token)}}
                            {{html()->hidden('invite_id', $invite->id)}}
                            {{--                TODO add accept button--}}
                            {{ form_submit('Accept', ['btn btn-success']) }}
                            {{ html()->closeModelForm()}}

                            {{ html()->modelForm($invite, "POST", route('frontend.invites.decline'))->class('form-horizontal')->open() }}
                            {{html()->hidden('token', $invite->token)}}
                            {{html()->hidden('invite_id', $invite->id)}}
                            {{--                TODO add accept button--}}
                            {{ form_submit('Decline', ['btn btn-danger']) }}
                            {{ html()->closeModelForm()}}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
