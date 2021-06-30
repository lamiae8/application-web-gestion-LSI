<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->double('note_val',4,2);
            $table->unsignedBigInteger('etu_id');
            $table->unsignedBigInteger('module_id');      
            $table->foreign('etu_id')->references('id')->on('etudiants') ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('module_id')->references('id')->on('modules') ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('notes');
    }
}
