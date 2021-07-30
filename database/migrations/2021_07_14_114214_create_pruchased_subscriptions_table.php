<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePruchasedSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pruchased_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employer_id');
            $table->string('title');
            $table->string('price');
            $table->string('valid_job');
            $table->string('status');
            $table->string('color');
            $table->string('description');
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
        Schema::dropIfExists('pruchased_subscriptions');
    }
}
