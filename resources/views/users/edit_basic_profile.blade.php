<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール編集</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- ビューファイル内の<head>セクション内に以下のスクリプトを追加 -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
    <header>@include('header')</header>

    <div class="container container-home-summary2 mt-5" style="height:40%;">
        <div class="row row-home-summary2 d-flex justify-content-center h-100">
            <div class="col-12 p-0 border rounded-1" style="width:80%;">

                <div class="row w-100 mx-0 my-4 lh-3rem" style="height:3rem;">
                    <div class="col-12 d-flex justify-content-between">
                        <h3 class="m-0 p-0 px-3 lh-3rem">基本情報</h3>
                        <div class="justify-content-between">
                            <button class="btn btn-success btn-gradient" onclick="location.href='{{ route('user.showBasicProfile') }}'"">キャンセル</button>
                            <form action="{{ route('edit.check') }}" method="POST" style="padding-left:1rem; float:right;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-gradient">登録</button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered vertical-align-middle" style="height:25rem;">
                                    <tbody>
                                        <tr class="p-2">
                                        <td class="col-4 table-info">性</td>
                                        <td class="col-8"><input type="text" id="first_name" name="first_name" value="{{ Auth::user()->first_name }}"></td>
                                        </tr>
                                        <tr>
                                        <td class="col-4 table-info">性(ふりがな)</td>
                                        <td class="col-8"><input type="text" id="first_name_furigana" name="first_name_furigana" value="{{ Auth::user()->first_name_furigana }}"></td>
                                        </tr>
                                        <tr class="p-2">
                                        <td class="col-4 table-info">名前</td>
                                        <td class="col-8"><input type="text" id="last_name" name="last_name" value="{{ Auth::user()->last_name }}"></td>
                                        </tr>
                                        <tr>
                                        <td class="col-4 table-info">名前(ふりがな)</td>
                                        <td class="col-8"><input type="text" id="last_name_furigana" name="last_name_furigana" value="{{ Auth::user()->last_name_furigana }}"></td>
                                        </tr>
                                        <tr>
                                        <td class="col-4 table-info">性別</td>
                                        <td class="col-8">
                                            <select name="gender" id="gender" required>
                                                <option value="男性" {{ Auth::user()->gender === '男性' ? 'selected' : '' }}>男性</option>
                                                <option value="女性" {{ Auth::user()->gender === '女性' ? 'selected' : '' }}>女性</option>
                                            </select>
                                        </td>
                                        </tr>
                                        <tr>
                                        <td class="col-4 table-info">誕生日</td>
                                        <td class="col-8"><input type="date" id="birthday" name="birthday" value="{{ Auth::user()->birthday }}"></td>
                                        </tr>
                                        <tr>
                                        <td class="col-4 table-info">住所</td>
                                        <td class="col-8"><input type="text" name="address" value="{{ Auth::user()->address }}" style="width: {{ strlen(Auth::user()->address) }}ch;"></td>
                                        </tr>
                                        <tr>
                                        <td class="col-4 table-info">電話番号</td>
                                        <td class="col-8"><input type="text" name="phone_number" value="{{ Auth::user()->phone_number }}"></td>
                                        </tr>
                                        <tr>
                                        <td class="col-4 table-info">メールアドレス</td>
                                        <td class="col-8"><input type="email" name="email" id="email" value="{{ Auth::user()->email }}" style="width: {{ strlen(Auth::user()->email) }}ch;"></td>
                                        </tr>
                                        <tr>
                                        <td class="col-4 table-info">パスワード</td>
                                        <td class="col-8"><input type="password" name="password" value="{{ Auth::user()->password }}"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</body>
</html>