<?php

namespace App\Models\Traits\Relationship;

use App\Models\Auth\User;
use App\Models\Box;

/**
 * Class BoxRelationship.
 */
trait BoxRelationship
{
    public function owners()
    {
        return $this->belongsToMany(User::class, 'box_owners', 'user_id', 'box_id');
    }
}
