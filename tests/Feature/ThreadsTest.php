<?php
/**
 * Created by PhpStorm.
 * User: Nitish Kumar
 * Date: 7/30/2018
 * Time: 12:22 AM
 */

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_view_all_threads()
    {
        $thread = factory('App\Thread')->create();

        $response = $this->get('/threads');
        $response->assertSee($thread->title);
    }

    /** @test */
    public function a_user_can_view_single_thread()
    {
        $thread = factory('App\Thread')->create();

        $response = $this->get('/threads/'. $thread->id );
        $response->assertSee($thread->title);
    }
}