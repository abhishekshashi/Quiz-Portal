<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Options extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options',function(Blueprint $table)
            {
                $table->bigIncrements('id');
                $table->bigInteger('question_id')->unsigned();
                $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
                $table->string('option');
                $table->boolean('isCorrect');
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
        Schema::dropIfExists('users');
    }
}
