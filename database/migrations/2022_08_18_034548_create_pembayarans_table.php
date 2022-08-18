<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
           $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('pesanan_id')->unsigned()->nullable();
            $table->string('bukti_upload');
            $table->string('status');
            $table->timestamps();
        });
        Schema::table('pembayarans', function (Blueprint $table) {
           $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
           $table->foreign('pesanan_id')->references('id')->on('pesanans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
}
