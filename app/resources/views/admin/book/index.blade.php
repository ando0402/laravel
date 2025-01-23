{{--<!Doctype html>--}}
{{--<html lang="ja">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <title>書籍一覧</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--    <main>--}}
<x-layouts.book-manager>
        <x-slot:title>
            書籍一覧
        </x-slot:title>
        <h1>書籍一覧</h1>
        @if (session('message'))
{{--            <div style="color: blue">--}}
        <x-alert class="info">
                {{ session('message') }}
        </x-alert>
{{--            </div>--}}
        @endif
        <a href="{{ route('book.create') }}">追加</a>
        <x-book-table :$books />
{{--        <table border="1">--}}
{{--            <tr>--}}
{{--                <th>カテゴリ</th>--}}
{{--                <th>書籍名</th>--}}
{{--                <th>価格</th>--}}
{{--            </tr>--}}
{{--            @foreach($books as $book)--}}
{{--                <tr @if ($loop->even) style="background-color: #EEE" @endif>--}}
{{--                    <td>{{ $book->category->title }}</td>--}}
{{--                    <td>{{ $book->title }}</td>--}}
{{--                    <td>{{ $book->price }}</td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--        </table>--}}
{{--    </main>--}}
{{--</body>--}}
{{--</html>--}}
</x-layouts.book-manager>
