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
            $table->longText('deviceToken')->nullable();
            $table->string('latitude')->default('0');
            $table->string('longitude')->default('0');
            $table->string('name');
            $table->string('language')->nullable();;
            $table->string('father_name')->default('0');
            $table->string('email');
            $table->longText('educations')->nullable();
            $table->longText('experiences')->nullable();
            $table->longText('works')->nullable();
            // $table->string('experience_title')->nullable();
            // $table->string('experience_description')->nullable();
            // $table->string('experience_startAt')->nullable();
            // $table->string('experience_endAt')->nullable();
            // $table->string('experience_isContinue')->nullable();
            // $table->string('experience_projectLink')->nullable();
            // $table->string('experience_role')->nullable();
            $table->string('address')->default('0');
            $table->string('CNIC')->default('0');
            $table->string('phone')->default('0');
            $table->string('city')->default('0');
            $table->string('country')->default('0');
            $table->text('description')->nullable();
            // $table->string('occupation')->nullable();

            // $table->string('education_name')->nullable();
            // $table->string('education_description')->nullable();
            // $table->string('education_is_continue')->nullable();
            // $table->string('education_complete_date')->nullable();
            // $table->string('education_start_date')->nullable();

            // $table->string('project_title')->nullable();
            // $table->string('project_companyAddress')->nullable();
            // $table->string('project_companyName')->nullable();
            // $table->string('project_description')->nullable();
            // $table->string('project_endAt')->nullable();
            // $table->string('project_isContinue')->nullable();
            // $table->string('project_startAt')->nullable();
            // $table->string('project_occupation')->nullable();
            // $table->string('project_year')->nullable();
            // $table->string('project_links')->nullable();
            $table->string('skill_name')->nullable();
            $table->string('certification_name')->nullable();
            $table->string('certification_year')->nullable();
            $table->string('certification_description')->nullable();
            $table->string('company_name')->default('0');
            $table->string('company_logo')->default('0');
            $table->string('user_type')->nullable();
            $table->string('profile_status')->nullable('visible');
            $table->string('provider_id')->nullable();
            $table->string('provider_name')->nullable();
            $table->string('image')->default('assets/dist/img/avatar5.png');
            $table->string('video')->default('0');
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('linkedin_link')->nullable();
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
