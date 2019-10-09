<?php

namespace App\Models\Traits\Relationship;

use App\Models\Auth\User;
use App\Models\Box;

/**
 * Class BoxRelationship.
 */
trait BoxRelationship
{
    public function owner()
    {
        return $this->hasOne(User::class, 'id', 'owner_id');
    }
}
