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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string('periode');
            $table->string('ref_paiment');
            $table->string('delai_paiment');
            $table->unsignedBigInteger('delivrer');
            $table->unsignedBigInteger('payer');
            $table->foreign('delivrer')->references('id')->on('agences')->onDelete('cascade');
            $table->foreign('payer')->references('id')->on('clients')->onDelete('cascade');
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
        Schema::dropIfExists('factures');
    }
};
