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
            $table->string('montantMin');
            $table->string('montantMax');
            $table->decimal('taux', 8, 2);
            $table->integer('dureeMin');
            $table->integer('dureeMax');
            $table->string('image');
            $table->longText('description');
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
