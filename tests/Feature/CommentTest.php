<?php

namespace Tests\Feature;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class CommentTest extends TestCase
{
    /**
     * @test
     */
    public function a_user_can_comment()
    {
        $this->actingAs(factory(User::class)->create());

        $comment = factory(Comment::class)->create();

        Auth::user()->comment($comment);

        self::assertCount(1, Auth::user()->comments);
        self::assertEquals(Auth::user()->getAuthIdentifier(), $comment->user->id);
    }

    /** @test */
    public function a_comment_can_be_commented()
    {
        $commentParent = factory(Comment::class)->create();
        $commentChild = factory(Comment::class)->create();

        $commentParent->comment($commentChild);

        self::assertCount(1, $commentParent->comments);
        self::assertCount(0, $commentChild->comments);
    }

    /** @test */
    public function a_post_can_be_commented()
    {
        $post = factory(Post::class)->create();
        $comment = factory(Comment::class)->create();

        $post->comment($comment);

        self::assertCount(1, $post->comments);
    }
}
