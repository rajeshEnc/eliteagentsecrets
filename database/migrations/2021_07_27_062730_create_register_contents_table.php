<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_contents', function (Blueprint $table) {
            $table->id();
            $table->string('text_one')->nullable();
            $table->string('text_two')->nullable();
            $table->string('text_three')->nullable();
            $table->string('text_four')->nullable();
            $table->string('heading')->nullable();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
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
        Schema::dropIfExists('register_contents');
    }
}
