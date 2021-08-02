<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('is_block')->default('1');
            $table->string('is_popular')->default('0');
            $table->string('name');
            $table->string('leanguage')->default('0');
            $table->string('father_name')->default('0');
            $table->string('email');
            $table->string('address')->default('0');
            $table->string('CNIC')->default('0');
            $table->string('phone')->default('0');
            $table->string('city')->default('0');
            $table->string('country')->default('0');
            $table->text('description')->nullable();
            $table->string('education_name')->default('0');
            $table->string('education_description')->default('0');
            $table->string('education_is_continue')->default('0');
            $table->string('education_complete_date')->default('0');
            $table->string('project_title')->default('0');
            $table->string('project_occupation')->default('0');
            $table->string('project_year')->default('0');
            $table->string('project_links')->default('0');
            $table->string('project_description')->default('0');
            $table->string('skill_name')->default('0');
            $table->string('certification_name')->default('0');
            $table->string('certification_year')->default('0');
            $table->string('certification_description')->default('0');
            $table->string('company_name')->default('0');
            $table->string('user_type')->nullable();
            $table->string('profile_status')->nullable('visible');
            $table->string('provider_id')->nullable();
            $table->string('provider_name')->nullable();
            $table->string('image')->default('0');
            $table->string('video')->default('0');
            $table->string('social_links')->default('0');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->bigInteger('otp')->default('0');
            $table->integer('varify_email')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
