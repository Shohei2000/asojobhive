<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>質問投稿</title>
        <!-- JavaScript -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <header>@include('header')</header>
        <form action="{{ route('companies.store_question', [$company->id]) }}" method="POST">
            @csrf
            <div>
                <label for="question_title">質問タイトル:</label>
                <input type="text" id="question_title" name="question_title">
            </div>
            <div>
                <label for="question_content">質問内容:</label>
                <textarea id="question_content" name="question_content"></textarea>
            </div>
            <button type="submit">質問投稿</button>
        </form>
    </body>
</html>
