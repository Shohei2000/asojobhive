<nav class="navbar navbar-expand-lg navbar-light bg-gradient rounded-bottom" style="background-color: dodgerblue;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}" style="width:8rem;">
            <img src="{{ asset('images/asojobhive_logo.png') }}" alt="asojobhive_logo" class="d-inline-block align-text-top w-100">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item d-flex px-2">
                    <a class="nav-link text-white p-0 align-self-center" href="{{ route('home') }}">ホーム</a>
                </li>
                <li class="nav-item d-flex px-2">
                    <a class="nav-link text-white p-0 align-self-center" href="{{ route('user.showBasicProfile') }}">マイページ</a>
                </li>
                <li class="nav-item d-flex px-2">
                    <a class="nav-link text-white p-0 align-self-center" href="{{ route('companies.show') }}">企業一覧</a>
                </li>
                <li class="nav-item d-flex px-2">
                    <a class="nav-link text-white p-0 align-self-center" href="{{ route('apply.showLeaveApplication') }}">公欠申請</a>
                </li>
            </ul>
            <form class="d-flex" action="{{ route('companies.show') }}" method="GET">
                @csrf
                <input id="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" autocomplete="off" />
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
            <script src="{{ asset('js/app.js') }}"></script>
            <script src="{{ asset('js/search.js') }}"></script>
            <form action="{{ route('logout') }}" method="POST" style="padding-left:1rem;">
                @csrf
                <button class="btn btn-danger btn-gradient">ログアウト</button>
            </form>
            <a class="nav-link px-3" href="#" data-bs-toggle="modal" data-bs-target="#notificationModal">
                <i class="far fa-bell fa-2x" style="color: #ffffff;"></i>
            </a>
        </div>
    </div>
    <!-- モーダルの開始 -->
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationModalLabel">通知</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="notifications" id="notificationList">
                        <!-- ここに通知を表示する -->
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>
    <!-- モーダルの終了 -->
</nav>

<script>
    // モーダルが表示された時の処理
    $('#notificationModal').on('show.bs.modal', function () {
    $.ajax({
        url: "{{ route('notifications.fetch') }}",
        method: 'GET',
        success: function (data) {
            var notificationList = $('#notificationList');
            notificationList.empty(); // 通知リストをクリア

            if (data.title) {
                notificationList.append('<li>' + data.title + '</li>'); // 最新の通知を表示
                notificationList.append('<li>Created At: ' + data.created_at + '</li>'); // Created Atを表示
            } else {
                notificationList.append('<p>通知はありません。</p>');
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
});

</script>
