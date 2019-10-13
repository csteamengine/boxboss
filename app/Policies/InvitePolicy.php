<?php

namespace App\Policies;

use App\Models\Auth\User;
use App\Models\Invite;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvitePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @param $user
     * @param $ability
     * @return bool
     */
    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * @param User $user
     * @param Invite $invite
     * @return
     */
    public function delete(User $user, Invite $invite){
        //Right now all staff can delete invites
        $box = $invite->box()->first();
        return $box->staff()->contains($user);
    }

    public function accept(User $user, Invite $invite){
        //TODO check if user is an owner, or the email address in the invite
        $box = $invite->box()->first();
        return $box->staff()->contains($user) || $invite->email == $user->email;
    }
}
