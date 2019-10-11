<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invite extends Model
{
    use SoftDeletes;

    protected $table = "box_user_invites";
    protected $fillable = ['role', 'email', 'box_id', 'token'];

}
