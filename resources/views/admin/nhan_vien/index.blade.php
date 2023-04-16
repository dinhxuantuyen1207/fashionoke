<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="/app_assets/images/favicon-32x32.png" type="image/png" />
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
                                <a href="javascript:;" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addNhanVienModal">Thêm Mới</a>
                                <div class="modal fade" id="addNhanVienModal" tabindex="-1" aria-hidden="true"
                                    style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <form action="/login/register" method="post">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Thêm Mới Nhân Viên</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12 row">
                                                            <div class="col-md-12 row">
                                                                <div class="mb-1 col-md-4">
                                                                    <input type="file" id="add_anh"
                                                                        style="display:none"
                                                                        enctype="multipart/form-data">
                                                                    <img id="add_hinh_anh" style="cursor:pointer"
                                                                        src="/upload/default.jpg" class="card-img"
                                                                        alt="">
                                                                </div>
                                                                <div class="mb-1 col-md-8">
                                                                    <div class="form-outline mb-1 col-md-12">
                                                                        <input class="form-control mt-1" type="hidden"
                                                                            id="add_id">
                                                                        <label class="form-label"
                                                                            for="form2Example11">Họ Và Tên <span
                                                                                class="text-danger">(*)</span></label>
                                                                        <input type="text" name="ho_va_ten"
                                                                            id="add_ho_va_ten" class="form-control"
                                                                            placeholder="nhập họ và tên của bạn" />
                                                                        <small></small>
                                                                    </div>
                                                                    <div class="form-outline mb-1 col-md-12">
                                                                        <label class="form-label"
                                                                            for="form2Example11">Email <span
                                                                                class="text-danger">(*)</span></label>
                                                                        <input type="text" name="email"
                                                                            id="add_email" class="form-control"
                                                                            placeholder="nhập tên đăng nhập" />
                                                                        <small></small>
                                                                    </div>
                                                                    <div class="form-outline mb-1 col-md-12">
                                                                        <label class="form-label"
                                                                            for="form2Example11">Mật Khẩu <span
                                                                                class="text-danger">(*)</span></label>
                                                                        <input type="password" name="mat_khau"
                                                                            id="add_mat_khau" class="form-control"
                                                                            placeholder="nhập mật khẩu" />
                                                                        <small></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-outline mb-1 col-md-4">
                                                                <label class="form-label" for="form2Example11">SĐT
                                                                    <span class="text-danger">(*)</span></label>
                                                                <input type="text" name="SDT" id="add_SDT"
                                                                    class="form-control"
                                                                    placeholder="nhập số điện thoại" />
                                                                <small></small>
                                                            </div>
                                                            <div class="form-outline mb-1 col-md-4">
                                                                <label class="form-label" for="form2Example11">Ngày
                                                                    Sinh <span class="text-danger">(*)</span></label>
                                                                <input type="date" name="mat_khau"
                                                                    id="add_ngay_sinh" class="form-control"
                                                                    placeholder="nhập ngày sinh" />
                                                                <small></small>
                                                            </div>
                                                            <div class="form-outline mb-1 col-md-4">
                                                                <label class="form-label" for="form2Example11">Ngày
                                                                    Vào Làm <span
                                                                        class="text-danger">(*)</span></label>
                                                                <input type="date" name="ngay_vao_lam"
                                                                    id="add_ngay_vao_lam" class="form-control"
                                                                    placeholder="nhập ngày bắt đầu làm việc" />
                                                                <small></small>
                                                            </div>
                                                            <div class="form-outline mb-1 col-md-4">
                                                                <label class="form-label" for="form2Example11">Chức Vụ
                                                                    <span class="text-danger">(*)</span></label>
                                                                <select id="add_chuc_vu" class="form-control">
                                                                    <option value="0" selected>Chọn Chức Vụ
                                                                    </option>
                                                                    <option value="1">Nhân Viên</option>
                                                                    <option value="2">Quản Lý</option>
                                                                </select>
                                                                <small></small>
                                                            </div>
                                                            <div class="form-outline mb-1 col-md-4">
                                                                <label class="form-label" for="form2Example11">Giới
                                                                    Tính <span class="text-danger">(*)</span></label>
                                                                <select id="add_gioi_tinh" class="form-control">
                                                                    <option value="0">Chọn Giới Tính</option>
                                                                    <option value="Nam">Nam</option>
                                                                    <option value="Nữ">Nữ</option>
                                                                    <option value="Không Xác Định">Không Xác Định
                                                                    </option>
                                                                </select>
                                                                <small></small>
                                                            </div>
                                                            <div class="form-outline mb-1 col-md-4">
                                                                <label class="form-label" for="form2Example11">Lương
                                                                    <span class="text-danger">(*)</span></label>
                                                                <input type="number" name="luong" id="add_luong"
                                                                    class="form-control"
                                                                    placeholder="nhập mật khẩu" />
                                                                <small></small>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light"
                                                        data-bs-dismiss="modal">Đóng</button>
                                                    <button type="button" id="accpectAdd"
                                                        class="btn btn-primary">Thêm Mới</button>
                                                </div>
                                        </form>
                                    </div>

                                </div>
                                {{-- <a href="/admin/san-pham/create"><i class="bx bx-plus" style="font-size: 50px; background-color: rgb(149, 158, 236);height: 50px;width: 50px;line-height: 50px;border-radius:50%;color:aqua"></i></a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Họ Tên</th>
                                            <th class="text-center">Ngày Sinh</th>
                                            <th class="text-center">Giới Tính</th>
                                            <th class="text-center">SĐT</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Ngày Vào Làm</th>
                                            <th class="text-center">Chức Vụ</th>
                                            <th class="text-center">Lương</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach (\App\Models\Admin::with('sub_admin')->get() as $key => $value)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$value->id}}</td>
										<td>{{$value->full_name}}</td>
                                        <td>{{isset($value->sub_admin) ? $value->sub_admin->ngay_sinh : '-'}}</td>
                                        <td>{{isset($value->sub_admin) ? $value->sub_admin->gioi_tinh : '-'}}</td>
                                        <td>{{$value->phone}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{isset($value->sub_admin) ? $value->sub_admin->ngay_vao_lam : '-'}}</td>
                                        <td>{{isset($value->sub_admin) ? $value->sub_admin->id_chuc_vu : '-'}}</td>
                                        <td>{{isset($value->sub_admin) ? $value->sub_admin->luong : '-'}}</td>
										<td class="text-center">

                                                <div class="d-flex order-actions justify-content-evenly">

                                                <a href="javascript:;" class="update-danh-muc" data-bs-toggle="modal"data-bs-target="#updateDanhMucModel"><i class="bx bxs-edit"></i></a>
                                        <a href="javascript:;"
                                         class="delete-1"><i class="bx bxs-trash"></i></a>
                                       </div>
                                    </td>
									</tr>
                                    @endforeach --}}


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
                <p class="mb-0">Fundo Fashion 2023</p>
            </footer>

            <div class="modal fade" id="editNhanVienModal" tabindex="-1" aria-hidden="true"
                style="display: none;">
                <div class="modal-dialog modal-lg">
                    <form action="/login/register" method="post">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Update Nhân Viên</h5>
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
                                                <img id="edit_hinh_anh" style="cursor:pointer"
                                                    src="/upload/default.jpg" class="card-img" alt="">
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
                                                    <label class="form-label" for="form2Example11">Mật Khẩu <span
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
            $(document).ready(function() {

            });
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
                        url: '/admin/nhan-vien/list',
                        type: 'get',
                        success: function(res) {
                            $.each(res.data, function(key, value) {
                                noidung += '<tr>'
                                noidung += '<td>' + (key + 1) + '</td>'
                                noidung += '<td>' + (value.id) + '</td>'
                                noidung += '<td>' + (value.full_name) + '</td>'
                                noidung += '<td>' + (value.sub_admin ? value.sub_admin.ngay_sinh :
                                    '-') + '</td>'
                                noidung += '<td>' + (value.sub_admin ? value.sub_admin.gioi_tinh :
                                    '-') + '</td>'
                                noidung += '<td>' + (value.phone) + '</td>'
                                noidung += '<td>' + (value.email) + '</td>'
                                noidung += '<td>' + (value.sub_admin ? value.sub_admin
                                    .ngay_vao_lam : '-') + '</td>'
                                noidung += '<td>' + (value.sub_admin ? value.sub_admin.id_chuc_vu :
                                    '-') + '</td>'
                                noidung += '<td>' + (value.sub_admin ? value.sub_admin.luong :
                                    '-') + '</td>'
                                noidung += '<td class="text-center">'
                                noidung +=
                                    '<div class="d-flex order-actions justify-content-evenly">'
                                noidung +=
                                    '<a href="javascript:;" class="update-nhan-vien" data-bs-toggle="modal" data-bs-target="#editNhanVienModal" data-id=' +
                                    (value.id) + '><i class="bx bxs-edit"></i></a>'
                                noidung +=
                                    '<a href="javascript:;" class="delete-1 delete-nhan-vien" data-name=' +
                                    (value.full_name) + ' data-id=' + (value.id) +
                                    '><i class="bx bxs-trash"></i></a>'
                                noidung += '</div>'
                                noidung += '</td>'
                                noidung += '</tr>'
                            });
                            var table = $('#example2').DataTable();
                            table.destroy();
                            $('#example2 tbody').html(noidung);
                            addtable();
                        }
                    });
                }


                $("body").on('click', '.update-nhan-vien', function() {
                    var id = $(this).data('id');
                    $.ajax({
                        'url': '/admin/nhan-vien/edit/' + id,
                        'type': 'get',
                        'success': function(res) {
                            if (res.status) {
                                $("#edit_id").val(res.data.id);
                                $("#edit_ho_va_ten").val(res.data.full_name);
                                $("#edit_email").val(res.data.email);
                                $("#edit_SDT").val(res.data.phone);
                                $("#edit_mat_khau").val(res.data.password);
                                if (res.data.sub_admin) {
                                    $("#edit_ngay_sinh").val(res.data.sub_admin.ngay_sinh);
                                    $("#edit_ngay_vao_lam").val(res.data.sub_admin.ngay_vao_lam);
                                    $("#edit_chuc_vu").val(res.data.sub_admin.id_chuc_vu);
                                    $("#edit_luong").val(res.data.sub_admin.luong);
                                    $("#edit_gioi_tinh").val(res.data.sub_admin.gioi_tinh);
                                    $("#edit_hinh_anh").attr("src", '/upload/' + res.data.sub_admin
                                        .hinh_anh);
                                } else {
                                    $("#edit_ngay_sinh").val('');
                                    $("#edit_ngay_vao_lam").val('');
                                    $("#edit_chuc_vu").val('0');
                                    $("#edit_luong").val('');
                                    $("#edit_gioi_tinh").val('0');
                                    $("#edit_hinh_anh").attr("src", '');
                                }
                            } else {
                                toastr.error("Tài Khoản không tồn tại!");
                                $('#editNhanVienModal').modal('hide');
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
                    var ngay_sinh = $("#edit_ngay_sinh").val();
                    var ngay_vao_lam = $("#edit_ngay_vao_lam").val();
                    var chuc_vu = $("#edit_chuc_vu").val();
                    var luong = $("#edit_luong").val();
                    var gioi_tinh = $("#edit_gioi_tinh").val();
                    var file = $("#upload_anh").prop('files')[0];
                    var formData = new FormData();
                    formData.append('hinh_anh', $('#upload_anh')[0].files[0]);
                    formData.append('id', id);
                    formData.append('full_name', full_name);
                    formData.append('email', email);
                    formData.append('phone', phone);
                    formData.append('password', password);
                    formData.append('ngay_sinh', ngay_sinh);
                    formData.append('ngay_vao_lam', ngay_vao_lam);
                    formData.append('chuc_vu', chuc_vu);
                    formData.append('luong', luong);
                    formData.append('gioi_tinh', gioi_tinh);
                    // var z = {
                    //     'id'              : id,
                    //     'full_name'       : full_name,
                    //     'email'           : email,
                    //     'phone'           : phone,
                    //     'password'        : password,
                    //     'ngay_sinh'       : ngay_sinh,
                    //     'ngay_vao_lam'    : ngay_vao_lam,
                    //     'chuc_vu'         : chuc_vu,
                    //     'luong'           : luong,
                    //     'gioi_tinh'       : gioi_tinh,
                    //     'hinh_anh'        : file
                    // };
                    $.ajax({
                        'url': '/admin/nhan-vien/update',
                        'type': 'post',
                        'data': formData,
                        'processData': false,
                        'contentType': false,
                        'success': function(res) {
                            if (res.status) {
                                toastr.success("Đã cập nhật Nhân Viên thành công!");
                                $('#editNhanVienModal').modal('hide');
                                hienThiTable();
                            } else {
                                toastr.error("Có lỗi không mong muốn xảy ra!");
                            }
                        },
                    });
                });

                $("body").on('click', '.delete-nhan-vien', function() {
                    var id2 = $(this).data('id');
                    var name = $(this).data('name');
                    var z = {
                        id: id2
                    }
                    if (confirm('Bạn có chắc chắn muốn xóa nhân viên ' + name + ' ?')) {
                        $.ajax({
                            'url': '/admin/nhan-vien/delete',
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

                $("body").on('click', '#accpectAdd', function() {
                    var full_name = $("#add_ho_va_ten").val();
                    var email = $("#add_email").val();
                    var phone = $("#add_SDT").val();
                    var password = $("#add_mat_khau").val();
                    var ngay_sinh = $("#add_ngay_sinh").val();
                    var ngay_vao_lam = $("#add_ngay_vao_lam").val();
                    var chuc_vu = $("#add_chuc_vu").val();
                    var luong = $("#add_luong").val();
                    var gioi_tinh = $("#add_gioi_tinh").val();
                    var file = $("#add_anh").prop('files')[0];
                    var formData = new FormData();
                    formData.append('hinh_anh', $('#add_anh')[0].files[0]);
                    formData.append('full_name', full_name);
                    formData.append('email', email);
                    formData.append('phone', phone);
                    formData.append('password', password);
                    formData.append('ngay_sinh', ngay_sinh);
                    formData.append('ngay_vao_lam', ngay_vao_lam);
                    formData.append('chuc_vu', chuc_vu);
                    formData.append('luong', luong);
                    formData.append('gioi_tinh', gioi_tinh);
                    // var z = {
                    //     'id'              : id,
                    //     'full_name'       : full_name,
                    //     'email'           : email,
                    //     'phone'           : phone,
                    //     'password'        : password,
                    //     'ngay_sinh'       : ngay_sinh,
                    //     'ngay_vao_lam'    : ngay_vao_lam,
                    //     'chuc_vu'         : chuc_vu,
                    //     'luong'           : luong,
                    //     'gioi_tinh'       : gioi_tinh,
                    //     'hinh_anh'        : file
                    // };
                    $.ajax({
                        'url': '/admin/nhan-vien/create',
                        'type': 'post',
                        'data': formData,
                        'processData': false,
                        'contentType': false,
                        'success': function(res) {
                            if (res.status) {
                                toastr.success("Đã Thêm Mới Nhân Viên thành công!");
                                $('#addNhanVienModal').modal('hide');
                                hienThiTable();
                            } else {
                                toastr.error("Có lỗi không mong muốn xảy ra!");
                            }
                        },
                    });
                });

                $("body").on('click', '#edit_hinh_anh', function() {
                    $("#upload_anh").click();
                    $("#upload_anh").change(function() {
                        if (this.files && this.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $("#edit_hinh_anh").attr("src", e.target.result);
                            }
                            reader.readAsDataURL(this.files[0]);
                        }
                    });
                })

                $("body").on('click', '#add_hinh_anh', function() {
                    $("#add_anh").click();
                    $("#add_anh").change(function() {
                        if (this.files && this.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $("#add_hinh_anh").attr("src", e.target.result);
                            }
                            reader.readAsDataURL(this.files[0]);
                        }
                    });
                })
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
