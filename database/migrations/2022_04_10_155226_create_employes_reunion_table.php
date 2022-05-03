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
        Schema::create('employes_reunions', function (Blueprint $table) {
            $table->bigInteger('id_employes')->unsigned();
            $table->bigInteger('id_reunions')->unsigned();
            $table->foreign('id_employes')->references('id')->on('employes');
            $table->foreign('id_reunions')->references('id')->on('reunions');
            $table->primary(['id_employes', 'id_reunions']);
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
        Schema::dropIfExists('employes_reunion');
    }
};
