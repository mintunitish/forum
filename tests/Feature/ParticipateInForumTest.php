<?php

namespace Tests\Feature;

use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    /** @test */
    function unauthenticated_users_may_not_add_replies()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $thread = create('App\Thread');
        $reply = create('App\Reply');

        $this->post($thread->path().'/replies', $reply->toArray());
    }

    /** @test */
    function an_authenticated_user_can_participate_in_forum_threads()
    {
        $this->be($user = create('App\User'));
        $thread = create('App\Thread');
        $reply = make('App\Reply');

        $this->withExceptionHandling()->post($thread->path().'/replies', $reply->toArray());

        $this->get($thread->path())->assertSee($reply->body);
    }
}
