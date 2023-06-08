<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostCreateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(PostCreateRequest $request)
    {
        // ユーザーidと新規投稿フォームの入力内容を取得して保存
        $post = new Post;
        $post->user_id = $request->user()->id;
        $post->content = $request->postContent();
        $post->save();

        // 同じページにリダイレクトし、投稿完了メッセージを表示
        return redirect()->route('post.create.index')->with('feedback.success', "投稿が完了しました");
    }
}
