<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoxMember extends Model
{
    protected $fillable = ['user_id', 'box_id'];
}
