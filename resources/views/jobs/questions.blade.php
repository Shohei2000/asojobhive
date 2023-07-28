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
</head>
<body>
    <header>@include('header')</header>
    <h1>質問一覧</h1>
    @if ($questions->isNotEmpty())
        <a href="{{ route('companies.question_form', ['companyId' => $company->id]) }}" class="btn btn-primary">質問を投稿する</a>
        <table>
            <thead>
                <tr>
                    <th>タイトル</th>
                    <th>質問内容</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->question_title }}</td>
                    <td>{{ $question->question_content }}</td>
                    <td><a href="{{ route('companies.question', ['companyId' => $company->id, 'questionId' => $question->id]) }}">質問詳細を表示</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>質問が見つかりませんでした。</p>
    @endif
</body>
</html>
