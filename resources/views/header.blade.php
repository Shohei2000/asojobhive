<nav class="navbar navbar-expand-lg navbar-light bg-gradient rounded-bottom" style="background-color: dodgerblue;">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}" style="width:10%;">
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
          <a class="nav-link text-white p-0 align-self-center" href="{{ route('users.showBasicProfile') }}">マイページ</a>
        </li>

        <li class="nav-item d-flex px-2">
          <a class="nav-link text-white p-0 align-self-center" href="{{ route('job_posts.show') }}">企業一覧</a>
        </li>

      </ul>

      <form class="d-flex">
        @csrf
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>

      <form action="{{ route('logout') }}" method="POST" style="padding-left:1rem;">
        @csrf
        <button class="btn btn-danger btn-gradient">ログアウト</button>
      </form>

      <a class="nav-link px-3" href="#">
        <i class="far fa-bell fa-2x" style="color:#ffffff;"></i>
      </a>
      
    </div>
  </div>
</nav>