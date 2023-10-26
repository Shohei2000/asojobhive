<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロファイル</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- ビューファイル内の<head>セクション内に以下のスクリプトを追加 -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
    <header>@include('header')</header>

    <div class="container container-home-summary2 mt-5" style="height:40%;">
    @include('user_nav')
        <div class="row row-home-summary2 d-flex justify-content-center h-100">
            <div class="col-12 p-0 border rounded-1" style="width:80%;">

                <div class="row w-100 mx-0 my-4 lh-3rem">
                    <div class="col-12 d-flex justify-content-between">
                        <h3 class="m-0 p-0 px-3 lh-3rem">公欠申請履歴</h3>
                    </div>
                </div>

                <div class="table-responsive">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered vertical-align-middle" style="height:25rem;">
                                    <tbody>
                                        <tr>
                                            <td class="col-1 table-info"></td>
                                            <td class="col-2 table-info">日付</td>
                                            <td class="col-2 table-info">会社名</td>
                                            <td class="col-2 table-info">内容</td>
                                        </tr>
                                        @if ($leave_applications =! empty)
                                            @foreach ($leave_applications as $apply)
                                                <tr>
                                                    <td class="col-2">
                                                        <button type="submit" class="btn btn-primary {{ $apply->id }}" onclick="location.href='/apply/{{ $apply->id }}/detail'">
                                                    </td>
                                                    <td class="col-2">{{ $apply->date }}</td>
                                                    <td class="col-2">{{ $apply->company_name }}</td>
                                                    <td class="col-2">{{ $apply->content }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</body>
</html>

