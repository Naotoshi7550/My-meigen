<?php

namespace App\Http\Controllers\Post\Home;

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
        $posts = Post::orderBy('id', 'DESC')->paginate(10);
        foreach ($posts as $post){
            $postLikes = $post->postLikes;
            
        }
        return view('post.home.index')->with('posts', $posts);
    }
}
