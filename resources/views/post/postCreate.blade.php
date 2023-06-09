<x-layout title="名言 by俺 | 新規投稿">

    <div class="h-screen bg-zinc-800 relative">
        <div class="h-5/6 w-full bg-white px-2 py-4 rounded-lg absolute top-16">
            <div class="flex items-center text-gray-600 hover:text-gray-400 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                <a href="{{ session('pageUrl') }}">ホームに戻る</a>
            </div>
            
            <h2 class="text-center text-xl mb-4">新規投稿を作成</h2>

            <!-- バリデーションメッセージを表示 -->
            @if (session('feedback.success'))
            <p class="text-green-500 text-center">{{ session('feedback.success') }}</p>
            @endif
            @error('post')
            <p class="text-red-500 text-center">{{ $message }}</p>
            @enderror

            <form action="{{ route('post.create') }}" class="flex flex-col items-center mb-2" method="POST">
                @csrf
                <textarea name="post" id="post-content" class="bg-slate-200 w-11/12 h-40 border-1 border-solid border-gray-400 rounded-lg px-4 py-2 mb-12"  placeholder="投稿内容を入力（最大50文字）"></textarea>
                <button type="submit" class="border-4 rounded-lg text-2xl text-white bg-blue-400 px-4 py-2">投稿する</button>
            </form>
        </div>
    </div>
</x-layout>
