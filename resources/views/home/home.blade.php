@extends('share.master')
@section('group-body')
    {{-- <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
    @foreach (\App\Models\SanPham::get() as $key => $value)
    <div class="col">
        <div class="card">
            <img src="/upload/167221425427.jpg" class="card-img-top" alt="..." style="height: 200px;">
            <div class="">
                <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span></div>
            </div>
            <div class="card-body">
                <h6 class="card-title cursor-pointer">Nest Shaped Chair</h6>
                <div class="clearfix">
                    <p class="mb-0 float-start"><strong>134</strong> Sales</p>
                    <p class="mb-0 float-end fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$350</span><span>$240</span></p>
                </div>
                <div class="d-flex align-items-center mt-3 fs-6">
                    <div class="cursor-pointer">
                    <i class='bx bxs-star text-warning'></i>
                    <i class='bx bxs-star text-warning'></i>
                    <i class='bx bxs-star text-warning'></i>
                    <i class='bx bxs-star text-warning'></i>
                    <i class='bx bxs-star text-secondary'></i>
                    </div>
                    <p class="mb-0 ms-auto">4.2(182)</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div><!--end row--> --}}
    <div class="card">
        <div class="card-body">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class=""></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="active" aria-current="true">
                    </li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active carousel-item-start">
                        <img src="/img/111.gif" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item carousel-item-next carousel-item-start">
                        <img src="/img/222.gif" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/333.gif" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div>
        <div>
            <h4><i class="bx bx-right-arrow-alt"></i><span>Flash Sale</span></h4>
        </div>
        <div class="card">
            {{-- <div class="card-header">
        </div> --}}
            <div class="card-body">
                <div class="row product-grid">
                    @php
                        $flashSale = \App\Models\SanPham::join('gia_khuyen_mais', 'san_phams.id', 'gia_khuyen_mais.id_san_pham')
                            ->select('san_phams.*', 'gia_khuyen_mais.gia', 'gia_khuyen_mais.khuyen_mai')
                            ->where('gia_khuyen_mais.khuyen_mai', '<>', null)
                            ->Orderbydesc('gia_khuyen_mais.khuyen_mai')
                            ->get();
                        $keyFlashSale = 1;
                    @endphp
                    @foreach ($flashSale as $key => $value)
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
                                    <p class="mb-0 float-end fw-bold me-1 mb-1" style="font-size: 10px"><span
                                            class="me-1 text-decoration-line-through text-secondary">
                                            @if ($value->khuyen_mai > 0)
                                                {{ number_format($value->gia, 0, '', '.') }}đ
                                            @endif
                                        </span><span>{{ number_format($value->gia - $value->gia * $value->khuyen_mai * 0.01, 0, '', '.') }}đ</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                        @php
                            $keyFlashSale++;
                            if ($keyFlashSale > 12) {
                                break;
                            }
                        @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- Bans Chayj --}}
    <div>
        <div class=>
            <h4><i class="bx bx-right-arrow-alt"></i><span>Bán Chạy Nhất</span></h4>
        </div>
        <div class="card">
            {{-- <div class="card-header">
        </div> --}}
            <div class="card-body">
                <div class="row product-grid">
                    @php
                        $flashSale = \App\Models\SanPham::join('gia_khuyen_mais', 'san_phams.id', 'gia_khuyen_mais.id_san_pham')
                            ->select('san_phams.*', 'gia_khuyen_mais.gia', 'gia_khuyen_mais.khuyen_mai')
                            ->where('gia_khuyen_mais.khuyen_mai', '<>', null)
                            ->Orderbydesc('gia_khuyen_mais.khuyen_mai')
                            ->get();
                        $keyFlashBy = 1;
                    @endphp
                    @foreach ($flashSale as $key => $value)
                        @php
                            $hinhAnh = \App\Models\HinhAnhSanPham::where('id_san_pham', $value->id)->first();
                        @endphp
                        <div class="col-md-2  mb-item">
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
                                    <p class="mb-0 float-end fw-bold me-1 mb-1" style="font-size: 10px"><span
                                            class="me-2 text-decoration-line-through text-secondary">
                                            @if ($value->khuyen_mai > 0)
                                                {{ number_format($value->gia, 0, '', '.') }}đ
                                            @endif
                                        </span>
                                        <span>{{ number_format($value->gia - $value->gia * $value->khuyen_mai * 0.01, 0, '', '.') }}đ</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                        @php
                            $keyFlashBy++;
                            if ($keyFlashBy > 6) {
                                break;
                            }
                        @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- Theo Danh Muc --}}
    <div class="row mb-3">
        <div class="col-md-12">
            <img src="/img/welcome.gif" class="d-block w-100" alt="">
        </div>
    </div>
    @php
        $sanPhamDanhMuc = \App\Models\DanhMuc::where('tinh_trang', 1)
            ->where('id_danh_muc_cha', '>', 0)
            ->get();

    @endphp
    @foreach ($sanPhamDanhMuc as $keydm => $valuedm)
        <div>
            @php
                $sanPhamDanhMuc = \App\Models\SanPham::join('gia_khuyen_mais', 'san_phams.id', 'gia_khuyen_mais.id_san_pham')
                    ->select('san_phams.*', 'gia_khuyen_mais.gia', 'gia_khuyen_mais.khuyen_mai')
                    ->where('gia_khuyen_mais.khuyen_mai', '<>', null)
                    ->where('id_danh_muc', $valuedm->id)
                    ->get();
                $soSPDM = \App\Models\SanPham::where('id_danh_muc', $valuedm->id)->count();
                $countSM = 1;
            @endphp
            @if ($soSPDM != null)
                <div class=>
                    <h4><i class="bx bx-right-arrow-alt"></i><span>{{ $valuedm->ten_danh_muc }}</span></h4>
                </div>
                <div class="card">
                    {{-- <div class="card-header">
        </div> --}}
                    <div class="card-body">
                        <div class="row product-grid">

                            @foreach ($sanPhamDanhMuc as $key => $value)
                                @php
                                    $hinhAnh = \App\Models\HinhAnhSanPham::where('id_san_pham', $value->id)->first();
                                @endphp
                                <div class="col-md-2  mb-item">
                                    <a href="/product/{{ $value->slug_san_pham }}" class="card">
                                        <img src="/upload/{{ $hinhAnh->hinh_anh_phu }}" class="card-img-top"
                                            alt="..." style="height: 110px;">
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
                                            <p class="mb-0 float-end fw-bold me-1 mb-1" style="font-size: 10px"><span
                                                    class="me-2 text-decoration-line-through text-secondary">
                                                    @if ($value->khuyen_mai > 0)
                                                        {{ number_format($value->gia, 0, '', '.') }}đ
                                                    @endif
                                                </span><span>{{ number_format($value->gia - $value->gia * $value->khuyen_mai * 0.01, 0, '', '.') }}đ</span>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                @php
                                    $countSM++;
                                    if ($countSM > 6) {
                                        break;
                                    }
                                @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
            @endif
        </div>
    @endforeach
@endsection
