<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PostLike;
use App\Models\User;
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

        $user = User::where('id', $userId)->first();
        $postLikes = PostLike::where('user_id', $userId)->orderBy('updated_at', 'DESC')->paginate(10);
        
        return view('user.userLikes')->with('user', $user)->with('postLikes', $postLikes);

    }
}
