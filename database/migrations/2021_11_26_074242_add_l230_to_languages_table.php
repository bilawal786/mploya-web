<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddL230ToLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('languages', function (Blueprint $table) {
            $table->text('l230')->after('l229')->nullable();
            $table->text('l231')->after('l230')->nullable();
            $table->text('l232')->after('l231')->nullable();
            $table->text('l233')->after('l232')->nullable();
            $table->text('l234')->after('l233')->nullable();
            $table->text('l235')->after('l234')->nullable();
            $table->text('l236')->after('l235')->nullable();
            $table->text('l237')->after('l236')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('languages', function (Blueprint $table) {
            $table->dropColumn('l230');
            $table->dropColumn('l231');
            $table->dropColumn('l232');
            $table->dropColumn('l233');
            $table->dropColumn('l234');
            $table->dropColumn('l235');
            $table->dropColumn('l236');
            $table->dropColumn('l237');
        });
    }
}
