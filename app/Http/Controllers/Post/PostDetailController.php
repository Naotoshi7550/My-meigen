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
        $postId = $request->id;
        // もしユーザーがログインしていたら、$userIdを定義
        if (null !== $request->user()){
            $userId = $request->user()->id;
        }

        // URLパラメータで渡されたidのpostを取得する
        $post = Post::where('id', $postId)->firstOrFail();

        // このpostにいいねを押したユーザーの人数を取得する
        $numOfLikedUsers = $postService->getNumOfLikedUsers($post->id);

        // ユーザーがログインしていたら、以下のことも追加で実行
        if (isset($userId)){
            // ログインユーザーが対象postにいいねしているかどうかを調べる
            $hasLikedByLoginUser = $postService->hasLikedByUser($postId, $userId);
            // ログインユーザーが対象postにいいねをした数を取得
            $numOfLikesByLoginUser = $postService->getNumOfLikesByOneUser($postId, $userId);
        }

        
        if (isset($userId)){
            return view('post.postDetail')->with('post', $post)
                ->with('numOfLikedUsers', $numOfLikedUsers)
                ->with('hasLikedByLoginUser', $hasLikedByLoginUser)
                ->with('numOfLikesByLoginUser', $numOfLikesByLoginUser);
        } else {
            return view('post.postDetail')->with('post', $post)->with('numOfLikedUsers', $numOfLikedUsers);
        }
    }
}
