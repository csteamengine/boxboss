<?php

namespace App\Models\Traits\Relationship;

use App\Models\Auth\User;
use App\Models\Box;
use App\Models\Invite;
use App\Models\MembershipRequest;

/**
 * Class MembershipRequestRelationship.
 */
trait MembershipRequestRelationship
{
    public function user()
    {
        return $this->belongsTo(User::class)->first();
    }

    public function box()
    {
        return $this->belongsTo(Box::class)->first();
    }
}
