<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSeekersQualificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_seekers_qualification', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('job_seeker_id');
            $table->text('o_level');
            $table->text('advance_level');
            $table->text('stream');
            $table->text('graduate');
            $table->text('field');
            $table->text('uni');
            $table->text('other_quali');
            $table->timestamps();
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('job_seeker_id')->references('id')->on('job_seekers');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_seekers_qualification');
    }
}
