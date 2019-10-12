<?php

namespace App\Models;

use App\Models\Traits\Relationship\MembershipRequestRelationship;
use Illuminate\Database\Eloquent\Model;

class MembershipRequest extends Model
{
    use MembershipRequestRelationship;

    protected $table = 'membership_requests';
}
