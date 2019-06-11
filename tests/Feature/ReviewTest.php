<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class ReviewTest extends TestCase
{
    /**
     * Test so that the user can't view "edit review" when not logged in.
     *
     * @return void
     */
    public function testEditWhenNotLoggedIn()
    {
        $response = $this->get('/reviews/1/edit');

        $response->assertStatus(302)
                 ->assertRedirect('/login');
    }


    /**
     * Controll that user can edit when logged in 
     *
     * @return void
     */
    public function testEditWhenLoggedIn()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/reviews/1')
                         ->assertStatus(200);
    }

    /**
     * Controll that it is possible to edit a review
     *
     * @return void
     */
    public function testCorrectPUTmethod()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->json('PUT', '/reviews/1', [
                            'user_id' => 1,
                            'comment' => "testing string comment",
                            'herb' => 1
                         ])
                         ->assertRedirect('/reviews/1')
                         ->assertStatus(302);
    }

    /**
     * Controll that it is possible to edit a review
     * Expecting 500 because review id "asd" doesnt exist
     * @return void
     */
    public function testIncorrectReviewURL()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->json('PUT', '/reviews/asd', [
                            'user_id' => 1,
                            'comment' => "testing string comment",
                            'herb' => 1
                         ])
                         ->assertStatus(500);
    }


    /**
     * Controll that it is possible to edit a review
     * Expecting 500 because user_id cant be a string
     * @return void
     */
    public function testIncorrectUserId()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->json('PUT', '/reviews/1', [
                            'user_id' => 'this is a string',
                            'comment' => "testing string comment",
                            'herb' => 1
                         ])
                         ->assertStatus(500);
    }

        /**
     * Controll that it is possible to edit a review
     * Expecting 500 because user_id 1111111 doesnt exist.
     * @return void
     */
    public function testUserIdDoesntExist()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->json('PUT', '/reviews/1', [
                            'user_id' => 11111111,
                            'comment' => 'Testing comment',
                            'herb' => 1
                         ])
                         ->assertStatus(500);
    }
}
