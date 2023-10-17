<!-- 質問投稿画面 -->
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
        <link rel="stylesheet" href="{{ asset('css/question_form.css') }}">
    </head>
    <body>
        <header>@include('header')</header>
        <div class="box_con">
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
    <div class="btn-container">
        <button class="btn-back" onclick="goBackToDetailsPage({{ $company->id }})">戻る</button>
    </div>

    <script>
        function goBackToDetailsPage(companyId) {
            // 動的なURLを生成
            var dynamicURL = 'http://127.0.0.1:8000/companies/' + companyId + '/questions';

            // ページ遷移
            window.location.href = dynamicURL;
        }
    </script>
    </body>
</html>
