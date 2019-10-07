<?php

//namespace Tests\Unit\Backend;

use App\Models\Box;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActiveBoxTest extends TestCase
{
    use RefreshDatabase;

    //Test Admin - no owned, or coached, but access to all
    //Test owner
    //test box admin
    //test coach
    //test regular user
    /** @test */
    public function admin_can_view_all_boxes(){
        $this->loginAsAdmin();
        $numBoxes = 3;
        $boxes = factory(Box::class, $numBoxes)->create();

        $user = auth()->user();

        $allBoxes = $user->getAllBoxes();

        $this->assertEquals($numBoxes, sizeof($allBoxes));
    }

    /** @test */
    public function coach_can_view_coached_boxes(){
        $this->loginAsCoach();
        $numBoxes = 3;
        $expected = 1;
        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        DB::table('box_coaches')->insert([
            'user_id' => $user->id,
            'box_id' => 1
        ]);

        $allBoxes = $user->boxesCoached()->get();

        $this->assertEquals($expected, sizeof($allBoxes));
    }

    /** @test */
    public function box_admin_can_view_admin_boxes(){
        $this->loginAsBoxAdmin();
        $numBoxes = 3;
        $expected = 1;
        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        DB::table('box_admins')->insert([
            'user_id' => $user->id,
            'box_id' => 1
        ]);

        $allBoxes = $user->boxesAdmined();

        $this->assertEquals($expected, sizeof($allBoxes));
    }

    /** @test */
    public function owner_can_view_owned_boxes(){
        $this->loginAsBoxAdmin();
        $numBoxes = 3;
        $expected = 1;
        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        $ownedBox = Box::create([
            'name' => 'Owned Gym',
            'owner_id' => $user->id
        ]);

        $allBoxes = $user->boxesOwned()->get();

        $this->assertEquals($expected, sizeof($allBoxes));
    }

    /** @test */
    public function user_can_view_all_boxes(){
        $this->loginAsBoxAdmin();
        $numBoxes = 3;
        $expectedAdmin = 1;
        $expectedCoached = 1;
        $expectedAll = 2;
        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        DB::table('box_admins')->insert([
            'user_id' => $user->id,
            'box_id' => 1
        ]);

        DB::table('box_coaches')->insert([
            'user_id' => $user->id,
            'box_id' => 2
        ]);

        $admined = $user->boxesAdmined();
        $coached = $user->boxesCoached()->get();
        $allBoxes = $user->getAllBoxes();

        dump($allBoxes);

        $this->assertEquals($expectedAdmin, sizeof($admined));
        $this->assertEquals($expectedCoached, sizeof($coached));
        $this->assertEquals($expectedAll, sizeof($allBoxes));
    }

    /** @test */
    public function get_all_boxes_no_duplicates(){
        $this->loginAsBoxAdmin();
        $numBoxes = 3;
        $expectedAdmin = 1;
        $expectedCoached = 1;
        $expectedAll = 1;
        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        DB::table('box_admins')->insert([
            'user_id' => $user->id,
            'box_id' => 1
        ]);

        DB::table('box_coaches')->insert([
            'user_id' => $user->id,
            'box_id' => 1
        ]);

        $allBoxes = $user->getAllBoxes();

        dump($allBoxes);

        $this->assertEquals($expectedAll, sizeof($allBoxes));
    }
}
