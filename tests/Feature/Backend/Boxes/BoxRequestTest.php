<?php

//namespace Tests\Feature\Backend\Boxes;

use App\Models\Auth\User;
use App\Models\Box;
use App\Models\MembershipRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BoxRequestTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setup();
        $this->artisan("db:seed");
    }

    public function test_box_admin_can_accept_membership_request()
    {
        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        $box = $boxes->first();

        DB::table('box_admins')->insert([
            'user_id' => $user->id,
            'box_id' => $box->id
        ]);

        $testUser = factory(User::class, 1)->create()->first();

        $request = MembershipRequest::create([
           'user_id' => $testUser->id,
           'box_id' => $box->id
        ]);

        $numRequestsInit = $box->requests()->count();

        $response = $this->json('GET',
            route('admin.requests.accept', ['box' => $box, 'memRequest' => $request]));

        $response->assertStatus(302);

        $response->assertSessionHas(['flash_success' => "Successfully accepted the membership request."]);

        $newRequests = $box->requests()->count();

        $this->assertLessThan($numRequestsInit, $newRequests);
    }

    public function test_box_admin_cant_accept_not_their_membership_request()
    {
        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        $box = $boxes->first();

        DB::table('box_admins')->insert([
            'user_id' => $user->id,
            'box_id' => $box->id
        ]);

        $testUser = factory(User::class, 1)->create()->first();

        $request = MembershipRequest::create([
            'user_id' => $testUser->id,
            'box_id' => $boxes[1]
        ]);

        $numRequestsInit = $box->requests()->count();

        $response = $this->json('GET',
            route('admin.requests.accept', ['box' => $box, 'memRequest' => $request]));

        $response->assertStatus(302);

        $response->assertSessionHas(['flash_warning' => "Failed to accept the membership request"]);

        $newRequests = $box->requests()->count();

        $this->assertEquals($numRequestsInit, $newRequests);
    }

    public function test_box_owner_can_accept_membership_request()
    {
        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        $box = $boxes->first();

        DB::table('box_owners')->insert([
            'user_id' => $user->id,
            'box_id' => $box->id
        ]);

        $testUser = factory(User::class, 1)->create()->first();

        $request = MembershipRequest::create([
            'user_id' => $testUser->id,
            'box_id' => $box->id
        ]);

        $numRequestsInit = $box->requests()->count();

        $response = $this->json('GET',
            route('admin.requests.accept', ['box' => $box, 'memRequest' => $request]));

        $response->assertStatus(302);

        $response->assertSessionHas(['flash_success' => "Successfully accepted the membership request."]);

        $newRequests = $box->requests()->count();

        $this->assertLessThan($numRequestsInit, $newRequests);
    }

    public function test_box_owner_cant_accept_not_their_membership_request()
    {
        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        $box = $boxes->first();

        DB::table('box_owners')->insert([
            'user_id' => $user->id,
            'box_id' => $box->id
        ]);

        $testUser = factory(User::class, 1)->create()->first();

        $request = MembershipRequest::create([
            'user_id' => $testUser->id,
            'box_id' => $boxes[1]
        ]);

        $numRequestsInit = $box->requests()->count();

        $response = $this->json('GET',
            route('admin.requests.accept', ['box' => $box, 'memRequest' => $request]));

        $response->assertStatus(302);

        $response->assertSessionHas(['flash_warning' => "Failed to accept the membership request"]);

        $newRequests = $box->requests()->count();

        $this->assertEquals($numRequestsInit, $newRequests);
    }

//    //TODO Decide if coaches can accept memberships
//    public function test_box_coach_can_accept_membership_request()
//    {
//        $this->loginAsBoxAdmin();
//        $numBoxes = 3;
//
//        $boxes = factory(Box::class, $numBoxes)->create();
//        $user = auth()->user();
//
//        $box = $boxes->first();
//
//        DB::table('box_coaches')->insert([
//            'user_id' => $user->id,
//            'box_id' => $box->id
//        ]);
//
//        $testUser = factory(User::class, 1)->create()->first();
//
//        $request = MembershipRequest::create([
//            'user_id' => $testUser->id,
//            'box_id' => $box->id
//        ]);
//
//        $numRequestsInit = $box->requests()->count();
//
//        $response = $this->json('GET',
//            route('admin.requests.accept', ['box' => $box, 'memRequest' => $request]));
//
//        $response->assertStatus(302);
//
//        $response->assertSessionHas(['flash_danger' => "Successfully accepted the membership request."]);
//
//        $newRequests = $box->requests()->count();
//
//        $this->assertLessThan($numRequestsInit, $newRequests);
//    }
//
//
//    public function test_box_coach_cant_accept_not_their_membership_request()
//    {
//        $this->loginAsBoxAdmin();
//        $numBoxes = 3;
//
//        $boxes = factory(Box::class, $numBoxes)->create();
//        $user = auth()->user();
//
//        $box = $boxes->first();
//
//        DB::table('box_coaches')->insert([
//            'user_id' => $user->id,
//            'box_id' => $box->id
//        ]);
//
//        $testUser = factory(User::class, 1)->create()->first();
//
//        $request = MembershipRequest::create([
//            'user_id' => $testUser->id,
//            'box_id' => $boxes[1]
//        ]);
//
//        $numRequestsInit = $box->requests()->count();
//
//        $response = $this->json('GET',
//            route('admin.requests.accept', ['box' => $box, 'memRequest' => $request]));
//
//        $response->assertStatus(302);
//
//        $response->assertSessionHas(['flash_warning' => "Failed to accept the membership request"]);
//
//        $newRequests = $box->requests()->count();
//
//        $this->assertEquals($numRequestsInit, $newRequests);
//    }

    public function test_box_admin_can_decline_membership_request()
    {
        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        $box = $boxes->first();

        DB::table('box_admins')->insert([
            'user_id' => $user->id,
            'box_id' => $box->id
        ]);

        $testUser = factory(User::class, 1)->create()->first();

        $request = MembershipRequest::create([
            'user_id' => $testUser->id,
            'box_id' => $box->id
        ]);

        $numRequestsInit = $box->requests()->count();

        $response = $this->json('GET',
            route('admin.requests.decline', ['box' => $box, 'memRequest' => $request]));

        $response->assertStatus(302);

        $response->assertSessionHas(['flash_success' => "Successfully declined the membership request."]);

        $newRequests = $box->requests()->count();

        $this->assertLessThan($numRequestsInit, $newRequests);
    }

    public function test_box_admin_cant_decline_not_their_membership_request()
    {
        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        $box = $boxes->first();

        DB::table('box_admins')->insert([
            'user_id' => $user->id,
            'box_id' => $box->id
        ]);

        $testUser = factory(User::class, 1)->create()->first();

        $request = MembershipRequest::create([
            'user_id' => $testUser->id,
            'box_id' => $boxes[1]
        ]);

        $numRequestsInit = $box->requests()->count();

        $response = $this->json('GET',
            route('admin.requests.decline', ['box' => $box, 'memRequest' => $request]));

        $response->assertStatus(302);

        $response->assertSessionHas(['flash_warning' => "Failed to decline the membership request"]);

        $newRequests = $box->requests()->count();

        $this->assertEquals($numRequestsInit, $newRequests);
    }

    public function test_box_owner_can_decline_membership_request()
    {
        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        $box = $boxes->first();

        DB::table('box_owners')->insert([
            'user_id' => $user->id,
            'box_id' => $box->id
        ]);

        $testUser = factory(User::class, 1)->create()->first();

        $request = MembershipRequest::create([
            'user_id' => $testUser->id,
            'box_id' => $box->id
        ]);

        $numRequestsInit = $box->requests()->count();

        $response = $this->json('GET',
            route('admin.requests.decline', ['box' => $box, 'memRequest' => $request]));

        $response->assertStatus(302);

        $response->assertSessionHas(['flash_success' => "Successfully declined the membership request."]);

        $newRequests = $box->requests()->count();

        $this->assertLessThan($numRequestsInit, $newRequests);
    }

    public function test_box_owner_cant_decline_not_their_membership_request()
    {
        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        $box = $boxes->first();

        DB::table('box_owners')->insert([
            'user_id' => $user->id,
            'box_id' => $box->id
        ]);

        $testUser = factory(User::class, 1)->create()->first();

        $request = MembershipRequest::create([
            'user_id' => $testUser->id,
            'box_id' => $boxes[1]
        ]);

        $numRequestsInit = $box->requests()->count();

        $response = $this->json('GET',
            route('admin.requests.decline', ['box' => $box, 'memRequest' => $request]));

        $response->assertStatus(302);

        $response->assertSessionHas(['flash_warning' => "Failed to decline the membership request"]);

        $newRequests = $box->requests()->count();

        $this->assertEquals($numRequestsInit, $newRequests);
    }

    //TODO Decide if coaches can accept membership requests
//    public function test_box_coach_can_decline_membership_request()
//    {
//        $this->loginAsBoxAdmin();
//        $numBoxes = 3;
//
//        $boxes = factory(Box::class, $numBoxes)->create();
//        $user = auth()->user();
//
//        $box = $boxes->first();
//
//        DB::table('box_coaches')->insert([
//            'user_id' => $user->id,
//            'box_id' => $box->id
//        ]);
//
//        $testUser = factory(User::class, 1)->create()->first();
//
//        $request = MembershipRequest::create([
//            'user_id' => $testUser->id,
//            'box_id' => $box->id
//        ]);
//
//        $numRequestsInit = $box->requests()->count();
//
//        $response = $this->json('GET',
//            route('admin.requests.decline', ['box' => $box, 'memRequest' => $request]));
//
//        $response->assertStatus(302);
//
//        $response->assertSessionHas(['flash_success' => "Successfully declined the membership request."]);
//
//        $newRequests = $box->requests()->count();
//
//        $this->assertLessThan($numRequestsInit, $newRequests);
//    }
//
//    public function test_box_coach_cant_decline_not_their_membership_request()
//    {
//        $this->loginAsBoxAdmin();
//        $numBoxes = 3;
//
//        $boxes = factory(Box::class, $numBoxes)->create();
//        $user = auth()->user();
//
//        $box = $boxes->first();
//
//        DB::table('box_coaches')->insert([
//            'user_id' => $user->id,
//            'box_id' => $box->id
//        ]);
//
//        $testUser = factory(User::class, 1)->create()->first();
//
//        $request = MembershipRequest::create([
//            'user_id' => $testUser->id,
//            'box_id' => $boxes[1]
//        ]);
//
//        $numRequestsInit = $box->requests()->count();
//
//        $response = $this->json('GET',
//            route('admin.requests.decline', ['box' => $box, 'memRequest' => $request]));
//
//        $response->assertStatus(302);
//
//        $response->assertSessionHas(['flash_warning' => "Failed to decline the membership request"]);
//
//        $newRequests = $box->requests()->count();
//
//        $this->assertEquals($numRequestsInit, $newRequests);
//    }
}
