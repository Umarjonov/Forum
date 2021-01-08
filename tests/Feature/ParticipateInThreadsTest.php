<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInThreadsTest extends TestCase
{
    use DatabaseMigrations;

    function test_unauthenticated_users_may_not_add_replies()
    {
//        $this->expectException('Illuminate\Auth\AuthenticationException');
        $this->withExceptionHandling()
            ->post('/threads/some-channel/1/replies',[])
            ->assertRedirect('/login');
    }

    function test_an_authenticated_user_participate_in_forum_threads()
    {
        $this->be( $user = User::factory()->create() );

        $thread = Thread::factory()->create();

        $reply = Reply::factory()->create();
        $this->post($thread->path().'/replies', $reply->toArray());

        $this->get( $thread->path() )
            ->assertSee( $reply->body );
    }

    function test_a_reply_requires_a_body()
    {
        $this->withExceptionHandling()->signIn();

        $thread = create(Thread::class);
        $reply = make(Reply::class, ['body' => null]);

        $this->post($thread->path().'/replies', $reply->toArray())
            ->assertSessionHasErrors('body');
    }
}
