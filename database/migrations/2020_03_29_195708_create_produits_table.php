<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->double('prix',8,2);
            $table->double('remise',8,2);
            $table->unsignedInteger('categorie_id');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->boolean('isPromo');
            $table->String('imgPath');
            $table->timestamps();
            $table->foreign('categorie_id')->references('id')->
            on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
