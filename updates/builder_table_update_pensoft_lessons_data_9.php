<?php namespace Pensoft\Lessons\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftLessonsData9 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_lessons_data', function($table)
        {
            $table->integer('lesson_number')->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_lessons_data', function($table)
        {
            $table->dropColumn('lesson_number');
        });
    }
}
