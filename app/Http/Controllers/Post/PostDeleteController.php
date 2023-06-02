<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class PostDeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, PostService $postService)
    {
        $postId = $request->route('id');
        $userId = $request->user()->id;

        // 削除しようとしているpostが、ログインユーザーが投稿したものであるかチェック
        if (!$postService->checkOwnPost($postId, $userId))
        {
            throw new AccessDeniedHttpException();
        }
        
        $post = Post::where('id', $postId)->firstOrFail();
        $post->delete();

        return redirect()->route('post.new.index');
    }
}
