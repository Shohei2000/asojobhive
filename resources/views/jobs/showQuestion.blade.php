<!-- showQuestion.blade.php -->

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

    <h1>質問詳細</h1>
    <div>
        <h2>質問内容</h2>
        <p>{{ $question->question_title }}</p>
        <p>{{ $question->question_content }}</p>
    </div>

    <div>
        <h2>返信一覧</h2>
        @if ($replies->isEmpty())
            <p>まだ返信はありません。</p>
        @else
            <ul>
                @foreach ($replies as $reply)
                    <li>{{ $reply->reply_content }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div>
        <h2>返信投稿</h2>
        <form action="{{ route('job_posts.reply_submit') }}" method="POST">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">
            <textarea name="reply_content" id="reply_content" cols="30" rows="5" required></textarea>
            <button type="submit">返信する</button>
        </form>
    </div>
</body>
</html>
