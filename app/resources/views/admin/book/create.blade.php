{{--<!Doctype html>--}}
{{--<html lang="ja">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <title>書籍登録</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--    <main>--}}
<x-layouts.book-manager>
        <x-slot:title>
            書籍登録
        </x-slot:title>
        <h1>書籍登録</h1>
        @if ($errors->any())
{{--            <div style="color: red">--}}
{{--                <ul>--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <li>{{ $error }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <x-error-messages :errors="$errors"/>--}}
            <x-alert class="danger">
                <x-error-messages :$errors />
            </x-alert>
        @endif
        {{--        <form action="/books" method="POST">--}}
        <form action="{{ route('book.store') }}" method="POST">
            @csrf
            <div>
                <label>カテゴリ</label>
                <select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            @selected($category->id == old('category_id'))>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>タイトル</label>
                <input type="text" name="title" value="{{ old('title') }}">
            </div>
            <div>
                <label>価格</label>
                <input type="text" name="price" value="{{ old('price') }}">
            </div>
            <input type="submit" value="送信">
        </form>
        <div>
            <label>著者</label>
            <ul>
                @foreach($authors as $author)
                    <li>
                        <input
                            type="checkbox"
                            name="author_ids[]"
                            value="{{ $author->id }}"
                            @checked(
                                is_array(
                                    old('author_ids')
                                )
                                &&
                                is_array(
                                    $author->id,
                                    old('author_ids')
                                )
                            )
                        >
                        {{ $author->name }}
                    </li>
                @endforeach
            </ul>
        </div>>
{{--    </main>--}}
{{--</body>--}}
{{--</html>--}}
</x-layouts.book-manager>
