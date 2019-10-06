<?php

use App\Models\Box;
use Illuminate\Database\Seeder;

class BoxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Add the master administrator, user id of 1
        Box::create([
            'name' => 'First Gym',
            'owner_id' => 3
        ]);
        Box::create([
            'name' => 'Second Gym',
            'owner_id' => 4
        ]);
        Box::create([
            'name' => 'Third Gym',
            'owner_id' => 3
        ]);

        DB::table('box_coaches')->insert([
            'user_id' => 7,
            'box_id' => 1
        ]);

        DB::table('box_coaches')->insert([
            'user_id' => 7,
            'box_id' => 3
        ]);

        DB::table('box_coaches')->insert([
            'user_id' => 8,
            'box_id' => 2
        ]);

        DB::table('box_coaches')->insert([
            'user_id' => 9,
            'box_id' => 3
        ]);

        DB::table('box_admins')->insert([
            'user_id' => 9,
            'box_id' => 3
        ]);
    }
}
