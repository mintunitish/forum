<?php
/**
 * Created by PhpStorm.
 * User: Nitish Kumar
 * Date: 8/4/2018
 * Time: 4:18 PM
 */

namespace Tests\Unit;

use Tests\TestCase;

class ChannelTest extends TestCase
{
    /** @test */
    function a_channel_consists_of_threads()
    {
        $channel = create('App\Channel');
        $thread = create('App\Thread', ['channel_id' => $channel->id]);

        $this->assertTrue($channel->threads->contains($thread));
    }
}