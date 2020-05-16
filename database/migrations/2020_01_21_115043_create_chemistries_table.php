<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChemistriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Chemistry', function (Blueprint $table) {
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
        Schema::dropIfExists('Chemistry');
    }
}
