<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\PostService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, PostService $postService)
    {
        // URLパラメータで渡されたidをもとにユーザー情報を取得する
        $user = User::where('id', $request->id)->firstOrFail();

        // そのユーザーが獲得したいいねの個数を取得
        $allLikes = $postService->getAllLikes($user->id);

        return view('user.index')->with('user', $user)
            ->with('allLikes', $allLikes);
    }
}
