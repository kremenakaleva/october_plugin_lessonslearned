<?php namespace Pensoft\Lessons\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftLessonsData8 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_lessons_data', function($table)
        {
            $table->text('classification')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_lessons_data', function($table)
        {
            $table->text('classification')->nullable(false)->change();
        });
    }
}
