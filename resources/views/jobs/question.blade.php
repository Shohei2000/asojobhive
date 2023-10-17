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
        <!-- 質問詳細 -->
        <div class="box-1">
            <h2 class="title-1">質問詳細</h2>
            <div class="question-info">
                <p class="question-label">質問タイトル:</p>
                <p class="question-text">{{ $question->question_title }}</p>
            </div>
            <div class="question-info">
                <p class="question-label">質問内容:</p>
                <p class="question-text">{{ $question->question_content }}</p>
            </div>
        </div>
        <!-- 回答一覧 -->
        <div class="box-3">
            <h3 class="title-3">回答一覧</h3>
            @if ($replies->isNotEmpty())
                <ul class="reply-list">
                    @foreach ($replies as $reply)
                        <li class="reply-item">・ {{ $reply->reply_content }}</li>
                    @endforeach
                </ul>
            @else
                <p class="no-reply-msg">回答はまだありません。</p>
            @endif
        </div>
        <!-- 返信投稿 -->
        <div class="form-box">
            <h2 class="title-2">返信投稿</h2>
            <div class="box_con">
                <form action="{{ route('companies.reply_submit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="question_id" value="{{ $question->id }}" class="input-1">
                    <textarea class="area-1" name="reply_content" id="reply_content" cols="30" rows="5" required></textarea>
                    <button class="form_btn" type="submit">返信する</button>
                </form>
            </div>
        </div>


    <!-- 前の画面へ戻る -->
    <button class="btn-back" onclick="goBackToDetailsPage({{ $company->id }})">戻る</button>

    <script>
        function goBackToDetailsPage(companyId) {
            // 動的なURLを生成
            var dynamicURL = 'http://127.0.0.1:8000/companies/' + companyId + '/questions';

            // ページ遷移
            window.location.href = dynamicURL;
        }
    </script>

        <!-- JavaScript -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
