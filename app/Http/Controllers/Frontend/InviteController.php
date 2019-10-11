<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Invite;
use App\Repositories\Backend\InviteRepository;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    /**
     * @var InviteRepository
     */
    protected $inviteRepository;

    /**
     * @param InviteRepository $inviteRepository
     */
    public function __construct(InviteRepository $inviteRepository)
    {
        $this->inviteRepository = $inviteRepository;
    }

    public function view($token = null){
        if(!$token){
            return redirect()->route('frontend.index');
        }

        $invite = $this->inviteRepository->findInviteByToken($token, auth()->user()['email']);

        if(!$invite){
            return redirect()->route('frontend.index')->withFlashWarning('This invite has expired');
        }

        return view('frontend.invite.invite')->withInvite($invite);

        //TODO when user clicks the link in the email they get taken to the view page
        //TODO since the link has a token, it will get passed to this function, can't be null
        //TODO this function will check if token is valid, not expired, and hasn't been accepted
        //TODO the token will get passed to the view and will be in the form as a hidden input
        //TODO role that the user was invited to will be sent as well.
    }

    public function accept(Request $request, Invite $invite){
        //TODO verify the invite belongs to this user
        //TODO handle accept/decline
        //TODO If its users first time with admin privileges take them to welcome page
        //TODO otherwise, take them to the admin page

        dump("Accept");
        dump($invite);

        exit;
    }

    public function decline(Request $request, Invite $invite){
        //TODO verify the invite belongs to this user
        //TODO handle accept/decline
        //TODO If its users first time with admin privileges take them to welcome page
        //TODO otherwise, take them to the admin page

        dump("Decline");
        dump($invite);

        exit;

    }
}
