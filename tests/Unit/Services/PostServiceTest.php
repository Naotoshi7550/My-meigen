<?php

namespace Tests\Unit\Services;

use App\Services\PostService;
use Mockery;
use PHPUnit\Framework\TestCase;

class PostServiceTest extends TestCase
{
    /**
     * @runInSeparateProcess
     * @return void
     */
    public function test_get_num_of_liked_users(): void
    {
        $postService = new PostService();

        $mock = Mockery::mock('alias:App\Models\PostLike');
        $mock->shouldReceive('where->get')->andReturn(collect([
            'postLike1', 
            'postLike2', 
            'postLike3',
        ]));
        $num = $postService->getNumOfLikedUsers(1);

        $result = false;
        if ($num === 3){
            $result = true;
        }
        $this->assertTrue($result);
    }


    /**
     * @runInSeparateProcess
     * @return void
     */
    public function test_has_liked_by_user_True(): void
    {
        $postService = new PostService();

        $mock = Mockery::mock('alias:App\Models\PostLike');
        $mock->shouldReceive('where->first')->andReturn((object)[
            'id' => 1,
            'post_id' => 1,
            'user_id' => 1,
        ]);
        $result = $postService->hasLikedByUser(1, 1);
        $this->assertTrue($result);
    }

    /**
     * @runInSeparateProcess
     * @return void
     */
    public function test_has_liked_by_user_False(): void
    {
        $postService = new PostService();

        $mock = Mockery::mock('alias:App\Models\PostLike');
        $mock->shouldReceive('where->first')->andReturn(null);

        $result = $postService->hasLikedByUser(2, 1);
        $this->assertFalse($result);
    }


    /**
     * @runInSeparateProcess
     * @return void
     */
    public function test_get_num_of_likes_by_one_user_Return0(): void
    {
        $postService = new PostService();

        $mockPostLike = Mockery::mock('alias:App\Models\PostLike');
        $mockPostLike->shouldReceive('where->first')->andReturn(null);

        $result = false;
        $num = $postService->getNumOfLikesByOneUser(2, 1);
        if ($num === 0){
            $result = true;
        }
        $this->assertTrue($result);
    }


    /**
     * @runInSeparateProcess
     * @return void
     */
    public function test_get_num_of_likes_by_one_user_Return5(): void
    {
        $postService = new PostService();

        $mockPostLike = Mockery::mock('alias:App\Models\PostLike');
        $mockPostLike->shouldReceive('where->first')->andReturn((object)[
            'id' => 1,
            'post_id' => 1,
            'user_id' => 1,
            'num_of_likes' => 5
        ]);

        $result = false;
        $num = $postService->getNumOfLikesByOneUser(1, 1);
        if ($num === 5){
            $result = true;
        }
        $this->assertTrue($result);
    }


    /**
     * @runInSeparateProcess
     * @return void
     */
    public function test_check_own_post(): void
    {
        $postService = new PostService();

        $mock = Mockery::mock('alias:App\Models\Post');
        $mock->shouldReceive('where->first')->andReturn((object)[
            'id' => 1,
            'user_id' => 1,
            'num_of_likes' => 5,
        ]);

        $result = $postService->checkOwnPost(1, 1);
        $this->assertTrue($result);

        $result = $postService->checkOwnPost(1, 2);
        $this->assertFalse($result);
    }


    /**
     * @runInSeparateProcess
     * @return void
     */
    public function test_get_all_likes_Return9(): void
    {
        $postService = new PostService();

        $mock = Mockery::mock('alias:App\Models\Post');
        $mock->shouldReceive('where->get')->andReturn((array)[
            (object)[
                'id' => 1,
                'user_id' => 1,
                'num_of_likes' => 2,
            ],
            (object)[
                'id' => 5,
                'user_id' => 1,
                'num_of_likes' => 3,
            ],
            (object)[
                'id' => 7,
                'user_id' => 1,
                'num_of_likes' => 4,
            ],
        ]);

        $result = false;
        $num = $postService->getAllLikes(1);
        if ($num === 9){
            $result = true;
        }
        $this->assertTrue($result);
    }

    /**
     * @runInSeparateProcess
     * @return void
     */
    public function test_get_all_likes_Return0(): void
    {
        $postService = new PostService();

        $mock = Mockery::mock('alias:App\Models\Post');
        $mock->shouldReceive('where->get')->andReturn(null);

        $result = false;
        $num = $postService->getAllLikes(1);
        if ($num === 0){
            $result = true;
        }
        $this->assertTrue($result);
    }
}