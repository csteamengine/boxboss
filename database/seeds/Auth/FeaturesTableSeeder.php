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

    }
}
