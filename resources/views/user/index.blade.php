<x-layout title="usodake | トップページ">
    <h2>トップページ</h2>
    <p>{{ $user->name }} さん</p>
    <p>投稿一覧</p>
    <p>いいねした投稿</p>
    <a href="{{ route('user.logout', ['id' => $user->id]) }}"><p>ログアウト</p></a>
</x-layout>
