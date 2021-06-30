<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('nbr_heure');

            $table->unsignedBigInteger('prof_id');
            $table->unsignedBigInteger('semester_id');
            $table->foreign('prof_id')->references('id')->on('profs') ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('semester_id')->references('id')->on('semesters') ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('modules');
    }
}
