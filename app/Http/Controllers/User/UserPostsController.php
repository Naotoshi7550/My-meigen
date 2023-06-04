<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class UserPostsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $userId = $request->route('id');  // URLパラメータからuserIdを取得

        $posts = Post::where('user_id', $userId)->orderBy('id', 'DESC')->paginate(10);

        return view('user.userPosts')->with('id', $userId)->with('posts', $posts);
    }
}
