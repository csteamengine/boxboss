<?php

namespace App\Policies;

use App\Models\Box;
use App\Models\Auth\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BoxPolicy
{
    use HandlesAuthorization;


    /**
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
     * Determine whether the user can view any boxes.
     *
     * @param  \App\Models\Auth\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    public function updateActiveBox(User $user, Box $box){
        return $this->view($user, $box);
    }

    /**
     * Determine whether the user can view the box.
     *
     * @param  \App\Models\Auth\User  $user
     * @param  \App\Box  $box
     * @return mixed
     */
    public function view(User $user, Box $box)
    {
        return $user->allBoxes()->contains($box->id);
    }

    /**
     * Determine whether the user can view the box.
     *
     * @param  \App\Models\Auth\User  $user
     * @param  \App\Box  $box
     * @return mixed
     */
    public function edit(User $user, Box $box)
    {
        $owned = $user->boxesOwned()->get();
        $admin = $user->boxesAdmined();
        //TODO check if user is owner or box admin of box
        return $owned->merge($admin)->contains($box->id);
    }

    /**
     * Determine whether the user can create boxes.
     *
     * Same function is used to prevent store
     *
     * @param  \App\Models\Auth\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the box.
     *
     * @param  \App\Models\Auth\User  $user
     * @param  \App\Box  $box
     * @return mixed
     */
    public function update(User $user, Box $box)
    {
        return $this->edit($user, $box);
    }

    /**
     * Determine whether the user can delete the box.
     *
     * @param  \App\Models\Auth\User  $user
     * @param  \App\Box  $box
     * @return mixed
     */
    public function destroy(User $user, Box $box)
    {
        //TODO check if user is owner of box
        return $user->boxesOwned()->get()->contains($box->id);
    }

    /**
     * Determine whether the user can restore the box.
     *
     * @param  \App\Models\Auth\User  $user
     * @param  \App\Box  $box
     * @return mixed
     */
    public function restore(User $user, Box $box)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the box.
     *
     * @param  \App\Models\Auth\User  $user
     * @param  \App\Box  $box
     * @return mixed
     */
    public function forceDelete(User $user, Box $box)
    {
        return false;
    }
}
