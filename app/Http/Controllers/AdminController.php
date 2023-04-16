<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\SubAdmin;
use App\Models\TaiKhoanNguoiDung;
use GrahamCampbell\ResultType\Success;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;
use Yoeunes\Toastr\Facades\Toastr;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.nhan_vien.index');
    }
    public function list()
    {
        $taikhoan = Admin::with('sub_admin')->get();
        return response()->json(['data'=> $taikhoan]);
    }
    public function logout(){

        Auth::guard('admin')->logout();
        Auth::guard('user')->logout();
        Toastr::success("Đăng Xuất Thành Công !");
        return redirect('/');
    }
    public function ts(){
        $data = Auth::guard('admin')->user();
        dd($data);
    }
    public function login(Request $request){
        // $data = $request->email;
        $user = Auth::guard('user')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        if($user){
            return response()->json(['status'=> true]);
        } else {
                $admin = Auth::guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ]);
            if($admin){
                return response()->json(['status'=> true]);
            } else {
                return response()->json(['status'=> false]);
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $password = bcrypt($request->password);
            $admin = Admin::create([
                "email" => $request->email,
                'phone' => $request->phone,
                'password' => $password,
                'full_name' => $request->full_name
            ]);
            if(isset($request->hinh_anh) && $request->hinh_anh != 'undefined'){
                $name = time().rand(1,100).".".$request->hinh_anh->getClientOriginalExtension();
                $request->hinh_anh->move('upload', $name);
                $name_hinh_anh = $name;
            }
            SubAdmin::create([
                'id_admin' => $admin->id,
                'id_chuc_vu' => $request->chuc_vu,
                'ngay_vao_lam' => $request->ngay_vao_lam,
                'hinh_anh' => $name_hinh_anh,
                'ngay_sinh' => $request->ngay_sinh,
                'gioi_tinh' => $request->gioi_tinh,
                'luong' => $request->luong,
            ]);
            return response()->json(['status'=> true]);
        } catch ( QueryException $e) {
            DB::rollBack();
            dd($e);
            return response()->json(['status'=> false]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        TaiKhoanNguoiDung::create($data);
        return response()->json(['status' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taikhoan = Admin::with('sub_admin')->find($id);
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $taikhoan = Admin::find($request->id);
            $sub_taikhoan = SubAdmin::where('id_admin',$request->id)->first();
            $taikhoan->full_name = $request->full_name;
            $taikhoan->email = $request->email;
            $taikhoan->phone = $request->phone;
            if($taikhoan->password != $request->password ){
                $taikhoan->password = $request->password;
                $taikhoan['password'] = bcrypt($taikhoan['password']);
            }
            if(isset($sub_taikhoan)){
                $sub_taikhoan->ngay_sinh = $request->ngay_sinh;
                $sub_taikhoan->ngay_vao_lam = $request->ngay_vao_lam;
                $sub_taikhoan->id_chuc_vu = $request->chuc_vu;
                $sub_taikhoan->luong = $request->luong;
                $sub_taikhoan->gioi_tinh = $request->gioi_tinh;
                if(isset($request->hinh_anh) && $request->hinh_anh != 'undefined'){
                    $name = time().rand(1,100).".".$request->hinh_anh->getClientOriginalExtension();
                    $request->hinh_anh->move('upload', $name);
                    $sub_taikhoan->hinh_anh = $name;
                }
                $sub_taikhoan->save();
            }
            $taikhoan->save();
            return response()->json(['status'=> true]);
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            return response()->json(['status'=> false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $taikhoan = Admin::find($request->id);
        $sub_admin = SubAdmin::where('id_admin',$request->id);
        if($taikhoan){
            if($sub_admin){
                $sub_admin->delete();
            }
            $taikhoan->delete();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
}
