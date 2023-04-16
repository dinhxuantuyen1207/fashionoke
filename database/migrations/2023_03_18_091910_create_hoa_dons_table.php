<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_dons', function (Blueprint $table) {
            $table->id();
            $table->integer('id_nguoi_mua');
            $table->integer('id_san_pham');
            $table->string('nguoi_nhan');
            $table->string('so_dien_thoai');
            $table->string('dia_chi');
            $table->string('tinh_trang_don_hang');
            $table->string('tinh_trang_thanh_toan');
            $table->integer('tong_tien');
            $table->integer('so_luong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoa_dons');
    }
};
