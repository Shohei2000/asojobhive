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
            <p class="h2 my-4">公欠申請</p>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="{{ route('apply.leaveApplicationCheck') }}">
                @csrf
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【学科名】</p>
                    </div>
                    <div class="col-9 px-0">
                        <input type="text" name="department" value="" class="form-control m-0 py-4 align-middle" placeholder="学科名">
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【学籍番号】</p>
                    </div>
                    <div class="col-3 px-0">
                        <input type="text" name="student_id" value="" class="form-control m-0 py-4 align-middle" placeholder="学籍番号">
                    </div>
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【氏名】</p>
                    </div>
                    <div class="col-3 px-0">
                        <input type=ztext" name="name" value="{{ Auth::user()->last_name }} {{ Auth::user()->first_name }}" class="form-control m-0 py-4 align-middle" readonly>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【日付】</p>
                    </div>
                    <div class="col-4 px-0">
                        <input type="date" name="start_date" value="" class="form-control m-0 py-4 align-middle">
                    </div>
                    <div class="col-1 px-0">
                        <p class="m-0 py-4 align-middle bg-light">~</p>
                    </div>
                    <div class="col-4 px-0">
                    <input type="date" name="end_date" value="" class="form-control m-0 py-4 align-middle">
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【科目名】</p>
                    </div>
                    <div class="col-3 px-0">
                        <input type="text" name="subject" value="" class="form-control m-0 py-4 align-middle" placeholder="科目名">
                    </div>
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【担当教師名】</p>
                    </div>
                    <div class="col-3 px-0">
                        <input type="text" name="teacher" value="" class="form-control m-0 py-4 align-middle" placeholder="担当教師名">
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【企業名】</p>
                    </div>
                    <div class="col-9 px-0">
                        <input type="text" name="company_name" value="" class="form-control m-0 py-4 align-middle" placeholder="企業名">
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【場所】</p>
                    </div>
                    <div class="col-9 px-0">
                        <input type="text" name="location" value="" class="form-control m-0 py-4 align-middle" placeholder="場所">
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-3 px-0">
                        <p class="m-0 py-4 align-middle bg-light">【内容】</p>
                    </div>
                    <div class="col-9 px-0">
                        <input type="text" name="content" value="" class="form-control m-0 py-4 align-middle" placeholder="内容">
                    </div>
                </div>

                    <button class="btn btn-lg btn-primary btn-block w-25" type="submit">申請する</button>
            </form>
        </div><!-- row -->
    </div><!-- container -->

</body>
</html>

