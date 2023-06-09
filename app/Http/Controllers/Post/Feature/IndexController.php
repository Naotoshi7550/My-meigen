<?php

namespace App\Http\Controllers\Post\Feature;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // ログインしているなら、ログインユーザーの情報を取得する
        if (null !== $request->user()){
            $user = $request->user();
        }

        // 投稿をidの降順で10件ずつ取得
        $posts = Post::orderBy('num_of_likes', 'DESC')->paginate(10);

        if (isset($user)){
            return view('post.feature.index')->with('user', $user)->with('posts', $posts);
        } else {
            return view('post.feature.index')->with('posts', $posts);
        }
    }
}
