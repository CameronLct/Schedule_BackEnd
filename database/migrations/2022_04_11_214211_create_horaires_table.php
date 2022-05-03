<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horaires', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('lundi');
            $table->tinyInteger('mardi');
            $table->tinyInteger('mercredi');
            $table->tinyInteger('jeudi');
            $table->tinyInteger('vendredi');
            $table->bigInteger('id_employes')->unsigned();
            $table->foreign('id_employes')->references('id')->on('employes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horaires');
    }
};
