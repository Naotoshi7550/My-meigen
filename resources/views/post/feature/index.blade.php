<x-layout title="名言 by俺 | 新着">

    <!-- 「ホームに戻る」ボタン用のURLをセッション変数に保存 -->
    @php
    $pageUrl = $posts->url($posts->currentPage());
    session(['pageUrl' => $pageUrl]);
    @endphp


    <!--  ヘッダー　-->
    <x-header ></x-header>

    <!-- サブヘッダー -->
    @auth
    <x-headerUser>
        @if (isset($user))
        <a href="{{ route('user.top', ['id' => $user->id]) }}" class="underline decoration-1 hover:text-gray-500">{{ $user->name }}</a>
        @endif
    </x-headerUser>
    @endauth
    @guest
    <x-headerUser></x-headerUser>
    @endguest

    <div class="w-11/12  mx-auto border-2 rounded-lg mb-24">
        <div class="bg-blue-400 text-center pt-1 mb-6 rounded-lg">
            <div class="flex justify-center align-center border-b-2 py-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <p class="pl-1">ホーム</p>
            </div>
            <div class="flex justify-around">
                <p class="w-full bg-blue-100 underline"><a href="{{ route('post.new.index') }}" class="text-gray-400 hover:text-gray-500">新着</a></p>
                <p class="w-full bg-blue-400 underline">注目</p>
            </div>
        </div>

        <!-- post本体 -->
        @foreach ($posts as $post)
        <div class="mb-8 border-b relative">
            <p class="w-10/12 mx-auto mb-6 {{ $post->font }}">{!! nl2br(e($post->content)) !!}</p>
            <div class="flex justify-center align-center mb-6">
                @auth
                    @php
                    $postService = new App\Services\PostService();
                    $hasLikedByLoginUser = $postService->hasLikedByUser($post->id, $user->id)
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

        <!-- ページネーション -->
        {{ $posts->onEachSide(3)->links() }}

    </div>
    
    <!-- 新規投稿ボタン -->
    @auth
        <form action="{{ route('post.create.index') }}">
            <button id="create-post" type="submit" class="border-4 rounded-lg text-2xl text-white bg-blue-400 px-4 py-2 hover:bg-blue-500 fixed bottom-6 right-4">新規投稿</button>
        </form>
    @endauth
    @guest
        <form action="{{ route('login') }}">
            <button id="create-post" type="submit" class="border-4 rounded-lg text-xl text-white bg-blue-400 px-4 py-2 hover:bg-blue-500 fixed bottom-6 right-4">新規投稿<br>（要ログイン）</button>
        </form>
    @endguest
    <!-- /新規投稿ボタン -->

</x-layout>