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
            $table->unsignedBigInteger('company_id');           
            $table->unsignedBigInteger('qualification_id');
            $table->integer('need');          
            $table->date('closing_date');
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('vacancy_id')->references('id')->on('vacancies');
            $table->foreign('qualification_id')->references('id')->on('vacancy_qualification');
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
