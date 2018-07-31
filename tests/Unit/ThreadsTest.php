<?php
/**
 * Created by PhpStorm.
 * User: Nitish Kumar
 * Date: 7/31/2018
 * Time: 11:33 PM
 */

namespace Tests\Unit;


use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    protected $thread;

    function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();
    }

    /** @test */
    function a_thread_has_replies()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
    }

    /** @test */
    function a_thread_belongs_to_a_user()
    {
        $this->assertInstanceOf('App\User', $this->thread->owner);
    }

    /** @test */
    function a_thread_can_add_a_reply()
    {
        $this->thread->addReply([
            'body' => 'FooBar',
            'user_id' => 1
        ]);

        $this->assertCount(1, $this->thread->replies);
    }
}