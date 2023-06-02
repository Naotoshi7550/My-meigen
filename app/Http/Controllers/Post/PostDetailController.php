<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostDetailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, PostService $postService)
    {
        // URLパラメータで渡されたidのpostを取得する
        $post = Post::where('id', $request->id)->firstOrFail();

        // このpostにいいねを押したユーザーの人数を取得する
        $numOfLikedUsers = $postService->getNumOfLikedUsers($post->id);

        // 戻るボタンで移動する先のURL
            $pageUrl = $request->input('page-url');

        return view('post.postDetail')->with('post', $post)->with('numOfLikedUsers', $numOfLikedUsers)->with('pageUrl', $pageUrl);
    }
}
