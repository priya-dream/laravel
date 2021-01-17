<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vacancy_id');
            $table->date('date');
            $table->string('title');
            $table->unsignedBigInteger('company');           
            $table->string('qualification');
            $table->integer('need');
            $table->string('gender');
            $table->string('age_limit');          
            $table->date('closing_date');
            $table->timestamps();
            $table->foreign('company')->references('id')->on('companies');
            $table->foreign('vacancy_id')->references('id')->on('vacancies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
