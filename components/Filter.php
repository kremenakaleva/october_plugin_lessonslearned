<?php namespace Pensoft\Lessons\Components;

use Cms\Classes\ComponentBase;
use Pensoft\Lessons\Models\LessonsData as LessonsModel;

class Filter extends ComponentBase
{

    public $lessons;
    public $four_m;
    public $city;
    public $searchQuery;

    public function onRun()
    {
        $this->addJs('assets/js/select2.js');
        $this->lessons = $this->filterLessons();
    }

    public function componentDetails()
    {
        return [
            'name' => 'Filter Lessons',
            'description' => 'Lightweight, flexible component for Filter Lessons content.'
        ];
    }

    protected function filterLessons(){
        $categories = \Input::get('category');
        $four_m = \Input::get('four_m');
        $city = \Input::get('city');
        $search = \Input::get('searchQuery');
    
        $this->page['categories'] = $categories;
        $this->page['four_m'] = $four_m;
        $this->page['city'] = $city;
        $this->page['searchQuery'] = $search;
    
        $query = LessonsModel::query();
    
        if ($categories && is_array($categories)) {
            $query->where(function ($subQuery) use ($categories) {
                foreach ($categories as $category) {
                    $subQuery->orWhereJsonContains('category', $category);
                }
            });
        }
    
        if ($four_m && is_array($four_m)) {
            $query->where(function ($subQuery) use ($four_m) {
                foreach ($four_m as $m) {
                    $subQuery->orWhereJsonContains('four_m', $m);
                }
            });
        }   
    
        if ($city) {
            $encodedCity = json_encode($city);
            $encodedCity = trim($encodedCity, '"');

            $likeCity = '%"'.$encodedCity.'"%';
            $query->where('city', 'LIKE', $likeCity);
        }

        if($search){
            $query->where('description', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('four_m', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('city', 'ILIKE', '%'.trim($search).'%');
        }

        return $query->get();
    }
}
