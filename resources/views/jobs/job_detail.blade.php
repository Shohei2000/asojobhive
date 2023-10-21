<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>求人詳細</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <!-- ビューファイル内の<head>セクション内に以下のスクリプトを追加 -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body class="pb-2">
    <!-- ヘッダー表示 -->
    <header>@include('header')</header>

    <div class="container my-4" style="width:85%; text-align: -webkit-center;">

        <!-- ナビゲーションバー表示 -->
        @include('job_nav')

        <div class="row">

            <a class="h2 my-4" href="">{{ $company->company_name }}</a>

            <table class="table">
                <tbody>
                    <tr>
                        <td class="detail-td-15 py-4 align-middle">【職種】</td>
                        <td class="py-4">
                            <a class="" target="_blank" href="{{ $company->website_url }}">{{ $job->job_title }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="detail-td-15 py-4 align-middle">【職務内容】</td>
                        <td class="py-4">
                            <p class="m-0">{{ $job->job_description }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="detail-td-15 py-4 align-middle">【求人数】</td>
                        <td class="py-4">
                            <p class="m-0">{{ $job->job_vacancies }}人</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="detail-td-15 py-4 align-middle">【勤務予定地】</td>
                        <td class="py-4">
                            <p class="m-0">{{ $job->work_location }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="detail-td-15 py-4 align-middle">【補足事項】</td>
                        <td class="py-4">
                            <p class="m-0">{{ $job->supplement }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
        </div><!-- row -->

    </div>

    

</body>
</html>

