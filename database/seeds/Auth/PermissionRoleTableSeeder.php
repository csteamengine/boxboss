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
        $user = Role::create(['name' => config('access.users.user_role')]);

        // Create Permissions
        $update = Permission::create(['name' => 'update backend']);
        $view = Permission::create(['name' => 'view backend']);

        $owner->givePermissionTo($view);


        // Assign Permissions to other Roles
        // Note: Admin (User 1) Has all permissions via a gate in the AuthServiceProvider
        // $user->givePermissionTo('view backend');

        $this->enableForeignKeys();
    }
}
