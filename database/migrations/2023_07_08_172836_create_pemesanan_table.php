<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id('id_pemesanan')->increments();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_barang');
            $table->foreign('id_barang')->references('id_barang')->on('stock_barang');
            $table->datetime('tgl_pemesanan');
            $table->datetime('tgl_pengiriman');
            $table->integer('jumlah_pemesanan');
            $table->integer('total_pembayaran');
            $table->string('alamat_pengiriman', 50);
            $table->text('deskripsi_pemesanan');
            $table->boolean('status_disiapkan')->default(false);
            $table->boolean('status_pengiriman')->default(false);
            $table->boolean('status_penerimaan')->default(false);
            $table->string('bukti_transfer'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
}
