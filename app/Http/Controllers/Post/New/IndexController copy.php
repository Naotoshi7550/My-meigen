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
        // ログインしているなら、ログインユーザーの情報を取得する
        if (null !== $request->user()){
            $user = $request->user();
        }

        // 投稿をidの降順で10件ずつ取得
        $posts = Post::orderBy('id', 'DESC')->paginate(10);
        // 投稿ごとに「いいね」の総数$sumUpLikeを算出し、配列$sumUpLikesに格納
        $postLikes = [];
        foreach ($posts as $post){
            // $postLikes[] = $post->postLikes;   // この行の$post->postLikesはうまくいく。他のと何が違う？
        }
        $sumUpLike = 0;
        $sumUpLikes = [];
        foreach ($postLikes as $postLike){
            foreach ($postLike as $like){
                $sumUpLike += $like->num_of_likes;       // num_of_likesは、post_likesテーブルのカラム名
            }
            $sumUpLikes[] = $sumUpLike;
            $sumUpLike = 0;
        }
        if (isset($user)){
            return view('post.new.index')->with('user', $user)->with('posts', $posts)->with('sumUpLikes', $sumUpLikes);
        } else {
            return view('post.new.index')->with('posts', $posts)->with('sumUpLikes', $sumUpLikes);
        }


        // 各投稿のいいね数を取得し、順に$arr_numOfLikesに格納する
        // $arr_numOfLikes = [];
        // foreach ($posts as $post){
        //     $arr_numOfLikes[] = $postService->getNumOfLikes($post->id);
        // }

        // if (isset($user)){
        //     return view('post.new.index')->with('user', $user)->with('posts', $posts)->with('arr_numOfLikes', $arr_numOfLikes);
        // } else {
        //     return view('post.new.index')->with('posts', $posts)->with('arr_numOfLikes', $arr_numOfLikes);
        // }
    }
}
