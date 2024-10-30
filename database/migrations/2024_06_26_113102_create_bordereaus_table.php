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
        Schema::create('bordereaus', function (Blueprint $table) {
            $table->id();
            $table->string('matriculeBordereau');
            $table->integer('idCourrier');
            $table->integer('nombreColis');
            $table->integer('statut')->default(1);
            $table->string('commentaire')->nullable();
            $table->integer('poids');
            $table->integer('frais');
            $table->integer('idCharge');
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
        Schema::dropIfExists('bordereaus');
    }
};
