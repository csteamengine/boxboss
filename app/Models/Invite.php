<?php

namespace App\Models;

use App\Models\Traits\Relationship\InviteRelationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invite extends Model
{
    use SoftDeletes,
        InviteRelationship;

    protected $table = "box_user_invites";
    protected $fillable = ['role', 'email', 'box_id', 'token'];
    protected $with = ['box'];
}
