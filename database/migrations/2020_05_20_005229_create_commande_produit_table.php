<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandeProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_produit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produit_id')->unsigned();
            $table->integer('commande_id')->unsigned();
            $table->integer('quantite')->default(1);
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
        Schema::dropIfExists('commande_produit');
    }
}
