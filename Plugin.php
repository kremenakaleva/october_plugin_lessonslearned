<?php namespace Pensoft\Lessons;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Pensoft\Lessons\Components\Filter' => 'filter',
        ];
    }

    public function registerSettings()
    {
    }
}
