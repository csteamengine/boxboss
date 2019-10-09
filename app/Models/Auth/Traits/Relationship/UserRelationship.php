<?php

namespace App\Models\Auth\Traits\Relationship;

use App\Models\Auth\SocialAccount;
use App\Models\Auth\PasswordHistory;
use App\Models\Box;
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

    public function getAllBoxes(){

        if($this->isAdmin()){
            return Box::all();
        }

        $oldArr = $this->allBoxes();

        $owned = $this->boxesOwned()->get();
        $coached = $this->boxesCoached()->get();
        $admin = $this->boxesAdmined();

        $boxes = array();
        foreach($oldArr as $box){
            $permissions = array();
            if($owned->contains('id', $box->id)){
                array_push($permissions, "Owner");
            }
            if($coached->contains('id', $box->id)){
                array_push($permissions, "Coach");
            }
            if($admin->contains('id', $box->id)){
                array_push($permissions, "Admin");
            }
            $box->permissions = implode(", ", $permissions);
            array_push($boxes, $box);
        }

        return $boxes;
    }

    public function allBoxes(){
        $owned = $this->boxesOwned()->get();
        $coached = $this->boxesCoached()->get();
        $admin = $this->boxesAdmined();

        return $this->isAdmin() ? Box::all() : $owned->merge($coached->merge($admin));
    }

    public function boxesOwned()
    {
        return $this->hasMany(Box::class, 'owner_id');
    }

    public function boxesCoached()
    {
        return $this->belongsToMany(Box::class, 'box_coaches', 'user_id', 'box_id');
    }

    public function boxesAdmined()
    {
        return $this->isAdmin() ? Box::with('owner') : $this->belongsToMany(Box::class, 'box_admins', 'user_id', 'box_id')->get();
    }
}
