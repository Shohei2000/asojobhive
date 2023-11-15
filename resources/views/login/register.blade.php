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

    <div class="container">
        <form method="POST" action="{{ route('register.check') }}">
            @csrf
            <h3>新規登録画面</h3>
            <table class="registration-table">
                <tr>
                    <td class="label required-label"><span class="required-mark">必須</span><label for="email">メールアドレス</label></td>
                    <td>
                        <div class="input-container">
                            <input type="email" name="email" class="form-control-1" id="email" value="{{ old('email', session('registerData.email')) }}" required>
                            <div class="example-container">
                                <span class="example-text">例 )</span>
                                <span class="email-text">example@mail.com</span>
                            </div>
                        </div>
                    </td>
                </tr>
                <!-- 他のテーブル行を追加 -->
                <tr>
                    <td class="label required-label"><span class="required-mark">必須</span><label for="password">パスワード</label></td>
                    <td>
                        <div class="input-container">
                            <input type="password" name="password" class="form-control-1" id="password" required>
                            <div class="example-container">
                                <span class="example-text">例 )</span>
                                <span class="password-text">********</span>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="label required-label"><span class="required-mark">必須</span><label for="first_name">姓</label></td>
                    <td>
                        <div class="input-container">
                            <input type="text" name="first_name" class="form-control-1" id="first_name" value="{{ old('first_name', session('registerData.first_name')) }}" required>
                            <div class="example-container">
                                <span class="example-text">例 )</span>
                                <span class="name-text">鈴木</span>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
    <td class="label required-label"><span class="required-mark">必須</span><label for="last_name">名</label></td>
    <td>
        <div class="input-container">
        <input type="text" name="last_name" class="form-control-1" id="last_name" value="{{ old('last_name', session('registerData.last_name')) }}" required>
            <div class="example-container">
                <span class="example-text">例 )</span>
                <span class="name-text">一郎</span>
            </div>
        </div>
    </td>
</tr>
                <tr>
                    <td class="label required-label"><span class="required-mark">必須</span><label for="first_name_furigana">セイ (フリガナ)</label></td>
                    <td>
                        <div class="input-container">
                            <input type="text" name="first_name_furigana" class="form-control-1" id="first_name_furigana" value="{{ old('first_name_furigana', session('registerData.first_name_furigana')) }}" required>
                            <div class="example-container">
                                <span class="example-text">例 )</span>
                                <span class="name-text">スズキ</span>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                <td class="label required-label"><span class="required-mark">必須</span><label for="last_name_furigana">メイ (フリガナ)</label></td>
        <td>
            <div class="input-container">
            <input type="text" name="last_name_furigana" class="form-control-1" id="last_name_furigana" value="{{ old('last_name_furigana', session('registerData.last_name_furigana')) }}" required>
                <div class="example-container">
                    <span class="example-text">例 )</span>
                    <span class="name-text">イチロウ</span>
                </div>
            </div>
        </td>
        </tr>
                    <td class="label required-label"><span class="required-mark">必須</span><label for="phone_number">電話番号</label></td>
                    <td>
                        <div class="input-container">
                            <input type="text" name="phone_number" class="form-control-1" id="phone_number" value="{{ old('phone_number', session('registerData.phone_number')) }}" required>
                            <div class="example-container">
                                <span class="example-text">例 )</span>
                                <span class="phone-number-text">1234567890</span>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="label required-label"><span class="required-mark">必須</span><label for="address">住所</label></td>
                    <td><textarea name="address" class="form-control-1" id="address" rows="4" required style="padding-bottom: 0;padding-top:0;">{{ old('address', session('registerData.address')) }}</textarea></td>
                </tr>
                <tr>
                    <td class="label required-label"><span class="required-mark">必須</span><label for="birthday">生年月日</label></td>
                    <td><input type="date" name="birthday" class="form-control-1" id="birthday" value="{{ old('birthday', session('registerData.birthday')) }}" required></td>
                </tr>
                <tr>
                    <td class="label required-label"><span class="required-mark">必須</span><label for="gender">性別</label></td>
                    <td>
                        <select name="gender" class="form-control-1" id="gender" required style="padding-bottom: 0;padding-top:0;">
                            <option value="male">男性</option>
                            <option value="female">女性</option>
                        </select>
                    </td>
                </tr>
                <td class="label required-label"><span class="required-mark">必須</span><label for="class_id">クラス</label></td>
        <td>
            <div class="input-container">
                <select class="form-select form-control-1" name="class_id" id="class_id" value="{{ old('class_id', session('registerData.class_id')) }}" required style="padding-bottom: 0;padding-top:0;">
                    <option value="1">SD4</option>
                    <option value="2">NS4</option>
                    <option value="3">ES4</option>
                    <option value="4">SD3A</option>
                    <option value="5">SD3B</option>
                    <option value="6">SD3C</option>
                    <option value="7">SD3D</option>
                    <option value="8">SD3E</option>
                    <option value="9">NS3A</option>
                    <option value="10">NS3B</option>
                    <option value="11">AI3</option>
                    <option value="12">SD2A</option>
                    <option value="13">SD2B</option>
                    <option value="14">SD2C</option>
                    <option value="15">SD2D</option>
                    <option value="16">SD2E</option>
                    <option value="17">SD2F</option>
                    <option value="18">SD2G</option>
                    <option value="19">NS2A</option>
                    <option value="20">NS2B</option>
                    <option value="21">AI2</option>
                    <option value="22">IT1A</option>
                    <option value="23">IT1B</option>
                    <option value="24">IT1C</option>
                    <option value="25">IT1D</option>
                    <option value="26">IT1E</option>
                    <option value="27">IT1F</option>
                    <option value="28">IT1G</option>
                    <option value="29">IT1H</option>
                </select>

                <div class="example-container">
                    <span class="example-text">例 )</span>
                    <span class="class-id-text">1</span>
                </div>
            </div>
        </td>
    </tr>
            </table>
            <!-- 登録ボタン -->
            <div class="buttons"> 
                <button type="submit" class="btn btn-primary">新規登録確認画面へ</button>

            </div>
        </form>
    </div>
    </body>
</html>
   