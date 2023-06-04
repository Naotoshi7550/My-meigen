<x-layout title="名言 by俺 | ログアウト">
    <p>{{ $userName }}</p>
    <p>ログアウトするには下のボタンをクリックして下さい</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">ログアウト</button>
    </form>
</x-layout>