<!-- question.blade.php -->
<!--　質問詳細画面 -->
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
        <link rel="stylesheet" href="{{ asset('css/question.css') }}">
    </head>
    <body>
        <header>@include('header')</header>
        <div class="box-1">
            <h2 class="titel-1">質問詳細</h2>
            <p class="p-1">質問タイトル: {{ $question->question_title }}</p>
            <p class="p-2">質問内容: {{ $question->question_content }}</p>
        <div>
            <h2>返信投稿</h2>
            <form action="{{ route('companies.reply_submit') }}" method="POST">
                @csrf
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                <textarea name="reply_content" id="reply_content" cols="30" rows="5" required></textarea>
                <button type="submit">返信する</button>
            </form>
        </div>

        <div class="form-box">
            <h2 class="title-2">返信投稿</h2>
            <div class="box_con">
                <form action="{{ route('job_posts.reply_submit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="question_id" value="{{ $question->id }}" class="input-1">
                    <textarea class="area-1" name="reply_content" id="reply_content" cols="30" rows="5" required></textarea>
                    <button class="form_btn" type="submit">返信する</button>
                </form>
            </div>
        </div>

        <div class="d3-3">
            <h3 class="title-3">回答一覧</h3>
            @if ($replies->isNotEmpty())
                <ul>
                    @foreach ($replies as $reply)
                        <li>{{ $reply->reply_content }}</li>
                    @endforeach
                </ul>
            @else
                <p class="p-3">回答はまだありません。</p>
            @endif
        </div>

        <!-- 前の画面へ戻る -->
        <button onclick="goBack()" class="back_btn">戻る</button>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>

        <!-- JavaScript -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
