<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロファイル</title>

    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <!-- ビューファイル内の<head>セクション内に以下のスクリプトを追加 -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
    <header>@include('header')</header>

    <div class="container container-home-summary2">
    @include('user_nav')
        <div class="row row-home-summary2 d-flex justify-content-center h-100">
            <div class="col-12 p-0 border rounded-1" style="width:80%;">

                <div class="row w-100 mx-0 my-4 lh-3rem">
                    <div class="col-12 d-flex justify-content-between">
                        <h3 class="m-0 p-0 px-3 lh-3rem">基本情報</h3>
                        <a class="nav-link px-3" href="{{ route('user.editBasicProfile') }}">
                            <i class="fa-sharp fa-solid fa-pen-to-square fa-2xl lh-1" alt="編集アイコン"></i>
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered vertical-align-middle" style="height:25rem;">
                                    <tbody>
                                        <tr class="p-2">
                                        <td class="col-4 table-info">氏名</td>
                                        <td class="col-8">{{ Auth::user()->last_name }} {{ Auth::user()->first_name }}</td>
                                        </tr>
                                        <tr>
                                        <td class="col-4 table-info">ふりがな</td>
                                        <td class="col-8">{{ Auth::user()->last_name_furigana }} {{ Auth::user()->first_name_furigana }}</td>
                                        </tr>
                                        <tr>
                                        <td class="col-4 table-info">クラス</td>
                                        <td class="col-8">{{ $class_name }}</td>
                                        </tr>
                                        <tr>
                                        <td class="col-4 table-info">性別</td>
                                        <td class="col-8">{{ Auth::user()->gender }}</td>
                                        </tr>
                                        <tr>
                                        <td class="col-4 table-info">誕生日</td>
                                        <td class="col-8">{{ Auth::user()->birthday }}</td>
                                        </tr>
                                        <tr>
                                        <td class="col-4 table-info">住所</td>
                                        <td class="col-8">{{ Auth::user()->address }}</td>
                                        </tr>
                                        <tr>
                                        <td class="col-4 table-info">電話番号</td>
                                        <td class="col-8">{{ Auth::user()->phone_number }}</td>
                                        </tr>
                                        <tr>
                                        <td class="col-4 table-info">メールアドレス</td>
                                        <td class="col-8">{{ Auth::user()->email }}</td>
                                        </tr>
                                        <tr>
                                        <td class="col-4 table-info">パスワード</td>
                                        <td class="col-8">{{ Auth::user()->password }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</body>
</html>

