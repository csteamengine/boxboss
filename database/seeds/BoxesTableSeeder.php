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
    }
}
