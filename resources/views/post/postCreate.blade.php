<x-layout title="名言 by俺 | 新規投稿">

    <x-slot name="script">
        <script src="/js/createPost.js" defer></script>
    </x-slot>

    <div class="px-2 pt-8">
        <!-- 戻るボタン -->
        <div class="flex items-center text-gray-600 hover:text-gray-400 mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <a href="{{ session('pageUrl') }}">ホームに戻る</a>
        </div>
        
        <h2 class="text-center text-xl mb-4">新規投稿を作成</h2>

        <!-- バリデーションメッセージを表示 -->
        <div class="mb-2">
            @if (session('feedback.success'))
            <p class="text-green-500 text-center">{{ session('feedback.success') }}</p>
            @endif
            @error('post')
            <p class="text-red-500 text-center">※エラー　{{ $message }}</p>
            @enderror
        </div>

        <div class="text-center mb-4">
            <form action="{{ route('post.create') }}" name ="create-post" method="POST">
                @csrf
                <textarea name="post" id="post-content" class="bg-slate-200 w-11/12 h-40 border-1 border-solid border-gray-400 rounded-lg px-4 py-2 mb-8"  placeholder="投稿内容を入力（最大50文字）"></textarea>
                <div class="text-left w-10/12 mx-auto">
                    <p class="mb-2">テキストフォントを選択 :</p>
                    <div class="flex flex-col mb-8">
                        <label for="font-default" class="mb-1"><input type="radio" name="font" id="font-default" value="font-default" checked>フォント0（フォント変更なし）</label>
                        <label for="font1" class="mb-1"><input type="radio" name="font" id="font1" value="font1"><span class="font1">フォント1</span></label>
                        <label for="font2" class="mb-1"><input type="radio" name="font" id="font2" value="font2"><span class="font2">フォント2</span></label>
                        <label for="font3" class="mb-1"><input type="radio" name="font" id="font3" value="font3"><span class="font3">フォント3</span></label>
                        <label for="font4" class="mb-1"><input type="radio" name="font" id="font4" value="font4"><span class="font4">フォント4</span></label>
                        <label for="font5" class="mb-1"><input type="radio" name="font" id="font5" value="font5"><span class="font5">フォント5</span></label>
                        <label for="font6" class="mb-1"><input type="radio" name="font" id="font6" value="font6"><span class="font6">フォント6</span></label>
                        <label for="font7" class="mb-1"><input type="radio" name="font" id="font7" value="font7"><span class="font7">フォント7</span></label>
                        <label for="font8" class="mb-1"><input type="radio" name="font" id="font8" value="font8"><span class="font8">フォント8</span></label>
                        <label for="font9" class="mb-1"><input type="radio" name="font" id="font9" value="font9"><span class="font9">フォント9</span></label>
                        <label for="font10" class="mb-1"><input type="radio" name="font" id="font10" value="font10"><span class="font10">フォント10</span></label>
                    </div>
                </div>
                <button type="submit" class="border-4 rounded-lg text-2xl text-white bg-blue-400 hover:bg-blue-500 px-4 py-2">投稿する</button>
            </form>
        </div>
    </div>
</x-layout>
