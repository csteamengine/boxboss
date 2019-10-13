<?php

//namespace Tests\Feature\Backend\Boxes;

use App\Models\Auth\User;
use App\Models\Box;
use App\Models\Invite;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Class BoxInviteTest
 * @package Tests\Feature\Backend\Boxes
 */
class BoxInviteTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setup();
        $this->artisan("db:seed");
    }

    /**
     *
     */
    public function test_box_admin_can_send_invite()
    {
        Mail::fake();

        // Assert that no mailables were sent...
        Mail::assertNothingSent();

        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        DB::table('box_admins')->insert([
            'user_id' => $user->id,
            'box_id' => $boxes->first()->id
        ]);

        $box = $boxes->first();
        $numInvites = $box->invites()->count();

        $response = $this->json('POST',
            route('admin.boxes.invites.send', $box),
            ['email' => 'test_email@test_email.com', 'role' => 'coach']);

        $response->assertStatus(302);

        $response->assertSessionHas(['flash_success' => "An email has been sent, inviting test_email@test_email.com to become a coach"]);

        $inviteCount = $box->invites()->count();

        $this->assertNotEquals($numInvites, $inviteCount);

    }

    /**
     *
     */
    public function test_box_admin_cant_send_invite_for_not_their_box()
    {
        Mail::fake();

        // Assert that no mailables were sent...
        Mail::assertNothingSent();

        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        DB::table('box_admins')->insert([
            'user_id' => $user->id,
            'box_id' => $boxes->first()->id
        ]);

        $box = $boxes[1];
        $numInvites = $box->invites()->count();

        $response = $this->json('POST',
            route('admin.boxes.invites.send', $box),
            ['email' => 'test_email@test_email.com', 'role' => 'coach']);

        $response->assertStatus(302);

        $response->assertSessionHas(['flash_danger' => "You do not have access to do that."]);


        $inviteCount = $box->invites()->count();

        //Invite wasn't sent
        $this->assertEquals($numInvites, $inviteCount);
    }

    /**
     *
     */
    public function test_box_owner_can_send_invite()
    {
        Mail::fake();

        // Assert that no mailables were sent...
        Mail::assertNothingSent();

        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        DB::table('box_owners')->insert([
            'user_id' => $user->id,
            'box_id' => $boxes->first()->id
        ]);

        $box = $boxes->first();
        $numInvites = $box->invites()->count();

        $response = $this->json('POST',
            route('admin.boxes.invites.send', $box),
            ['email' => 'test_email@test_email.com', 'role' => 'coach']);

        $response->assertStatus(302);

        $response->assertSessionHas(['flash_success' => "An email has been sent, inviting test_email@test_email.com to become a coach"]);

        $inviteCount = $box->invites()->count();

        $this->assertNotEquals($numInvites, $inviteCount);
    }

    /**
     *
     */
    public function test_box_owner_cant_send_invite_to_not_their_box()
    {
        Mail::fake();

        // Assert that no mailables were sent...
        Mail::assertNothingSent();

        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        DB::table('box_coaches')->insert([
            'user_id' => $user->id,
            'box_id' => $boxes->first()->id
        ]);

        $box = $boxes[1];
        $numInvites = $box->invites()->count();

        $response = $this->json('POST',
            route('admin.boxes.invites.send', $box),
            ['email' => 'test_email@test_email.com', 'role' => 'coach']);

        $response->assertStatus(302);

        $response->assertSessionHas(['flash_danger' => "You do not have access to do that."]);


        $inviteCount = $box->invites()->count();

        //Invite wasn't sent
        $this->assertEquals($numInvites, $inviteCount);
    }

//    TODO decide if coaches should be able to send invites
//    public function test_coach_can_send_an_invite()
//    {
//        Mail::fake();
//
//        // Assert that no mailables were sent...
//        Mail::assertNothingSent();
//
//        $this->loginAsBoxAdmin();
//        $numBoxes = 3;
//
//        $boxes = factory(Box::class, $numBoxes)->create();
//        $user = auth()->user();
//
//        DB::table('box_coach')->insert([
//            'user_id' => $user->id,
//            'box_id' => $boxes->first()->id
//        ]);
//
//        $box = $boxes->first();
//        $numInvites = $box->invites()->count();
//
//        $response = $this->json('POST',
//            route('admin.boxes.invites.send', $box),
//            ['email' => 'test_email@test_email.com', 'role' => 'coach']);
//
//        $response->assertStatus(302);
//
//        $response->assertSessionHas(['flash_success' => "An email has been sent, inviting test_email@test_email.com to become a coach"]);
//
//        $inviteCount = $box->invites()->count();
//
//        $this->assertNotEquals($numInvites, $inviteCount);
//    }
//    public function test_box_coach_cant_send_invite_not_their_box()
//    {
//        Mail::fake();
//
//        // Assert that no mailables were sent...
//        Mail::assertNothingSent();
//
//        $this->loginAsBoxAdmin();
//        $numBoxes = 3;
//
//        $boxes = factory(Box::class, $numBoxes)->create();
//        $user = auth()->user();
//
//        DB::table('box_coaches')->insert([
//            'user_id' => $user->id,
//            'box_id' => $boxes->first()->id
//        ]);
//
//        $box = $boxes[1];
//        $numInvites = $box->invites()->count();
//
//        $response = $this->json('POST',
//            route('admin.boxes.invites.send', $box),
//            ['email' => 'test_email@test_email.com', 'role' => 'coach']);
//
//        $response->assertStatus(302);
//
//        $response->assertSessionHas(['flash_danger' => "You do not have access to do that."]);
//
//
//        $inviteCount = $box->invites()->count();
//
//        //Invite wasn't sent
//        $this->assertEquals($numInvites, $inviteCount);
//    }
//

    /**
     *
     */
    public function test_box_admin_can_delete_an_invite()
    {
        Mail::fake();

        // Assert that no mailables were sent...
        Mail::assertNothingSent();

        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        $box = $boxes->first();

        DB::table('box_admins')->insert([
            'user_id' => $user->id,
            'box_id' => $box->id
        ]);

        $invite = Invite::create([
            'box_id' => $box->id,
            'email' => 'test_email@test_email.com',
            'token' => 'fakeToken',
            'role' => 'coach'
        ]);

        $numInvites = $box->invites()->count();

        $response = $this->json('POST',
            route('admin.boxes.invites.delete', [$box, $invite]));

        $response->assertStatus(302);

        $response->assertSessionHas(['flash_success' => "Successfully deleted the invite to test_email@test_email.com"]);

        $inviteCount = $box->invites()->count();

        $this->assertNotEquals($numInvites, $inviteCount);
    }

    /**
     *
     */
    public function test_box_admin_cant_delete_not_their_box()
    {
        Mail::fake();

        // Assert that no mailables were sent...
        Mail::assertNothingSent();

        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        $box = $boxes->first();

        DB::table('box_admins')->insert([
            'user_id' => $user->id,
            'box_id' => $boxes[1]->id
        ]);

        $invite = Invite::create([
            'box_id' => $box->id,
            'email' => 'test_email@test_email.com',
            'token' => 'fakeToken',
            'role' => 'coach'
        ]);

        $numInvites = $box->invites()->count();

        $response = $this->json('POST',
            route('admin.boxes.invites.delete', [$box, $invite]));

        $response->assertStatus(302);

        $response->assertSessionHas(['flash_danger' => "You do not have access to do that."]);

        $inviteCount = $box->invites()->count();

        $this->assertEquals($numInvites, $inviteCount);
    }

    /**
     *
     */
    public function test_box_owner_can_delete_an_invite()
    {
        Mail::fake();

        // Assert that no mailables were sent...
        Mail::assertNothingSent();

        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        $box = $boxes->first();

        DB::table('box_owners')->insert([
            'user_id' => $user->id,
            'box_id' => $box->id
        ]);

        $invite = Invite::create([
            'box_id' => $box->id,
            'email' => 'test_email@test_email.com',
            'token' => 'fakeToken',
            'role' => 'coach'
        ]);

        $numInvites = $box->invites()->count();

        $response = $this->json('POST',
            route('admin.boxes.invites.delete', [$box, $invite]));

        $response->assertStatus(302);

        $response->assertSessionHas(['flash_success' => "Successfully deleted the invite to test_email@test_email.com"]);

        $inviteCount = $box->invites()->count();

        $this->assertNotEquals($numInvites, $inviteCount);
    }

    /**
     *
     */
    public function test_box_owner_cant_delete_not_their_box()
    {
        Mail::fake();

        // Assert that no mailables were sent...
        Mail::assertNothingSent();

        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        $box = $boxes->first();

        DB::table('box_owners')->insert([
            'user_id' => $user->id,
            'box_id' => $boxes[1]->id
        ]);

        $invite = Invite::create([
            'box_id' => $box->id,
            'email' => 'test_email@test_email.com',
            'token' => 'fakeToken',
            'role' => 'coach'
        ]);

        $numInvites = $box->invites()->count();

        $response = $this->json('POST',
            route('admin.boxes.invites.delete', [$box, $invite]));

        $response->assertStatus(302);

        $response->assertSessionHas(['flash_danger' => "You do not have access to do that."]);

        $inviteCount = $box->invites()->count();

        $this->assertEquals($numInvites, $inviteCount);
    }

//    TODO decide if coaches can delete invites
//    /**
//     *
//     */
//    public function test_box_coach_can_delete_an_invite()
//    {
//        Mail::fake();
//
//        // Assert that no mailables were sent...
//        Mail::assertNothingSent();
//
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
//        $invite = Invite::create([
//            'box_id' => $box->id,
//            'email' => 'test_email@test_email.com',
//            'token' => 'fakeToken',
//            'role' => 'coach'
//        ]);
//
//        $numInvites = $box->invites()->count();
//
//        $response = $this->json('POST',
//            route('admin.boxes.invites.delete', [$box, $invite]));
//
//        $response->assertStatus(302);
//
//        $response->assertSessionHas(['flash_success' => "Successfully deleted the invite to test_email@test_email.com"]);
//
//        $inviteCount = $box->invites()->count();
//
//        $this->assertNotEquals($numInvites, $inviteCount);
//    }
//
//    /**
//     *
//     */
//    public function test_box_coach_cant_delete_not_their_box()
//    {
//        Mail::fake();
//
//        // Assert that no mailables were sent...
//        Mail::assertNothingSent();
//
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
//            'box_id' => $boxes[1]->id
//        ]);
//
//        $invite = Invite::create([
//            'box_id' => $box->id,
//            'email' => 'test_email@test_email.com',
//            'token' => 'fakeToken',
//            'role' => 'coach'
//        ]);
//
//        $numInvites = $box->invites()->count();
//
//        $response = $this->json('POST',
//            route('admin.boxes.invites.delete', [$box, $invite]));
//
//        $response->assertStatus(302);
//
//        $response->assertSessionHas(['flash_danger' => "You don't have permission to do that."]);
//
//        $inviteCount = $box->invites()->count();
//
//        $this->assertEquals($numInvites, $inviteCount);
//    }

    /**
     *
     */
    public function test_duplicate_invite_cant_be_sent()
    {
        Mail::fake();

        // Assert that no mailables were sent...
        Mail::assertNothingSent();

        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        DB::table('box_admins')->insert([
            'user_id' => $user->id,
            'box_id' => $boxes->first()->id
        ]);

        $box = $boxes->first();
        $numInvites = $box->invites()->count();

        $response = $this->json('POST',
            route('admin.boxes.invites.send', $box),
            ['email' => 'test_email@test_email.com', 'role' => 'coach']);

        $response->assertStatus(302);

        $response->assertSessionHas(['flash_success' => "An email has been sent, inviting test_email@test_email.com to become a coach"]);

        $inviteCount = $box->invites()->count();

        $this->assertNotEquals($numInvites, $inviteCount);

        $response2 = $this->json('POST',
            route('admin.boxes.invites.send', $box),
            ['email' => 'test_email@test_email.com', 'role' => 'coach']);

        $response2->assertStatus(302);

        $response2->assertSessionHas(['flash_warning' => "There is already an invite for that user in that role."]);


        $inviteCount = $box->invites()->count();

        $this->assertNotEquals($numInvites, $inviteCount);
    }

    /**
     *
     */
    public function test_duplicate_invite_cant_be_sent_for_user_in_role()
    {
        Mail::fake();

        // Assert that no mailables were sent...
        Mail::assertNothingSent();

        $testUser = User::create([
            'first_name' => 'fake',
            'last_name' => 'F',
            'email' => 'Fake@fake.com',
            'password' => 'fake',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        DB::table('box_admins')->insert([
            'user_id' => $user->id,
            'box_id' => $boxes->first()->id
        ]);

        DB::table('box_coaches')->insert([
            'user_id' => $testUser->id,
            'box_id' => $boxes->first()->id
        ]);

        $box = $boxes->first();
        $numInvites = $box->invites()->count();

        $response2 = $this->json('POST',
            route('admin.boxes.invites.send', $box),
            ['email' => $testUser->email, 'role' => 'coach']);

        $response2->assertStatus(302);

        $response2->assertSessionHas(['flash_warning' => "Fake@fake.com is already in the coach role."]);

        $inviteCount = $box->invites()->count();

        $this->assertEquals($numInvites, $inviteCount);
    }

    /**
     *
     */
    public function test_box_admins_can_view_only_their_invites()
    {
        Mail::fake();

        // Assert that no mailables were sent...
        Mail::assertNothingSent();

        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        $box = $boxes->first();

        DB::table('box_admins')->insert([
            'user_id' => $user->id,
            'box_id' => $box->id
        ]);

        $first = Invite::create([
            'box_id' => $box->id,
            'email' => 'test_email@test_email.com',
            'token' => 'fakeToken',
            'role' => 'coach'
        ]);
        $second = Invite::create([
            'box_id' => $box->id,
            'email' => 'test_email@test_email.com',
            'token' => 'fakeToken',
            'role' => 'coach'
        ]);
        Invite::create([
            'box_id' => $boxes[1]->id,
            'email' => 'test_email@test_email.com',
            'token' => 'fakeToken',
            'role' => 'coach'
        ]);

        $invites = $box->invites()->get();

        $this->assertEquals(2, $invites->count());
        $this->assertEquals($first->id, $invites->first()->id);
        $this->assertEquals($second->id, $invites[1]->id);
    }

    /**
     *
     */
    public function test_box_owners_can_view_only_their_invites()
    {
        Mail::fake();

        // Assert that no mailables were sent...
        Mail::assertNothingSent();

        $this->loginAsBoxAdmin();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        $box = $boxes->first();

        DB::table('box_owners')->insert([
            'user_id' => $user->id,
            'box_id' => $box->id
        ]);

        $first = Invite::create([
            'box_id' => $box->id,
            'email' => 'test_email@test_email.com',
            'token' => 'fakeToken',
            'role' => 'coach'
        ]);
        $second = Invite::create([
            'box_id' => $box->id,
            'email' => 'test_email@test_email.com',
            'token' => 'fakeToken',
            'role' => 'coach'
        ]);
        Invite::create([
            'box_id' => $boxes[1]->id,
            'email' => 'test_email@test_email.com',
            'token' => 'fakeToken',
            'role' => 'coach'
        ]);

        $invites = $box->invites()->get();

        $this->assertEquals(2, $invites->count());
        $this->assertEquals($first->id, $invites->first()->id);
        $this->assertEquals($second->id, $invites[1]->id);
    }

    /**
     *
     */
    public function test_box_coaches_can_view_only_their_invites()
    {
        Mail::fake();

        // Assert that no mailables were sent...
        Mail::assertNothingSent();

        $this->loginAsCoach();
        $numBoxes = 3;

        $boxes = factory(Box::class, $numBoxes)->create();
        $user = auth()->user();

        $box = $boxes->first();

        DB::table('box_coaches')->insert([
            'user_id' => $user->id,
            'box_id' => $box->id
        ]);

        $first = Invite::create([
            'box_id' => $box->id,
            'email' => 'test_email@test_email.com',
            'token' => 'fakeToken',
            'role' => 'coach'
        ]);
        $second = Invite::create([
            'box_id' => $box->id,
            'email' => 'test_email@test_email.com',
            'token' => 'fakeToken',
            'role' => 'coach'
        ]);
        Invite::create([
            'box_id' => $boxes[1]->id,
            'email' => 'test_email@test_email.com',
            'token' => 'fakeToken',
            'role' => 'coach'
        ]);

        $invites = $box->invites()->get();

        $this->assertEquals(2, $invites->count());
        $this->assertEquals($first->id, $invites->first()->id);
        $this->assertEquals($second->id, $invites[1]->id);
    }
}
