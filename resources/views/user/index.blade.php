<x-layout title="名言 by俺 | ユーザーTOP">
    <h2>トップページ</h2>
    <p>{{ $user->name }} さん</p>
    <p><a href="{{ route('user.posts', ['id' => $user->id]) }}">投稿一覧</a></p>
    <p><a href="{{ route('user.likes', ['id' => $user->id]) }}">いいねした投稿</a></p>
    @if (\Illuminate\Support\Facades\Auth::id() === $user->id)
        <p><a href="{{ route('user.logout', ['id' => $user->id]) }}">ログアウト</a></p>
    @endif
</x-layout>
