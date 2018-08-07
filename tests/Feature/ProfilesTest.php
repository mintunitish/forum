<?php
/**
 * Created by PhpStorm.
 * User: Nitish Kumar
 * Date: 8/7/2018
 * Time: 10:10 PM
 */

namespace Tests\Feature;

use Tests\TestCase;

class ProfilesTest extends TestCase
{
    /** @test */
    function a_user_has_a_profile()
    {
        $user = create('App\User');
        $this->get("/profiles/{$user->name}")
            ->assertSee($user->name);
    }

    /** @test */
    function a_profile_has_users_associated_thread()
    {
        $user = create('App\User');
        $thread = create('App\Thread', ['user_id' => $user->id]);
        $this->get("/profiles/{$user->name}")
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}