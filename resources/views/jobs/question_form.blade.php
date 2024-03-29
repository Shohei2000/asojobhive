<!-- 質問投稿画面 -->
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>質問投稿</title>
        <!-- JavaScript -->
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <script src="{{ secure_asset('js/notification.js') }}"></script>
        <script src="{{ secure_asset('js/bootstrap.js') }}" defer></script>
        <script src="{{ secure_asset('js/search.js') }}"></script>
        <!-- CSS -->
        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/question_form.css') }}">
        <link href="{{ secure_asset('css/notification.css') }}" rel="stylesheet">
        <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
        <!-- ビューファイル内の<head>セクション内に以下のスクリプトを追加 -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
    <body>
        <header>@include('header')</header>
        <!-- 質問投稿 -->
        <div class="box">
            <form action="{{ route('companies.store_question', $company->id) }}" method="POST">
                @csrf
                <ul class="Form">
                    <li>
                        <div class="Form-Item">
                            <label for="question_title" class="Form-Item-Label">質問タイトル:</label>
                            <input type="text" id="question_title" name="question_title" class="Form-Item-Input">
                        </div>
                    </li>
                    <li>
                        <div class="Form-Item">
                            <label for="question_content" class="Form-Item-Label isMsg">質問内容:</label>
                            <div class="box_det">
                                <textarea id="question_content" name="question_content" class="Form-Item-Textarea"></textarea>
                            </div>
                        </div>
                    </li>
                    <span><button type="submit" class="form_btn">質問投稿</button></span>
                </ul>
            </form>
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
    </scrip>
    </body>
</html>
