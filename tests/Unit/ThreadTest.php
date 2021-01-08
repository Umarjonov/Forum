<?php

namespace Tests\Unit;

use App\Models\Thread;
use App\Models\Channel;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    protected $thread;

    public function setUp():void
    {
        parent::setUp();
        $this->thread = create(Thread::class);
    }

    function test_a_thread_can_make_a_string_path()
    {
//        $thread = create(Thread::class);

//        $this->assertEquals('/threads/' . $thread->channel->slug . '/' . $thread->id, $thread->path() );

        $this->assertEquals(
            "/threads/{$this->thread->channel->slug}/{$this->thread->id}", $this->thread->path()
        );
    }

    public function test_a_thread_has_replies()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
    }

    function test_a_thread_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->thread->creator);
    }

    /** @test */
    public function test_a_thread_can_add_a_reply()
    {
        $this->thread->addReply([
            'body'      =>  'Foobar',
            'user_id'   =>  1
        ]);

        $this->assertCount(1, $this->thread->replies);
    }

    function test_a_thread_belongs_to_a_channel()
    {
//        $thread = create(Thread::class);

        $this->assertInstanceOf(Channel::class, $this->thread->channel);
    }

}
