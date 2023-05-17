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
</head>
<body>
<form class="form-signin text-center" method="POST" action="{{ route('login') }}">
  @csrf
  <h1 class="h3 mb-3 font-weight-normal">ログインフォーム</h1>

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

  <label for="inputEmail" class="sr-only"></label>
  <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" autofocus>

  <label for="inputPassword" class="sr-only"></label>
  <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password">

  <button class="btn btn-lg btn-primary btn-block w-100" type="submit">ログイン</button>
</form>

</body>
</html>