<?php

namespace Tests\Browser\Post;

use App\Models\Post;
use App\Models\PostLike;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PostCreateTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * 新規投稿を作成する機能のテスト
     */
    public function testPostCreate(): void
    {
        $user = User::factory()->create(['id' => 1,]);

        $this->browse(function (Browser $browser) use($user) {
            $browser->loginAs($user)
                    ->visitRoute('post.create.index')    // visitRouteメソッドを使って名前付きルートを指定
                    ->type('post', 'テスト投稿です')   // 投稿内容を入力
                    ->radio('font', 'font10')   // テキストフォントを選択（ラジオボタン）
                    ->press('投稿する')
                    ->assertPathIs('/post/create')
                    ->assertSee('投稿が完了しました');
        });
    }
}
