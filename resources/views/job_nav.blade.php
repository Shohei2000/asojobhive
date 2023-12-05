@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
@if (Session::has('warning'))
    <div class="alert alert-warning">
        {{ Session::get('warning') }}
    </div>
@endif
<div class="m-tab-navigation row w-100 align-items-center">

    <div class="col-lg-2 mb-2 mb-lg-0 text-center m-tab-navigation-col {{$active === 'CompanyDetail' ? 'm-tab-navigation-active' : ''}}">
        <!-- <a class="a-tab" href="/companies/{{ $company->id }}/detail"> -->
        <a class="a-tab" href="{{ route('company.detail', ['company' => $company->id]) }}">
            <i class="far fa-building fa-lg"></i>
            企業情報
        </a>
    </div>

    <div class="col-lg-2 mb-2 mb-lg-0 text-center m-tab-navigation-col {{$active === 'JobDetail' ? 'm-tab-navigation-active' : ''}}">
        <a class="a-tab" onclick="location.href='#job-anchor'">
            <i class="fa-solid fa-magnifying-glass fa-lg"></i>
            求人詳細
        </a>
    </div>

    <div class="col-lg-2 mb-2 mb-lg-0 text-center m-tab-navigation-col">
        <a class="a-tab" href="{{ route('company.questions', ['companyId' => $company->id]) }}">
            <i class="fa-solid fa-person-circle-question fa-lg"></i>
            質問
        </a>
    </div>

    <div class="col-lg-3 mb-2 mb-lg-0 text-center m-tab-navigation-col">
        @if ($bookmarks->pluck('company_id')->contains($company->id))
            <form class="bookmark-right" action="{{ route('bookmark.restore') }}" method="POST">
                @csrf
                <button class="btn btn-lg btn-warning btn-block w-100 text-white">気になる解除 <i class="fa-solid fa-bookmark fa-lg"></i></button>
                <input type="hidden" name="company_id" value="{{ $company->id }}">
            </form>
        @else
            <form class="bookmark-right" action="{{ route('bookmark.store') }}" method="POST">
                @csrf
                <button class="btn btn-lg btn-warning btn-block w-100 text-white">気になる追加 <i class="fa-regular fa-bookmark fa-lg"></i></button>
                <input type="hidden" name="company_id" value="{{ $company->id }}">
            </form>
        @endif
    </div>

    <div class="col-lg-3 mb-2 mb-lg-0 text-center m-tab-navigation-col">  
        @if ($jobs === '')
            @include('modal.entryModalSelected')
        @else
            @include('modal.entryModal')
        @endif
    </div>

</div>