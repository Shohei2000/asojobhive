<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録完了 </title>
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
@if(isset($data))
<table class="my-table">

    <tr>
        <td class="label"><strong>メールアドレス</strong></td>
        <td>{{ $data['email'] ?? '' }}</td>
    </tr>
    <tr>
        <td class="label"><strong>姓</strong></td>
        <td>{{ $data['first_name'] ?? '' }}</td>
    </tr>
    <tr>
        <td class="label"><strong>名</strong></td>
        <td>{{ $data['first_name_furigana'] ?? '' }}</td>
    </tr>
    <tr>
        <td class="label"><strong>セイ (フリガナ)</strong></td>
        <td>{{ $data['last_name'] ?? '' }}</td>
    </tr>
    <tr>
        <td class="label"><strong>メイ (フリガナ)</strong></td>
        <td>{{ $data['last_name_furigana'] ?? '' }}</td>
    </tr>
    <tr>
        <td class="label"><strong>電話番号</strong></td>
        <td>{{ $data['phone_number'] ?? '' }}</td>
    </tr>
    <tr>
        <td class="label"><strong>住所</strong></td>
        <td>{{ $data['address'] ?? '' }}</td>
    </tr>
    
    <tr>
        <td class="label"><strong>性別</strong></td>
        <td><?php $gender = $data['gender'] ?? ''; if ($gender === 'male') { $gender = '男性'; } elseif ($gender === 'female') { $gender = '女性'; } echo $gender; ?></td>
    </tr>
    <tr>
        <td class="label"><strong>クラスID</strong></td>
        <td>{{ $data['class_id'] ?? '' }}</td>
    </tr>
</table>
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
    <input type="hidden" name="class_id" value="{{ $data['class_id'] }}">
    <!-- 登録ボタン -->
    <button type="submit" class="btn btn-primary">新規会員登録画面へ</button>
</form>


@endif

</body>
</html>