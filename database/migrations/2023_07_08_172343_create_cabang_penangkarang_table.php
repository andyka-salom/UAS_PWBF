<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabangPenangkarangTable extends Migration
{
    public function up()
    {
        Schema::create('cabang_penangkarang', function (Blueprint $table) {
            $table->id('id_penangkaran')->increments();
            $table->unsignedBigInteger('id_lobsterindo');
            $table->foreign('id_lobsterindo')->references('id_lobsterindo')->on('lobsterindo');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('lokasi_penangkaran', 50);
            $table->string('jumlah_karyawan', 40);
            $table->string('negara', 30);
            $table->string('nomor_rekening',30);
            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('cabang_penangkarang');
    }
}
