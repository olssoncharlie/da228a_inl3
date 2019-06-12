<?php

namespace Tests\Feature;
use App\User;


use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * Test that a user can view the login page
     *
     * @return void
     */
    public function testViewLoginPage()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    /**
     * Test so that the user cant view the login page when logged in 
     *
     * @return void
     */
    public function testLoggedInDontViewLoginPage()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->get('/login')
                         ->assertRedirect('/home');
        
    }
}