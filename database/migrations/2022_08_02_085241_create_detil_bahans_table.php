<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetilBahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detil_bahans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produk_id')->unsigned()->nullable();
            $table->integer('bahan_id')->unsigned()->nullable();
            $table->integer('jumlah_item');
            $table->bigInteger('biaya_bahan');
            $table->timestamps();


        });
        Schema::table('detil_bahans', function (Blueprint $table) {
           $table->foreign('produk_id')->references('id')->on('produks')->onDelete('set null');
           $table->foreign('bahan_id')->references('id')->on('bahans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detil_bahans');
    }
}
