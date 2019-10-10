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
        $boxAdmin = Role::create(['name' => config('access.users.box_admin_role')]);
        $coach = Role::create(['name' => config('access.users.coach_role')]);
        $user = Role::create(['name' => config('access.users.user_role')]);

        // Create Permissions
        $updateBackend = Permission::create(['name' => 'update backend']);
        $viewBackend = Permission::create(['name' => 'view backend']);
        $adminBox = Permission::create(['name' => 'admin box']);
        $updateBox = Permission::create(['name' => 'update box']);
        $destroyBox = Permission::create(['name' => 'destroy box']);
        $viewBox = Permission::create(['name' => 'view box']);

        // Super Admin
        $admin->givePermissionTo($updateBackend);
        $admin->givePermissionTo($viewBackend);
        $admin->givePermissionTo($adminBox);
        $admin->givePermissionTo($updateBox);
        $admin->givePermissionTo($destroyBox);
        $admin->givePermissionTo($viewBox);

        // Owner Permissions -- Backend / Admin Box / Update Box / Destroy Box
        $owner->givePermissionTo($viewBackend);
        $owner->givePermissionTo($adminBox);
        $owner->givePermissionTo($updateBox);
        $owner->givePermissionTo($destroyBox);

        //Box Admin Permissions
        $boxAdmin->givePermissionTo($viewBackend);
        $boxAdmin->givePermissionTo($adminBox);
        $boxAdmin->givePermissionTo($updateBox);

        //Coach Permissions
        $coach->givePermissionTo($viewBackend);
        $coach->givePermissionTo($viewBox);


        // Assign Permissions to other Roles
        // Note: Admin (User 1) Has all permissions via a gate in the AuthServiceProvider
        // $user->givePermissionTo('view backend');

        $this->enableForeignKeys();
    }
}
