<?php

namespace App\Models\Traits\Relationship;

use App\Models\Auth\User;
use App\Models\Box;
use App\Models\Invite;

/**
 * Class BoxRelationship.
 */
trait InviteRelationship
{
    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
