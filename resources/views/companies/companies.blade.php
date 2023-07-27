<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>求人一覧</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>@include('header')</header>

    <div class="container mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col-auto">
                <h2 class="m-0 border-bottom border-2 border-info">企業一覧</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($companies as $company)
                <div class="col-6 mb-3">
                    <div class="row h-100 justify-content-center">
                        <div class="col-12 company_card">
                            <div class="row" style="height:55%;">
                                <div class="col-6">
                                    <img src="{{ asset('images/asojobhive_logo.png') }}" alt="asojobhive_logo" class="d-inline-block align-text-top w-100" style="height:20vh;">
                                </div>
                                <div class="col-6">
                                    <p style="font-size: 20px; font-weight: bold;">
                                        {{$company->company_name}}
                                    </p>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="mb-0">設立　{{$company->established}}</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0">社員数　{{$company->employees}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="mb-0">株式　{{$company->stocks}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="mb-0">売上　{{$company->annual_sales}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="mb-0">企業URL　<a href="{{ $company->website_url }}" target="_blank">{{ $company->website_url }}</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="height:25%;">
                                <div class="col-12" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3;}">
                                    <p class="m-0">職務内容<br>{{ $company->business_description }}</p>
                                </div>
                            </div>
                            <!-- <hr class="m-1"> -->
                            <div class="row" style="height:20%;">
                                <div class="col-6">
                                @if ($bookmarks->pluck('company_id')->contains($company->id))
                                    <form action="{{ route('bookmark.restore') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-lg btn-warning btn-block w-100 my-2 text-white">気になる解除 <i class="fa-solid fa-bookmark fa-lg"></i></button>
                                        <input type="hidden" name="company_id" value="{{ $company->id }}">
                                    </form>
                                @else
                                    <form action="{{ route('bookmark.store') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-lg btn-warning btn-block w-100 my-2 text-white">気になる追加 <i class="fa-regular fa-bookmark fa-lg"></i></button>
                                        <input type="hidden" name="company_id" value="{{ $company->id }}">
                                    </form>
                                @endif
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-lg btn-primary btn-block w-100 my-2 text-white" onclick="location.href='/companies/{{ $company->id }}/detail'">企業詳細</button>
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

