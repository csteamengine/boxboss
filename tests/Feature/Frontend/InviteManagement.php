<?php

//namespace Tests\Feature\Frontend;

use App\Models\Auth\User;
use App\Models\Box;
use App\Models\Invite;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InviteManagement extends TestCase
{
    use RefreshDatabase;
    /**
     * User doesn't have any invites but can view invites page
     *
     * @return void
     */
    public function test_user_can_view_invites_no_invites()
    {
        $user = factory(User::class, 1)->create()->first();

        $this->actingAs($user);

        $response = $this->get('/invites');

        $response->assertStatus(200);
    }

    /**
     * User has invites and can view the invites page
     *
     * @return void
     */
    public function test_user_can_view_invites()
    {
        $user = factory(User::class, 1)->create()->first();
        factory(Box::class, 3)->create();

        Invite::create([
            'email' => $user->email,
            'box_id' => 1, //Box doesn't matter
            'role' => 'coach',
            'token' => 'fake_token'
        ]);

        Invite::create([
            'email' => $user->email,
            'box_id' => 2,
            'role' => 'owner',
            'token' => 'fake_token'
        ]);

        Invite::create([
            'email' => $user->email,
            'box_id' => 3,
            'role' => 'admin',
            'token' => 'fake_token'
        ]);

        $this->actingAs($user);

        $invites = $user->invites();

        $this->assertEquals(3, $invites->count());

        $response = $this->get('/invites');

        $response->assertStatus(200);
    }

    /**
     * User has invites and can view the invites page
     *
     * @return void
     */
    public function test_user_can_accept_their_invites()
    {
        $user = factory(User::class, 1)->create()->first();
        factory(Box::class, 3)->create();

        $invite = Invite::create([
            'email' => $user->email,
            'box_id' => 1, //Box doesn't matter
            'role' => 'coach',
            'token' => 'fake_token'
        ]);

        Invite::create([
            'email' => $user->email,
            'box_id' => 2,
            'role' => 'owner',
            'token' => 'fake_token'
        ]);

        Invite::create([
            'email' => $user->email,
            'box_id' => 3,
            'role' => 'admin',
            'token' => 'fake_token'
        ]);

        $this->actingAs($user);

        $response = $this->post(route('frontend.invites.accept', $invite));

        $response->assertStatus(200);

        $invites = $user->invites();

        $this->assertEquals(2, $invites->count());

    }

    /**
     * User has invites and can view the invites page
     *
     * @return void
     */
    public function test_user_cant_accept_not_their_invites()
    {
        $user = factory(User::class, 1)->create()->first();
        factory(Box::class, 3)->create();

        Invite::create([
            'email' => $user->email,
            'box_id' => 1, //Box doesn't matter
            'role' => 'coach',
            'token' => 'fake_token'
        ]);

        Invite::create([
            'email' => $user->email,
            'box_id' => 2,
            'role' => 'owner',
            'token' => 'fake_token'
        ]);

        Invite::create([
            'email' => $user->email,
            'box_id' => 3,
            'role' => 'admin',
            'token' => 'fake_token'
        ]);

        $invite = Invite::create([
            'email' => "test@test.com",
            'box_id' => 3,
            'role' => 'admin',
            'token' => 'fake_token'
        ]);

        $this->actingAs($user);

        $response = $this->post(route('frontend.invites.accept', $invite));

        $response->assertStatus(302);

        $invites = $user->invites();

        $this->assertEquals(3, $invites->count());

    }

    /**
     * User has invites and can view the invites page
     *
     * @return void
     */
    public function test_user_can_decline_their_invites()
    {
        $user = factory(User::class, 1)->create()->first();
        factory(Box::class, 3)->create();

        $invite = Invite::create([
            'email' => $user->email,
            'box_id' => 1, //Box doesn't matter
            'role' => 'coach',
            'token' => 'fake_token'
        ]);

        Invite::create([
            'email' => $user->email,
            'box_id' => 2,
            'role' => 'owner',
            'token' => 'fake_token'
        ]);

        Invite::create([
            'email' => $user->email,
            'box_id' => 3,
            'role' => 'admin',
            'token' => 'fake_token'
        ]);

        $this->actingAs($user);

        $response = $this->post(route('frontend.invites.decline', $invite));

        $response->assertStatus(200);

        $invites = $user->invites();

        $this->assertEquals(2, $invites->count());

    }

    /**
     * User has invites and can view the invites page
     *
     * @return void
     */
    public function test_user_cant_decline_not_their_invites()
    {
        $user = factory(User::class, 1)->create()->first();
        factory(Box::class, 3)->create();

        Invite::create([
            'email' => $user->email,
            'box_id' => 1, //Box doesn't matter
            'role' => 'coach',
            'token' => 'fake_token'
        ]);

        Invite::create([
            'email' => $user->email,
            'box_id' => 2,
            'role' => 'owner',
            'token' => 'fake_token'
        ]);

        Invite::create([
            'email' => $user->email,
            'box_id' => 3,
            'role' => 'admin',
            'token' => 'fake_token'
        ]);

        $invite = Invite::create([
            'email' => "test@test.com",
            'box_id' => 3,
            'role' => 'admin',
            'token' => 'fake_token'
        ]);

        $this->actingAs($user);

        $response = $this->post(route('frontend.invites.decline', $invite));

        $response->assertStatus(302);

        $invites = $user->invites();

        $this->assertEquals(3, $invites->count());

    }
}
