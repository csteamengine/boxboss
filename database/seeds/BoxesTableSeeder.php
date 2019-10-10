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
            'short_description' => 'The First gym that I created'
        ]);
        Box::create([
            'name' => 'Second Gym',
            'short_description' => 'The Second gym that I created'
        ]);
        Box::create([
            'name' => 'Third Gym',
            'short_description' => 'The Third gym that I created'
        ]);

        DB::table('box_owners')->insert([
            'user_id' => 3,
            'box_id' => 1
        ]);

        DB::table('box_owners')->insert([
            'user_id' => 4,
            'box_id' => 2
        ]);

        DB::table('box_owners')->insert([
            'user_id' => 3,
            'box_id' => 3
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

        DB::table('box_admins')->insert([
            'user_id' => 6,
            'box_id' => 2
        ]);

        DB::table('box_admins')->insert([
            'user_id' => 7,
            'box_id' => 3
        ]);
    }
}
