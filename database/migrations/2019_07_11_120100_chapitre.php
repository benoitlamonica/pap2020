<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Chapitre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapitre', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_cours');
            $table->integer('n_chap');
            $table->text('content_chap');
            $table->timestamps();
            $table->foreign('id_cours')->references('id')->on('cours')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapitre');
    }
}
