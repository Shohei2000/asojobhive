<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>選考中リスト</title>

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
                <h2 class="m-0 border-bottom border-2 border-warning">選考中リスト</h2>
            </div>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success mt-1">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="list-group">
            @if ($selections->isEmpty())
                <p class="text-center">選考中の企業はありません。</p>
                <a href="{{ route('home') }}" class="btn btn-lg btn-primary btn-block w-50 align-self-center">ホームに戻る</a>
            @else
                @foreach ($selections as $entry)
                    @if ($entry->status_id !== 0)
                    <div class="list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="/companies/{{ $entry->company_id }}/detail">
                                    <p class="mb-3">会社名<br>{{ $entry->company_name }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <a href="/companies/{{ $entry->company_id }}/{{ $entry->job_id }}">
                                    <p class="mb-3">職種<br>{{ $entry->job_title }}</p>
                                </a>
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
                        <div class="row">
                            <div class="col-12" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3;">
                                <p class="m-0">ステータス</p>
                                <form method="POST" action="{{ route('entry.updateStatus') }}">
                                    @csrf <!-- LaravelのCSRFトークンを追加 -->
                                    <select name="status" id="status" onchange="this.form.submit()">
                                        @for ($i = 1; $i <= 8; $i++)
                                            <option value="{{ $i }}" {{ $i == $entry->status_id ? 'selected' : '' }}>
                                                @if ($i == 1) 連絡待ち
                                                @elseif ($i == 2) 1次面接予定
                                                @elseif ($i == 3) 2次面接予定
                                                @elseif ($i == 4) 3次面接予定
                                                @elseif ($i == 5) 1次面接結果待ち
                                                @elseif ($i == 6) 2次面接結果待ち
                                                @elseif ($i == 7) 3次面接結果待ち
                                                @elseif ($i == 8) 内定
                                                @endif
                                            </option>
                                        @endfor
                                    </select>
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="company_id" value="{{ $entry->company_id }}">
                                    <input type="hidden" name="job_id" value="{{ $entry->job_id }}">
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>

</body>
</html>