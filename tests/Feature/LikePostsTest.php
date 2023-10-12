<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LikePostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function posts_can_be_liked(): void
    {
        $this->actingAs(User::factory()->create());
        $post = Post::factory()->create();

        $post->like();

        $this->assertCount(1, $post->likes);
    }

    /** @test */
    public function comments_can_be_liked(): void
    {
        $this->actingAs(User::factory()->create());
        $comment = Comment::factory()->create();

        $comment->like();

        $this->assertCount(1, $comment->likes);
    }
}