<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>求人一覧</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- ビューファイル内の<head>セクション内に以下のスクリプトを追加 -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</head>
<body>
    <header>@include('header')</header>

    <div class="container mt-5">
        <div class="row">
            @foreach ($companies as $company)
                <div class="col-6 mb-3">
                    <div class="row justify-content-center">
                        <div class="col-12 border border-info rounded-1" style="width:95%; min-height:35vh;">
                            <div class="row">
                                <div class="col-6">
                                    <img src="{{ asset('images/asojobhive_logo.png') }}" alt="asojobhive_logo" class="d-inline-block align-text-top w-100" style="height:20vh;">
                                </div>
                                <div class="col-6">
                                    <p>{{ $company->company_name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3;}">
                                    <p class="m-0">職務内容<br>{{ $company->business_description }}</p>
                                </div>
                            </div>
                            <hr class="m-1">
                            <div class="row mb-2">
                                <div class="col-6">
                                    <button class="btn btn-lg btn-warning btn-block w-100 my-2 text-white" onclick="location.href='{{ route('register.show') }}'">気になる</button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-lg btn-primary btn-block w-100 my-2 text-white" onclick="location.href='{{ route('register.show') }}'">企業詳細</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                </div>
            @endforeach
        </div>
    </div>

</body>
</html>

