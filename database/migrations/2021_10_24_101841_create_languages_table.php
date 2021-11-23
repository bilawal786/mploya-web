<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('l1')->nullable();
            $table->string('l2')->nullable();
            $table->string('l3')->nullable();
            $table->string('l4')->nullable();
            $table->string('l5')->nullable();
            $table->string('l6')->nullable();
            $table->string('l7')->nullable();
            $table->string('l8')->nullable();
            $table->string('l9')->nullable();
            $table->string('l10')->nullable();
            $table->string('l11')->nullable();
            $table->string('l12')->nullable();
            $table->string('l13')->nullable();
            $table->string('l14')->nullable();
            $table->string('l15')->nullable();
            $table->string('l16')->nullable();
            $table->string('l17')->nullable();
            $table->string('l18')->nullable();
            $table->string('l19')->nullable();
            $table->string('l20')->nullable();
            $table->text('l21')->nullable();
            $table->text('l22')->nullable();
            $table->text('l23')->nullable();
            $table->text('l24')->nullable();
            $table->text('l25')->nullable();
            $table->text('l26')->nullable();
            $table->text('l27')->nullable();
            $table->text('l28')->nullable();
            $table->text('l29')->nullable();
            $table->text('l30')->nullable();
            $table->text('l31')->nullable();

            $table->text('l32')->nullable();
            $table->text('l33')->nullable();
            $table->text('l34')->nullable();
            $table->text('l35')->nullable();
            $table->text('l36')->nullable();
            $table->text('l37')->nullable();
            $table->text('l38')->nullable();
            $table->text('l39')->nullable();
            $table->text('l40')->nullable();
            $table->text('l41')->nullable();
            $table->text('l42')->nullable();
            $table->text('l43')->nullable();
            $table->text('l44')->nullable();

            $table->text('l45')->nullable();
            $table->text('l46')->nullable();
            $table->text('l47')->nullable();
            $table->text('l48')->nullable();
            $table->text('l49')->nullable();
            $table->text('l50')->nullable();
            $table->text('l51')->nullable();
            $table->text('l52')->nullable();
            $table->text('l53')->nullable();
            $table->text('l54')->nullable();
            $table->text('l55')->nullable();
            $table->text('l56')->nullable();
            $table->text('l57')->nullable();
            $table->text('l58')->nullable();
            $table->text('l59')->nullable();
            $table->text('l60')->nullable();
            $table->text('l61')->nullable();
            $table->text('l62')->nullable();
            $table->text('l63')->nullable();
            $table->text('l64')->nullable();
            $table->text('l65')->nullable();
            $table->text('l66')->nullable();
            $table->text('l67')->nullable();
            $table->text('l68')->nullable();
            $table->text('l69')->nullable();
            $table->text('l70')->nullable();
            $table->text('l71')->nullable();
            $table->text('l72')->nullable();
            $table->text('l73')->nullable();
            $table->text('l74')->nullable();
            $table->text('l75')->nullable();
            $table->text('l76')->nullable();
            $table->text('l77')->nullable();
            $table->text('l78')->nullable();
            $table->text('l79')->nullable();
            $table->text('l80')->nullable();
            $table->text('l81')->nullable();
            $table->text('l82')->nullable();
            $table->text('l83')->nullable();
            $table->text('l84')->nullable();
            $table->text('l85')->nullable();
            $table->text('l86')->nullable();
            $table->text('l87')->nullable();
            $table->text('l88')->nullable();
            $table->text('l89')->nullable();
            $table->text('l90')->nullable();
            $table->text('l91')->nullable();
            $table->text('l92')->nullable();
            $table->text('l93')->nullable();
            $table->text('l94')->nullable();
            $table->text('l95')->nullable();
            $table->text('l96')->nullable();
            $table->text('l97')->nullable();
            $table->text('l98')->nullable();
            $table->text('l99')->nullable();
            $table->text('l100')->nullable();
            $table->text('l101')->nullable();
            $table->text('l102')->nullable();
            $table->text('l103')->nullable();
            $table->text('l104')->nullable();
            $table->text('l105')->nullable();
            $table->text('l106')->nullable();
            $table->text('l107')->nullable();
            $table->text('l108')->nullable();
            $table->text('l109')->nullable();
            $table->text('l110')->nullable();
            $table->text('l111')->nullable();
            $table->text('l112')->nullable();
            $table->text('l113')->nullable();
            $table->text('l114')->nullable();
            $table->text('l115')->nullable();
            $table->text('l116')->nullable();
            $table->text('l117')->nullable();
            $table->text('l118')->nullable();
            $table->text('l119')->nullable();
            $table->text('l120')->nullable();
            $table->text('l121')->nullable();
            $table->text('l122')->nullable();
            $table->text('l123')->nullable();
            $table->text('l124')->nullable();
            $table->text('l125')->nullable();
            $table->text('l126')->nullable();
            $table->text('l127')->nullable();
            $table->text('l128')->nullable();
            $table->text('l129')->nullable();
            $table->text('l130')->nullable();
            $table->text('l131')->nullable();
            $table->text('l132')->nullable();
            $table->text('l133')->nullable();
            $table->text('l134')->nullable();
            $table->text('l135')->nullable();
            $table->text('l136')->nullable();
            $table->text('l137')->nullable();
            $table->text('l138')->nullable();
            $table->text('l139')->nullable();
            $table->text('l140')->nullable();
            $table->text('l141')->nullable();
            $table->text('l142')->nullable();
            $table->text('l143')->nullable();
            $table->text('l144')->nullable();
            $table->text('l145')->nullable();
            $table->text('l146')->nullable();
            $table->text('l147')->nullable();
            $table->text('l148')->nullable();
            $table->text('l149')->nullable();
            $table->text('l150')->nullable();
            $table->text('l151')->nullable();
            $table->text('l152')->nullable();
            $table->text('l153')->nullable();
            $table->text('l154')->nullable();
            $table->text('l155')->nullable();
            $table->text('l156')->nullable();
            $table->text('l157')->nullable();
            $table->text('l158')->nullable();
            $table->text('l159')->nullable();
            $table->text('l160')->nullable();
            $table->text('l161')->nullable();
            $table->text('l162')->nullable();
            $table->text('l163')->nullable();
            $table->text('l164')->nullable();
            $table->text('l165')->nullable();
            $table->text('l166')->nullable();
            $table->text('l167')->nullable();
            $table->text('l168')->nullable();
            $table->text('l169')->nullable();
            $table->text('l170')->nullable();
            $table->text('l171')->nullable();
            $table->text('l172')->nullable();
            $table->text('l173')->nullable();
            $table->text('l174')->nullable();
            $table->text('l175')->nullable();
            $table->text('l176')->nullable();
            $table->text('l177')->nullable();
            $table->text('l178')->nullable();
            $table->text('l179')->nullable();
            $table->text('l180')->nullable();
            $table->text('l181')->nullable();
            $table->text('l182')->nullable();
            $table->text('l183')->nullable();
            $table->text('l184')->nullable();
            $table->text('l185')->nullable();
            $table->text('l186')->nullable();
            $table->text('l187')->nullable();
            $table->text('l188')->nullable();
            $table->text('l189')->nullable();
            $table->text('l190')->nullable();
            $table->text('l191')->nullable();
            $table->text('l192')->nullable();
            $table->text('l193')->nullable();
            $table->text('l194')->nullable();
            $table->text('l195')->nullable();
            $table->text('l196')->nullable();
            $table->text('l197')->nullable();
            $table->text('l198')->nullable();
            $table->text('l199')->nullable();
            $table->text('l200')->nullable();

            $table->text('l201')->nullable();
            $table->text('l202')->nullable();
            $table->text('l203')->nullable();
            $table->text('l204')->nullable();
            $table->text('l205')->nullable();
            $table->text('l206')->nullable();
            $table->text('l207')->nullable();
            $table->text('l208')->nullable();
            $table->text('l209')->nullable();
            $table->text('l210')->nullable();

            $table->text('l211')->nullable();
            $table->text('l212')->nullable();
            $table->text('l213')->nullable();
            $table->text('l214')->nullable();
            $table->text('l215')->nullable();
            $table->text('l216')->nullable();

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
        Schema::dropIfExists('languages');
    }
}
