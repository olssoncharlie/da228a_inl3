<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class HerbsTest extends TestCase
{
    /**
     * Test so that the user can't view "edit herbs" when not logged in.
     *
     * @return void
     */
    public function testEditWhenNotLoggedIn()
    {
        $response = $this->get('/herbs/1/edit');

        $response->assertStatus(302)
                 ->assertRedirect('/login');
    }

    /**
     * Test that user can edit herbs when logged in 
     *
     * @return void
     */
    public function testEditWhenLoggedIn()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/herbs/1')
                         ->assertStatus(200);
    }

    /**
     * Test that user can add herbs when logged in 
     *
     * @return void
     */
    public function testAddWhenLoggedIn()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/herbs/create')
                         ->assertStatus(200);
    }

    /**
     * Test that user can't add herbs when not logged in 
     *
     * @return void
     */
    public function testAddWhenNotLoggedIn()
    {
        $response = $this->get('/herbs/create');

        $response->assertStatus(302)
                 ->assertRedirect('/login');
    }
}
