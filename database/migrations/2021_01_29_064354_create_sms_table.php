<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->text('description');
            $table->boolean('sent');
            $table->unsignedBigInteger('emp_id');
            $table->unsignedBigInteger('com_id');
            $table->timestamps();
            $table->foreign('emp_id')->references('id')->on('job_seekers');
            $table->foreign('com_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sms');
    }
}
