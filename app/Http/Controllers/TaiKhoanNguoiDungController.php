<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoanNguoiDung;
use Illuminate\Http\Request;

class TaiKhoanNguoiDungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return View('admin.tai_khoan.index');
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
     * @param  \App\Models\TaiKhoanNguoiDung  $taiKhoanNguoiDung
     * @return \Illuminate\Http\Response
     */
    public function show(TaiKhoanNguoiDung $taiKhoanNguoiDung)
    {
        //
    }

    public function list()
    {
        $data = TaiKhoanNguoiDung::get();
        return response()->json(['data' => $data]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaiKhoanNguoiDung  $taiKhoanNguoiDung
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taikhoan = TaiKhoanNguoiDung::find($id);
        if($taikhoan) {
            return response()->json([
                'status' => true,
                'data'   => $taikhoan,
            ]);
        } else {
            return response()->json([
                'status' => false
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaiKhoanNguoiDung  $taiKhoanNguoiDung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,)
    {
        $taikhoan = TaiKhoanNguoiDung::find($request->id);
            $taikhoan->full_name = $request->full_name;
            $taikhoan->email = $request->email;
            $taikhoan->phone = $request->phone;
            $taikhoan->password = $request->password;
            $taikhoan['password'] = bcrypt($taikhoan['password']);
         $taikhoan->save();
        return response()->json(['status'=> true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaiKhoanNguoiDung  $taiKhoanNguoiDung
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $taikhoan = TaiKhoanNguoiDung::find($request->id);
        if($taikhoan){
            $taikhoan->delete();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
}
