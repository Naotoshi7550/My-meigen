<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // URLパラメータで渡されたidをもとにユーザー情報を取得する
        $user = User::where('id', $request->id)->firstOrFail();

        // 最後に表示していたホーム画面のURL($pageUrl)をセッション変数に保存（←戻るボタンで使う）
        if (null !== $request->input('page-url')){
            $pageUrl = $request->input('page-url');
            $request->session()->put('pageUrl', $pageUrl);
        }

        return view('user.index')->with('user', $user);
    }
}
