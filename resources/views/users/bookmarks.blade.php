<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>気になるリスト</title>

    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <!-- ビューファイル内の<head>セクション内に以下のスクリプトを追加 -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
    <header>@include('header')</header>

    <div class="container mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col-auto">
                <h2 class="m-0 border-bottom border-2 border-info">気になる企業一覧</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($bookmarks as $bookmark)
                <div class="col-6 mb-3">
                    <div class="row h-100 justify-content-center">
                        <div class="col-12 company_card">
                            <div class="row" style="height:55%;">
                                <div class="col-6">
                                    <img src="{{ secure_asset('images/asojobhive_logo.png') }}" alt="asojobhive_logo" class="d-inline-block align-text-top w-100" style="height:20vh;">
                                </div>
                                <div class="col-6">
                                    <p>{{ $bookmark->company_name }}</p>
                                </div>
                            </div>
                            <div class="row" style="height:25%;">
                                <div class="col-12" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3;}">
                                    <p class="m-0">職務内容<br>{{ $bookmark->business_description }}</p>
                                </div>
                            </div>
                            <!-- <hr class="m-1"> -->
                            <div class="row" style="height:20%;">
                                <div class="col-6">
                                    <form action="{{ route('bookmark.restore') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-lg btn-warning btn-block w-100 my-2 text-white">気になる解除 <i class="fa-solid fa-bookmark fa-lg"></i></button>
                                        <input type="hidden" name="company_id" value="{{ $bookmark->company_id }}">
                                    </form>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-lg btn-primary btn-block w-100 my-2 text-white" onclick="location.href='/companies/{{ $bookmark->id }}/detail'">企業詳細</button>
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

