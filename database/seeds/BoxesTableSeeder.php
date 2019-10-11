<?php

use App\Models\Box;
use App\Models\Invite;
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
        $key = config('app.key');
        if (Str::startsWith($key, 'base64:')) {
            $key = base64_decode(substr($key, 7));
        }

        factory(Box::class, 3)->create();

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


//        Box Members
        DB::table('box_members')->insert([
            'user_id' => 10,
            'box_id' => 1
        ]);
        DB::table('box_members')->insert([
            'user_id' => 11,
            'box_id' => 1
        ]);
        DB::table('box_members')->insert([
            'user_id' => 12,
            'box_id' => 1
        ]);
        DB::table('box_members')->insert([
            'user_id' => 13,
            'box_id' => 2
        ]);
        DB::table('box_members')->insert([
            'user_id' => 14,
            'box_id' => 2
        ]);
        DB::table('box_members')->insert([
            'user_id' => 15,
            'box_id' => 1
        ]);

        Invite::create([
            'box_id' => 1,
            'role' => 'owner',
            'email' => 'csteen1005@gmail.com',
            'token' => hash_hmac('sha256', Str::random(40), $key),
        ]);
    }
}
