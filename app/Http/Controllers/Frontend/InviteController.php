<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Invite;
use App\Repositories\Backend\InviteRepository;
use Carbon\Carbon;
use DB;
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

    public function view()
    {
        $invites = $this->inviteRepository->findInvitesByEmail(auth()->user()['email']);

        return view('frontend.invite.invites')->withInvites($invites);
    }

    public function accept(Request $request, Invite $invite)
    {
        if (!$invite) {
            return redirect()->route('frontend.index')->withFlashWarning('You don\'t have access to do that.');
        }

        $role = $invite->role;
        $box = $invite->box_id;

        //TODO check for existing
        //TODO might need to handle membership invites differently
        $success = DB::table(__('validation.attributes.backend.invites.table.' . $role))->insert([
            'user_id' => auth()->user()->id,
            'box_id' => $box,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        if ($success) {
            $invite->delete();
        }

        if($role != 'member'){
            $result = auth()->user()->assignRole(__('validation.attributes.backend.invites.role.' . $role));
        }else{
            //TODO handle member specific stuff
            return redirect()->route('frontend.index');
        }

        $boxes = auth()->user()->getAllBoxes();

        if ($boxes->count() == 1 && sizeof(explode(', ', $boxes->first()->permissions)) <= 1) {
            return redirect()->route('frontend.admin-welcome');
        }

        return redirect()->route('admin.dashboard');
    }

    public function decline(Request $request, Invite $invite)
    {
        $invite = Invite::where('id', $request->get('invite_id'))
            ->where('email', auth()->user()->email)
            ->first();

        if (!$invite || $invite['token'] != $request->get('token')) {
            return redirect()->route('frontend.index')->withFlashWarning('You don\'t have access to do that.');
        }
        if($invite->delete()){
            return redirect()->back()->withFlashSuccess('Successfully declined the invite.');
        }

        return redirect()->route('frontend.invites.view')->withFlashDanger('Failed to decline the invite.');
    }
}
