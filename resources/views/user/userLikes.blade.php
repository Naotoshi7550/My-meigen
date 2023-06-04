<x-layout title="名言 by俺 | 「いいね」した投稿一覧">
    <p>ID {{ $id }} のユーザーが「いいね」した投稿一覧</p>
    @foreach ($postLikes as $postLike)
        <p>{{ $postLike->post->content }} : 「いいね」 {{ $postLike->post->num_of_likes }} 件</p>
        <form action="{{ route('post.detail', ['id' => $postLike->post->id]) }}" method="GET">
            <button type="submit">詳細</button>
        </form>
    @endforeach
    {{ $postLikes->onEachSide(3)->links() }}

</x-layout>