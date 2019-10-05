<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        $admin = Role::create(['name' => config('access.users.admin_role')]);
        $owner = Role::create(['name' => config('access.users.owner_role')]);
        $coach = Role::create(['name' => config('access.users.coach_role')]);
        $user = Role::create(['name' => config('access.users.user_role')]);

        // Create Permissions
        $update = Permission::create(['name' => 'update backend']);
        $updateBox = Permission::create(['name' => 'update box']);
        $viewBackend = Permission::create(['name' => 'view backend']);
        $viewBox = Permission::create(['name' => 'view box']);

//        $owner->givePermissionTo($viewBackend);
//        $owner->givePermissionTo($updateBox);
//        $coach->givePermissionTo($viewBackend);
//        $coach->givePermissionTo($viewBox);


        // Assign Permissions to other Roles
        // Note: Admin (User 1) Has all permissions via a gate in the AuthServiceProvider
        // $user->givePermissionTo('view backend');

        $this->enableForeignKeys();
    }
}
