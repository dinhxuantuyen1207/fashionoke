<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="/img/Funn.gif" type="image/png"/>
    <!--plugins-->
    <link href="/app_assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="/app_assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="/app_assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="/app_assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="/app_assets/css/pace.min.css" rel="stylesheet" />
    <script src="/app_assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="/app_assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/app_assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="/app_assets/css/app.css" rel="stylesheet">
    <link href="/app_assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="/app_assets/css/dark-theme.css" />
    <link rel="stylesheet" href="/app_assets/css/semi-dark.css" />
    <link rel="stylesheet" href="/app_assets/css/header-colors.css" />
    <title>Danh Sách Sản Phẩm - FunDo Fashion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="init">
            <header>
                <!--wrapper-->
                @include('share.menu')
            </header>
            <!--end header -->
            <!--start page wrapper -->
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <!--end breadcrumb-->
                    <div class="card">
                        <div class="row mt-3 ms-3">
                            <div class="col-md-10 "></div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Tên</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">SĐT</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            {{-- <th>#</th>
										<th>Tên Sản Phẩm</th>
										<th>Số Lượng</th>
										<th>Hình Ảnh</th>
                                        <th>Size</th>
										<th>Danh Mục</th>
										<th>Giá</th>
                                        <th>Khuyến Mãi</th>
                                        <th>Action</th> --}}
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <!--end overlay-->
            <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                    class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            <footer class="page-footer">
                <p class="mb-0">Copyright © 2021. All right reserved.</p>
            </footer>
            <div class="modal fade" id="editTaiKhoanModal" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lgx">
                    <form action="/login/register" method="post">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Update Tài Khoản</h5>
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
                                            <input type="text" name="ho_va_ten" id="edit_ho_va_ten"
                                                class="form-control" placeholder="nhập họ và tên của bạn" />
                                            <small></small>
                                        </div>
                                        <div class="form-outline mb-1">
                                            <label class="form-label" for="form2Example11">Email<span
                                                    class="text-danger">(*)</span></label>
                                            <input type="text" name="tai_khoan" id="edit_email" class="form-control"
                                                placeholder="nhập tên đăng nhập" />
                                            <small></small>
                                        </div>
                                        <div class="form-outline mb-1">
                                            <label class="form-label" for="form2Example11">SĐT <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="text" name="SDT" id="edit_SDT" class="form-control"
                                                placeholder="nhập số điện thoại" />
                                            <small></small>
                                        </div>
                                        <div class="form-outline mb-1">
                                            <label class="form-label" for="form2Example11">Mật Khẩu <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="password" name="mat_khau" id="edit_mat_khau"
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

            </div>
        </div>
        <!--end wrapper-->
        <!--start switcher-->
        <!--end switcher-->
        <!-- Bootstrap JS -->
        <script src="/app_assets/js/bootstrap.bundle.min.js"></script>
        <!--plugins-->
        <script src="/app_assets/js/jquery.min.js"></script>
        <script src="/app_assets/plugins/simplebar/js/simplebar.min.js"></script>
        <script src="/app_assets/plugins/metismenu/js/metisMenu.min.js"></script>
        <script src="/app_assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
        <script src="/app_assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script src="/app_assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
        <script>
            $(document).ready(function() {});
        </script>
        <script>
            $(document).ready(function() {
                hienThiTable();

                function addtable() {
                    var table = $('#example2').DataTable({
                        lengthChange: false,
                        buttons: ['copy', 'excel', 'pdf', 'print']
                    });
                    table.buttons().container()
                        .appendTo('#example2_wrapper .col-md-6:eq(0)');
                }

                function hienThiTable() {
                    var noidung = '';
                    $.ajax({
                        url: '/admin/tai-khoan/list',
                        type: 'get',
                        success: function(res) {
                            $.each(res.data, function(key, value) {
                                noidung += '<tr>'
                                noidung += '<td>' + (key + 1) + '</td>'
                                noidung += '<td>' + (value.id) + '</td>'
                                noidung += '<td>' + (value.full_name) + '</td>'
                                noidung += '<td>' + (value.email) + '</td>'
                                noidung += '<td>' + (value.phone) + '</td>'
                                noidung += '<td class="text-center">'
                                noidung +=
                                    '<div class="d-flex order-actions justify-content-evenly">'
                                noidung +=
                                    '<a href="javascript:;" class="update-tai-khoan" data-bs-toggle="modal" data-bs-target="#editTaiKhoanModal" data-id=' +
                                    (value.id) + '><i class="bx bxs-edit"></i></a>'
                                noidung +=
                                    '<a href="javascript:;" class="delete-1 delete-tai-khoan" data-name=' +
                                    (value.email) + ' data-id=' + (value.id) +
                                    '><i class="bx bxs-trash"></i></a>'
                                noidung += '</div>'
                                noidung += '</td>'
                                noidung += '</tr>'
                            })
                            var table = $('#example2').DataTable();
                            table.destroy();
                            $('#example2 tbody').html(noidung);
                            addtable();
                        }
                    });
                }


                $("body").on('click', '.update-tai-khoan', function() {
                    var id = $(this).data('id');
                    $.ajax({
                        'url': '/admin/tai-khoan/edit/' + id,
                        'type': 'get',
                        'success': function(res) {
                            if (res.status) {
                                $("#edit_id").val(res.data.id);
                                $("#edit_ho_va_ten").val(res.data.full_name);
                                $("#edit_email").val(res.data.email);
                                $("#edit_SDT").val(res.data.phone);
                                $("#edit_mat_khau").val(res.data.password);
                            } else {
                                toastr.error("Tài Khoản không tồn tại!");
                                $('#editTaiKhoanModal').modal('hide');
                            }
                        },
                    });
                });

                $("body").on('click', '#accpectUpdate', function() {
                    var id = $("#edit_id").val();
                    var full_name = $("#edit_ho_va_ten").val();
                    var email = $("#edit_email").val();
                    var phone = $("#edit_SDT").val();
                    var password = $("#edit_mat_khau").val();

                    var z = {
                        'id': id,
                        'full_name': full_name,
                        'email': email,
                        'phone': phone,
                        'password': password
                    };

                    $.ajax({
                        'url': '/admin/tai-khoan/update',
                        'type': 'post',
                        'data': z,
                        'success': function(res) {
                            if (res.status) {
                                toastr.success("Đã cập nhật tài khoản thành công!");
                                $('#editTaiKhoanModal').modal('hide');
                                hienThiTable();
                            } else {
                                toastr.error("Có lỗi không mong muốn xảy ra!");
                            }
                        },
                    });
                });

                $("body").on('click', '.delete-tai-khoan', function() {
                    var id2 = $(this).data('id');
                    var name = $(this).data('name');
                    var z = {
                        id: id2
                    }
                    if (confirm('Bạn có chắc chắn muốn xóa tài khoản ' + name + ' ?')) {
                        $.ajax({
                            'url': '/admin/tai-khoan/delete',
                            'type': 'post',
                            'data': z,
                            'success': function(res) {
                                if (res.status) {
                                    toastr.success("Xoá thành công!");
                                    hienThiTable();
                                } else {
                                    toastr.error("Có lỗi không mong muốn xảy ra!");
                                }
                            }
                        })
                    } else {}
                });

            });
        </script>
        <!--app JS-->
        <script src="/app_assets/js/app.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
</body>

</html>
