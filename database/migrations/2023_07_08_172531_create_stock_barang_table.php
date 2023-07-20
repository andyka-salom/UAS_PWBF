<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockBarangTable extends Migration
{
    public function up()
    {
        Schema::create('stock_barang', function (Blueprint $table) {
            $table->id('id_barang')->increments();
            $table->unsignedBigInteger('id_penangkaran');
            $table->foreign('id_penangkaran')->references('id_penangkaran')->on('cabang_penangkarang');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('nama_barang', 30);
            $table->integer('jumlah_barang');
            $table->integer('berat');
            $table->boolean('satuan');
            $table->decimal('harga', 10, 2);
            $table->string('foto_barang')->nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_barang');
    }
}
