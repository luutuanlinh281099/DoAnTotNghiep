<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <!-- Quay về trang Fornt-end-->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            @if(Auth::user()->role_id == 1)
            <div class="info">
                <a href="{{ route('auth.home') }}" class="d-block">ADMIN</a>
            </div>
            @elseif(Auth::user()->role_id == 2)
            <div class="info">
                <a href="{{ route('auth.home') }}" class="d-block">SECURITY</a>
            </div>
            @endif
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Camera
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-info right">3</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('camerain.index') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đầu vào</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cameraout.index') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đầu ra</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('camerain.clean') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quét hệ thống</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <br>
                @if(Auth::user()->role_id == 1)
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Quản lí
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('park.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bãi xe</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('brand.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Loại xe</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Người dùng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('member.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vé tháng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('role.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vai trò</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('newpaper.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tin tức</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <br>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Thống kê
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-info right">3</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('statistic.date') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Theo ngày</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('statistic.park') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bãi xe</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('statistic.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Khách hàng</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </ul>
        </nav>
    </div>
</aside>