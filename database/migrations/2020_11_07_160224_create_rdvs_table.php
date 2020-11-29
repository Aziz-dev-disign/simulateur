<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdvs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('agence_id')->unsigned();
            $table->string('_token');
            $table->string('identifiantClient')->nullable();
            $table->string('montant')->nullable();
            $table->string('mensualite')->nullable();
            $table->string('taux')->nullable();
            $table->string('etatCivil');
            $table->string('nom');
            $table->string('prenom');
            $table->string('dateNaissance');
            $table->string('email');
            $table->string('pays');
            $table->string('telephone');
            $table->string('ville');
            $table->string('motif');
            $table->string('dateRdv');
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
        Schema::dropIfExists('rdvs');
    }
}
