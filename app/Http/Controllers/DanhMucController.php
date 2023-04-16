<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flashSale = \App\Models\SanPham::join('gia_khuyen_mais','san_phams.id','gia_khuyen_mais.id_san_pham')->select('san_phams.*','gia_khuyen_mais.gia','gia_khuyen_mais.khuyen_mai')->get();
        return View('admin.danh_muc.index');
    }
    public function list(){
        $sql="Select A.*, B.ten_danh_muc as ten_danh_muc_cha from danh_mucs A left join danh_mucs B on A.id_danh_muc_cha = B.id order by A.id_danh_muc_cha";
        $data = DB::select($sql);
        return response()->json(['data' => $data]);
    }
    public function doiTrangThai($id){
        $danhMuc = DanhMuc::find($id);
        if($danhMuc){
            $danhMuc->tinh_trang = !$danhMuc->tinh_trang;
            $danhMuc->save();
            return response()->json(['status' => true ]);
        }else{
            return response()->json(['status' => false ]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DanhMuc::create([
            'ten_danh_muc'    => $request->ten_danh_muc,
            'slug_danh_muc'   => $request->slug_danh_muc,
            'tinh_trang'      => $request->tinh_trang,
            'id_danh_muc_cha' => $request->id_danh_muc_cha,
        ]);
        return response()->json([
            'status' => true
        ]);

    }

    public function loadDanhMucCha(){
        $danhMucCha = DanhMuc::where('tinh_trang',1)
            ->where('id_danh_muc_cha',0)
            ->get();
        return response() ->json(['danhMucCha'=>$danhMucCha]);
    }
    public function loadDanhMucSanPham(){
        $danhMucCha = DanhMuc::where('tinh_trang',1)
            ->where('id_danh_muc_cha','<>',0)
            ->get();
        return response() ->json(['danhMucCha'=>$danhMucCha]);
    }

    public function loadDanhMucChaUpdate($id){
        $danhMucCha = DanhMuc::where('id','!=',$id)
            ->where('id_danh_muc_cha',0)
            ->where('tinh_trang',1)
            ->get();
        return response() ->json(['danhMucCha'=>$danhMucCha]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DanhMuc  $danhMuc
     * @return \Illuminate\Http\Response
     */
    public function show(DanhMuc $danhMuc)
    {
        //
    }


    public function edit(Request $request)
    {

        $danhMuc = DanhMuc::find($request->id);
            $danhMuc->ten_danh_muc = $request->ten_danh_muc;
            $danhMuc->slug_danh_muc = $request->slug_danh_muc;
            $danhMuc->tinh_trang = $request->tinh_trang;
            $danhMuc->id_danh_muc_cha = $request->id_danh_muc_cha;
         $danhMuc->save();
        return response()->json(['status'=> true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DanhMuc  $danhMuc
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $danhMuc = DanhMuc::where('id',$id)->first();
        return response()->json(['danhMuc' => $danhMuc]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DanhMuc  $danhMuc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $danhMuc = DanhMuc::find($id);

        if($danhMuc){
            $danhMuc->delete();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);

    }
}
