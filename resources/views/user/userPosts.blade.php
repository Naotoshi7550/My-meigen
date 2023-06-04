<x-layout title="usodake | 投稿一覧">
    <p>ID {{ $id }} のユーザーの投稿一覧</p>
    @foreach ($posts as $post)
        <p>{{ $post->content }} : 「いいね」 {{ $post->num_of_likes }} 件</p>
        <form action="{{ route('post.detail', ['id' => $post->id]) }}" method="GET">
            <button type="submit">詳細</button>
        </form>
    @endforeach
    {{ $posts->onEachSide(3)->links() }}

</x-layout>