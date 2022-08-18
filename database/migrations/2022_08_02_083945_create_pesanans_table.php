<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('produk_id')->unsigned()->nullable();
            $table->integer('panjang');
            $table->integer('lebar');
            $table->integer('kuantitas');
            $table->bigInteger('harga_total');
            $table->string('status');
            $table->string('keterangan');
             $table->timestamps();
        });

          Schema::table('pesanans', function (Blueprint $table) {
           $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
           $table->foreign('produk_id')->references('id')->on('produks')->onDelete('set null');
        });
          
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}
