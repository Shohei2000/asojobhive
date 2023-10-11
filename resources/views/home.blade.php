<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- ビューファイル内の<head>セクション内に以下のスクリプトを追加 -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://kit.fontawesome.com/916743b2a8.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>@include('header')</header>

    <div class="container">
        <div class="mt-1">
            <!-- ログイン成功(フラッシュ表示) -->
            <x-alert type="success" :session="session('login_success')"/>
        </div>
    </div>

    <!-- ホーム画面の上部5つのアイテム -->
    @include('home_summary')

    <div class="container container-home-summary2 mt-5" style="height:40%;">
        <div class="row row-home-summary2 d-flex justify-content-center h-100">
            <div class="col-6 h-100">
                <div class="row w-100 h-100 d-flex justify-content-end">
                    <div class="col-12 h-100 border rounded-1" style="width:90%;">
                        
                    </div>
                </div>
            </div>
            <div class="col-6 h-100 d-flex flex-column align-items-start justify-content-between">
                <div class="row w-100 d-flex justify-content-start order-1" style="height:45%;">
                    <div class="col-12 h-100 border rounded-1" style="width:90%;">
                        
                    </div>
                </div>
                <div class="row w-100 d-flex justify-content-start order-2"  style="height:45%;">
                    <div class="col-12 h-100 border rounded-1" style="width:90%;">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>