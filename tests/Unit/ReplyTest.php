<?php

namespace Tests\Unit;

use App\Models\Reply;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp():void
    {
        parent::setUp();
        $this->reply = Reply::factory()->create();
    }

    function test_it_has_an_owner()
    {
//        $reply = Reply::factory()->create();
        $this->assertInstanceOf(User::class, $this->reply->owner);
    }
}
