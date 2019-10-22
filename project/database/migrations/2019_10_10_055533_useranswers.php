<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Useranswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('useranswers',function(Blueprint $table)
            {
                $table->bigIncrements('id');
                $table->bigInteger('usertests_id')->unsigned();
                $table->foreign('usertests_id')->references('id')->on('usertests')->onDelete('cascade');
                $table->bigInteger('question_id')->unsigned();
                $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
                $table->boolean('isCorrect');
                $table->timestamps();
            });       }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('useranswers');    }
}
