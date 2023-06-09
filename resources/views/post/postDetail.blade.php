<x-layout title="名言 by俺 | 投稿詳細">

    <x-slot name="script">
        <script src="/js/postDetail.js" defer></script>
    </x-slot>

    <!-- 戻るボタン -->
    <div class="flex items-center text-gray-600 hover:text-gray-400 my-6 ml-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>
        <a href="{{ session('pageUrl') }}">ホームに戻る</a>
    </div>
    
    
    <!-- post本体 -->
    <div class="w-11/12 mx-auto border-2 rounded-lg mb-2">
        <h2 class="bg-blue-400 text-center leading-10 mb-4 rounded-t-lg mb-4">投稿詳細</h2>
        <div class="flex justify-between text-sm px-4 mb-8">
            <p class="inline-block bg-gray-300 rounded-xl px-4">by <a href="{{ route('user.top', ['id' => $post->user->id]) }}" class="underline hover:text-gray-500">{{ $post->user->name }}</a></p>
            <p class="text-gray-500">{{ $post->created_at }}</p>
        </div>
        <div class="w-11/12 mx-auto mb-4">
            <!-- postの内容 -->
            <p class="text-xl mb-6">{{ $post->content }}</p>
            <div class="flex justify-center align-center">
                @auth
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
        </div>
    </div>

    <section class="w-11/12 mx-auto">

        <!-- いいね数の表示 -->
        <div class="mb-8">
            <p class="text-gray-500 text-center"> <span class="text-black">{{ $numOfLikedUsers }}</span>人のユーザーが 計<span class="text-black">{{ $post->num_of_likes }}</span>個のいいねをしました</p>
            @auth
            <p class="text-gray-500 text-center">あなたはこの投稿に<span class="text-black">{{ $numOfLikesByLoginUser }}</span>個のいいねをしました</p>
            @endauth
        </div>
        
        <div>
            <!-- バリデーションのエラーメッセージ -->
            @error('add-likes')
            <p class="text-red-500 text-center">※エラー: {{ $message }}</p>
            @enderror
            
            <!-- フラッシュセッションデータ -->
            @if (session('feedback.error'))
            <p class="text-red-500 text-center">※エラー: {{ session('feedback.error') }}</p>
            @endif
            @if (session('feedback.success'))
            <p class="text-green-500 text-center">{{  session('feedback.success') }}</p>
            @endif
        </div>

        <!-- 「いいね」をする -->
        <div class="mb-8">
            <!-- 表示ボタン -->
            <div class="text-center">
                @guest
                <form action="{{ route('login') }}">
                    <button type="submit" class="border-2 border-solid rounded-lg text-md px-4 py-1 underline decoration-yellow-300 decoration-2 hover:bg-yellow-300">この投稿にいいねする<br>（要ログイン）</button>
                </form>
                @endguest
                @auth
                <button type="button" id="display-likes" class="border-2 border-solid rounded-lg text-md py-1 w-2/3 underline decoration-yellow-300 decoration-2 hover:bg-yellow-300">
                    <span class="text-gray-500">▷</span> この投稿にいいねする
                </button>
                @endauth
            </div>

            @auth
            <div id="modal-likes" class="p-1 bg-gray-100 rounded-lg hidden opacity-0">
                <!-- メッセージ -->

                <div class="mb-4">
                    <div class="flex justify-center items-center m-4">
                        <button id="icon-btn" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="rgb(246, 196, 34)" viewBox="0 0 24 24" stroke-width="1.5" stroke="none" class="w-20 h-20">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                            </svg>
                        </button>
                        <p class="text-3xl"> ×&ensp;</p>
                        <p id="add-likes-p" class="text-3xl">0</p>
                    </div>
                    <p class="mb-2 text-center">いいねアイコンをクリックして、いいねを追加しよう（最大5個）</p>
                    <form action="{{ route('post.like', ['id' => $post->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" id="add-likes" name="add-likes" value="0">
                        <div class="flex justify-center">
                            <button type="button" id="cancel-likes" class="border-4 rounded-lg text-md text-white bg-gray-300 px-4 py-1 hover:bg-gray-400">キャンセル</button>
                            <button type="submit" class="border-4 rounded-lg text-md text-white bg-yellow-400 px-4 py-1 ml-4 hover:bg-yellow-500">保存する</button>
                        </div>
                    </form>
                </div>
            </div>
            @endauth
        </div>
            

        <!-- 削除ボタン -->
        @if (\Illuminate\Support\Facades\Auth::id() === $post->user_id)
        <div class="text-center mb-2">
            <button type="button" id="display-delete" class="border-2 border-solid rounded-lg text-md py-1 w-2/3 underline decoration-red-300 decoration-2 hover:bg-red-300">
                <span class="text-gray-500">▷</span> この投稿を削除する
            </button>
        </div>
        <div id="modal-delete" class="p-1 bg-gray-100 rounded-lg hidden opacity-0">
            <form action="{{ route('post.delete', ['id' => $post->id]) }}" method="POST">
                @method('DELETE')
                @csrf
                <p class="text-red-500 m-4 text-center">この操作は取り消せません。本当に削除してよろしいですか？</p>
                <div class="flex justify-center mb-4">
                    <button type="button" id="cancel-delete" class="border-4 rounded-lg text-md text-white bg-gray-300 px-4 py-1 hover:bg-gray-400">キャンセル</button>
                    <button type="submit" class="border-4 rounded-lg text-md text-white bg-red-300 px-4 py-1 ml-4 hover:bg-red-400">削除する</button>
                </div>
            </form>
        </div>
        @endif

    </div>

    </section>
    
</x-layout>