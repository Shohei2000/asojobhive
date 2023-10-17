<div class="m-tab-navigation row w-100 align-items-center">

    <div class="col-sm-2 text-center m-tab-navigation-col {{$active === 'UserDetail' ? 'm-tab-navigation-active' : ''}}">
        <a class="a-tab" href="{{ route('user.showBasicProfile') }}">
            <i class="far fa-building fa-lg"></i>
            ユーザー情報
        </a>
    </div>


    <div class="col-sm-2 text-center m-tab-navigation-col">
        <a class="a-tab" href="{{ route('home') }}">
            <i class="fa-solid fa-person-circle-question fa-lg"></i>
            公欠申請履歴
        </a>
    </div>
</div>

<style>
.m-tab-navigation{
    border-bottom: solid gray;
}

.m-tab-navigation-col{
    line-height: 3rem;
}

.m-tab-navigation-active{
    border-bottom: solid dodgerblue 0.2rem;
}
.bookmark-right{
    text-align: -webkit-right;
}
</style>