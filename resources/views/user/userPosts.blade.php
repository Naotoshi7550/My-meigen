<x-layout title="名言 by俺 | 投稿一覧">

    <!-- 戻るボタン -->
    <div class="flex items-center text-gray-600 hover:text-gray-400 my-6 ml-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>
        <a href="{{ session('pageUrl') }}">ホームに戻る</a>
    </div>

    <!-- ユーザー名を表示 -->
    <div class="flex justify-center w-9/12 mx-auto py-1 bg-gray-300 rounded-2xl mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <h2 class="ml-1 items-center">{{ $postuser->name }}&ensp;|&ensp;投稿一覧</h2>
    </div>

    <p class="text-center">{{ $postuser->name }} さんの投稿一覧です</p>
    <!-- post本体 -->
    <div class="w-11/12  mx-auto border-2 rounded-lg pt-6 mb-12">

    @if ($posts->count() === 0)
    <p class="text-gray-500 text-center italic mb-4">投稿はありません</p>
    @endif

    @foreach ($posts as $post)
        <div class="mb-8 border-b relative">
            <p class="w-10/12 mx-auto mb-6">{{ $post->content }}</p>
            <div class="flex justify-center align-center mb-6">
                @auth
                    @php
                    $postService = new App\Services\PostService();
                    $hasLikedByLoginUser = $postService->hasLikedByUser($post->id, \Illuminate\Support\Facades\Auth::id())
                    @endphp
                    @if ($hasLikedByLoginUser === true)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="rgb(246, 196, 34)" viewBox="0 0 24 24" stroke-width="1.5" stroke="none" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="rgb(219, 219, 219)" viewBox="0 0 24 24" stroke-width="1.0" stroke="rgb(144, 144, 144)" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                        </svg>
                    @endif
                @endauth

                @guest
                    <svg xmlns="http://www.w3.org/2000/svg" fill="rgb(219, 219, 219)" viewBox="0 0 24 24" stroke-width="1.0" stroke="rgb(144, 144, 144)" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                    </svg>
                @endguest
                <p class="ml-2">{{ $post->num_of_likes }}</p>
            </div>
            <form class="absolute inset-0" action="{{ route('post.detail', ['id' => $post->id]) }}" method="GET">
                <button type="submit" class="w-full h-full"></button>
            </form>
        </div>
    @endforeach
    <!-- /post本体 -->

    {{ $posts->onEachSide(3)->links() }}
    </div>

</x-layout>