<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserPostsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $postuserId = $request->route('id');  // URLパラメータからuserIdを取得
        
        $postuser = User::where('id', $postuserId)->first();
        $posts = Post::where('user_id', $postuserId)->orderBy('id', 'DESC')->paginate(10);

        return view('user.userPosts')->with('postuser', $postuser)
            ->with('posts', $posts);
    }
}
