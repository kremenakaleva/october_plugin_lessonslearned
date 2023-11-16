<?php namespace Pensoft\Lessons;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Pensoft\Lessons\Components\Filter' => 'filter',
            'Pensoft\Lessons\Components\ListLessons' => 'ListLessons',
        ];
    }

    public function registerSettings()
    {
    }
}
