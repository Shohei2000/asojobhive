<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="mt-5">

            <!-- ログイン成功(フラッシュ表示) -->
            <x-alert type="success" :session="session('login_success')"/>

            <h3>プロフィール</h3>
            <ul>
                <li>名前：{{ Auth::user()->last_name }}{{ Auth::user()->first_name }}</li>
                <li>メールアドレス{{ Auth::user()->email }}</li>
            </ul>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger">ログアウト</button>
            </form>
        </div>
    </div>
</body>
</html>