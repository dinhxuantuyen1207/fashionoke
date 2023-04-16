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
        Schema::create('gia_khuyen_mais', function (Blueprint $table) {
            $table->id();
            $table->integer("gia");
            $table->integer("khuyen_mai");
            $table->integer("id_san_pham");
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
        Schema::dropIfExists('gia_khuyen_mais');
    }
};
