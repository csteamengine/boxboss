<?php

namespace App\Models\Auth\Traits\Relationship;

use App\Models\Auth\SocialAccount;
use App\Models\Auth\PasswordHistory;
use App\Models\Box;

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

    public function boxes()
    {
        return $this->hasMany(Box::class, 'owner_id');
    }
}
