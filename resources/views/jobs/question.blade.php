<!-- question.blade.php -->
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>質問詳細</title>
        <!-- JavaScript -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <header>@include('header')</header>
        <h2>質問詳細</h2>
        <p>質問タイトル: {{ $question->question_title }}</p>
        <p>質問内容: {{ $question->question_content }}</p>

        <div>
            <h2>返信投稿</h2>
            <form action="{{ route('companies.reply_submit') }}" method="POST">
                @csrf
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                <textarea name="reply_content" id="reply_content" cols="30" rows="5" required></textarea>
                <button type="submit">返信する</button>
            </form>
        </div>


        <h3>回答一覧</h3>
        @if ($replies->isNotEmpty())
            <ul>
                @foreach ($replies as $reply)
                    <li>{{ $reply->reply_content }}</li>
                @endforeach
            </ul>
        @else
            <p>回答はまだありません。</p>
        @endif

        <!-- 前の画面へ戻る -->
        <a href="{{ route('company.questions', ['companyId' => $question->company->id]) }}">戻る</a>

        <!-- JavaScript -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
