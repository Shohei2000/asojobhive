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

        <h1>User List</h1>
            <table>
                <thead>
                    <tr>
                        <th>名前</th>
                        <th>質問内容</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $question)
                    <tr>
                        <td>{{ $question->name }}</td>
                        <td>{{ $question->question_value }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

    </body>
</html>