<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
    <!-- JavaScript -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- ビューファイル内の<head>セクション内に以下のスクリプトを追加 -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
<form method="POST" action="{{ route('register.check') }}">
    @csrf

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" value="{{ old('email', session('registerData.email')) }}" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" required>
    </div>

    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" class="form-control" id="first_name" value="{{ old('first_name', session('registerData.first_name')) }}" required>
    </div>

    <div class="form-group">
        <label for="first_name_furigana">First Name (Furigana)</label>
        <input type="text" name="first_name_furigana" class="form-control" id="first_name_furigana" value="{{ old('first_name_furigana', session('registerData.first_name_furigana')) }}" required>
    </div>

    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="last_name" value="{{ old('last_name', session('registerData.last_name')) }}" required>
    </div>

    <div class="form-group">
        <label for="last_name_furigana">Last Name (Furigana)</label>
        <input type="text" name="last_name_furigana" class="form-control" id="last_name_furigana" value="{{ old('last_name_furigana', session('registerData.last_name_furigana')) }}" required>
    </div>

    <div class="form-group">
        <label for="phone_number">Phone Number</label>
        <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{ old('phone_number', session('registerData.phone_number')) }}" required>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" class="form-control" id="address" value="{{ old('address', session('registerData.address')) }}" required>
    </div>

    <div class="form-group">
        <label for="birthday">Birthday</label>
        <input type="date" name="birthday" class="form-control" id="birthday" value="{{ old('birthday', session('registerData.birthday')) }}" required>
    </div>

    <div class="form-group">
        <label for="gender">Gender</label>
        <select name="gender" class="form-control" id="gender" value="{{ old('gender', session('registerData.gender')) }}" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </div>

    <!-- 登録ボタン -->
    <button type="submit" class="btn btn-primary">Register</button>
</form>
<button type="submit" class="btn btn-primary" onclick="location.href='{{ route('login.show') }}'">戻る</button>

</body>
</html>