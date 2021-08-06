<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('employer_id');
            // new
            $table->integer('subcategory_id')->default('0');
            $table->longText('requirements')->nullable();
            $table->longText('skills')->nullable();
            $table->string('link')->nullable();
            $table->bigInteger('vacancies')->default('0');
            $table->string('job_type')->nullable();
            // end new
            $table->string('status')->default('open');
            $table->string('job_title')->default('0');
            $table->text('description')->nullable();
            $table->string('salary')->default('0');
            $table->string('salary_type')->default('0');
            $table->string('occupation')->default('0');
            $table->string('education')->default('0');
            $table->string('experience')->default('0');
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
        Schema::dropIfExists('jobs');
    }
}
