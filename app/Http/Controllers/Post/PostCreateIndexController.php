<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostCreateIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // 最後に表示していたホーム画面のURL($pageUrl)をセッション変数に保存（←戻るボタンで使う）
        if (null !== $request->input('page-url')){
            $pageUrl = $request->input('page-url');
            $request->session()->put('pageUrl', $pageUrl);
        }
        
        return view('post.postCreate');
    }
}
