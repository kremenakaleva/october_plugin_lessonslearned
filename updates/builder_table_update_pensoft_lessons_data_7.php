<?php namespace Pensoft\Lessons\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftLessonsData7 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_lessons_data', function($table)
        {
            $table->string('category')->change();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_lessons_data', function($table)
        {
            $table->smallInteger('category')->change();
        });
    }
}
