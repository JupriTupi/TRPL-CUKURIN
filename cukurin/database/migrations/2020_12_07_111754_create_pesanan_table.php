<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('tanggalPemesanan');
            $table->time('waktu');
            $table->string('status');
            $table->unsignedBigInteger('layanan_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pembayaran_id');
        });
        Schema::table('pesanan', function(Blueprint $table) {
            $table->foreign('layanan_id')->references('id')->on('layanan');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pembayaran_id')->references('id')->on('pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}
