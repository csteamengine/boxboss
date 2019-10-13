<?php

namespace App\Models\Auth\Traits\Relationship;

use App\Models\Auth\SocialAccount;
use App\Models\Auth\PasswordHistory;
use App\Models\Box;
use App\Models\Invite;
use Illuminate\Support\Collection;
use Spatie\Html\Helpers\Arr;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialAccount::class);
    }

    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->hasMany(PasswordHistory::class);
    }

    public function getAllBoxes()
    {

        if ($this->isAdmin()) {
            return Box::all();
        }

        $oldArr = $this->allBoxes();

        $owned = $this->boxesOwned()->get();
        $coached = $this->boxesCoached()->get();
        $admin = $this->boxesAdmined();

        $boxes = collect();
        foreach ($oldArr as $box) {
            $permissions = array();
            if ($owned->contains('id', $box->id)) {
                array_push($permissions, "Owner");
            }
            if ($coached->contains('id', $box->id)) {
                array_push($permissions, "Coach");
            }
            if ($admin->contains('id', $box->id)) {
                array_push($permissions, "Admin");
            }
            $box->permissions = implode(", ", $permissions);
            $boxes->push($box);
        }

        return $boxes;
    }

    public function allBoxes()
    {
        $owned = $this->boxesOwned()->get();
        $coached = $this->boxesCoached()->get();
        $admin = $this->boxesAdmined();

        return $this->isAdmin() ? Box::all() : $owned->merge($coached->merge($admin));
    }

    public function boxesOwned()
    {
        return $this->belongsToMany(Box::class, 'box_owners', 'user_id', 'box_id');
    }

    public function boxesCoached()
    {
        return $this->belongsToMany(Box::class, 'box_coaches', 'user_id', 'box_id');
    }

    public function boxesAdmined()
    {
        return $this->isAdmin() ? Box::with('owner') : $this->belongsToMany(Box::class, 'box_admins', 'user_id', 'box_id')->get();
    }

    public function boxMemberships(){
        return $this->belongsToMany(Box::class, 'box_members', 'user_id', 'box_id');
    }

    public function invites(){
        return $this->hasMany(Invite::class, 'email', 'email');
    }
}
