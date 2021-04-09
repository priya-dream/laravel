<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacancyQualificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancy_qualification', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vacancy_id');
            $table->unsignedBigInteger('company_id');
            $table->text('advance_level');
            $table->text('stream');
            $table->text('graduate');
            $table->text('field');
            $table->text('other_quali');
            $table->text('gender');
            $table->text('age');
            $table->text('experience');
            $table->float('salary');
            $table->text('branch');
            $table->timestamps();
            $table->foreign('vacancy_id')->references('id')->on('vacancies')->ondelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->ondelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancy_qualification');
    }
}
