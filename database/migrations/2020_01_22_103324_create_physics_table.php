<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Physics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("question");
            $table->string("answer");
            $table->string("option1");
            $table->string("option2");
            $table->string("option3");
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
        Schema::dropIfExists('Physics');
    }
}
