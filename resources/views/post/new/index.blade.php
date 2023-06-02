<x-layout title="usodake | 新着">
    新着画面
    @guest
        <ul class="flex">
           <li><a href="{{ route('register') }}">新規登録</a></li>
            <li><a href="{{ route('login') }}">ログイン</a></li>
        </ul>
    @endguest
    @if (isset($user))
        @auth
            <a href="{{ route('user.top', ['id' => $user->id]) }}"><p>{{ $user->name }}</p></a>
        @endauth
    @endif

    @foreach ($posts as $post)
        <p>{{ $post->content }} : 「いいね」 {{ $post->num_of_likes }} 件</p>
        <form action="{{ route('post.detail', ['id' => $post->id]) }}" method="GET">
            <input type="hidden" name="page-url" value="{{ $posts->url($posts->currentPage()) }}">
            <button type="submit">詳細</button>
        </form>
    @endforeach
    {{ $posts->onEachSide(3)->links() }}

    @auth
        <button type="button" class="create-post">新規投稿</button>
    @endauth

    <div>
        <h2>新規投稿</h2>
        <form action="{{ route('post.new.create') }}" method="POST">
            @csrf
            <textarea name="post" id="post-content" placeholder="投稿内容を入力"></textarea>
            <button type="submit">投稿</button>
        </form>
    </div>
</x-layout>