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

    /**
     * Determine whether the user can view the box.
     *
     * @param  \App\Models\Auth\User  $user
     * @param  \App\Box  $box
     * @return mixed
     */
    public function view(User $user, Box $box)
    {
        return true;
    }

    /**
     * Determine whether the user can create boxes.
     *
     * @param  \App\Models\Auth\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
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
        //
    }

    /**
     * Determine whether the user can delete the box.
     *
     * @param  \App\Models\Auth\User  $user
     * @param  \App\Box  $box
     * @return mixed
     */
    public function delete(User $user, Box $box)
    {
        //
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
        //
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
        //
    }
}
