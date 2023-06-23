<?php

namespace Tests\Browser\Post;

use App\Models\Post;
use App\Models\PostLike;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


class LikeCreateTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * 対象のpostに初めていいねをつける場合のテスト
     */
    public function testLikeCreate_first(): void
    {
        $user01 = User::factory()->create([
            'id' => 1,
            'name' => 'a',
            'email' => 'test01@example.com',
            'password' => 'password',
        ]);
        $user02 = User::factory()->create([
            'id' => 2,
            'name' => 'b',
            'email' => 'test02@example.com',
            'password' => 'password',
        ]);

        $post = Post::factory()->create([
            'id' => 1,
            'user_id' => $user01->id,
            'num_of_likes' => 3]);

        // $postLike = PostLike::factory()->create([
        //     'id' => 1,
        //     'post_id' => $post->id,
        //     'user_id' => $user02->id,
        //     'num_of_likes' => 3,
        // ]);


        $this->browse(function (Browser $browser) use ($user02, $post) {
            // user02としてログインした状態で /post/{id}にアクセス
            // actingAsではなくloginAsなので注意
            $browser->loginAs($user02)
                    ->visit('/post/'. $post->id)
                    ->press('#display-likes')  // いいねボタンを表示
                    ->press('button[id="icon-btn"]')  // 1回いいねボタンを押す
                    ->press('保存する')          // いいねを保存するボタンを押す
                    ->assertPathIs('/post/'. $post->id)
                    ->assertSee('投稿詳細');
        });
    }

    /**
     * 対象のpostに2回目以降いいねをつける場合のテスト
     */
    public function testLikeCreate_notfirst(): void
    {
        $user01 = User::factory()->create([
            'id' => 1,
            'name' => 'a',
            'email' => 'test01@example.com',
            'password' => 'password',
        ]);
        $user02 = User::factory()->create([
            'id' => 2,
            'name' => 'b',
            'email' => 'test02@example.com',
            'password' => 'password',
        ]);

        $post = Post::factory()->create([
            'id' => 1,
            'user_id' => $user01->id,
            'num_of_likes' => 3]);

        $postLike = PostLike::factory()->create([
            'id' => 1,
            'post_id' => $post->id,
            'user_id' => $user02->id,
            'num_of_likes' => 3,
        ]);


        $this->browse(function (Browser $browser) use ($user02, $post) {
            // user02としてログインした状態で /post/{id}にアクセス
            // actingAsではなくloginAsなので注意
            $browser->loginAs($user02)
                    ->visit('/post/'. $post->id)
                    ->press('#display-likes')  // いいねボタンを表示
                    ->press('button[id="icon-btn"]')  // いいねボタンを合計2回押す
                    ->press('button[id="icon-btn"]')
                    ->press('保存する')          // いいねを保存するボタンを押す
                    ->assertPathIs('/post/'. $post->id)
                    ->assertSee('投稿詳細');
        });
    }

    /**
     * 上限を越えた数のいいねをつけようとした際、きちんとエラーになるか調べるテスト
     */
    public function testLikeCreate_notfirst_fail(): void
    {
        $user01 = User::factory()->create([
            'id' => 1,
            'name' => 'a',
            'email' => 'test01@example.com',
            'password' => 'password',
        ]);
        $user02 = User::factory()->create([
            'id' => 2,
            'name' => 'b',
            'email' => 'test02@example.com',
            'password' => 'password',
        ]);

        $post = Post::factory()->create([
            'id' => 1,
            'user_id' => $user01->id,
            'num_of_likes' => 3]);

        $postLike = PostLike::factory()->create([
            'id' => 1,
            'post_id' => $post->id,
            'user_id' => $user02->id,
            'num_of_likes' => 3,  // 既に3いいねをつけている状態
        ]);


        $this->browse(function (Browser $browser) use ($user02, $post) {
            // user02としてログインした状態で /post/{id}にアクセス
            // actingAsではなくloginAsなので注意
            $browser->loginAs($user02)
                    ->visit('/post/'. $post->id)
                    ->press('#display-likes')  // いいねボタンを表示

                    ->press('button[id="icon-btn"]')  // いいねボタンを合計3回押す（＝上限である5を越えたのでエラーになる）
                    ->press('button[id="icon-btn"]')
                    ->press('button[id="icon-btn"]')

                    ->press('保存する')          // いいねを保存するボタンを押す
                    ->assertPathIs('/post/'. $post->id)
                    ->assertSee('いいねは１投稿につき最大5件までです');    //エラーメッセージが表示されているかの確認
        });
    }
}
