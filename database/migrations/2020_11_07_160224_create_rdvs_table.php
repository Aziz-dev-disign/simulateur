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
            $table->bigInteger('simulation_id')->unsigned();
            $table->bigInteger('agence_id')->unsigned();
            $table->string('identifiantClient');
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
            $table->string('heure');
            $table->timestamps();
        });
        Schema::table('rdvs', function (Blueprint $table) {
            $table->foreign('simulation_id')->references('id')->on('simulations');
            $table->foreign('agence_id')->references('id')->on('agences');
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
