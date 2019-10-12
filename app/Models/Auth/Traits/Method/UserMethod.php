<?php

namespace App\Models\Auth\Traits\Method;

use App\Models\Box;

/**
 * Trait UserMethod.
 */
trait UserMethod
{

    /**
     * @param Box $box
     */
    public function getBoxPermissions(Box $box){
        $owned = $this->boxesOwned()->get();
        $admin = $this->boxesAdmined();
        $coached = $this->boxesCoached()->get();
        $members = $this->boxMemberships()->get();
        $permissions = [];

        if($owned->contains($box)){
            array_push($permissions, "Owner");
        }
        if($admin->contains($box)){
            array_push($permissions, "Admin");
        }
        if($coached->contains($box)){
            array_push($permissions, "Coach");
        }
        if($members->contains($box)){
            array_push($permissions, "Member");
        }

        return implode(', ', $permissions);
    }

    public function getActiveBox()
    {
        //TODO get the box that the user is currently viewing on the backend
    }

    public function updateActiveBox()
    {
        //TODO update the box that the user wants to edit on the backend
    }

    /**
     * @return mixed
     */
    public function canChangeEmail()
    {
        return config('access.users.change_email');
    }

    /**
     * @return bool
     */
    public function canChangePassword()
    {
        return !app('session')->has(config('access.socialite_session_name'));
    }

    /**
     * @param bool $size
     *
     * @return bool|\Illuminate\Contracts\Routing\UrlGenerator|mixed|string
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public function getPicture($size = false)
    {
        switch ($this->avatar_type) {
            case 'gravatar':
                if (!$size) {
                    $size = config('gravatar.default.size');
                }

                return gravatar()->get($this->email, ['size' => $size]);

            case 'storage':
                return url('storage/' . $this->avatar_location);
        }

        $social_avatar = $this->providers()->where('provider', $this->avatar_type)->first();

        if ($social_avatar && strlen($social_avatar->avatar)) {
            return $social_avatar->avatar;
        }

        return false;
    }

    /**
     * @param $provider
     *
     * @return bool
     */
    public function hasProvider($provider)
    {
        foreach ($this->providers as $p) {
            if ($p->provider == $provider) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function isAdmin()
    {
        return $this->hasRole(config('access.users.admin_role'));
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @return bool
     */
    public function isConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * @return bool
     */
    public function isPending()
    {
        return config('access.users.requires_approval') && !$this->confirmed;
    }
}
