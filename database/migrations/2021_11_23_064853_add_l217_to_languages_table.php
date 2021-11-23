<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddL217ToLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('languages', function (Blueprint $table) {
            $table->text('l217')->after('l216')->nullable();
            $table->text('l218')->after('l217')->nullable();
            $table->text('l219')->after('l218')->nullable();
            $table->text('l220')->after('l219')->nullable();
            $table->text('l221')->after('l220')->nullable();
            $table->text('l222')->after('l221')->nullable();
            $table->text('l223')->after('l222')->nullable();
            $table->text('l224')->after('l223')->nullable();
            $table->text('l225')->after('l224')->nullable();
            $table->text('l226')->after('l225')->nullable();
            $table->text('l227')->after('l226')->nullable();
            $table->text('l228')->after('l227')->nullable();
            $table->text('l229')->after('l228')->nullable();
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
            $table->dropColumn('l217');
            $table->dropColumn('l218');
            $table->dropColumn('l219');
            $table->dropColumn('l220');
            $table->dropColumn('l221');
            $table->dropColumn('l222');
            $table->dropColumn('l223');
            $table->dropColumn('l224');
            $table->dropColumn('l225');
            $table->dropColumn('l226');
            $table->dropColumn('l227');
            $table->dropColumn('l228');
            $table->dropColumn('l229');
        });
    }
}
