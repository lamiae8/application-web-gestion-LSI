<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pves', function (Blueprint $table) {
            $table->id();
            $table->string('sujet');
            $table->unsignedBigInteger('etu_id');
            $table->unsignedBigInteger('prof_id');
            $table->foreign('etu_id')->references('id')->on('etudiants') ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('prof_id')->references('id')->on('profs') ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('pves');
    }
}
