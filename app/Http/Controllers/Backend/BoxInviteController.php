<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoxInviteController extends Controller
{
    public function sendInvite(Request $request){
        //TODO Check if user exists by email
        //TODO Check if user is already in the role that was requested
        //TODO If user exists, generate a token
        //TODO Add token to database with user
        //TODO generate email to send to user
        //TODO Email will contain a link and will tell the user which role they were invited to be
        //TODO e.g. http://homestead.wodboss/password/reset/6fa170c739bbcb3c4747dfd1f5c571efd1ee82a502d21d31d6474bb7ef0dd215
    }

    public function viewInvite($token = null){
        //TODO when user clicks the link in the email they get taken to the view page
        //TODO since the link has a token, it will get passed to this function, can't be null
        //TODO this function will check if token is valid, not expired, and hasn't been accepted
        //TODO the token will get passed to the view and will be in the form as a hidden input
        //TODO role that the user was invited to will be sent as well.

    }

    public function acceptInvite(Request $request){
        //TODO check if token is valid, user isn't already in role
        //TODO handle accept/decline
        //TODO If its users first time with admin priviledges take them to welcome page
        //TODO otherwise, take them to the admin page
    }
}
