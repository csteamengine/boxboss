<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Boxes\EditBoxRequest;
use App\Http\Requests\Backend\Boxes\ManageBoxRequest;
use App\Http\Requests\Backend\Boxes\StoreBoxRequest;
use App\Http\Requests\Backend\Boxes\UpdateBoxRequest;
use App\Models\Auth\User;
use App\Models\Box;
use App\Models\BoxAdmin;
use App\Models\BoxCoach;
use App\Models\BoxMember;
use App\Models\BoxOwner;
use App\Models\MembershipRequest;
use App\Repositories\Backend\BoxRepository;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

/**
 * Class BoxController
 * @package App\Http\Controllers\Backend
 */
class BoxController extends Controller
{

    /**
     * @var BoxRepository
     */
    protected $boxRepository;

    /**
     * @param BoxRepository $boxRepository
     */
    public function __construct(BoxRepository $boxRepository)
    {
        $this->boxRepository = $boxRepository;
    }

    /**
     * @param Request $request
     * @param Box $box
     * @return mixed
     */
    public function updateActiveBox(Request $request, Box $box)
    {
        $boxID = $request->input('active-box');
        $box = Box::find($boxID);

        //Checks the box policy to see if the user is allowed to view this box.
        if (auth()->user()->can('view', $box)) {
            session(['active_box' => $box]);
            if (fnmatch("*/admin/boxes/*/view", $request->headers->get('referer'))) {
                return redirect()->route('admin.boxes.view', $box)->withFlashSuccess("Updated Active Box");
            }
            return redirect()->back()->withFlashSuccess("Updated Active Box");
        }
        return redirect()->back()->withFlashWarning("You don't have permission to do that.");
    }

    /**
     *
     * @return mixed
     */
    public function index()
    {
        return view('backend.boxes.index')
            ->withBoxes(auth()->user()->getAllBoxes());
    }

    /**
     * Show the page of a specific
     *
     * @param ManageBoxRequest $request
     * @param Box $box
     * @return \Illuminate\Http\Response
     */
    public function view(ManageBoxRequest $request, Box $box)
    {
        return view('backend.boxes.box')->withBox($box);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.boxes.create');
    }

    /**
     * @param StoreBoxRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreBoxRequest $request)
    {
        $this->boxRepository->create($request->only('name',
            'short_description',
            'long_description',
            'address_line_1',
            'address_line_2',
            'city',
            'state',
            'zip',
            'country',
            'is_active'
        ));

        return redirect()->route('admin.boxes.index')->withFlashSuccess(__('alerts.backend.boxes.created'));
    }

    /**
     * @param EditBoxRequest $request
     * @param Box $box
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(EditBoxRequest $request, Box $box)
    {
        return view('backend.boxes.edit')
            ->withBox($box);
    }

    /**
     * @param UpdateBoxRequest $request
     * @param Box $box
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateBoxRequest $request, Box $box)
    {

        $request['is_active'] = isset($request['is_active']) ? $request['is_active'] : false;

        $this->boxRepository->update($box, $request->only(
            'name',
            'short_description',
            'long_description',
            'address_line_1',
            'address_line_2',
            'city',
            'state',
            'zip',
            'country',
            'is_active'));

        return redirect()->route('admin.boxes.index')->withFlashSuccess(__('alerts.backend.boxes.updated'));
    }

    /**
     * @param ManageBoxRequest $request
     * @param Box $box
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageBoxRequest $request, Box $box)
    {
        $this->boxRepository->deleteById($box->id);

        return redirect()->route('admin.boxes.index')->withFlashSuccess(__('alerts.backend.boxes.deleted'));
    }

    /**
     * @param Request $request
     * @param Box $box
     * @param MembershipRequest $memRequest
     * @return
     * @throws \Exception
     */
    public function acceptRequest(Request $request, Box $box, MembershipRequest $memRequest){

        if(!$memRequest || !$box->requests()->get()->contains($memRequest)){
            return redirect()->back()->withFlashWarning('Failed to accept the membership request');
        }

        $existing = $box->members()->where('user_id', $memRequest->user_id)->first();

        if($existing){
            return redirect()->back()->withFlashWarning("User is already a member of this box.");
        }

        $newMember = BoxMember::create([
            'user_id' => $memRequest->user_id,
            'box_id' => $memRequest->box_id
        ]);

        //TODO send email to requester

        if($newMember && $memRequest->delete()){
            return redirect()->back()->withFlashSuccess('Successfully accepted the membership request.');
        }
        return redirect()->back()->withFlashWarning('Failed to accepted the membership request');
    }

    /**
     * @param Request $request
     * @param Box $box
     * @param MembershipRequest $memRequest
     * @return
     * @throws \Exception
     */
    public function declineRequest(Request $request, Box $box, MembershipRequest $memRequest){
//        TODO send email to the user saying the membership was declined.
        if($box->requests()->get()->contains($memRequest) && $memRequest && $memRequest->delete()){
            return redirect()->back()->withFlashSuccess('Successfully declined the membership request.');
        }
        return redirect()->back()->withFlashWarning('Failed to decline the membership request');
    }


    /**
     * @param Request $request
     * @param Box $box
     * @param User $user
     * @return mixed
     */
    public function removeCoach(Request $request, Box $box, User $user){
        $coach = BoxCoach::where('box_id', $box->id)->where('user_id', $user->id)->first();

        if($coach->delete()){
            return redirect()->back()->withFlashSuccess('Successfully removed '.$user->email." as a coach.");
        }
        return redirect()->back()->withFlashWarning('Failed to remove that user as a coach');
    }

    /**
     * @param Request $request
     * @param Box $box
     * @param User $user
     * @return mixed
     */
    public function removeOwner(Request $request, Box $box, User $user){
        $owners = $box->owners()->get();
        if($owners->count() <= 1){
            return redirect()->back()->withFlashWarning("You can't remove that owner until you add another owner.");
        }

        $coach = BoxOwner::where('box_id', $box->id)->where('user_id', $user->id)->first();

        if($coach->delete()){
            return redirect()->back()->withFlashSuccess('Successfully removed '.$user->email." as an owner.");
        }
        return redirect()->back()->withFlashWarning('Failed to remove that user as an owner');
    }

    /**
     * @param Request $request
     * @param Box $box
     * @param User $user
     * @return mixed
     */
    public function removeAdmin(Request $request, Box $box, User $user){
        $admin = BoxAdmin::where('box_id', $box->id)->where('user_id', $user->id)->first();

        if($admin->delete()){
            return redirect()->back()->withFlashSuccess('Successfully removed '.$user->email." as an admin.");
        }
        return redirect()->back()->withFlashWarning('Failed to remove that user as an admin');
    }

    public function removeMember(Request $request, Box $box, User $user){
        //TODO cancel membership subscription
        //TODO send cancellation email to the user?
        $member = BoxMember::where('box_id', $box->id)->where('user_id', $user->id)->first();

        if($member->delete()){
            return redirect()->back()->withFlashSuccess('Successfully removed '.$user->email." as a member.");
        }
        return redirect()->back()->withFlashWarning('Failed to remove that user as a member');
    }
}
