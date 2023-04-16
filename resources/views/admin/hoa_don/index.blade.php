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
                                {{-- <a href="/admin/san-pham/create"><i class="bx bx-plus" style="font-size: 50px; background-color: rgb(149, 158, 236);height: 50px;width: 50px;line-height: 50px;border-radius:50%;color:aqua"></i></a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">ID Khách Hàng</th>
                                            <th class="text-center">Tên Khách Hàng</th>
                                            <th class="text-center">Số Điện Thoại</th>
                                            <th class="text-center">Địa Chỉ</th>
                                            <th class="text-center">ID Sản Phẩm</th>
                                            <th class="text-center">Số Lượng</th>
                                            <th class="text-center">Tình Trạng Đơn Hàng</th>
                                            <th class="text-center">Trình Trạng Thanh Toán</th>
                                            <th class="text-center">Tổng Tiền</th>
                                            <th class="text-center">Ngày Lập HĐ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (\App\Models\HoaDon::get() as $key => $value)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$value->id_nguoi_nhan}}</td>
										<td>{{$value->nguoi_nhan}}</td>
                                        <td>{{$value->so_dien_thoai}}</td>
                                        <td>{{$value->dia_chi}}</td>
                                        @php
                                            $san_pham = \App\Models\SanPham::where('id',$value->id_san_pham)->first();
                                        @endphp
                                        <td>{{$san_pham->ten_san_pham}}</td>
                                        <td>{{$value->so_luong}}</td>
                                        <td class="align-middle text-center">
                                            <button id="tinh-trang-giao-hang-{{$value->id}}" class="tinh-trang-giao-hang btn badge rounded-pill {{$value->tinh_trang_don_hang == 'Chờ Xác Nhận' ? 'text-danger' : ($value->tinh_trang_don_hang == 'Xác Nhận Đơn Hàng' ? 'text-warning' : ($value->tinh_trang_don_hang == 'Xác Nhận Đơn Hàng' ? 'text-warning' : ($value->tinh_trang_don_hang == 'Đang Đóng Gói' ? 'text-secondary' : ($value->tinh_trang_don_hang == 'Đang Vận Chuyển' ? 'text-info' : 'text-success' ) ) ))}} bg-light-success p-2 text-uppercase px-3" data-id={{$value->id}} data-item={{$value->tinh_trang_don_hang}}>{{$value->tinh_trang_don_hang}}</button>
                                        </td>
                                        <td><button id="tinh-trang-thanh-toan-{{$value->id}}" class="doi-trang-thai btn badge rounded-pill {{$value->tinh_trang_thanh_toan == 'Chưa Thanh Toán' ? 'text-danger' : 'text-success'}} bg-light-success p-2 text-uppercase px-3">{{$value->tinh_trang_thanh_toan}}</button></td>

                                        <td>
                                            {{ number_format($value->tong_tien, 0, '', '.') }} đ</td>
                                        <td>{{$value->created_at}}</td>
									</tr>
                                    @endforeach


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
                var table = $('#example2').DataTable({
                        lengthChange: false,
                        buttons: ['copy', 'excel', 'pdf', 'print']
                    });
                    table.buttons().container()
                        .appendTo('#example2_wrapper .col-md-6:eq(0)');
            });
        </script>
        <script>
            $(document).ready(function() {
                $('.tinh-trang-giao-hang').click(function(event){
                    // event.preventDefault();
                    $val = $(this).text();
                    $id = $(this).data('id');
                    $message = 0;
                    $param = {
                        "id" : $id
                    }
                    $.ajax({
                    url: '/admin/hoa-don/chuyen-trang-thai',
                    data: $param,
                    type: 'post',
                    success: function(res) {
                        if(res.message == 1){
                            $('#tinh-trang-giao-hang-' + $id).text('Xác Nhận Đơn Hàng');
                            $('#tinh-trang-giao-hang-' + $id).removeClass('text-danger');
                            $('#tinh-trang-giao-hang-' + $id).addClass('text-warning');
                            toastr.success('Thay Đổi Trạng Thái Thành Xấc Nhận Đơn Hàng');
                        }else if(res.message == 2) {
                            $('#tinh-trang-giao-hang-' + $id).text('Đang Đóng Gói');
                            $('#tinh-trang-giao-hang-' + $id).removeClass('text-warning');
                            $('#tinh-trang-giao-hang-' + $id).addClass('text-secondary');
                            toastr.success('Thay Đổi Trạng Thái Thành Đang Đóng Gói');
                        } else if(res.message == 3) {
                            $('#tinh-trang-giao-hang-' + $id).text('Đang Vận Chuyển');
                            $('#tinh-trang-giao-hang-' + $id).removeClass('text-secondary');
                            $('#tinh-trang-giao-hang-' + $id).addClass('text-info');
                            toastr.success('Thay Đổi Trạng Thái Thành Đang Vận Chuyển');
                        } else if(res.message == 4) {
                            $('#tinh-trang-giao-hang-' + $id).text('Đã Giao Hàng');
                            $('#tinh-trang-thanh-toan-' + $id).text('Đã Thanh Toán');
                            $('#tinh-trang-giao-hang-' + $id).removeClass('text-info');
                            $('#tinh-trang-giao-hang-' + $id).addClass('text-success');
                            $('#tinh-trang-thanh-toan-' + $id).removeClass('text-danger');
                            $('#tinh-trang-thanh-toan-' + $id).addClass('text-success');
                            toastr.success('Thay Đổi Trạng Thái Thành Đã Giao Hàng');
                        } else {
                            toastr.error('Thay Đổi Trạng Thái Thất Bại');
                        }
                    }
                    })
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
