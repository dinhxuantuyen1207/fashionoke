@extends('share.master')
@section('group-body')
    <form action="/admin/san-pham/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h5 class="text-info text-center">Thêm Mới Sản Phẩm</h5>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="form-group mb-2 col-md-6">
                        <label for="" class="label-control">Tên Sản Phẩm</label>
                        <input name="ten_san_pham" id="ten_san_pham" for="" class="form-control" />
                        <input name="slug_san_pham" id="slug_san_pham" for="" type="hidden" class="form-control" />
                    </div>
                    <div class="form-group mb-2 col-md-4">
                        <label for="" class="label-control">Giá (đ)</label>
                        <input name="gia" for="" class="form-control" />
                    </div>
                    <div class="form-group mb-2 col-md-2">
                        <label for="" class="label-control">Khuyến Mãi (%)</label>
                        <input name="khuyen_mai" for="" class="form-control" />
                    </div>
                    <div class="form-group mb-2 col-md-6">
                        <label for="" class="label-control">Số Lượng</label>
                        <input name="so_luong" for="" class="form-control" />
                    </div>
                    <div class="form-group mb-2 col-md-6">
                        <label for="" class="label-control">Danh Mục</label>
                        <select name="id_danh_muc" id="id_danh_muc" class="form-control">
                        </select>
                    </div>
                    <div class="form-group mb-2 col-md-12">
                        <label for="" class="label-control me-2">Size</label>

                        <select name="size[]" class="multiple-select" data-placeholder="Choose anything"
                            multiple="multiple">
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="SM">SM</option>
                            <option value="XXL">XXL</option>
                            <option value="39">39</option>
                            <option value="38">38</option>
                            <option value="37">37</option>
                            <option value="36">36</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                        </select>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group ">
                            <div class="input-group hdtuto control-group lst increment">
                                <div class="list-input-hidden-upload">
                                    <input type="file" name="filenames[]" id="file_upload"
                                        class="myfrm form-control hidden">
                                </div>
                                <div class="input-group-btn">
                                    <button class="btn btn-success btn-add-image" type="button">Add image</button>
                                </div>
                            </div>
                            <div class="list-images">
                                @if (isset($list_images) && !empty($list_images))
                                    @foreach (json_decode($list_images) as $key => $img)
                                        <div class="box-image">
                                            <input type="hidden" name="images_uploaded[]" value="{{ $img }}"
                                                id="img-{{ $key }}">
                                            <img src="{{ asset('files/' . $img) }}" class="picture-box">
                                            <div class="wrap-btn-delete"><span data-id="img-{{ $key }}"
                                                    class="btn-delete-image">x</span></div>
                                        </div>
                                    @endforeach
                                    <input type="hidden" name="images_uploaded_origin" value="{{ $list_images }}">
                                    <input type="hidden" name="id" value="{{ $id }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group mb-2">
                            <label for="" class="label-control">Mô tả ngắn</label>
                            <textarea name="mo_ta_ngan" class="form-control" name="" id="" cols="30" rows="6"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="" class="label-control">Mô tả</label>
                    <textarea id="mo_ta" name="mo_ta" class="form-control" cols="30" rows="6"></textarea>
                </div>


            </div>
            <div class="card-footer">
                <div class="text-end">
                    <button class="btn btn-secondary me-3" style="width: 120px;">Huỷ</button>
                    <button type="submit" class="btn btn-success" style="width: 120px;">Thêm Mới</button>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('js')
    <script src="/app_assets/plugins/select2/js/select2.min.js"></script>

    <script>
        CKEDITOR.replace('mo_ta');
    </script>
    <script>
        // $('.single-select').select2({
        //     theme: 'bootstrap4',
        //     width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        //     placeholder: $(this).data('placeholder'),
        //     allowClear: Boolean($(this).data('allow-clear')),
        // });
        $('.multiple-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-add-image").click(function() {
                $('#file_upload').trigger('click');
            });

            $('.list-input-hidden-upload').on('change', '#file_upload', function(event) {
                let today = new Date();
                let time = today.getTime();
                let image = event.target.files[0];
                let file_name = event.target.files[0].name;
                let box_image = $('<div class="box-image"></div>');
                box_image.append('<img src="' + URL.createObjectURL(image) + '" class="picture-box">');
                box_image.append('<div class="wrap-btn-delete"><span data-id=' + time +
                    ' class="btn-delete-image">x</span></div>');
                $(".list-images").append(box_image);

                $(this).removeAttr('id');
                $(this).attr('id', time);
                let input_type_file =
                    '<input type="file" name="filenames[]" id="file_upload" class="myfrm form-control hidden">';
                $('.list-input-hidden-upload').append(input_type_file);
            });

            $(".list-images").on('click', '.btn-delete-image', function() {
                let id = $(this).data('id');
                $('#' + id).remove();
                $(this).parents('.box-image').remove();
            });

        });
        loadDMC();

        function loadDMC() {
            var ndload = '';
            $.ajax({
                url: '/admin/danh-muc/load-danh-muc-san-pham',
                type: 'get',
                success: function(res) {
                    $.each(res.danhMucCha, function(k, v) {
                        ndload += '<option value="' + v.id + '">' + v.ten_danh_muc +
                            '</option>';
                    })
                    $('#id_danh_muc').html(ndload);
                }
            });
        };
        // function toSlug(s) {
        //     return s.toString().normalize('NFD').replace(/[\u0300-\u036f]/g, "") //remove diacritics
        //         .toLowerCase()
        //         .replace(/\s+/g, '-') //spaces to dashes
        //         .replace(/&/g, '-and-') //ampersand to and
        //         .replace(/[^\w\-]+/g, '') //remove non-words
        //         .replace(/\-\-+/g, '-') //collapse multiple dashes
        //         .replace(/^-+/, '') //trim starting dash
        //         .replace(/-+$/, ''); //trim ending dash
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
        $("#ten_san_pham").keyup(function() {
            var name = $(this).val()
            $("#slug_san_pham").val(toSlug(name))
        });
    </script>
    <style>
        .list-images {
            /* width: 50%; */
            margin-top: 5px;
            display: inline-block;
        }

        .hidden {
            display: none;
        }

        .box-image {
            width: 100px;
            height: 108px;
            position: relative;
            float: left;
            margin-left: 5px;
        }

        .box-image img {
            width: 100px;
            height: 100px;
        }

        .wrap-btn-delete {
            position: absolute;
            top: -8px;
            right: 2px;
            height: 2px;
            font-size: 20px;
            font-weight: bold;
            color: red;
        }

        .btn-delete-image {
            cursor: pointer;
        }

        .table {
            width: 15%;
        }
    </style>
@endsection
