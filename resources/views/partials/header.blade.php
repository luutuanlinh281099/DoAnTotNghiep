<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="form-inline my-2 my-lg-0" action="{{ route('statistic.search') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input class="form-control mr-sm-2" type="search" size="100px" placeholder="Tìm kiếm biển số xe" aria-label="Search" name="search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
      </form>
    </div>
    @if(Auth::check())
    <li><a class="navbar-brand" href="{{ route('auth.logout') }}">ĐĂNG XUÁT</a></li>
    @else
    <li><a class="navbar-brand" href="{{ route('auth.login') }}">ĐĂNG NHẬP</a></li>
    @endif
  </nav>
</nav>