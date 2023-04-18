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
                        <div class="card-body">
                            <div class="table-responsive">

                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Tên Sản Phẩm</th>
                                            <th class="text-center">Hình Ảnh</th>
                                            <th class="text-center">Giá</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gio_hang as $key => $value)
                                            @php
                                                $san_pham = \App\Models\SanPham::where('id', $value->id_san_pham)->first();
                                            @endphp
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $san_pham->ten_san_pham }}</td>
                                                <td>
                                                    @php
                                                        $i = 0;
                                                    @endphp
                                                    @foreach (\App\Models\HinhAnhSanPham::where('id_san_pham', $san_pham->id)->get() as $keyimg => $valueimg)
                                                        <img style="max-height: 25px"
                                                            src="/upload/{{ $valueimg->hinh_anh_phu }}" />
                                                        @php
                                                            $i++;
                                                            if ($i == 1) {
                                                                break;
                                                            }
                                                        @endphp
                                                    @endforeach
                                                    @php
                                                        $i = 0;
                                                    @endphp
                                                </td>
                                                @php
                                                    $gia = \App\Models\GiaKhuyenMai::where('id_san_pham', $san_pham->id)->first();
                                                @endphp
                                                <td class="text-end">
                                                    {{ isset($gia->gia) ? number_format($gia->gia, 0, '', ',') . 'đ' : '-' }}
                                                </td>
                                                <td class="text-center">

                                                    <div class="delete-gio-hang d-flex order-actions justify-content-evenly"
                                                        data-id={{ $value->id }}>
                                                        <a href="javascript:;" class="delete-1"><i
                                                                class="bx bxs-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay toggle-icon"></div>
            <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>

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

                $('#example2 tbody').on('click', 'div.delete-gio-hang', function() {
                    let id = $(this).data('id');
                    let param = {
                        'id': id
                    }
                    table.row($(this).parents('tr')).remove().draw();
                    $.ajax({
                        url: '/delete-gio-hang',
                        data: param,
                        type: 'post',
                        success: function(res) {
                            if (res.status) {
                                toastr.success('Xóa Thành Công');
                            } else {
                                toastr.error('Xóa Thất Bại');
                            }
                        }
                    })
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
