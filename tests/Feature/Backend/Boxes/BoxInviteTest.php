<?php

namespace Tests\Feature\Backend\Boxes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BoxInviteTest extends TestCase
{

    //TODO box admin can send an invite
    //TODO box owner can send an invite
    //TODO coach can send an invite
    //TODO box admin can delete an invite
    //TODO box owner can delete an invite
    //TODO coach can delete an invite
    //TODO invite can't be sent if one already exists with email/role
    //TODO box/coach/owner can view all invites

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
