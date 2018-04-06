<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grade_id');
            $table->string('name');
            $table->string('last');
            $table->boolean('has_bros')->default(false);
            $table->integer('bros')->nullable();
            $table->string('parent_name');
            $table->string('parent_last');
            $table->string('phone');
            $table->string('phone_aditional')->nullable();
            $table->string('email');
            $table->string('question')->nullable();
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
        Schema::dropIfExists('customs');
    }
}
