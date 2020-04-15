<?php

namespace Tests\Feature;

use App\Kanban;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * @test
     */
    public function a_kanban_can_post()
    {
        $this->actingAs(factory(User::class)->create());

        $kanban = factory(Kanban::class)->create();

        $post = factory(Post::class)->create();

        $kanban->post($post);

        self::assertCount(1, $kanban->posts);
        self::assertTrue($kanban->posts->contains('id', $post->id));
        self::assertEquals($kanban->id, $post->kanban->id);
    }

    /** @test */
    public function a_user_can_post()
    {
        $this->actingAs(factory(User::class)->create());

        $post = factory(Post::class)->create();

        Auth::user()->post($post);

        self::assertCount(1, Auth::user()->posts);
        self::assertEquals(Auth::user()->id, $post->user->id);
    }
}
