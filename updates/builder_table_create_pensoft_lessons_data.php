<?php namespace Pensoft\Lessons\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftLessonsData extends Migration
{
    public function up()
    {
        Schema::create('pensoft_lessons_data', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->text('description');
            $table->text('classification');
            $table->string('transversal_topics')->nullable();
            $table->string('4m')->nullable();
            $table->text('challenges')->nullable();
            $table->string('related_product')->nullable();
            $table->string('city')->nullable();
            $table->string('area')->nullable();
            $table->string('scale')->nullable();
            $table->string('time')->nullable();
            $table->string('contact')->nullable();
            $table->string('related_docs')->nullable();
            $table->string('available_documents')->nullable();
            $table->string('how_lesson_learned')->nullable();
            $table->string('needs')->nullable();
            $table->string('innovation_aspects')->nullable();
            $table->string('benefits')->nullable();
            $table->string('key_factors')->nullable();
            $table->string('gaps_identified')->nullable();
            $table->string('gaps_what')->nullable();
            $table->string('gaps_how')->nullable();
            $table->string('applicability')->nullable();
            $table->string('adding_resources')->nullable();
            $table->string('complementary_outputs')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pensoft_lessons_data');
    }
}
