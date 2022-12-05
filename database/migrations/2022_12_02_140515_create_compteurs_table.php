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
        Schema::disableForeignKeyConstraints();
        Schema::create('compteurs', function (Blueprint $table) {
            $table->id();
            $table->string('index_ancien');
            $table->string('index_nouveau');
            $table->string('puissance');
            $table->string('nbre_mois');
            $table->string('prix_unitaire');
            $table->unsignedBigInteger('installer');
            $table->foreign('installer')->references('id')->on('clients')->onDelete('cascade');
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
        Schema::dropIfExists('compteurs');
    }
};
