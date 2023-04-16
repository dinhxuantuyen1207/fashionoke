<!doctype html>
<html lang="en">

<head>
    @include('share.head')
</head>

<body>
    <div>
        <section class="h-100 gradient-form" style="background-color: #eee;">
            <div class="container py-3 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-10">
                        <div class="card rounded-3 text-black">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="card-body p-md-3 mx-md-2">
                                        <div class="text-center">
                                            <img src="/img/Funn.gif" style="width: 185px;" alt="logo">
                                            <h4 class="mt-1 mb-3 pb-1">Kính Chào Quý Khách</h4>
                                        </div>
                                        <form method="post" action="/">
                                            @csrf
                                            <div class="form-outline mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="text" name="tai_khoan" id="tai_khoan"
                                                    class="form-control" placeholder="nhập email hoặc số điện thoại" />

                                            </div>
                                            <div class="form-outline mb-3">
                                                <label class="form-label">Mật khẩu</label>
                                                <input type="password" name="mat_khau" id="mat_khau"
                                                    class="form-control" placeholder="nhập mật khẩu" />
                                            </div>

                                            <div class="text-center pt-1 mb-3 pb-1">
                                                <button id="adminlogin" type="button"
                                                    class="btn light btn-primary">Đăng Nhập</button>
                                                <p></p>
                                                <a class="text-muted" href="#!">Quên Mật Khẩu ?</a>
                                            </div>

                                            <div class="d-flex align-items-center justify-content-center pb-1">
                                                <p class="mb-0 me-2">Bạn Chưa Có Tài Khoản ? </p>
                                                <p style="width:2%"></p>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleScrollableModal">Tạo Tài
                                                    Khoản</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                        <h4 class="mb-4">We are more than just a company</h4>
                                        <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                            sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud
                                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="exampleScrollableModal" tabindex="-1" aria-hidden="true" style="display: none;">
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
    </div>
    @include('share.foot')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function(e) {
            function goBackAndReload() {
                window.location.reload(history.back());
            }
            $(document).on('keypress', function(e) {
                if (e.which == 13) {
                    $("#adminlogin").click();
                }
            });
            $("#adminlogin").click(function(e) {
                var payload = {
                    'email': $('#tai_khoan').val(),
                    'password': $('#mat_khau').val(),
                }
                $.ajax({
                    url: '/login',
                    type: 'post',
                    data: payload,
                    success: function(res) {
                        if (res.status) {
                            toastr.success('Login Thành Công');
                            if (sessionStorage.getItem("url")) {
                                window.location.replace(sessionStorage.getItem("url"));
                            } else {
                                window.location.replace('/');
                            }
                        } else {
                            toastr.error('Sai Tài Khoản Hoặc Mật Khẩu');
                        }

                    }
                });
            })
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
        })
    </script>
</body>

</html>
<style>
    .gradient-custom-2 {
        /* fallback for old browsers */
        background: #fccb90;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    @media (min-width: 768px) {
        .gradient-form {
            height: 100vh !important;
        }
    }

    @media (min-width: 769px) {
        .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
        }
    }
</style>
