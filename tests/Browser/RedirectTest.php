<?php

namespace Tests\Browser;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RedirectTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * トップページにリダイレクト
     */
    public function testRedirectToTopPage(): void
    {
        $user = User::factory()->create(['id' => 1,]);
        $post = Post::factory()->create(['id' => 1, 'user_id' => 1,]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertPathIs('/post/new')
                    ->assertSee('名言 by俺');
        });
    }
}
