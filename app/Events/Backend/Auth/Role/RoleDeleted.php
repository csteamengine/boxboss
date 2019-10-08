<?php

namespace App\Events\Backend\Auth\Role;

use Illuminate\Queue\SerializesModels;

/**
 * Class FeatureDeleted.
 */
class RoleDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $role;

    /**
     * @param $role
     */
    public function __construct($role)
    {
        $this->role = $role;
    }
}
