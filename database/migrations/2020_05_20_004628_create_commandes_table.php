<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('adresse');
            $table->string('type');
            $table->boolean('realiser');
            $table->string('secteur');
            $table->double('prix',8,2);
            $table->unsignedInteger('client_id');
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
        Schema::dropIfExists('commandes');
    }
}
