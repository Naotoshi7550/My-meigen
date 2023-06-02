<x-layout title="usodake | マイページ">
    <h2>マイページ</h2>
    <p>{{ $user->name }}</p>
    <p>投稿一覧</p>
    <p>いいねした投稿</p>
    <a href="{{ route('user.logout', ['id' => $user->id]) }}"><p>ログアウト</p></a>
</x-layout>
