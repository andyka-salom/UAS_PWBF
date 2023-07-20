<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLobsterindoTable extends Migration
{
    public function up()
    {
        Schema::create('lobsterindo', function (Blueprint $table) {
            $table->id('id_lobsterindo')->increments();
            $table->string('ceo', 40);
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('lobsterindo');
    }
}
