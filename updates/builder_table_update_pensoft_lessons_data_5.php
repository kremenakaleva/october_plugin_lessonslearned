<?php namespace Pensoft\Lessons\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftLessonsData5 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_lessons_data', function($table)
        {
            $table->text('how_lesson_learned')->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->text('needs')->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->text('innovation_aspects')->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->text('benefits')->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->text('key_factors')->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->text('gaps_identified')->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->text('gaps_what')->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->text('gaps_how')->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->text('applicability')->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->text('adding_resources')->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->text('complementary_outputs')->nullable()->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_lessons_data', function($table)
        {
            $table->string('how_lesson_learned', 255)->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->string('needs', 255)->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->string('innovation_aspects', 255)->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->string('benefits', 255)->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->string('key_factors', 255)->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->string('gaps_identified', 255)->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->string('gaps_what', 255)->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->string('gaps_how', 255)->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->string('applicability', 255)->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->string('adding_resources', 255)->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->string('complementary_outputs', 255)->nullable()->unsigned(false)->default(null)->comment(null)->change();
        });
    }
}
