<x-layout title="名言 by俺 | ログアウト">

    <!-- 戻るボタン -->
    <div class="flex items-center text-gray-600 hover:text-gray-400 my-6 ml-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>
        <a href="{{ session('pageUrl') }}">ホームに戻る</a>
    </div>

    <!-- ユーザー名を表示 -->
    <div class="flex justify-center w-9/12 mx-auto py-1 bg-gray-300 rounded-2xl mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <h2 class="ml-1 items-center">{{ $user->name }}&ensp;|&ensp;ログアウト</h2>
    </div>

    <div class="w-11/12 mx-auto text-center">
        <p class="mb-4">ログアウトするには、<br>下のボタンをクリックして下さい</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-300 hover:bg-red-400 text-white border-2 border-solid rounded-lg text-md px-4 py-1">ログアウト</button>
        </form>
    </div>
</x-layout>