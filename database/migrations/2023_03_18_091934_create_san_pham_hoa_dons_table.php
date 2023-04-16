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
        Schema::create('san_pham_hoa_dons', function (Blueprint $table) {
            $table->id();
            $table->integer('id_hoa_don');
            $table->integer('so_luong');
            $table->string('size');
            $table->integer('id_san_pham');
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
        Schema::dropIfExists('san_pham_hoa_dons');
    }
};
