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
            <form method="POST" action="{{ route('apply.leaveApplication') }}">
                @csrf
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="detail-td-15 py-4 align-middle">【学科名】</td>
                            <td class="py-4">
                                <input type="text" name="department_name" value="" class="form-control" placeholder="学科名">
                            </td>
                        </tr>
                        <tr>
                            <td class="detail-td-15 py-4 align-middle">【学籍番号】</td>
                            <td class="py-4">
                                <input type="text" name="student_number" value="" class="form-control" placeholder="学籍番号">
                            </td>
                        </tr>
                        <tr>
                            <td class="detail-td-15 py-4 align-middle">【氏名】</td>
                            <td class="py-4">
                                <input type="text" name="name" value="{{ Auth::user()->last_name }} {{ Auth::user()->first_name }}" class="form-control" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td class="detail-td-15 py-4 align-middle">【日付】</td>
                            <td class="py-4">
                                <input type="date" name="date" value="" class="form-control" placeholder="日付">
                            </td>
                        </tr>
                        <tr>
                            <td class="detail-td-15 py-4 align-middle">【科目名】</td>
                            <td class="py-4">
                                <input type="text" name="subject_name" value="" class="form-control" placeholder="科目名">
                            </td>
                        </tr>
                        <tr>
                            <td class="detail-td-15 py-4 align-middle">【担当教師名】</td>
                            <td class="py-4">
                                <input type="text" name="teacher_name" value="" class="form-control" placeholder="担当教師名">
                            </td>
                        </tr>
                        <tr>
                            <td class="detail-td-15 py-4 align-middle">【企業名】</td>
                            <td class="py-4">
                                <input type="text" name="company_name" value="" class="form-control" placeholder="企業名">
                            </td>
                        </tr>
                        <tr>
                            <td class="detail-td-15 py-4 align-middle">【場所】</td>
                            <td class="py-4">
                                <input type="text" name="place" value="" class="form-control" placeholder="場所">
                            </td>
                        </tr>
                        <tr>
                            <td class="detail-td-15 py-4 align-middle">【内容】</td>
                            <td class="py-4">
                                <input type="text" name="content" value="" class="form-control" placeholder="内容">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-lg btn-primary btn-block w-100" type="submit">申請</button>
            </form>
        </div><!-- row -->
    </div><!-- container -->

</body>
</html>

