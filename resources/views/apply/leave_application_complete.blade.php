<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>公欠申請</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- ビューファイル内の<head>セクション内に以下のスクリプトを追加 -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
    <header>@include('header')</header>

    <div class="container my-4" style="width:85%; text-align: -webkit-center;">

        <div class="row">

            <p class="h2 my-4">公欠申請が完了しました。</p>
            <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【学科名】</p>
                    </div>
                    <div class="col-9 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $apply->department }}</p>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【学籍番号】</p>
                    </div>
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $apply->student_id }}</p>
                    </div>
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【氏名】</p>
                    </div>
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $apply->name }}</p>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【日付】</p>
                    </div>
                    <div class="col-4 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $apply->start_date }}</p>
                    </div>
                    <div class="col-1 px-0">
                        <p class="m-0 py-4 align-middle bg-light">~</p>
                    </div>
                    <div class="col-4 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $apply->end_date }}</p>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【科目名】</p>
                    </div>
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $apply->subject }}</p>
                    </div>
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【担当教師名】</p>
                    </div>
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $apply->teacher }}</p>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【企業名】</p>
                    </div>
                    <div class="col-9 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $apply->company_name }}</p>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【場所】</p>
                    </div>
                    <div class="col-9 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $apply->location }}</p>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【内容】</p>
                    </div>
                    <div class="col-9 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $apply->content }}</p>
                    </div>
                </div>
        </div><!-- row -->
        <!-- ホームに戻る -->
        <div class="row d-grid gap-2 col-3 mx-auto">
            <a href="{{ route('home') }}" class="btn btn-lg btn-primary btn-block">ホームに戻る</a>
        </div><!-- row -->
    </div><!-- container -->

</body>
</html>

