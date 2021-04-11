<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeQualificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_qualification', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('emp_id');
            $table->text('A/L');
            $table->text('stream');
            $table->text('graduate');
            $table->text('field');
            $table->text('uni');
            $table->text('other_quali');
            $table->timestamps();
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
        Schema::dropIfExists('employee_qualification');
    }
}
