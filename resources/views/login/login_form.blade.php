<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインフォーム</title>
    <!-- JavaScript -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/signin.css') }}">
    <!-- ビューファイル内の<head>セクション内に以下のスクリプトを追加 -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>

<div class="form-signin text-center">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('login') }}">
            @csrf
                <div class="mb-3">
                    <img src="{{ asset('images/asojobhive_logo.png') }}" alt="AsoJobHive Logo" class="w-100">
                </div>
            <!-- <h1 class="h3 mb-3 font-weight-normal">ログインフォーム</h1> -->

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- ログインエラー表示 -->
                <!-- @if(session('login_error'))
                    <div class="alert alert-danger">
                        {{ session('login_error') }}
                    </div>
                @endif -->
                <!-- ログインエラー表示(コンポーネント化) -->
                <x-alert type="danger" :session="session('login_error')"/>

                <!-- ログアウト処理表示 -->
                <!-- @if(session('logout'))
                    <div class="alert alert-danger">
                        {{ session('logout') }}
                    </div>
                @endif -->
                <!-- ログアウト処理表示(コンポーネント化) -->
                <x-alert type="danger" :session="session('logout')"/>

                <x-alert type="success" :session="session('register_success')"/>

            <label for="inputEmail" class="sr-only"></label>
            <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" autofocus>

            <label for="inputPassword" class="sr-only"></label>
            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password">

            <div class="checkbox my-3">
                <label>
                    <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}> Remember me
                </label>
            </div>

            <button class="btn btn-lg btn-primary btn-block w-100" type="submit">ログイン</button>

            </form>
            <button class="btn btn-lg btn-warning btn-block w-100 mt-2 text-white" onclick="location.href='{{ route('register.show') }}'">新規会員登録</button>
        </div>
    </div>
</div>

</body>
</html>