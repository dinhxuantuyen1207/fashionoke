<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\GiaKhuyenMai;
use App\Models\HinhAnhSanPham;
use App\Models\SanPham;
use App\Models\SizeSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('admin.san_pham.index');
    }
    public function detail($name){
        $product = SanPham::where('slug_san_pham',$name)
                    ->join('gia_khuyen_mais','san_phams.id','gia_khuyen_mais.id_san_pham')
                    ->select('san_phams.*','gia_khuyen_mais.gia','gia_khuyen_mais.khuyen_mai')
                    ->first();
                    // dd($product);
        return view('admin.san_pham.detail',compact('product','product'));
    }
    public function san_pham_danh_muc($slug_danh_muc_cha,$slug_danh_muc){
        if($slug_danh_muc && $slug_danh_muc_cha){
            $datacha = DanhMuc::where('slug_danh_muc',$slug_danh_muc_cha)
                                ->select('danh_mucs.ten_danh_muc','danh_mucs.slug_danh_muc')
                                ->first();
            $data = DanhMuc::where('slug_danh_muc',$slug_danh_muc)
                                ->select('danh_mucs.id','danh_mucs.ten_danh_muc','danh_mucs.slug_danh_muc')
                                ->first();
            $sanpham = SanPham::where('id_danh_muc',$data->id)
                                ->join('gia_khuyen_mais','san_phams.id','gia_khuyen_mais.id_san_pham')
                                ->select('san_phams.*', 'gia_khuyen_mais.gia', 'gia_khuyen_mais.khuyen_mai')
                                ->get();
                                // dd($sanpham);
            return view('home.list_product', compact(['sanpham'=>'sanpham','data'=>'data','datacha'=>'datacha']));
        } else {
            $sanpham = SanPham::get();
            return view('home.list_product', compact('sanpham','sanpham'));
        }
    }
    public function search($search){
        $data=[];
        $xacthuc=[];
        $sanpham = SanPham::where('slug_san_pham','like','%'.$search.'%')
        ->join('gia_khuyen_mais','san_phams.id','gia_khuyen_mais.id_san_pham')
        ->join('hinh_anh_san_phams','san_phams.id','hinh_anh_san_phams.id_san_pham')
        ->select('san_phams.*', 'gia_khuyen_mais.*','hinh_anh_san_phams.hinh_anh_phu',DB::raw('(gia_khuyen_mais.gia - gia_khuyen_mais.gia*gia_khuyen_mais.khuyen_mai*0.01) as gia_chinh'))
        ->distinct()
        ->get();
        foreach($sanpham as $value){
            if(!in_array($value->id,$xacthuc)){
                array_push($data,$value);
                array_push($xacthuc,$value->id);
            }
        }

        return view('home.view_search',compact('data','data'));
    }
    public function select_checkbox(Request $request){
        $a = $request->payload;
        $id = $request->id_danh_muc;
        $data=[];
        $xacthuc=[];
        $sanpham = SanPham::where('id_danh_muc',$id)
        ->join('gia_khuyen_mais','san_phams.id','gia_khuyen_mais.id_san_pham')
        ->join('hinh_anh_san_phams','san_phams.id','hinh_anh_san_phams.id_san_pham')
        ->select('san_phams.*', 'gia_khuyen_mais.*','hinh_anh_san_phams.hinh_anh_phu',DB::raw('(gia_khuyen_mais.gia - gia_khuyen_mais.gia*gia_khuyen_mais.khuyen_mai*0.01) as gia_chinh'))
        ->distinct()
        ->get();
        if (in_array('0', $a)) {
            foreach($sanpham as $value){
                if(!in_array($value->id,$xacthuc)){
                    array_push($data,$value);
                    array_push($xacthuc,$value->id);
                }
            }
        } else {
            if(in_array('1', $a)){
                foreach($sanpham as $value){
                    if($value->gia_chinh <= 500000 && $value->gia_chinh >= 0){
                        if(!in_array($value->id,$xacthuc)){
                            array_push($data,$value);
                            array_push($xacthuc,$value->id);
                        }
                    }
                }
            }
            if(in_array('2', $a)){
                foreach($sanpham as $value){
                    if($value->gia_chinh <= 2000000 && $value->gia_chinh > 500000){
                        if(!in_array($value->id,$xacthuc)){
                            array_push($data,$value);
                            array_push($xacthuc,$value->id);
                        }
                    }
                }
            }
            if(in_array('3', $a)){
                foreach($sanpham as $value){
                    if($value->gia_chinh <= 5000000 && $value->gia_chinh > 2000000){
                        if(!in_array($value->id,$xacthuc)){
                            array_push($data,$value);
                            array_push($xacthuc,$value->id);
                        }
                    }
                }
            }
            if(in_array('4', $a)){
                foreach($sanpham as $value){
                    if($value->gia_chinh <= 10000000 && $value->gia_chinh > 5000000){
                        if(!in_array($value->id,$xacthuc)){
                            array_push($data,$value);
                            array_push($xacthuc,$value->id);
                        }
                    }
                }
            }
            if(in_array('5', $a)){
                foreach($sanpham as $value){
                    if($value->gia_chinh > 10000000){
                        if(!in_array($value->id,$xacthuc)){
                            array_push($data,$value);
                            array_push($xacthuc,$value->id);
                        }
                    }
                }
            }
        }
        return response()->json(['status'=> true,'data'=> $data]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.san_pham.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $sanPham = SanPham::create([
            'ten_san_pham'      => $request->ten_san_pham,
            'slug_san_pham'     => $request->slug_san_pham,
            'so_luong'          => $request->so_luong,
            'id_danh_muc'       => $request->id_danh_muc,
            'mo_ta_ngan'        => $request->mo_ta_ngan,
            'mo_ta'             => $request->mo_ta,
        ]);
        GiaKhuyenMai::create([
            "gia" => $request->gia,
            "khuyen_mai" => $request->khuyen_mai,
            "id_san_pham" => $sanPham->id
        ]);
        foreach($request->filenames as $file)
        {
            $name = time().rand(1,100).".".$file->getClientOriginalExtension();
            $file->move('upload', $name);
            HinhAnhSanPham::create([
                "hinh_anh_phu" => $name,
                'id_san_pham' => $sanPham->id
            ]);
        };
        foreach($request->size as $size)
        {
            SizeSanPham::create([
                "size" => $size,
                'id_san_pham' => $sanPham->id
            ]);
        };
        Toastr::success('Thêm mới thành công!');
        return redirect('/admin/san-pham/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function show(SanPham $sanPham)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function edit(SanPham $sanPham)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanPham $sanPham)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanPham $sanPham)
    {
        //
    }
}
