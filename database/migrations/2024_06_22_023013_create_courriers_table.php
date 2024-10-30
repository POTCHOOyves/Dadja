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
        Schema::create('courriers', function (Blueprint $table) {
            $table->id();
            $table->string('courtier');
            $table->integer('idVoieTrans');
            $table->integer('idTypeCourrier');
            $table->string('numero');
            $table->text('contenu');
            $table->string('objet');
            $table->time('heureEnregistrement');
            $table->date('dateEnvoi');
            $table->date('dateEnregistrement');
            $table->integer('idCharge');
            $table->integer('poids');
            $table->integer('frais');
            $table->string('piece_jointe')->nullable();
            $table->integer('traitement')->default(0);
            $table->integer('destinataire');
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
        Schema::dropIfExists('courriers');
    }
};
