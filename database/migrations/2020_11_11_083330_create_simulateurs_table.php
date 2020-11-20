<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimulateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulateurs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('type_id')->unsigned();
            $table->string('nom');
            $table->string('slug');
            $table->string('statut');
            $table->string('montantMin');
            $table->string('montantMax');
            $table->string('taux', 8, 2);
            $table->string('dureeMin');
            $table->string('dureeMax');
            $table->string('image');
            $table->text('description');
            $table->timestamps();
        });
        Schema::table('simulateurs', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('type_simulations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simulateurs');
    }
}
