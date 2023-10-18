<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>応募済みリスト</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
                <h2 class="m-0 border-bottom border-2 border-info">応募済み企業一覧</h2>
            </div>
        </div>
        <div class="list-group">
    @foreach ($entries as $entry)
        <a href="/companies/{{ $entry->id }}/detail" class="list-group-item list-group-item-action">
            <div class="row">
                <div class="col-6">
                    <p class="mb-3">会社名<br>{{ $entry->company_name }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3;">
                    <p class="mb-3">職務内容<br>{{ $entry->business_description }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3;">
                    <p class="mb-3">応募日<br>{{ $entry->created_at }}</p>
                </div>
            </div>
        </a>
    @endforeach
</div>
    </div>

</body>
</html>