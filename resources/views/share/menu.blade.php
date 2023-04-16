
    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <img src="/img/Funn.gif" class="logo-icon" alt="logo icon">
            </div>
            <div>
                <h6 class="logo-text" style="font-size:15px ">FunDo Fashion</h6>
            </div>
            <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
            </div>
        </div>
        <!--navigation-->
        <ul class="metismenu" id="menu">
            <li>
                <a href="/" >
                    <div class="parent-icon">
                        <i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Trang Chủ</div>
                </a>
            </li>

            <li class="menu-label">Danh Sách Sản Phẩm</li>
            {{-- <li>
                <a href="widgets.html">
                    <div class="parent-icon"><i class='bx bx-cookie'></i>
                    </div>
                    <div class="menu-title">Widgets</div>
                </a>
            </li> --}}
            @foreach (\App\Models\DanhMuc::where('id_danh_muc_cha',0)->where('tinh_trang',1)->get(); as $key => $value)
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class='bx bx-cart'></i>
                    </div>
                    <div class="menu-title">{{$value->ten_danh_muc}}</div>
                </a>
                <ul>
                    @foreach (\App\Models\DanhMuc::where('id_danh_muc_cha',$value->id)->where('tinh_trang',1)->get(); as $keycha => $valuecha)
                    <li>
                        <a href="/{{$value->slug_danh_muc}}/{{$valuecha->slug_danh_muc}}"><i class="bx bx-right-arrow-alt"></i>{{$valuecha->ten_danh_muc}}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
            <li class="menu-label">Tư Vấn Khách Hàng</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Thông Tin</div>
                </a>
                <ul>
                    <li> <a href="form-select2.html"><i class="bx bx-right-arrow-alt"></i>Select2</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon">
                        <i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Hỏi Đáp</div>
                </a>
                <ul>
                    <li> <a href="form-select2.html"><i class="bx bx-right-arrow-alt"></i>Select2</a>
                    </li>
                </ul>
            </li>
            @php
                $check = Auth::guard('admin')->check();
                $ucheck = Auth::guard('user')->check();
            @endphp
            @if($ucheck)
            @php
                $user = Auth::guard('user')->user();
            @endphp
            @endif
            @if ($check)
            @php
                $data = Auth::guard('admin')->user();
                $roll = $data->is_master;
            @endphp
            <li class="menu-label">Quản Lý</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-line-chart"></i>
                    </div>
                    <div class="menu-title">Quản Lý</div>
                </a>
                <ul>
                    <li> <a href="/admin/tai-khoan/index"><i class="bx bx-right-arrow-alt"></i>Quản Lý Tài Khoản</a>
                    </li>
                    @if ($roll == 1)
                    <li> <a href="/admin/nhan-vien/index"><i class="bx bx-right-arrow-alt"></i>Quản Lý Nhân Viên</a>
                    </li>
                    @endif
                    <li> <a href="/admin/danh-muc/index"><i class="bx bx-right-arrow-alt"></i>Quản Lý Danh Mục</a>
                    </li>
                    <li> <a href="/admin/hoa-don/index"><i class="bx bx-right-arrow-alt"></i>Quản Lý Hoá Đơn</a>
                    </li>
                </ul>
            </li>
            @if ($roll == 1)
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-line-chart"></i>
                    </div>
                    <div class="menu-title">Báo Cáo Thống Kê</div>
                </a>
                <ul>
                    <li> <a href="/admin/thong-ke/index2"><i class="bx bx-right-arrow-alt"></i>Thống Kê Theo Tháng</a>
                    </li>
                    <li> <a href="/admin/thong-ke/index"><i class="bx bx-right-arrow-alt"></i>Thống Kê Theo Sản Phẩm</a>
                    </li>

                </ul>
            </li>
            @endif
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-line-chart"></i>
                    </div>
                    <div class="menu-title">Quản Lý Sản Phẩm</div>
                </a>
                <ul>
                    <li> <a href="/admin/san-pham/index"><i class="bx bx-right-arrow-alt"></i>Danh Sách Sản Phẩm</a>
                    </li>
                    <li> <a href="/admin/san-pham/create"><i class="bx bx-right-arrow-alt"></i>Thêm Mới Sản Phẩm</a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
     </div>

        <div class="topbar d-flex align-items-center">
            <nav class="navbar navbar-expand">
                <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                </div>
                <div class="flex-grow-1 ms-2 me-2 mb-search">
                    <div class="position-relative search-bar-box">
                        <input type="text" id="input_search" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i id="search-i" style="cursor: pointer;" class='bx bx-search'></i></span>
                        <span class="position-absolute top-50 search-close translate-middle-y"></span>
                    </div>
                </div>
                <div class="top-menu ms-auto">

                    <ul class="navbar-nav align-items-center">
                        @if($check)
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
                                <i class='bx bx-bell'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:;">
                                    <div class="msg-header">
                                        <p class="msg-header-title">Thông Báo</p>
                                        <p class="msg-header-clear ms-auto"></p>
                                    </div>
                                </a>
                                <div class="header-notifications-list">
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec ago</span></h6>
                                                <p class="msg-info">5 new user registered</p>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <a href="javascript:;">
                                    <div class="text-center msg-footer">Xem Danh Sách Đơn Hàng</div>
                                </a>
                            </div>
                        </li>
                        @elseif($ucheck)
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="/gio_hang" role="button" aria-expanded="false">
                                 {{-- <span class="alert-count">7</span> --}}
                                <i class='bx bx-cart'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:;">
                                    <div class="msg-header">
                                        <p class="msg-header-title">Giỏ Hàng</p>
                                    </div>
                                </a>
                                <div class="header-notifications-list">
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
                                            ago</span></h6>
                                                <p class="msg-info">5 new user registered</p>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <a href="javascript:;">
                                    <div class="text-center msg-footer">Vào Giỏ Hàng</div>
                                </a>
                            </div>
                        </li>
                        @else
                        <div class="header-notifications-list">
                        </div>
                        @endif
                        <li class="nav-item dropdown dropdown-large">
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="header-message-list">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                @if($check)
                <div class="user-box dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/app_assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
                        <div class="user-info ps-3">
                            <p class="user-name mb-0">{{$data->full_name}}</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" style="background-color: #fff;">
                        <li style="opacity: 1 !important"><a class="dropdown-item" href="javascript:;" data-bs-toggle="modal"
                            data-bs-target="#profileNhanVienModal"><i class="bx bx-user"></i><span>Profile</span></a>
                        </li>
                        <li>
                            <div class="dropdown-divider mb-0"></div>
                        </li>
                        <li style="opacity: 1 !important"><a class="dropdown-item" href="/alogout"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                        </li>
                    </ul>
                </div>
                @elseif($ucheck)
                <div class="user-box dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/app_assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
                        <div class="user-info ps-3">
                            <p class="user-name mb-0">{{$user->full_name}}</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" style="background-color: #fff;">
                        <li><a class="dropdown-item" href="javascript:;" data-bs-toggle="modal"
                            data-bs-target="#profileNhanVienModal"><i class="bx bx-user"></i><span>Profile</span></a>
                        </li>
                        <li>
                            <div class="dropdown-divider mb-0"></div>
                        </li>
                        <li style="opacity: 1 !important"><a class="dropdown-item" href="/alogout"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                        </li>
                    </ul>
                </div>
                @else
                <div><button id="goLogin" class="btn-mb btn btn-primary" type="button">Đăng Nhập</button>  <button class="btn-mb btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleScrollableModal">Đăng Ký</button></div>

                @endif
            </nav>
        </div>

    </div>
<style>

   .logo-text {
  font-family:arial black;
  font-size:70px;
  background-image:
    linear-gradient(to right, red,orange,yellow,green,blue,indigo,violet, red);
  -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  animation: rainbow-animation 200s linear infinite;
}
@keyframes rainbow-animation {
    to {
        background-position: 4500vh;
    }
}
@media only screen and (max-width: 600px ){
    .btn-mb{
        font-size: 6px;
        padding: 3px;
    }
    .mb-search{
        width:100px;
    }
}
</style>
