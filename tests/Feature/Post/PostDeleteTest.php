<?php

namespace Tests\Feature\Post;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostDeleteTest extends TestCase
{
    use RefreshDatabase;


    public function test_post_delete_successed(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);   //指定したユーザーでログインした状態にする
        $response = $this->delete('/post/'. $post->id. '/delete');

        $response->assertStatus(302);
        $response->assertRedirect('/post/new');
    }
}
