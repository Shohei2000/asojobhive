<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>公欠申請履歴詳細</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- ビューファイル内の<head>セクション内に以下のスクリプトを追加 -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
    <header>@include('header')</header>

    <div class="container my-4" style="width:85%; text-align: -webkit-center;">
    @include('user_nav')

        <div class="row">

            <p class="h2 my-4">公欠申請履歴</p>
            <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【学科名】</p>
                    </div>
                    <div class="col-9 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $leave_application->department }}</p>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【学籍番号】</p>
                    </div>
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $leave_application->student_id }}</p>
                    </div>
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【氏名】</p>
                    </div>
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $leave_application->name }}</p>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【日付】</p>
                    </div>
                    <div class="col-4 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $leave_application->start_date }}</p>
                    </div>
                    <div class="col-1 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">~</p>
                    </div>
                    <div class="col-4 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $leave_application->end_date }}</p>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【科目名】</p>
                    </div>
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $leave_application->subject }}</p>
                    </div>
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【担当教師名】</p>
                    </div>
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $leave_application->teacher }}</p>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【企業名】</p>
                    </div>
                    <div class="col-9 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $leave_application->company_name }}</p>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【場所】</p>
                    </div>
                    <div class="col-9 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $leave_application->location }}</p>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【内容】</p>
                    </div>
                    <div class="col-9 px-0">
                        <p class="m-0 py-4 align-middle bg-light border">{{ $leave_application->content }}</p>
                    </div>
                </div>
        </div><!-- row -->
        <form action="{{ route('user.deleteApplyLog') }}" method="POST">
            @csrf
            <button class="btn btn-lg btn-primary btn-block w-100 my-2 text-white">削除する</i></button>
            <input type="hidden" name="id" value="{{ $leave_application->id }}">
        </form>
    </div><!-- container -->

</body>
</html>

