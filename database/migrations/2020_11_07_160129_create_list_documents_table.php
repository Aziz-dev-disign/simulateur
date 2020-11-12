<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_documents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('type_id')->unsigned();
            $table->bigInteger('categorie_id')->unsigned();
            $table->string('nomDoc');
            $table->timestamps();
        });
        Schema::table('list_documents', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('type_simulations');
            $table->foreign('categorie_id')->references('id')->on('categorie_lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_documents');
    }
}
