<?php

namespace App\Http\Controllers\Post\New;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, PostService $postService)
    {
        // 戻るボタン用のURLをセッション変数に保存
        if (!$request->session()->exists('pageUrl')){
            $pageUrl = route('post.new.index');
            $request->session()->put('pageUrl', $pageUrl);
        }

        // ログインしているなら、ログインユーザーの情報を取得する
        if (null !== $request->user()){
            $user = $request->user();
        }

        // 投稿をidの降順で10件ずつ取得
        $posts = Post::orderBy('id', 'DESC')->paginate(10);

        if (isset($user)){
            return view('post.new.index')->with('user', $user)->with('posts', $posts);
        } else {
            return view('post.new.index')->with('posts', $posts);
        }

        // 投稿ごとに「いいね」の総数を算出し、順に配列$postLikesに格納
        // $postLikes = [];
        // foreach ($posts as $post){
        //     $postLikes[] = $postService->getNumOfLikes($post->id);
        // }

        // if (isset($user)){
        //     return view('post.new.index')->with('user', $user)->with('posts', $posts)->with('postLikes', $postLikes);
        // } else {
        //     return view('post.new.index')->with('posts', $posts)->with('postLikes', $postLikes);
        // }
    }
}
