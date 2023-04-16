@extends('share.master')
@section('group-body')
    <div class="card">
        <div class="card-body row">
            <div class="table table-responsive">
                <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">

                    <div class="row">
                        <div class="col-sm-12 col-md-3">

                        </div>
                        <div class="col-sm-12 col-md-7">
                            {{-- <div id="example_filter" class="dataTables_filter"><label>Tìm Kiếm:<input type="search"
                                        class="form-control form-control-sm" style="width: 300px;" placeholder=""
                                        aria-controls="example"></label>
                            </div> --}}
                        </div>
                        <div class="col-sm-12 col-md-2 align-middle">
                            <button id="themMoiTong"class="btn btn-success " data-bs-toggle="modal"
                                data-bs-target="#themMoiDanhMucModel">Thêm Mới</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc text-center" tabindex="0" aria-controls="example"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 20px;">#
                                        </th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="example"
                                            rowspan="1" colspan="1"
                                            aria-label="Position: activate to sort column ascending" style="width: 200px;">
                                            Tên Danh Mục</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="example"
                                            rowspan="1" colspan="1"
                                            aria-label="Office: activate to sort column ascending" style="width: 200px;">
                                            Danh Mục Cha</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="example"
                                            rowspan="1" colspan="1"
                                            aria-label="Age: activate to sort column ascending" style="width: 100px;">Tình
                                            Trạng</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="example"
                                            rowspan="1" colspan="1"
                                            aria-label="Start date: activate to sort column ascending" style="width: 67px;">
                                            Action</th>
                                    </tr>
                                </thead>
                                {{-- <thead>
									<tr>
										<th>#</th>
										<th>Tên Danh Mục</th>
										<th>Danh Mục Cha</th>
										<th>Tình Trạng</th>
										<th>Action</th>
									</tr>
								</thead> --}}
                                <tbody>

                                    {{-- >>hienThiTable --}}

                                </tbody>


                            </table>

                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1
                                to 10 of 57 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="example_previous"><a
                                            href="#" aria-controls="example" data-dt-idx="0" tabindex="0"
                                            class="page-link">Prev</a></li>
                                    <li class="paginate_button page-item active"><a href="#" aria-controls="example"
                                            data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example"
                                            data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example"
                                            data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example"
                                            data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example"
                                            data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example"
                                            data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                    <li class="paginate_button page-item next" id="example_next"><a href="#"
                                            aria-controls="example" data-dt-idx="7" tabindex="0"
                                            class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="themMoiDanhMucModel" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title">Thêm Mới Danh Mục</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="" class="label-control">Tên Danh Mục</label>
                        <input id="ten_danh_muc" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="label-control">Slug Danh Mục</label>
                        <input id="slug_danh_muc" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="label-control">Tình Trạng</label>
                        <select id="tinh_trang" class="form-control">
                            <option value="1" selected>Đang Kinh Doanh</option>
                            <option value="0">Ngừng Kinh Doanh</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="label-control">Danh Mục Cha</label>
                        <select id="id_danh_muc_cha" class="form-control">
                            {{-- >> LoadDMC --}}
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                    <button id="themMoi" type="button" class="btn btn-primary">Thêm Mới</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updateDanhMucModel" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title">Cập Nhật Danh Mục</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <input id="id-update" type="hidden" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="label-control">Tên Danh Mục</label>
                        <input id="ten_danh_muc-update" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="label-control">Slug Danh Mục</label>
                        <input id="slug_danh_muc-update" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="label-control">Tình Trạng</label>
                        <select id="tinh_trang-update" class="form-control">
                            <option value="1" selected>Đang Kinh Doanh</option>
                            <option value="0">Ngừng Kinh Doanh</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="label-control">Danh Mục Cha</label>
                        <select id="id_danh_muc_cha-update" class="form-control">
                            {{-- >> LoadDMCUpdate --}}
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                    <button id="btn_update_danh_muc" type="button" class="btn btn-primary">Cập Nhật</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="/app_assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="/app_assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            hienThiTable();

            function hienThiTable() {
                var noidung = '';
                $.ajax({
                    url: '/admin/danh-muc/list',
                    type: 'get',
                    success: function(res) {
                        $.each(res.data, function(k, v) {
                            noidung += '<tr>';
                            noidung += '<td class="text-center align-middle">' + (k + 1) +
                                '</td>';
                            noidung += '<td class="align-middle">' + v.ten_danh_muc + '</td>';
                            if (v.ten_danh_muc_cha == null) {
                                noidung +=
                                    '<td class="align-middle text-info">Danh Mục Chính</td>';
                            } else {
                                noidung += '<td class="align-middle text-success">' + v
                                    .ten_danh_muc_cha +
                                    '</td>';
                            }
                            if (v.tinh_trang == 1) {
                                noidung +=
                                    '<td class="align-middle text-center"><button data-id="' + v
                                    .id +
                                    '" class="doi-trang-thai btn badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class="bx bxs-circle me-1"></i>Đang Kinh Doanh</button></td>';
                            } else {
                                noidung +=
                                    '<td class="align-middle text-center"><button data-id="' + v
                                    .id +
                                    '" class="doi-trang-thai btn badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3"><i class="bx bxs-circle me-1"></i>Ngừng Kinh Doanh</button></td>';
                            }
                            noidung += '<td class="text-center">';
                            noidung +=
                                '<div class="d-flex order-actions justify-content-evenly">';
                            noidung +=
                                '<a href="javascript:;" data-id="' + v.id +
                                '" class="update-danh-muc" data-bs-toggle="modal"data-bs-target="#updateDanhMucModel"><i class="bx bxs-edit"></i></a>';
                            noidung += '<a href="javascript:;" data-id="' + v.id +
                                '"  class="delete-1"><i class="bx bxs-trash"></i></a>';
                            noidung += '</div>';
                            noidung += '</td>';
                            noidung += '</tr>';
                        })
                        $('#example tbody').html(noidung);
                    }
                });
            }
            //////
            function loadDMC() {
                var ndload = ' <option value="0" selected>Danh Mục Chính</option>';
                $.ajax({
                    url: '/admin/danh-muc/load-danh-muc-cha',
                    type: 'get',
                    success: function(res) {
                        $.each(res.danhMucCha, function(k, v) {
                            ndload += '<option value="' + v.id + '">' + v.ten_danh_muc +
                                '</option>';
                        })
                        $('#id_danh_muc_cha').html(ndload);
                    }
                });
            }
            ///////
            $("#themMoi").click(function() {
                var ten_danh_muc = $("#ten_danh_muc").val();
                var slug_danh_muc = $("#slug_danh_muc").val();
                var tinh_trang = $("#tinh_trang").val();
                var id_danh_muc_cha = $("#id_danh_muc_cha").val();
                var z = {
                    'ten_danh_muc': ten_danh_muc,
                    'slug_danh_muc': slug_danh_muc,
                    'tinh_trang': tinh_trang,
                    'id_danh_muc_cha': id_danh_muc_cha
                };

                $.ajax({
                    url: '/admin/danh-muc/create',
                    type: 'post',
                    data: z,
                    success: function(res) {
                        if (res.status) {
                            toastr.success("Đã Thêm Mới Thành Công");
                            $('#themMoiDanhMucModel').modal('hide');
                            hienThiTable();
                        }
                    }
                })
                $('#ten_danh_muc').val('');
                $('#slug_danh_muc').val('');
                $('#tinh_trang').prop('selectedIndex', 0);
                $('#id_chuyen_muc_cha').val('');
            })
            $("#themMoiTong").click(function() {
                loadDMC();
            })
            $("body").on('click', '.doi-trang-thai', function() {
                var id = $(this).data('id');
                $.ajax({
                    'url': '/admin/danh-muc/doi-trang-thai/' + id,
                    'type': 'get',
                    'success': function(res) {
                        if (res.status) {
                            toastr.success("Đổi Trạng Thái Thành Công");
                            hienThiTable();
                        } else {
                            toastr.error("Dữ Liệu Không Tồn Tại");
                        }
                    }
                })
            });
            $("body").on('click', '.delete-1', function() {
                var id1 = $(this).data('id');
                $.ajax({
                    'url': '/admin/danh-muc/delete/' + id1,
                    'type': 'get',
                    'success': function(res) {
                        if (res.status) {
                            toastr.success("Xoá Thành Công");
                            hienThiTable();
                        } else {
                            toastr.error("Xoá Thất Bại");
                        }
                    }
                })
            });

            // function toSlug(s) {
            //     return s.toString().normalize('NFD').replace(/[\u0300-\u036f]/g, "") //remove diacritics
            //         .toLowerCase()
            //         .replace(/\s+/g, '-') //spaces to dashes
            //         .replace(/&/g, '-and-') //ampersand to and
            //         .replace(/[^\w\-]+/g, '') //remove non-words
            //         .replace(/\-\-+/g, '-') //collapse multiple dashes
            //         .replace(/^-+/, '') //trim starting dash
            //         .replace(/-+$/, ''); //trim ending dash
            // }
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
            $("#ten_danh_muc").keyup(function() {
                var name = $(this).val()
                $("#slug_danh_muc").val(toSlug(name))
            });

            $("#ten_danh_muc-update").keyup(function() {
                var name = $(this).val()
                $("#slug_danh_muc-update").val(toSlug(name))
            });
            $('body').on('click', '.update-danh-muc', function() {
                var id3 = $(this).data('id');
                var ndload = ' <option value="0" selected>Danh Mục Chính</option>';
                $.ajax({
                    url: '/admin/danh-muc/load-danh-muc-cha-update/' + id3,
                    type: 'get',
                    success: function(res) {
                        $.each(res.danhMucCha, function(k, v) {
                            ndload += '<option value="' + v.id + '">' + v.ten_danh_muc +
                                '</option>';
                        })
                        $('#id_danh_muc_cha-update').html(ndload);
                    }
                });
                $.ajax({
                    'url': '/admin/danh-muc/update/' + id3,
                    'type': 'get',
                    'success': function(res) {
                        $("#id-update").val(res.danhMuc.id);
                        $("#ten_danh_muc-update").val(res.danhMuc.ten_danh_muc);
                        $("#slug_danh_muc-update").val(res.danhMuc.slug_danh_muc);
                        $("#tinh_trang-update").val(res.danhMuc.tinh_trang).change();
                        $("#id_danh_muc_cha-update").val(res.danhMuc.id_danh_muc_cha).change();
                    }
                })
            })
            $("#btn_update_danh_muc").click(function() {
                var id = $("#id-update").val();
                var ten_danh_muc = $("#ten_danh_muc-update").val();
                var slug_danh_muc = $("#slug_danh_muc-update").val();
                var tinh_trang = $("#tinh_trang-update").val();
                var id_danh_muc_cha = $("#id_danh_muc_cha-update").val();
                var z = {
                    'id': id,
                    'ten_danh_muc': ten_danh_muc,
                    'slug_danh_muc': slug_danh_muc,
                    'tinh_trang': tinh_trang,
                    'id_danh_muc_cha': id_danh_muc_cha
                };
                $.ajax({
                    url: '/admin/danh-muc/edit',
                    type: 'post',
                    data: z,
                    success: function(res) {
                        toastr.success("Cập Nhật Thành Công");
                        $('#updateDanhMucModel').modal('hide');
                        hienThiTable();
                    }
                });
            })

        });
    </script>
@endsection
