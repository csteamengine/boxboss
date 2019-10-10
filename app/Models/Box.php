<?php

namespace App\Models;

use App\Models\Traits\Method\BoxMethod;
use App\Models\Traits\Relationship\BoxRelationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Box extends Model
{
    use BoxRelationship,
        BoxMethod,
        SoftDeletes;

    protected $fillable = ['name',
        'short_description',
        'long_description',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'zip',
        'country',
        'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $with = array('owners');
}
