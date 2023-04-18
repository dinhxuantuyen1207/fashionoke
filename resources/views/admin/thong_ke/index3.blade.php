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
    @php
    $timestamp = strtotime($id . '-01');
    $month = date('m', $timestamp);
    $year = date('Y', $timestamp);
@endphp
    <title>Báo Cáo Thống Kê Theo Tháng {{$month}} năm {{$year}}</title>
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
                            @php
                            $timestamp = strtotime($id . '-01');
                            $month = date('m', $timestamp);
                            $year = date('Y', $timestamp);
                        @endphp
                            <div class="col-md-10" style="font-size: 24px">Báo Cáo Thống Kê Theo Tháng {{$month}} năm {{$year}}</div>
                            <div class="col-md-2">
                                <a href="/admin/thong-ke/index2">Thống kê theo tháng</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Tên Sản Phẩm</th>
                                            <th class="text-center">Tổng Tiền</th>
                                            <th class="text-center">Bằng Chữ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php

                                            function numInWords($num)
                                            {
                                                $nwords = [
                                                    0 => 'không',
                                                    1 => 'một',
                                                    2 => 'hai',
                                                    3 => 'ba',
                                                    4 => 'bốn',
                                                    5 => 'năm',
                                                    6 => 'sáu',
                                                    7 => 'bảy',
                                                    8 => 'tám',
                                                    9 => 'chín',
                                                    10 => 'mười',
                                                    11 => 'mười một',
                                                    12 => 'mười hai',
                                                    13 => 'mười ba',
                                                    14 => 'mười bốn',
                                                    15 => 'mười lăm',
                                                    16 => 'mười sáu',
                                                    17 => 'mười bảy',
                                                    18 => 'mười tám',
                                                    19 => 'mười chín',
                                                    20 => 'hai mươi',
                                                    30 => 'ba mươi',
                                                    40 => 'bốn mươi',
                                                    50 => 'năm mươi',
                                                    60 => 'sáu mươi',
                                                    70 => 'bảy mươi',
                                                    80 => 'tám mươi',
                                                    90 => 'chín mươi',
                                                    100 => 'trăm',
                                                    1000 => 'nghìn',
                                                    1000000 => 'triệu',
                                                    1000000000 => 'tỷ',
                                                    1000000000000 => 'nghìn tỷ',
                                                    1000000000000000 => 'ngàn triệu triệu',
                                                    1000000000000000000 => 'tỷ tỷ',
                                                ];
                                                $separate = ' ';
                                                $negative = ' âm ';
                                                $rltTen = ' linh ';
                                                $decimal = ' phẩy ';
                                                if (!is_numeric($num)) {
                                                    $w = '#';
                                                } elseif ($num < 0) {
                                                    $w = $negative . numInWords(abs($num));
                                                } else {
                                                    if (fmod($num, 1) != 0) {
                                                        $numInstr = strval($num);
                                                        $numInstrArr = explode('.', $numInstr);
                                                        $w = numInWords(intval($numInstrArr[0])) . $decimal . numInWords(intval($numInstrArr[1]));
                                                    } else {
                                                        $w = '';
                                                        if ($num < 21) {
                                                            // 0 to 20
                                                            $w .= $nwords[$num];
                                                        } elseif ($num < 100) {
                                                            // 21 to 99
                                                            $w .= $nwords[10 * floor($num / 10)];
                                                            $r = fmod($num, 10);
                                                            if ($r > 0) {
                                                                $w .= $separate . $nwords[$r];
                                                            }
                                                        } elseif ($num < 1000) {
                                                            // 100 to 999
                                                            $w .= $nwords[floor($num / 100)] . $separate . $nwords[100];
                                                            $r = fmod($num, 100);
                                                            if ($r > 0) {
                                                                if ($r < 10) {
                                                                    $w .= $rltTen . $separate . numInWords($r);
                                                                } else {
                                                                    $w .= $separate . numInWords($r);
                                                                }
                                                            }
                                                        } else {
                                                            $baseUnit = pow(1000, floor(log($num, 1000)));
                                                            $numBaseUnits = (int) ($num / $baseUnit);
                                                            $r = fmod($num, $baseUnit);
                                                            if ($r == 0) {
                                                                $w = numInWords($numBaseUnits) . $separate . $nwords[$baseUnit];
                                                            } else {
                                                                if ($r < 100) {
                                                                    if ($r >= 10) {
                                                                        $w = numInWords($numBaseUnits) . $separate . $nwords[$baseUnit] . ' không trăm ' . numInWords($r);
                                                                    } else {
                                                                        $w = numInWords($numBaseUnits) . $separate . $nwords[$baseUnit] . ' không trăm linh ' . numInWords($r);
                                                                    }
                                                                } else {
                                                                    $baseUnitInstr = strval($baseUnit);
                                                                    $rInstr = strval($r);
                                                                    $lenOfBaseUnitInstr = strlen($baseUnitInstr);
                                                                    $lenOfRInstr = strlen($rInstr);
                                                                    if ($lenOfBaseUnitInstr - 1 != $lenOfRInstr) {
                                                                        $numberOfZero = $lenOfBaseUnitInstr - $lenOfRInstr - 1;
                                                                        if ($numberOfZero == 2) {
                                                                            $w = numInWords($numBaseUnits) . $separate . $nwords[$baseUnit] . ' không trăm linh ' . numInWords($r);
                                                                        } elseif ($numberOfZero == 1) {
                                                                            $w = numInWords($numBaseUnits) . $separate . $nwords[$baseUnit] . ' không trăm ' . numInWords($r);
                                                                        } else {
                                                                            $w = numInWords($numBaseUnits) . $separate . $nwords[$baseUnit] . $separate . numInWords($r);
                                                                        }
                                                                    } else {
                                                                        $w = numInWords($numBaseUnits) . $separate . $nwords[$baseUnit] . $separate . numInWords($r);
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                return $w;
                                            }
                                            function numberInVietnameseWords($num)
                                            {
                                                return str_replace('mươi năm', 'mươi lăm', str_replace('mươi một', 'mươi mốt', numInWords($num)));
                                            }

                                            function numberInVietnameseCurrency($num)
                                            {
                                                $rs = numberInVietnameseWords($num);
                                                $rs[0] = strtoupper($rs[0]);
                                                return $rs . ' đồng';
                                            }

                                        @endphp
                                        @foreach ($hoa_don as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                @php
                                                    $san_pham = \App\Models\SanPham::where('id', $value->id_san_pham)->first();
                                                @endphp
                                                <td>{{ $san_pham->ten_san_pham }}</td>
                                                <td>
                                                    {{ number_format($value->thanh_tien, 0, '', '.') }} đ</td>
                                                <td>{{ numberInVietnameseCurrency($value->thanh_tien) }}</td>
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
            function docTienBangChu(number) {
                var donvi = ["", "đồng", "nghìn", "triệu", "tỷ"];
                var so = ["không", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín"];
                var ketQua = "";
                var i = 0;
                var flag = false;
                if (number < 0) {
                    number = -number;
                    flag = true;
                }
                if (number == 0) return "Không đồng";
                while (number > 0) {
                    if (number % 1000 > 0) {
                        ketQua = so[number % 10] + ketQua;
                        ketQua = so[Math.floor(number % 100 / 10)] + (ketQua != "" ? " " : "") + "mươi" + ketQua;
                        ketQua = (number % 100 < 10 || number % 100 >= 20 ? so[Math.floor(number % 100 / 10) * 10] +
                            " " : "") + ketQua;
                        ketQua = (number % 100 >= 10 && number % 100 < 20 ? "mười" : "") + ketQua;
                        ketQua = (number / 100 >= 1 ? so[Math.floor(number / 100)] + " trăm " : "") + ketQua;
                        ketQua += donvi[i] + " ";
                    }
                    i++;
                    number = Math.floor(number / 1000);
                }
                ketQua = ketQua.substring(0, 1).toUpperCase() + ketQua.substring(1);
                if (flag) ketQua = "Âm " + ketQua;
                return ketQua.trim();
            }
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
