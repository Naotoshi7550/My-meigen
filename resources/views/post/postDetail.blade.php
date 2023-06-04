<x-layout title="名言 by俺 | 投稿詳細">
    <h2>投稿詳細画面</h2>
    <p>ID {{ $post->id }} の投稿についての詳細です</p>
    <br>
    <p>by <a href="{{ route('user.top', ['id' => $post->user->id]) }}">{{ $post->user->name }}</a></p>
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
                <input type="text" name="add-likes" placeholder="0">
                <button type="submit">保存する</button>
            </form>
        
            @if (\Illuminate\Support\Facades\Auth::id() === $post->user_id)
            <form action="{{ route('post.delete', ['id' => $post->id]) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="button">この投稿を削除する</button>
                <p>この操作は取り消せません。本当に削除してよろしいですか？</p>
                <div>
                    <button type="button">キャンセル</button>
                    <button type="submit">削除する</button>
                </div>
            </form>
            @endif
        @endauth
    </div>

</x-layout>