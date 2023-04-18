<?php

use App\Http\Controllers\AddToCardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\TaiKhoanNguoiDungController;
use App\Models\HoaDon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.home');
});
Route::get('/login', function () {
    return view('home.login');
});

Route::post('/login',[AdminController::class,'login']);
Route::post('/register',[AdminController::class,'store']);
Route::get('/alogout',[AdminController::class,'logout']);
Route::get('/product/{name}',[SanPhamController::class,'detail']);
Route::get('/search:{search}',[SanPhamController::class,'search']);
Route::get('/product/add-to-cart/{id}',[AddToCardController::class,'add_to_card']);
Route::get('/gio-hang',[AddToCardController::class,'gio_hang']);
Route::post('/delete-gio-hang',[AddToCardController::class,'delete_gio_hang']);
Route::get('/{slug_danh_muc_cha}/{slug_danh_muc}',[SanPhamController::class,'san_pham_danh_muc']);
Route::post('/select_checkbox',[SanPhamController::class,'select_checkbox']);
Route::post('/dat-hang',[HoaDonController::class,'dat_hang']);
Route::get('/quan-ly-don-hang',[HoaDonController::class,'don_hang']);
Route::group(['prefix'=>'/admin','middleware'=>'checkAdmin'],function () {
    Route::prefix('/danh-muc')->group(function () {
        Route::get('/ts',[AdminController::class,'ts']);
        Route::get('/index',[DanhMucController::class,'index']);
        Route::get('/list',[DanhMucController::class,'list']);
        Route::post('/create',[DanhMucController::class,'store']);
        Route::get('/doi-trang-thai/{id}',[DanhMucController::class,'doiTrangThai']);
        Route::get('/delete/{id}',[DanhMucController::class,'destroy']);
        Route::get('/load-danh-muc-cha',[DanhMucController::class,'loadDanhMucCha']);
        Route::get('/load-danh-muc-san-pham',[DanhMucController::class,'loadDanhMucSanPham']);
        Route::get('/load-danh-muc-cha-update/{id}',[DanhMucController::class,'loadDanhMucChaUpdate']);
        Route::get('/update/{id}',[DanhMucController::class,'update']);
        Route::post('/edit',[DanhMucController::class,'edit']);
    });
    Route::prefix('/san-pham')->group(function () {
        Route::get('/index',[SanPhamController::class,'index']);
        Route::get('/create',[SanPhamController::class,'create']);
        Route::post('/create',[SanPhamController::class,'store']);
    });
    Route::prefix('/tai-khoan')->group(function () {
        Route::get('/index',[TaiKhoanNguoiDungController::class,'index']);
        Route::get('/edit/{id}',[TaiKhoanNguoiDungController::class,'edit']);
        Route::post('/update',[TaiKhoanNguoiDungController::class,'update']);
        Route::post('/delete',[TaiKhoanNguoiDungController::class,'destroy']);
        Route::get('/list',[TaiKhoanNguoiDungController::class,'list']);
    });
    Route::prefix('/nhan-vien')->group(function () {
        Route::get('/index',[AdminController::class,'index']);
        Route::get('/edit/{id}',[AdminController::class,'edit']);
        Route::post('/update',[AdminController::class,'update']);
        Route::post('/delete',[AdminController::class,'destroy']);
        Route::get('/list',[AdminController::class,'list']);
        Route::post('/create',[AdminController::class,'create']);
    });
    Route::prefix('/hoa-don')->group(function () {
        Route::get('/index',[HoaDonController::class,'index']);
        Route::get('/edit/{id}',[HoaDonController::class,'edit']);
        Route::post('/update',[HoaDonController::class,'update']);
        Route::post('/delete',[HoaDonController::class,'destroy']);
        Route::get('/list',[HoaDonController::class,'list']);
        Route::post('/create',[HoaDonController::class,'create']);
        Route::post('/chuyen-trang-thai',[HoaDonController::class,'chuyen_trang_thai']);
    });
    Route::prefix('/thong-ke')->group(function () {
        Route::get('/index',[HoaDonController::class,'thong_ke']);
        Route::get('/index2',[HoaDonController::class,'thong_ke2']);
        Route::get('/thong-ke-thang/{id}',[HoaDonController::class,'thong_ke_thang']);
    });
});
