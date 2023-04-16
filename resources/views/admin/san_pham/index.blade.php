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
                                <a href="/admin/san-pham/create" class="btn btn-primary">Thêm Mới</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Tên Sản Phẩm</th>
                                            <th class="text-center">Số Lượng</th>
                                            <th class="text-center">Hình Ảnh</th>
                                            <th class="text-center">Size</th>
                                            <th class="text-center">Danh Mục</th>
                                            <th class="text-center">Giá</th>
                                            <th class="text-center">Khuyến Mãi</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (\App\Models\SanPham::get() as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $value->ten_san_pham }}</td>
                                                <td>{{ $value->so_luong }}</td>
                                                <td>
                                                    @php
                                                        $i = 0;
                                                    @endphp
                                                    @foreach (\App\Models\HinhAnhSanPham::where('id_san_pham', $value->id)->get() as $keyimg => $valueimg)
                                                        <img style="max-height: 25px"
                                                            src="/upload/{{ $valueimg->hinh_anh_phu }}" />
                                                        @php
                                                            $i++;
                                                            if ($i == 4) {
                                                                break;
                                                            }
                                                        @endphp
                                                    @endforeach
                                                    @php
                                                        $i = 0;
                                                    @endphp
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        {{-- <span class="text-danger"><b>|</b></span> --}}
                                                        @foreach (\App\Models\SizeSanPham::where('id_san_pham', $value->id)->get() as $keysize => $valuesize)
                                                            {{ $valuesize->size }},
                                                        @endforeach
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    @php
                                                        $danhMuc = \App\Models\DanhMuc::find($value->id_danh_muc);
                                                    @endphp
                                                    {{ isset($danhMuc->ten_danh_muc) ? $danhMuc->ten_danh_muc : '-' }}
                                                </td>

                                                @php
                                                    $gia = \App\Models\GiaKhuyenMai::where('id_san_pham', $value->id)->first();
                                                @endphp
                                                <td class="text-end">
                                                    {{ isset($gia->gia) ? number_format($gia->gia, 0, '', ',') . 'đ' : '-' }}
                                                </td>
                                                <td class="text-end">
                                                    {{ isset($gia->khuyen_mai) ? $gia->khuyen_mai . '%' : '-' }}
                                                </td>
                                                <td class="text-center">

                                                    <div class="d-flex order-actions justify-content-evenly">

                                                        <a href="javascript:;" class="update-danh-muc"
                                                            data-bs-toggle="modal"data-bs-target="#updateDanhMucModel"><i
                                                                class="bx bxs-edit"></i></a>
                                                        <a href="javascript:;" class="delete-1"><i
                                                                class="bx bxs-trash"></i></a>
                                                    </div>
                                                </td>
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
