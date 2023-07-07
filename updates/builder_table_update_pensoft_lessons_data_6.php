<?php namespace Pensoft\Lessons\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftLessonsData6 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_lessons_data', function($table)
        {
            $table->smallInteger('category')->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_lessons_data', function($table)
        {
            $table->dropColumn('category');
        });
    }
}
