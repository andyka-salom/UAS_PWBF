<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnershipTable extends Migration
{
    public function up()
    {
        Schema::create('partnership', function (Blueprint $table) {
            $table->id('id_partnership')->increments();
            $table->unsignedBigInteger('id_lobsterindo');
            $table->foreign('id_lobsterindo')->references('id_lobsterindo')->on('lobsterindo');
            $table->string('nama_perusahaan', 30);
            $table->string('nama_pemilik', 40);
            $table->string('deskripsi');
            $table->date('tgl_kerjasama');
            $table->string('lokasi_perusahaan', 50);
            $table->string('foto_partnership')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partnership');
    }
}
