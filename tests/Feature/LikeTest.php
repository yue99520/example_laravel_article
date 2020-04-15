<?php

namespace Tests\Feature;

use App\Comment;
use App\Post;
use App\User;
use Tests\TestCase;

class LikeTest extends TestCase
{
    /** @test */
    public function a_comment_can_be_liked()
    {
        $this->actingAs(factory(User::class)->create());

        $comment = factory(Comment::class)->create();

        $comment->like();

        $this->assertCount(1, $comment->likes);
        $this->assertTrue($comment->likes->contains(auth()->id()));
    }

    /** @test */
    public function a_post_can_be_liked()
    {
        $this->actingAs(factory(User::class)->create());

        $post = factory(Post::class)->create();

        $post->like();

        $this->assertCount(1, $post->likes);
        $this->assertTrue($post->likes->contains(auth()->id()));
    }
}
