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
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->string('trimble_elec');
            $table->string('ca');
            $table->string('droit_consommation');
            $table->string('rav');
            $table->unsignedBigInteger('attribuer');
            $table->foreign('attribuer')->references('id')->on('factures')->onDelete('cascade');
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
        Schema::dropIfExists('taxes');
    }
};
