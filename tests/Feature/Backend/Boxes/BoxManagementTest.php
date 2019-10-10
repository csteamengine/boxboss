<?php

//namespace Tests\Feature\Backend\Boxes;

use App\Models\Box;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BoxManagementTest extends TestCase
{
    use RefreshDatabase;


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

//    /**
//     * @test
//     */
//    public function test_user_can_set_active_box(){
//        $this->loginAsBoxAdmin();
//        $numBoxes = 3;
//
//        $boxes = factory(Box::class, $numBoxes)->create();
//        $user = auth()->user();
//
//        DB::table('box_admins')->insert([
//            'user_id' => $user->id,
//            'box_id' => $boxes->first()->id
//        ]);
//
//        session(['active_box' => null]);
//
//        $this->assertNull(session('active_box'));
//
//        $response = $this->post('admin/updateActiveBox', ['active-box' => $boxes->first()->id]);
//
//        $response->assertStatus(302);
//        $response->assertSessionHas(['flash_success' => 'Updated Active Box']);
//
//        $this->assertEquals(1, session('active_box')['id']);
//
//    }
//
//    public function test_user_cant_set_not_their_box(){
//        $this->loginAsBoxAdmin();
//        $numBoxes = 3;
//
//        $boxes = factory(Box::class, $numBoxes)->create();
//        $user = auth()->user();
//
//        DB::table('box_admins')->insert([
//            'user_id' => 4,
//            'box_id' => $boxes->first()->id
//        ]);
//
//        DB::table('box_coaches')->insert([
//            'user_id' => 4,
//            'box_id' => $boxes[1]->id
//        ]);
//
//        session(['active_box' => null]);
//
//        $this->assertNull(session('active_box'));
//
//        $response = $this->post(route('admin.updateActiveBox'), ['active-box' => 1]);
//
//        $response->assertStatus(302);
//        $response->assertSessionHas(['flash_error' => 'You don\'t have permission to do that.']);
//
//        $this->assertNull(session('active_box'));
//    }
}
