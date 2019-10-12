<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\Backend\Invite\InviteMail;
use App\Models\Auth\User;
use App\Models\Box;
use App\Models\Invite;
use App\Repositories\Backend\InviteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function sendInvite(Request $request, Box $box)
    {
        $request->validate(['email' => 'required|email']);

        $email = $request->get('email');
        $role = $request->get('role');

        $user = User::where('email', $email)->first();

        $boxRoles = [
            'admin' => $box->admins()->get(),
            'owner' => $box->owners()->get(),
            'coach' => $box->coaches()->get(),
        ];

//        Check if user is already in that role for this box
        if ($user && $boxRoles[$role]->contains($user)) {
            return redirect()->back()->withFlashWarning($email . ' is already in the ' . $role . ' role.');
        }

        $invite = $this->inviteRepository->create([
            'email' => $email,
            'role' => $role,
            'box_id' => $box->getAttribute('id')
        ]);

        //Render the email in the browser for UI design
//        return (new InviteMail($invite))->render();

        //Or send the actual email
        Mail::to($email)->send(new InviteMail($invite));

        return redirect()->back()->withFlashSuccess("An email has been sent, inviting " . $email . " to become " . __('alerts.backend.invites.grammar.' . $role));
    }

    public function deleteInvite(Request $request)
    {
        //TODO delete the invite
        //TODO Gym owner/admin can delete the invite
    }
}
