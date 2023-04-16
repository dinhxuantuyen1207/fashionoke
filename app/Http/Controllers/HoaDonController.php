<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dat_hang(Request $request){
        try{
            $user = Auth::guard('user')->user();
            $admin = Auth::guard('admin')->user();
            if($user){
                $id = $user->id;
            } else if($admin) {
                $id = $admin->id;
            }
            $hoaDon = HoaDon::create([
                'id_nguoi_nhan'         => $id,
                'nguoi_nhan'            => $request->ten_nguoi_nhan,
                'so_dien_thoai'         => $request->so_dien_thoai,
                'dia_chi'               => $request->dia_chi,
                'id_san_pham'           => $request->id_san_pham,
                'tinh_trang_don_hang'   => 'Chờ Xác Nhận',
                'tinh_trang_thanh_toan' => $request->tinh_trang_thanh_toan,
                'tong_tien'             => $request->tong_tien,
                'so_luong'              => $request->so_luong,
            ]);
            return response()->json(['status' => true]);
        }catch(QueryExecuted $e){
            return response()->json(['error' => $e]);
        }
    }
    public function chuyen_trang_thai(Request $request){
        $hoa_don = HoaDon::find($request->id);
        if(isset($hoa_don)){
            if($hoa_don->tinh_trang_don_hang == 'Chờ Xác Nhận'){
                $hoa_don->tinh_trang_don_hang = 'Xác Nhận Đơn Hàng';
                $hoa_don->save();
                return response()->json(['message' => 1]);
            } else if($hoa_don->tinh_trang_don_hang == 'Xác Nhận Đơn Hàng') {
                $hoa_don->tinh_trang_don_hang = 'Đang Đóng Gói';
                $hoa_don->save();
                return response()->json(['message' => 2]);
            } else if($hoa_don->tinh_trang_don_hang == 'Đang Đóng Gói') {
                $hoa_don->tinh_trang_don_hang = 'Đang Vận Chuyển';
                $hoa_don->save();
                return response()->json(['message' => 3]);
            } else if($hoa_don->tinh_trang_don_hang == 'Đang Vận Chuyển') {
                $hoa_don->tinh_trang_don_hang = 'Đã Giao Hàng';
                $hoa_don->tinh_trang_thanh_toan = 'Đã Thanh Toán';
                $hoa_don->save();
                return response()->json(['message' => 4]);
            } else {
                return response()->json(['message' => 5]);
            }
        }
        return response()->json(['message' => 5]);
    }

    public function thong_ke(){
        $hoa_don = HoaDon::where('tinh_trang_thanh_toan', 'Đã Thanh Toán')->groupBy('id_san_pham')->selectRaw('sum(tong_tien) as thanh_tien, id_san_pham')
        ->get();

        return view('admin.thong_ke.index',compact('hoa_don','hoa_don'));
    }

    public function thong_ke2(){
        $hoa_don = HoaDon::where('tinh_trang_thanh_toan', 'Đã Thanh Toán')
        ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") AS thang_nam, SUM(tong_tien) AS thanh_tien ')
        ->groupBy('thang_nam')
        ->get();

        return view('admin.thong_ke.index2',compact('hoa_don','hoa_don'));
    }
    public function thong_ke_thang($id){
        $hoa_don = HoaDon::where('tinh_trang_thanh_toan', 'Đã Thanh Toán')->groupBy('id_san_pham')->selectRaw('sum(tong_tien) as thanh_tien, id_san_pham')
        ->whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$id])->get();

        return view('admin.thong_ke.index3',compact(['hoa_don'=>'hoa_don','id'=>'id']));
    }

    public function index()
    {
        return view('admin.hoa_don.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function show(HoaDon $hoaDon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function edit(HoaDon $hoaDon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HoaDon $hoaDon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function destroy(HoaDon $hoaDon)
    {
        //
    }
}
