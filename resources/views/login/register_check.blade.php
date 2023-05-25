<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録完了</title>
    <!-- JavaScript -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

@if(isset($data))
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>First Name:</strong> {{ $data['first_name'] }}</p>
    <p><strong>First Name (Furigana):</strong> {{ $data['first_name_furigana'] }}</p>
    <p><strong>Last Name:</strong> {{ $data['last_name'] }}</p>
    <p><strong>Last Name (Furigana):</strong> {{ $data['last_name_furigana'] }}</p>
    <p><strong>Phone Number:</strong> {{ $data['phone_number'] }}</p>
    <p><strong>Address:</strong> {{ $data['address'] }}</p>
    <p><strong>Birthday:</strong> {{ $data['birthday'] }}</p>
    <p><strong>Gender:</strong> {{ $data['gender'] }}</p>
    <form method="POST" action="{{ route('register.add') }}">
        @csrf
        <!-- hidden フィールドとして $data を追加 -->
        <!-- hidden フィールドとして各データ項目を追加 -->
        <input type="hidden" name="email" value="{{ $data['email'] }}">
        <input type="hidden" name="first_name" value="{{ $data['first_name'] }}">
        <input type="hidden" name="first_name_furigana" value="{{ $data['first_name_furigana'] }}">
        <input type="hidden" name="last_name" value="{{ $data['last_name'] }}">
        <input type="hidden" name="last_name_furigana" value="{{ $data['last_name_furigana'] }}">
        <input type="hidden" name="phone_number" value="{{ $data['phone_number'] }}">
        <input type="hidden" name="address" value="{{ $data['address'] }}">
        <input type="hidden" name="birthday" value="{{ $data['birthday'] }}">
        <input type="hidden" name="gender" value="{{ $data['gender'] }}">
        <!-- 登録ボタン -->
        <button type="submit" class="btn btn-primary">Complete Registration</button>
    </form>
    <!-- 戻るボタン -->
    <button type="submit" class="btn btn-primary" onclick="location.href='{{ route('register.show') }}'">戻る</button>
@endif

</body>
</html>