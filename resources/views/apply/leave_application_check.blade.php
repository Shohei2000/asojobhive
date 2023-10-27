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

            <p class="h2 my-4">以下の内容で公欠申請をします。よろしいですか？</p>
            <form method="POST" action="{{ route('apply.leaveApplication') }}">
                @csrf
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【学科名】</p>
                    </div>
                    <div class="col-9 px-0">
                        <input type="text" name="department" value="{{ $request->department }}" class="form-control m-0 py-4 align-middle" readonly>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【学籍番号】</p>
                    </div>
                    <div class="col-3 px-0">
                        <input type="text" name="student_id" value="{{ $request->student_id }}" class="form-control m-0 py-4 align-middle" readonly>
                    </div>
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【氏名】</p>
                    </div>
                    <div class="col-3 px-0">
                        <input type="text" name="name" value="{{ $request->name }}" class="form-control m-0 py-4 align-middle" readonly>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【日付】</p>
                    </div>
                    <div class="col-4 px-0">
                        <input type="datetime-local" name="start_date" value="{{ $request->start_date }}" class="form-control m-0 py-4 align-middle" readonly>
                    </div>
                    <div class="col-1 px-0">
                        <p class="m-0 py-4 align-middle bg-light">~</p>
                    </div>
                    <div class="col-4 px-0">
                        <input type="datetime-local" name="end_date" value="{{ $request->end_date }}" class="form-control m-0 py-4 align-middle" readonly>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【科目名】</p>
                    </div>
                    <div class="col-3 px-0">
                        <input type="text" name="subject" value="{{ $request->subject }}" class="form-control m-0 py-4 align-middle" readonly>
                    </div>
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【担当教師名】</p>
                    </div>
                    <div class="col-3 px-0">
                        <input type="text" name="teacher" value="{{ $request->teacher }}" class="form-control m-0 py-4 align-middle" readonly>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【企業名】</p>
                    </div>
                    <div class="col-9 px-0">
                        <input type="text" name="company_name" value="{{ $request->company_name }}" class="form-control m-0 py-4 align-middle" readonly>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【場所】</p>
                    </div>
                    <div class="col-9 px-0">
                        <input type="text" name="location" value="{{ $request->location }}" class="form-control m-0 py-4 align-middle" readonly>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【内容】</p>
                    </div>
                    <div class="col-9 px-0">
                        <input type="text" name="content" value="{{ $request-> content }}" class="form-control m-0 py-4 align-middle" readonly>
                    </div>
                </div>

                <button class="btn btn-lg btn-primary btn-block w-25 leave_btn" type="submit">申請する</button>

            </form>
        </div><!-- row -->
    </div><!-- container -->

</body>
</html>

