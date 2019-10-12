<?php

namespace App\Models\Traits\Relationship;

use App\Models\Auth\User;
use App\Models\Box;
use App\Models\Invite;

/**
 * Class BoxRelationship.
 */
trait BoxRelationship
{
    public function owners()
    {
        return $this->belongsToMany(User::class, 'box_owners', 'box_id', 'user_id');
    }

    public function coaches()
    {
        return $this->belongsToMany(User::class, 'box_coaches', 'box_id', 'user_id');
    }

    public function admins()
    {
        return $this->belongsToMany(User::class, 'box_admins', 'box_id', 'user_id');
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'box_members', 'box_id', 'user_id');
    }

    public function staff()
    {
        return $this->owners()->get()->merge($this->admins()->get()->merge($this->coaches()->get()));
    }

    public function invites()
    {
        return $this->hasMany(Invite::class, 'box_id', '');
    }
}
