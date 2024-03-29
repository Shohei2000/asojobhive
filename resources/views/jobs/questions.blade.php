<!-- questions.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>質問一覧</title>
    <!-- ビューファイル内の<head>セクション内に以下のスクリプトを追加 -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- JavaScript -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    <script src="{{ secure_asset('js/bootstrap.js') }}" defer></script>
    <script src="{{ secure_asset('js/search.js') }}"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/questions.css') }}">
    <link href="{{ secure_asset('css/notification.css') }}" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

</head>
<body>
    <header>@include('header')</header>
    <!-- 質問一覧 -->
    <div class="btn-container">
            <a href="{{ route('companies.question_form', ['companyId' => $company->id]) }}" class="btn-primary">質問を投稿する</a>
    </div>
    @if ($questions->isNotEmpty())
        <table>
            <thead>
                <tr class="tr_title">
                    <th>タイトル</th>
                    <th>質問内容</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->question_title }}</td>
                    <td>{{ $question->question_content }}</td>
                    <td><a class="a_link"href="{{ route('companies.question', ['companyId' => $company->id, 'questionId' => $question->id]) }}">詳細へ</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
    <!-- 質問がない場合 -->
    <div class="no-questions-message" style="background-color: #fff; padding: 20px; margin: 20px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); border-radius: 8px; text-align: center;">
        <p style="font-size: 20px; font-weight: bold; color: #333;">質問はまだないようです！</p>
    </div>
    @endif

    <!-- 前の画面へ戻る -->
    <div class="btn-container">
        <button class="btn-back" onclick="goBackToDetailsPage({{ $company->id }})">戻る</button>
    </div>

    <script>
        function goBackToDetailsPage(companyId) {
            // 動的なURLを生成
            var dynamicURL = 'http://127.0.0.1:8000/companies/' + companyId + '/detail';

            // ページ遷移
            window.location.href = dynamicURL;
        }
    </script>

</body>
</html>
