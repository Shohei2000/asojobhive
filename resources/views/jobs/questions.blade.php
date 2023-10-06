<!-- questions.blade.php -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>質問</title>
    <!-- JavaScript -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/questions.css') }}">
</head>
<body>
    <header>@include('header')</header>
    <h1 class="title-1">質問一覧</h1>
    @if ($questions->isNotEmpty())
        <div class="btn-container">
            <a href="{{ route('job_posts.question_form', ['companyId' => $company->id]) }}" class="btn-primary">質問を投稿する</a>
        </div>
        <table>
            <thead>
                <tr class="tr_title">
                    <th>タイトル</th>
                    <th>質問内容</th>
                    <th> </th>
                    <!--<th>詳細へ</th>-->
                </tr>
            </thead>
            <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->question_title }}</td>
                    <td>{{ $question->question_content }}</td>
                    <td><a class="a_link"href="{{ route('job_posts.question', ['companyId' => $company->id, 'questionId' => $question->id]) }}">詳細へ</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>質問が見つかりませんでした。</p>
    @endif

    <!-- 前の画面へ戻る -->
    <div class="btn-container">
        <button class="btn-back" onclick="goBack()">戻る</button>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
