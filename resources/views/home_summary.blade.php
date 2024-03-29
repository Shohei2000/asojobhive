<div class="container container-home-summary mt-1 mt-lg-4">
    <div class="row row-home-summary d-flex justify-content-center h-100 px-3 px-lg-0">

        <!-- 日付コンテナー -->
        <div class="col-lg-2 col-12 mx-3 d-flex align-items-center justify-content-center bg-light bg-gradient rounded-1">
        <p class="m-0 text-center fw-bold py-4 py-lg-0" style="font-size:1rem;">{!! $currentDate !!}</p>
        </div>

        <!-- お気に入りコンテナー -->
        <div class="col-lg-2 col-12 col-sm-5 mx-3 mt-1 mt-lg-0 h-100 d-flex align-items-center justify-content-center bg-primary bg-gradient rounded-1" style="padding-top: 1rem;">
            <div class="row h-100 w-100">
                <div class="col-12 p-0 d-flex align-items-center justify-content-between" style="height:35%">
                    <div>
                        <p class="p-0 m-0 text-light">気になる</p>
                    </div>
                    <div>
                        <i class="fa-sharp fa-solid fa-bookmark fa-2x" style="color: #ffffff;"></i>
                    </div>
                </div>
                <div class="col-12 p-0" style="height:40%">
                    <div class="h-100 w-100">
                        <p class="p-0 m-0 h-100 w-100 text-light fs-2">{{ $bookmark_count }}</p>
                    </div>
                </div>
                <div class="col-12 p-0 d-flex text-center border-top border-light" style="height:25%; line-height: 2rem;">
                    <div class="w-100 align-self-center">
                        <p class="p-0 m-0 w-100 text-light">
                            <a class="nav-link text-white p-0" href="{{ route('user.showBookmarks') }}">リストを見る</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 応募済み -->
        <div class="col-lg-2 col-12 col-sm-5 mx-3 mt-1 mt-lg-0 h-100 d-flex align-items-center justify-content-center bg-success bg-gradient rounded-1" style="padding-top: 1rem;">
            <div class="row h-100 w-100">
                <div class="col-12 p-0 d-flex align-items-center justify-content-between" style="height:35%">
                    <div>
                        <p class="p-0 m-0 text-light">応募済み</p>
                    </div>
                    <div>
                        <i class="fa-sharp fa-solid fa-file-arrow-up fa-2x" style="color: #ffffff;"></i>
                    </div>
                </div>
                <div class="col-12 p-0" style="height:40%">
                    <div class="h-100 w-100">
                        <p class="p-0 m-0 h-100 w-100 text-light fs-2">{{ $entry_count }}</p>
                    </div>
                </div>
                <div class="col-12 p-0 d-flex text-center border-top border-light" style="height:25%; line-height: 2rem;">
                    <div class="w-100 align-self-center">
                        <p class="p-0 m-0 w-100 text-light">
                            <a class="nav-link text-white p-0" href="{{ route('user.showEntries') }}">リストを見る</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 選考中 -->
        <div class="col-lg-2 col-12 col-sm-5 mx-3 mt-1 mt-lg-0 d-flex align-items-center justify-content-center bg-warning bg-gradient rounded-1" style="padding-top: 1rem;">
            <div class="row w-100">
                <div class="col-12 p-0 d-flex align-items-center justify-content-between" style="height:35%">
                    <div>
                        <p class="p-0 m-0 text-light">選考中</p>
                    </div>
                    <div>
                        <i class="fa-solid fa-person-walking-arrow-right fa-2x" style="color: #ffffff;"></i>
                    </div>
                </div>
                <div class="col-12 p-0" style="height:40%">
                    <div class="h-100 w-100">
                        <p class="p-0 m-0 h-100 w-100 text-light fs-2">{{ $selection_count }}</p>
                    </div>
                </div>
                <div class="col-12 p-0 d-flex text-center border-top border-light" style="height:25%; line-height: 2rem;">
                    <div class="w-100 align-self-center">
                        <p class="p-0 m-0 w-100 text-light">
                            <a class="nav-link text-white p-0" href="{{ route('user.showSelections') }}">リストを見る</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 内定済み -->
        <div class="col-lg-2 col-12 col-sm-5 mx-3 mt-1 mt-lg-0 d-flex align-items-center justify-content-center bg-danger bg-gradient rounded-1" style="padding-top: 1rem;">
            <div class="row h-100 w-100">
                <div class="col-12 p-0 d-flex align-items-center justify-content-between" style="height:35%">
                    <div>
                        <p class="p-0 m-0 text-light">内定済み</p>
                    </div>
                    <div>
                        <i class="fa-solid fa-handshake fa-2xl" style="color: #ffffff;"></i>
                    </div>
                </div>
                <div class="col-12 p-0" style="height:40%">
                    <div class="h-100 w-100">
                        <p class="p-0 m-0 h-100 w-100 text-light fs-2">{{ $offer_count }}</p>
                    </div>
                </div>
                <div class="col-12 p-0 d-flex text-center border-top border-light" style="height:25%; line-height: 2rem;">
                    <div class="w-100 align-self-center">
                        <p class="p-0 m-0 w-100 text-light">
                            <a class="nav-link text-white p-0" href="{{ route('user.showOffers') }}">リストを見る</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>