<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategoris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kategori');
            $table->text('deskripsi_kategori');
            $table->string('foto')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();

        });

        Schema::table('kategoris', function (Blueprint $table) {
           $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategoris');
    }
}
