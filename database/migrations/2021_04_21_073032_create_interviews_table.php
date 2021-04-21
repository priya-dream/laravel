<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('emp_id');
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('emp_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interviews');
    }
}
