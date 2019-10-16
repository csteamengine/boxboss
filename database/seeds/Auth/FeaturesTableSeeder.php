<?php

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User Login
        Feature::create([
            'name' => 'user_login',
            'short_description' => 'Toggle the ability to log in',
            'description' => 'This will allow any users on the site to login or not depending on the status.',
            'is_active' => true
        ]);

        //User Registration
        Feature::create([
            'name' => 'user_register',
            'short_description' => 'Toggle the ability to sign up',
            'description' => 'This will allow any users on the site to register or not depending on the status.',
            'is_active' => true
        ]);

        //Active Box
        Feature::create([
            'name' => 'active_box',
            'short_description' => 'Toggle the ability to switch Active Boxes',
            'description' => 'This will allow admin users, box owners and coaches to update which box is the current active box.',
            'is_active' => true
        ]);

        //Box Management
        Feature::create([
            'name' => 'box_management',
            'short_description' => 'Toggle the ability to manage boxes',
            'description' => 'This will allow admin users, box owners and coaches to update box information.',
            'is_active' => true
        ]);

        //Invite Management
        Feature::create([
            'name' => 'invite_management',
            'short_description' => 'Toggle the ability to manage invites',
            'description' => 'This allows box admins, owners and coaches to manage invites.',
            'is_active' => true
        ]);

        //Request Management
        Feature::create([
            'name' => 'request_management',
            'short_description' => 'Toggle the ability to manage membership requests',
            'description' => 'This allows box admins, owners and coaches to manage membership requests.',
            'is_active' => true
        ]);

        //Member Management
        Feature::create([
            'name' => 'member_management',
            'short_description' => 'Toggle the ability to manage members on the admin page.',
            'description' => 'This allows box admins, owners and coaches to manage members.',
            'is_active' => true
        ]);

        //Staff Management
        Feature::create([
            'name' => 'request_management',
            'short_description' => 'Toggle the ability to manage the staff of their box.',
            'description' => 'This allows box admins, owners and coaches to manage the staff of their box',
            'is_active' => true
        ]);
    }
}
