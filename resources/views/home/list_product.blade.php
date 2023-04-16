@extends('share.master')
@section('group-body')
    <div>
        <div>
            <h6><span><a href="/" style="color: #000">Trang Chủ</a></span><small><i
                        class="bx bx-right-arrow-alt"></i></small><span><a href="/{{ $datacha->slug_danh_muc }}"
                        style="color: #000">{{ $datacha->ten_danh_muc }}</a></span><small><i
                        class="bx bx-right-arrow-alt"></i></small><span><a id="name_head_danh_muc"
                        data-id="{{ $data->id }}" href="/{{ $datacha->slug_danh_muc }}/{{ $data->slug_danh_muc }}"
                        style="color: #000">{{ $data->ten_danh_muc }}</a></span></h6>
        </div>
        <div class="card">
            {{-- <div class="card-header">
    </div> --}}
            <div class="card-body">
                <div class="mb-4">
                    <button class="btn" data-bs-toggle="collapse" data-bs-target="#boloc">Lọc Sản Phẩm</button>

                    <div id="boloc" class="collapse">
                        <div class="m-2" style="background-color: #ccc">
                            Mức Giá :
                            <div class="ms-3 form_check_price">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkAllPrice" value="0">
                                    <label class="form-check-label" for="checkAllPrice">Tất cả</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input check_price" type="checkbox" id="checkPrice1"
                                        value="1">
                                    <label class="form-check-label" for="checkPrice1">Dưới 500,000đ</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input check_price" type="checkbox" id="checkPrice2"
                                        value="2">
                                    <label class="form-check-label" for="checkPrice2">Từ 500,000đ - 2,000,000đ</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input check_price" type="checkbox" id="checkPrice3"
                                        value="3">
                                    <label class="form-check-label" for="checkPrice3">Từ 2,00,000đ - 5,000,000đ</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input check_price" type="checkbox" id="checkPrice4"
                                        value="4">
                                    <label class="form-check-label" for="checkPrice4">Từ 5,000,000đ -
                                        10,000,000đ</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input check_price" type="checkbox" id="checkPrice5"
                                        value="5">
                                    <label class="form-check-label" for="checkPrice5">Trên 10,000,000đ</label>
                                </div>
                            </div>
                        </div>
                        <div class="m-2">
                            Hãng Sản Xuất
                            {{-- <div class="ms-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Tất cả</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Dưới 500,000đ</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Từ 500,000đ - 2,000,000đ</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Từ 2,00,000đ - 5,000,000đ</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Từ 5,000,000đ -
                                        10,000,000đ</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Trên 10,000,000đ</label>
                                </div>
                            </div> --}}

                        </div>
                        <div style="border-bottom: #000 solid 0.2px">
                        </div>
                    </div>

                </div>
                <div class="row product-grid" id="select-list">
                    @if (count($sanpham) == 0)
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <img src="/img/shine.gif" class="d-block w-100" alt="">
                            </div>
                        </div>
                    @else
                        @foreach ($sanpham as $key => $value)
                            @php
                                $hinhAnh = \App\Models\HinhAnhSanPham::where('id_san_pham', $value->id)->first();
                            @endphp
                            <div class="col-md-2 mb-item">
                                <a href="/product/{{ $value->slug_san_pham }}" class="card">
                                    <img src="/upload/{{ $hinhAnh->hinh_anh_phu }}" class="card-img-top" alt="..."
                                        style="height: 110px;">
                                    @if ($value->khuyen_mai >= 10)
                                        <div class="">
                                            <div class="spin position-absolute top-0 end-0 product-discount "
                                                style="top:-17px !important;right: -12px !important;width: 44px;height: 44px; background: conic-gradient(red, yellow, lime, aqua, blue, magenta, red)">
                                            </div>
                                            <div class="position-absolute top-0 end-0 product-discount"
                                                style="top:-15px !important;right: -10px !important;"><span
                                                    class="">-{{ $value->khuyen_mai }}%</span></div>
                                        </div>
                                    @elseif($value->khuyen_mai > 0)
                                        <div class="">
                                            <div class="position-absolute top-0 end-0 product-discount "
                                                style="top:-17px !important;right: -12px !important;width: 44px;height: 44px; background: conic-gradient(red, yellow, red)">
                                            </div>
                                            <div class="position-absolute top-0 end-0 product-discount"
                                                style="top:-15px !important;right: -10px !important;"><span
                                                    class="">-{{ $value->khuyen_mai }}%</span></div>
                                        </div>
                                    @endif
                                    <p class="card-title cursor-pointer text-center"
                                        style="height: 40px;overflow: hidden;color:rgb(41, 28, 28);">
                                        {{ $value->ten_san_pham }}</p>
                                    <div class="clearfix">
                                        <p class="mb-0 float-end fw-bold me-1 mb-1" style="font-size: 10px">
                                            <span class="me-1 text-decoration-line-through text-secondary">
                                                @if ($value->khuyen_mai > 0)
                                                    {{ number_format($value->gia, 0, '', '.') }} đ
                                                @endif
                                            </span><span>{{ number_format($value->gia - $value->gia * $value->khuyen_mai * 0.01, 0, '', '.') }}
                                                đ</span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#checkAllPrice').change(function() {
            $('.check_price').prop('checked', this.checked);
        });

        $('.check_price').change(function() {
            if ($('.check_price:checked').length == $('.check_price').length) {
                $('#checkAllPrice').prop('checked', true);
            } else {
                $('#checkAllPrice').prop('checked', false);
            }
        });
        var id_danh_muc = $('#name_head_danh_muc').data('id');
        $('.form_check_price input[type="checkbox"]').change(function() {
            // var name = $(this).val();
            // var check = $(this).prop('checked');
            // console.log("Change: " + name + " to " + check);
            var x = [];
            var noi_dung_select = '';
            $('.form_check_price input:checkbox:checked').each(function() {
                console.log($(this).val());
                x.push($(this).val());
            });
            var payload = {
                'payload': x,
                'id_danh_muc': id_danh_muc,
            }
            $.ajax({
                url: '/select_checkbox',
                type: 'post',
                data: payload,
                success: function(res) {
                    if (res.data.length == 0) {
                        noi_dung_select += '<div class="row mb-3">';
                        noi_dung_select += '<div class="col-md-12">';
                        noi_dung_select += '<img src="/img/shine.gif" class="d-block w-100" alt="">';
                        noi_dung_select += '</div>';
                        noi_dung_select += '</div>';
                    } else {
                        $.each(res.data, function(key, value) {
                            console.log(10);
                            noi_dung_select += '<div class="col-md-2 mb-item">';
                            noi_dung_select += '<a href="/product/' + value.slug_san_pham +
                                '" class="card">';
                            noi_dung_select += '<img src="/upload/' + value.hinh_anh_phu +
                                '" class="card-img-top" alt="..."';
                            noi_dung_select += 'style="height: 110px;">';
                            if (value.khuyen_mai >= 10) {
                                noi_dung_select += '<div class="">';
                                noi_dung_select +=
                                    '<div class="spin position-absolute top-0 end-0 product-discount "';
                                noi_dung_select +=
                                    'style="top:-17px !important;right: -12px !important;width: 44px;height: 44px; background: conic-gradient(red, yellow, lime, aqua, blue, magenta, red)">';
                                noi_dung_select += '</div>';
                                noi_dung_select +=
                                    '<div class="position-absolute top-0 end-0 product-discount"';
                                noi_dung_select +=
                                    'style="top:-15px !important;right: -10px !important;"><span';
                                noi_dung_select += 'class="">-' + value.khuyen_mai +
                                    '%</span></div>';
                                noi_dung_select += '</div>';
                            } else if (value.khuyen_mai > 0) {
                                noi_dung_select += '<div class="">';
                                noi_dung_select +=
                                    '<div class="position-absolute top-0 end-0 product-discount "';
                                noi_dung_select +=
                                    'style="top:-17px !important;right: -12px !important;width: 44px;height: 44px; background: conic-gradient(red, yellow, red)">';
                                noi_dung_select += '</div>';
                                noi_dung_select +=
                                    '<div class="position-absolute top-0 end-0 product-discount"';
                                noi_dung_select +=
                                    'style="top:-15px !important;right: -10px !important;"><span';
                                noi_dung_select += 'class="">-' + value.khuyen_mai +
                                    '%</span></div>';
                                noi_dung_select += '</div>';
                            } else {

                            }
                            noi_dung_select +=
                                '<p class="card-title cursor-pointer text-center"';
                            noi_dung_select +=
                                'style="height: 40px;overflow: hidden;color:rgb(41, 28, 28);">';
                            noi_dung_select += '' + value.ten_san_pham + '</p>';
                            noi_dung_select += '<div class="clearfix">';
                            noi_dung_select +=
                                '<p class="mb-0 float-end fw-bold me-1 mb-1" style="font-size: 10px"><span';
                            noi_dung_select +=
                                ' class="me-1 text-decoration-line-through text-secondary">';
                            if (value.khuyen_mai > 0) {
                                noi_dung_select += '' + value.gia.toLocaleString('vi-VN', {
                                    style: 'currency',
                                    currency: 'VND'
                                }) + '';
                            } else {

                            }
                            noi_dung_select += '</span><span>' + (value.gia - value.gia * value
                                .khuyen_mai * 0.01).toLocaleString('vi-VN', {
                                style: 'currency',
                                currency: 'VND'
                            }) + '</span>';
                            noi_dung_select += '</p>';
                            noi_dung_select += '</div>';
                            noi_dung_select += '</a>';
                            noi_dung_select += '</div>';
                        })
                    }
                    console.log(noi_dung_select);
                    $('#select-list').html(noi_dung_select);
                }
            })

        });
    </script>
@endsection
