<?php

namespace App\Models;

use App\Models\Traits\Relationship\BoxRelationship;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use BoxRelationship;

    protected $fillable = ['name', 'owner_id'];
    protected $with = array('owner');
}
