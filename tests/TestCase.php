<?php

namespace Tests;

use App\Models\Auth\Role;
use App\Models\Auth\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Assigns the array of permissions to the role given
     *
     * @param $role
     * @param array $permissions
     */
    protected function assignPermissions($role, $permissions){
        foreach($permissions as $permission){
            if(!$role->hasPermissionTo($this->getPermission($permission))){
                $role->givePermissionTo($this->getPermission($permission));
            }
        }
    }

    /**
     * Create the permission or return it if it already exists.
     *
     * @param $name
     * @return mixed
     */
    protected function getPermission($name)
    {
        if ($permission = Permission::whereName(config($name))->first()) {
            return $permission;
        }

        return factory(Permission::class)->create(['name' => $name]);
    }

    /**
     * Create a new role or return it if it already exists.
     *
     * By default, returns the admin role to appease the existing tests.
     *
     * @param string $role
     * @param string $permission
     * @return mixed
     */
    protected function getRole($role = "admin_role", $permission = "view backend")
    {
        if ($existingRole = Role::whereName(config('access.users.'.$role))->first()) {
            return $existingRole;
        }

        $newRole = factory(Role::class)->create(['name' => config('access.users.'.$role)]);

        return $newRole;
    }

    /**
     * Create an administrator.
     *
     * @param array $attributes
     *
     * @return mixed
     */
    protected function createAdmin(array $attributes = [])
    {
        $adminRole = $this->getRole();
        $admin = factory(User::class)->create($attributes);

        $this->assignPermissions($adminRole, ['view backend', 'update backend']);

        $admin->assignRole($adminRole);
        return $admin;
    }

    /**
     * Create a coach.
     *
     * @param array $attributes
     *
     * @return mixed
     */
    protected function createCoach(array $attributes = [])
    {
        $coachRole = $this->getRole('coach_role');

        $this->assignPermissions($coachRole, ['view backend', 'view box']);

        $coach = factory(User::class)->create($attributes);

        $coach->assignRole($coachRole);

        return $coach;
    }

    protected function createBoxAdmin(array $attributes = [])
    {
        $coachRole = $this->getRole('box_admin_role');

        $this->assignPermissions($coachRole, ['view backend', 'update box']);

        $coach = factory(User::class)->create($attributes);

        $coach->assignRole($coachRole);

        return $coach;
    }

    /**
     * Login the given administrator or create the first if none supplied.
     *
     * @param bool $admin
     *
     * @return bool|mixed
     */
    protected function loginAsAdmin($admin = false)
    {
        if (! $admin) {
            $admin = $this->createAdmin();
        }

        $this->actingAs($admin);

        return $admin;
    }

    /**
     * Login the given coach or create the first if none supplied.
     *
     * @param bool $coach
     *
     * @return bool|mixed
     */
    protected function loginAsCoach($coach = false)
    {
        if (! $coach) {
            $coach = $this->createCoach();
        }

        $this->actingAs($coach);

        return $coach;
    }

    /**
     * Login the given coach or create the first if none supplied.
     *
     * @param bool $boxAdmin
     * @return bool|mixed
     */
    protected function loginAsBoxAdmin($boxAdmin = false)
    {
        if (! $boxAdmin) {
            $boxAdmin = $this->createBoxAdmin();
        }

        $this->actingAs($boxAdmin);

        return $boxAdmin;
    }
}
