<x-layout title="usodake | 投稿詳細">
    <h2>投稿詳細画面</h2>
    <p>ID {{ $post->id }} の投稿についての詳細です</p>
    <br>
    <p>by {{ $post->user->name }}</p>
    <p>{{ $post->created_at }}</p>
    <p>{{ $post->content }}</p>
    <p>「いいね」 {{ $post->num_of_likes }}件</p>
    <p> {{ $numOfLikedUsers }}人のユーザーが 計{{ $post->num_of_likes }}件のいいねをしました</p>
        
    <button type="buton">この投稿にいいねする</button>

    <div>
        <!-- バリデーションのエラーメッセージを表示 -->
        @error('add-likes')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <!-- フラッシュセッションデータを表示 -->
        @if (session('feedback.error'))
            <p style="color: red;">{{ session('feedback.error') }}</p>
        @endif
        @if (session('feedback.success'))
            <p style="color: green;">{{  session('feedback.success') }}</p>
        @endif

        @auth
        <div class="flex">
            <button type="button">いいね</button>
            <p>0</p>
        </div>

        <form action="{{ route('post.like', ['id' => $post->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="page-url" value="{{ $pageUrl }}">
            <input type="text" name="add-likes" placeholder="0">
            <button type="submit">保存する</button>
        </form>
        @endauth
    </div>

    <p>{{ $pageUrl }}</p>
    <a href="{{ $pageUrl }}">戻る</a>

</x-layout>