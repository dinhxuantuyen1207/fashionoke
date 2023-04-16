<!doctype html>
<html lang="en">

<head>
    @include('share.head')
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar-wrapper" data-simplebar="init">
            <header>
                <!--wrapper-->
                @include('share.menu')
                <!--end wrapper-->

                <!--start switcher-->
                {{-- <div class="switcher-wrapper">
            <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
            </div>
            <div class="switcher-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                    <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
                </div>
                <hr />
                <h6 class="mb-0">Theme Styles</h6>
                <hr />
                <div class="d-flex align-items-center justify-content-between">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
                        <label class="form-check-label" for="lightmode">Light</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                        <label class="form-check-label" for="darkmode">Dark</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                        <label class="form-check-label" for="semidark">Semi Dark</label>
                    </div>
                </div>
                <hr />
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
                    <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
                </div>
                <hr />
                <h6 class="mb-0">Header Colors</h6>
                <hr />
                <div class="header-colors-indigators">
                    <div class="row row-cols-auto g-3">
                        <div class="col">
                            <div class="indigator headercolor1" id="headercolor1"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor2" id="headercolor2"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor3" id="headercolor3"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor4" id="headercolor4"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor5" id="headercolor5"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor6" id="headercolor6"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor7" id="headercolor7"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor8" id="headercolor8"></div>
                        </div>
                    </div>
                </div>
                <hr />
                <h6 class="mb-0">Sidebar Colors</h6>
                <hr />
                <div class="header-colors-indigators">
                    <div class="row row-cols-auto g-3">
                        <div class="col">
                            <div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
                        </div>
                        <div class="col">
                            <div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
                        </div>
                        <div class="col">
                            <div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
                        </div>
                        <div class="col">
                            <div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
                        </div>
                        <div class="col">
                            <div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
                        </div>
                        <div class="col">
                            <div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
                        </div>
                        <div class="col">
                            <div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
                        </div>
                        <div class="col">
                            <div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
            </header>
            <!--end header -->
            <!--start page wrapper -->
            <div class="page-wrapper">
                <div class="page-content">
                    @yield('group-body')
                </div>
            </div>
            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <!--end overlay-->
            <!--Start Back To Top Button-->
            <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            <footer class="page-footer">
                <p class="mb-0">Fundo Fashion 2023</p>
            </footer>
            @php
                $check = Auth::guard('admin')->check();
                $ucheck = Auth::guard('user')->check();
            @endphp
            <div class="modal fade" id="profileNhanVienModal" tabindex="-1" aria-hidden="true" style="display: none;">
            @if ($ucheck)
            @php
                $user = Auth::guard('user')->user();
            @endphp
                <div class="modal-dialog modal-lgx">
                    <form action="/login/register" method="post">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Thông Tin Tài Khoản</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-outline mb-1">
                                            <input class="form-control mt-1" type="hidden" id="edit_id">
                                            <label class="form-label" for="form2Example11">Họ Và Tên <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="text" name="ho_va_ten" id="profile_user_ho_va_ten"
                                                class="form-control" placeholder="nhập họ và tên của bạn" value="{{$user->full_name}}"/>
                                            <small></small>
                                        </div>
                                        <div class="form-outline mb-1">
                                            <label class="form-label" for="form2Example11">Email<span
                                                    class="text-danger">(*)</span></label>
                                            <input type="text" name="tai_khoan" id="profile_user_email" class="form-control"
                                                placeholder="nhập tên đăng nhập" value="{{$user->email}}"/>
                                            <small></small>
                                        </div>
                                        <div class="form-outline mb-1">
                                            <label class="form-label" for="form2Example11">SĐT <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="text" name="SDT" id="profile_user_SDT" class="form-control"
                                                placeholder="nhập số điện thoại" value="{{$user->phone}}" />
                                            <small></small>
                                        </div>
                                        <div class="form-outline mb-1">
                                            <label class="form-label" for="form2Example11">Mật Khẩu <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="password" name="profile_mat_khau" id="profile_user_mat_khau"
                                                class="form-control" placeholder="nhập mật khẩu" />
                                            <small></small>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light"
                                    data-bs-dismiss="modal">Đóng</button>
                                <button type="button" id="chinh_sua_profile_user" class="btn btn-primary">Chỉnh Sửa</button>
                            </div>
                    </form>
                </div>


            @elseif ($check)
            @php
                $data = Auth::guard('admin')->user();
            @endphp
                <div class="modal-dialog modal-lg">
                    <form>
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Thông Tin Cá Nhân</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 row">
                                        <div class="col-md-12 row">
                                            <div class="mb-1 col-md-4">
                                                <input type="file" id="upload_anh" style="display:none"
                                                    enctype="multipart/form-data">
                                                <img id="edit_hinh_anh" style="cursor:pointer" src="/upload/default.jpg"
                                                    class="card-img" alt="">
                                            </div>
                                            <div class="mb-1 col-md-8">
                                                <div class="form-outline mb-1 col-md-12">
                                                    <input class="form-control mt-1" type="hidden" id="edit_id">
                                                    <label class="form-label" for="form2Example11">Họ Và Tên <span
                                                            class="text-danger">(*)</span></label>
                                                    <input type="text" name="ho_va_ten" id="edit_ho_va_ten"
                                                        class="form-control" placeholder="nhập họ và tên của bạn" />
                                                    <small></small>
                                                </div>
                                                <div class="form-outline mb-1 col-md-12">
                                                    <label class="form-label" for="form2Example11">Email <span
                                                            class="text-danger">(*)</span></label>
                                                    <input type="text" name="email" id="edit_email"
                                                        class="form-control" placeholder="nhập tên đăng nhập" />
                                                    <small></small>
                                                </div>
                                                <div class="form-outline mb-1 col-md-12">
                                                    <label class="form-label" for="form2Example11">Mật Khẩu Mới <span
                                                            class="text-danger">(*)</span></label>
                                                    <input type="password" name="mat_khau" id="edit_mat_khau"
                                                        class="form-control" placeholder="nhập mật khẩu" />
                                                    <small></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-outline mb-1 col-md-4">
                                            <label class="form-label" for="form2Example11">SĐT <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="text" name="SDT" id="edit_SDT" class="form-control"
                                                placeholder="nhập số điện thoại" />
                                            <small></small>
                                        </div>
                                        <div class="form-outline mb-1 col-md-4">
                                            <label class="form-label" for="form2Example11">Ngày Sinh <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="date" name="mat_khau" id="edit_ngay_sinh"
                                                class="form-control" placeholder="nhập ngày sinh" />
                                            <small></small>
                                        </div>
                                        <div class="form-outline mb-1 col-md-4">
                                            <label class="form-label" for="form2Example11">Ngày Vào Làm <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="date" name="ngay_vao_lam" id="edit_ngay_vao_lam"
                                                class="form-control" placeholder="nhập ngày bắt đầu làm việc" />
                                            <small></small>
                                        </div>
                                        <div class="form-outline mb-1 col-md-4">
                                            <label class="form-label" for="form2Example11">Chức Vụ <span
                                                    class="text-danger">(*)</span></label>
                                            <select id="edit_chuc_vu" class="form-control">
                                                <option value="0" selected>Chọn Chức Vụ</option>
                                                <option value="1">Nhân Viên</option>
                                                <option value="2">Quản Lý</option>
                                            </select>
                                            <small></small>
                                        </div>
                                        <div class="form-outline mb-1 col-md-4">
                                            <label class="form-label" for="form2Example11">Giới Tính <span
                                                    class="text-danger">(*)</span></label>
                                            <select id="edit_gioi_tinh" class="form-control">
                                                <option value="0">Chọn Giới Tính</option>
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                                <option value="Không Xác Định">Không Xác Định</option>
                                            </select>
                                            <small></small>
                                        </div>
                                        <div class="form-outline mb-1 col-md-4">
                                            <label class="form-label" for="form2Example11">Lương <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="number" name="luong" id="edit_luong"
                                                class="form-control" placeholder="nhập mật khẩu" />
                                            <small></small>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light"
                                    data-bs-dismiss="modal">Đóng</button>
                                <button type="button" id="accpectUpdate" class="btn btn-primary">Chỉnh Sửa</button>
                            </div>
                    </form>
                </div>

            @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleScrollableModal" tabindex="-1" aria-hidden="true" style="display:none;">
        <div class="modal-dialog modal-lgx">
            <form action="/login/register" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Đăng Ký Tài Khoản</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-outline mb-1">
                                    <label class="form-label" for="form2Example11">Họ Và Tên <span
                                            class="text-danger">(*)</span></label>
                                    <input type="text" name="ho_va_ten" id="dk_ho_va_ten" class="form-control"
                                        placeholder="nhập họ và tên của bạn" />
                                    <small></small>
                                </div>
                                <div class="form-outline mb-1">
                                    <label class="form-label" for="form2Example11">Email<span
                                            class="text-danger">(*)</span></label>
                                    <input type="text" name="tai_khoan" id="dk_email" class="form-control"
                                        placeholder="tên đăng nhập" />
                                    <small></small>
                                </div>
                                <div class="form-outline mb-1">
                                    <label class="form-label" for="form2Example11">SĐT <span
                                            class="text-danger">(*)</span></label>
                                    <input type="text" name="SDT" id="dk_SDT" class="form-control"
                                        placeholder="mật khẩu" />
                                    <small></small>
                                </div>
                                <div class="form-outline mb-1">
                                    <label class="form-label" for="form2Example11">Mật Khẩu <span
                                            class="text-danger">(*)</span></label>
                                    <input type="password" name="mat_khau" id="dk_mat_khau" class="form-control"
                                        placeholder="xác nhận mật khẩu" />
                                    <small></small>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" id="btn_dang_ky" class="btn btn-primary">Đăng Ký</button>
                    </div>
            </form>
        </div>

    </div>
    @include('share.foot')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield('js')

    <script>
        $(document).ready(function(e) {

            $("#goLogin").click(function(e) {
                window.location.replace("/login")
                sessionStorage.setItem("url", location.href);
            });

            $("#btn_dang_ky").click(function(e) {
                var payload = {
                    'email': $('#dk_email').val(),
                    'password': $('#dk_mat_khau').val(),
                    'full_name': $('#dk_ho_va_ten').val(),
                    'phone': $('#dk_SDT').val()
                }
                $.ajax({
                    url: '/register',
                    type: 'post',
                    data: payload,
                    success: function(res) {
                        if (res.status) {
                            toastr.success('Đăng Ký Thành Công');
                            $('#exampleScrollableModal').modal('hide');
                        } else {
                            toastr.error('Đăng Ký Thất Bại');
                        }

                    }
                })
            })
            // function toSlug(s) {
            // return s.toString().normalize('NFD').replace(/[\u0300-\u036f]/g, "") //remove diacritics
            //     .toLowerCase()
            //     .replace(/\s+/g, '-') //spaces to dashes
            //     .replace(/&/g, '-and-') //ampersand to and
            //     .replace(/[^\w\-]+/g, '') //remove non-words
            //     .replace(/\-\-+/g, '-') //collapse multiple dashes
            //     .replace(/^-+/, '') //trim starting dash
            //     .replace(/-+$/, ''); //trim ending dash
            // };
            function toSlug(str) {
                // Chuyển chuỗi sang chữ thường
                str = str.toLowerCase();

                // Xóa dấu
                str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
                str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
                str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
                str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
                str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
                str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
                str = str.replace(/(đ)/g, 'd');

                // Xóa ký tự đặc biệt
                str = str.replace(/([^0-9a-z-\s])/g, '');

                // Xóa khoảng trắng thay bằng ký tự -
                str = str.replace(/(\s+)/g, '-');

                // Xóa ký tự - ở đầu và cuối
                str = str.replace(/^-+/g, '');
                str = str.replace(/-+$/g, '');

                // Trả về kết quả
                return str;
            }
            $('#input_search').keypress(function(event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == '13') {
                    var name = $('#input_search').val()
                    var x = toSlug(name);
                    if (x == '') {

                    } else {
                        window.location.href = "/search:" + x;
                    }
                }
            });
            $('#input_search').blur(function() {
                var name = $('#input_search').val()
                var x = toSlug(name);
                if (x == '') {} else {
                    window.location.href = "/search:" + x;
                }
            });
            $('body').on('click','#chinh_sua_profile_user',function(){
                var full_name = $('#profile_user_ho_va_ten').val();
                var email = $('#profile_user_email').val();
                var phone = $('#profile_user_phone').val();
                var password = $('#profile_user_mat_khau').val();
                var full_name = $('#profile_user_ho_va_ten').val();
            })
        })
    </script>

</body>

</html>
<style>
    .spin {
        animation: spin 1s linear infinite;
        ;
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @media only screen and (max-width: 600px) {
        .card-img-top {
            height: 70px !important;
        }

        .mb-item {
            width: 33% !important;
        }

        .clearfix {
            margin-left: 60px !important;
            font-size: 12px !important;
        }

        .card-title {
            font-size: 9px !important;
            height: 27px !important;
        }
    }
</style>
