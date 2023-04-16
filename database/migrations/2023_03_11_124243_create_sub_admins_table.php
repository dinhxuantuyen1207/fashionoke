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
        Schema::create('sub_admins', function (Blueprint $table) {
            $table->id();
            $table->integer('id_admin');
            $table->integer('id_chuc_vu');
            $table->date('ngay_vao_lam');
            $table->string('hinh_anh');
            $table->date('ngay_sinh');
            $table->string('gioi_tinh');
            $table->integer('luong');
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
        Schema::dropIfExists('sub_admins');
    }
};
