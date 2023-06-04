<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PostLike;
use Illuminate\Http\Request;

class UserLikesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $userId = $request->route('id');  // URLパラメータからuserIdを取得

        // このユーザーがいいねした投稿を全て取得
        // $postLikes = PostLike::where('user_id', $userId)->orderBy('id', 'DESC')->get();
        // $posts = $postLikes->map(function (PostLike $postLike){
        //     return $postLike->post;
        // });

        // return view('user.userLikes')->with('id', $userId)->with('posts', $posts);

        $postLikes = PostLike::where('user_id', $userId)->orderBy('id', 'DESC')->paginate(10);
        
        return view('user.userLikes')->with('id', $userId)->with('postLikes', $postLikes);

    }
}
