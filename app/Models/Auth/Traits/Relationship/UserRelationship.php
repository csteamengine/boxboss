<?php

namespace App\Models\Auth\Traits\Relationship;

use App\Models\Auth\SocialAccount;
use App\Models\Auth\PasswordHistory;
use App\Models\Box;
use App\Models\BoxCoach;

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

    public function allBoxes(){
        return $this->isAdmin() ? Box::all() : $this->boxesOwned()
            ->union($this->boxesCoached()->toBase())
            ->union($this->boxesAdmined()->toBase());
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
        return $this->belongsToMany(Box::class, 'box_admins', 'user_id', 'box_id');
    }
}
