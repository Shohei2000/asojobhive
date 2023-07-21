<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>求人詳細</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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

