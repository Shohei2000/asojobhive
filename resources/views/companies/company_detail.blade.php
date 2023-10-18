<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>企業詳細</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <!-- ビューファイル内の<head>セクション内に以下のスクリプトを追加 -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
                    <tr class="align-middle">
                        <td class="detail-td-15 py-4 align-middle">【企業URL】</td>
                        <td class="py-4">
                            <a class="" target="_blank" href="{{ $company->website_url }}">{{ $company->website_url }}</a>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="detail-td-15 py-4 align-middle">【学校求人情報URL】</td>
                        <td class="py-4" style="word-break: break-word; vertical-align: middle;">
                            <a class="txt-limit" target="_blank" href="{{ $company->sharepoint_url }}">{{ $company->sharepoint_url }}</a>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="detail-td-15 py-4 align-middle">【事業内容】</td>
                        <td class="py-4">
                            <p class="m-0">{{ $company->business_description }}</p>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="detail-td-15 py-4">【本社所在地】</td>
                        <td class="py-4">
                            <p class="m-0">{{ $company->headquarters_address }}</p>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="detail-td-15 py-4 align-middle">【代表者】</td>
                        <td class="py-4">
                            <p class="m-0">{{ $company->representative_position }}　{{ $company->representative_name }}</p>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="detail-td-15 py-4 align-middle">【設立】</td>
                        <td class="py-4">
                            <p class="m-0">{{ $company->established }}年</p>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="detail-td-15 py-4 align-middle">【資本金】</td>
                        <td class="py-4">
                            <p class="m-0">{{ $company->capital }}</p>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="detail-td-15 py-4 align-middle">【売上高】</td>
                        <td class="py-4">
                            <p class="m-0">{{ $company->annual_sales }}</p>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="detail-td-15 py-4 align-middle">【株式公開】</td>
                        <td class="py-4">
                            <p class="m-0">{{ $company->stocks }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
        </div><!-- row -->
        
        <div class="row text-start" id="job-anchor">
            <div class="col-12 w-100">
                <h2 class="p-3 text-center">【 募 集 求 人 】</h2>
                <div class="row justify-content-center">
                    @foreach($jobs as $job)
                        @if(($loop->index + 2) % 3 == 0)
                            <div class="job_card rounded-3 job_card_middle" onclick="location.href='/companies/{{ $company->id }}/{{ $job->id }}'">
                        @else
                            <div class="job_card rounded-3" onclick="location.href='/companies/{{ $company->id }}/{{ $job->id }}'">
                        @endif

                            <div class="row bg-primary bg-gradient opacity-75 py-3 rounded-top-3">
                                <div class="col-12">
                                    <h3 class="m-0 text-center text-light">{{ $job->job_title }}</h3>
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-12">
                                <p>■職務内容<br>{{ $job->job_description }}</p>
                                <p>■求人数<br>{{ $job->job_vacancies }}人</p>
                                <p>■勤務予定地<br>{{ $job->work_location }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>


    </div>

<script>
    const limit = document.querySelector(".txt-limit");
    const str = limit.textContent;
    const len = 50; // 半角50字（全角約25字）
    if (str.length > len) {
    limit.textContent = str.substring(0, len) + "…";
    }
</script>

</body>
</html>