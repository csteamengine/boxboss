<?php

//namespace Tests\Feature\Backend\Boxes;

use App\Models\Box;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\PermissionRegistrar;
use Tests\TestCase;

class BoxManagementTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp() : void
    {
        parent::setup();
    }


//    public function test_box_admin_cannot_view_not_their_box()
//    {
//
//    }
//
//    public function test_box_admin_can_view_box()
//    {
//
//    }
//
//    public function test_coach_cannot_view_not_their_box()
//    {
//
//    }
//
//    public function test_coach_can_view_box()
//    {
//        $this->loginAsCoach();
//    }

    /** @test */
    public function test_admin_can_view_all_boxes(){
        $this->loginAsAdmin();
        $numBoxes = 3;
        $boxes = factory(Box::class, $numBoxes)->create();
        $expected = Box::all()->count();
        $user = auth()->user();

        $allBoxes = $user->getAllBoxes();

        $this->assertEquals($expected, sizeof($allBoxes));
    }

    /** @test */
    public function test_coach_can_view_coached_boxes(){
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
    public function test_box_admin_can_view_admin_boxes(){
        $this->loginAsBoxAdmin();
        $numBoxes = 3;
        $expected = 1;
        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        DB::table('box_admins')->insert([
            'user_id' => $user->id,
            'box_id' => $boxes->first()->id
        ]);

        $allBoxes = $user->boxesAdmined();

        $this->assertEquals($expected, sizeof($allBoxes));
    }

    /** @test */
    public function test_owner_can_view_owned_boxes(){
        $this->loginAsBoxAdmin();
        $numBoxes = 3;
        $expected = 1;
        $boxes = factory(Box::class, $numBoxes)->create();

        $user = auth()->user();

        $ownedBox = Box::create([
            'name' => 'Owned Gym'
        ]);

        DB::table('box_owners')->insert([
            'user_id' => $user->id,
            'box_id' => $ownedBox->id
        ]);

        $allBoxes = $user->boxesOwned()->get();

        $this->assertEquals($expected, sizeof($allBoxes));
    }

    /** @test */
    public function test_user_can_view_all_boxes(){
        $this->loginAsBoxAdmin();
        $numBoxes = 3;
        $expectedAdmin = 1;
        $expectedCoached = 1;
        $expectedAll = 2;
        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        DB::table('box_admins')->insert([
            'user_id' => $user->id,
            'box_id' => $boxes->first()->id
        ]);

        DB::table('box_coaches')->insert([
            'user_id' => $user->id,
            'box_id' => $boxes[1]->id
        ]);

        $admin = $user->boxesAdmined();
        $coached = $user->boxesCoached()->get();
        $allBoxes = $user->getAllBoxes();

        $this->assertEquals($expectedAdmin, sizeof($admin));
        $this->assertEquals($expectedCoached, sizeof($coached));
        $this->assertEquals($expectedAll, sizeof($allBoxes));
    }

    /** @test */
    public function test_get_all_boxes_no_duplicates(){
        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $expectedAll = 1;
        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        DB::table('box_admins')->insert([
            'user_id' => $user->id,
            'box_id' => $boxes->first()->id
        ]);

        DB::table('box_coaches')->insert([
            'user_id' => $user->id,
            'box_id' => $boxes->first()->id
        ]);

        $allBoxes = $user->getAllBoxes();

        $this->assertEquals($expectedAll, sizeof($allBoxes));
    }
}
