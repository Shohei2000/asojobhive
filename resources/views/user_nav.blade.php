<div class="m-tab-navigation row w-100 align-items-center">

    <div class="col-sm-2 text-center m-tab-navigation-col {{$active === 'UserDetail' ? 'm-tab-navigation-active' : ''}}">
        <a class="a-tab" href="{{ route('user.showBasicProfile') }}">
            <i class="far fa-building fa-lg"></i>
            ユーザー情報
        </a>
    </div>


    <div class="col-sm-2 text-center m-tab-navigation-col {{$active === 'ApplyLog' ? 'm-tab-navigation-active' : ''}}">
        <a class="a-tab" href="{{ route('user.applyLog') }}">
            <i class="fa-solid fa-person-circle-question fa-lg"></i>
            公欠申請履歴
        </a>
    </div>
</div>