<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Commentaires', function (Blueprint $table) {
            $table->increments('id');
            $table->text('texte');
            $table->date('date_pub');
            $table->unsignedInteger('produit_id');
            $table->unsignedInteger('client_id');
            $table->foreign('produit_id')->references('id')->
            on('produits')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->
            on('clients')->onDelete('cascade');
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
        Schema::dropIfExists('Commentaires');
    }
}
