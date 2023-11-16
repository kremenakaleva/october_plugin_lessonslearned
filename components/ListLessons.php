<?php namespace Pensoft\Lessons\Components;

use Cms\Classes\ComponentBase;
use Pensoft\Lessons\Models\LessonsData;

/**
 * ListLessons Component
 */
class ListLessons extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'List Lessons Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function onRun()
    {
        $this->page['lessons'] = $this->lessons();
    }

    public function defineProperties()
    {
        return [
            'lessons_numbers' => [
                'title' => 'Lessons numbers',
                'default' => '',
                'description' => 'Comma separated lessons numbers',
            ],
        ];
    }

    public function lessons(){
        $lessonsNumbers = $this->stringToArray($this->property('lessons_numbers'))->toArray();
        $intLessonsNumbers = array_map('intval', $lessonsNumbers);
        return LessonsData::whereIn('lesson_number', $intLessonsNumbers)->get();
    }

    protected function stringToArray($stringSeperatedCommas){
        return collect(explode(',', $stringSeperatedCommas))->map(function ($string) {
            return trim($string) != null ? trim($string) : null;
        })->filter(function ($string) {
            return trim($string) != null;
        });
    }
}
