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

    /**
     * @param Request $request
     * @param Box $box
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
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

        $existing = Invite::where('email', $email)->where('role', $role);

        if ($existing->count()) {
            return redirect()->back()->withFlashWarning("There is already an invite for that user in that role.");
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

    /**
     * @param Request $request
     * @param Box $box
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function sendMemberInvite(Request $request, Box $box)
    {
        $request->validate(['email' => 'required|email']);

        $email = $request->get('email');
        $role = $request->get('role');

        $user = User::where('email', $email)->first();

//        Check if user is already in that role for this box
        if ($user && $box->members()->contains($user)) {
            return redirect()->back()->withFlashWarning($email . ' is already a member of this gym.');
        }

        $existing = Invite::where('email', $email)->where('role', $role);

        if ($existing->count()) {
            return redirect()->back()->withFlashWarning("There is already an invite for that user to join this gym");
        }

        $invite = $this->inviteRepository->create([
            'email' => $email,
            'role' => 'member',
            'box_id' => $box->getAttribute('id')
        ]);

        //Render the email in the browser for UI design
//        return (new InviteMail($invite))->render();

        //Or send the actual email
        Mail::to($email)->send(new InviteMail($invite));

        return redirect()->back()->withFlashSuccess("An email has been sent, inviting " . $email . " to become to join the gym.");
    }

    /**
     * @param Request $request
     * @param Box $box
     * @param Invite $invite
     * @return mixed
     * @throws \Exception
     */
    public function deleteInvite(Request $request, Box $box, Invite $invite)
    {
        //User has been authorized to delete the invite through the invite policy

        if($invite->delete()){
            return redirect()->back()->withFlashSuccess('Successfully deleted the invite to '.$invite->email);
        }

        return redirect()->back()->withFlashDanger('Failed to delete the invite to '.$invite->email);
    }
}
