<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_report', function(Blueprint $table)
        {
            $table->integer('exam_id')->unsigned()->nullable();
            $table->foreign('exam_id')->references('id')
                    ->on('exams')->onDelete('cascade');

            $table->integer('report_id')->unsigned()->nullable();
            $table->foreign('report_id')->references('id')
                    ->on('reports')->onDelete('cascade');

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
        Schema::drop('exam_report_table');
    }
}
