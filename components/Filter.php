<?php namespace Pensoft\Lessons\Components;

use Cms\Classes\ComponentBase;
use Pensoft\Lessons\Models\LessonsData as LessonsModel;

class Filter extends ComponentBase
{

    public $lessons;
    public $classification;
    public $transversal_topics;
    public $four_m;
    public $challenges;
    public $city;
    public $area;
    public $time;
    public $contact;
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
        $single_category = \Input::get('single_category');
        $classification = \Input::get('classification');
        $transversal_topics = \Input::get('transversal_topics');
        $four_m = \Input::get('four_m');
        $challenges = \Input::get('challenges');
        $city = \Input::get('city');
        $area = \Input::get('area');
        $time = \Input::get('time');
        $contact = \Input::get('contact');
        $search = \Input::get('searchQuery');

        $this->page['classification'] = $classification;
        $this->page['categories'] = $categories;
        $this->page['transversal_topics'] = $transversal_topics;
        $this->page['four_m'] = $four_m;
        $this->page['challenges'] = $challenges;
        $this->page['city'] = $city;
        $this->page['area'] = $area;
        $this->page['time'] = $time;
        $this->page['contact'] = $contact;
        $this->page['searchQuery'] = $search;
        $this->page['single_category'] = $single_category;

        $query = LessonsModel::query();
        $arrayFilters = [
            'classification' => $classification,
            'transversal_topics' => $transversal_topics,
            'four_m' => $four_m,
            'challenges' => $challenges,
        ];

        foreach ($arrayFilters as $column => $values) {
            if ($values) {
                $valuesArray = is_array($values) ? $values : [$values];
                $query->where(function($query) use ($column, $valuesArray) {
                    foreach ($valuesArray as $value) {
                        if(!empty(trim($value))) {
                            $query->orWhere($column, 'ILIKE', '%' . trim($value) . '%');
                        }
                    }
                });
            }
        }
        
        
        if($city){
            $query->where('city', 'ILIKE', '%'.trim($city).'%');
        }

        if($area){
            $query->where('area', 'ILIKE', '%'.trim($area).'%');
        }

        if($time){
            $query->where('time', 'ILIKE', '%'.trim($time).'%');
        }

        if($contact){
            $query->where('contact', 'ILIKE', '%'.trim($contact).'%');
        }

        if($search){
            $query->where('name', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('description', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('classification', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('transversal_topics', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('four_m', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('four_m', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('challenges', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('city', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('area', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('time', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('contact', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('available_documents', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('how_lesson_learned', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('needs', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('benefits', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('key_factors', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('gaps_what', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('gaps_how', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('gaps_identified', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('adding_resources', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('complementary_outputs', 'ILIKE', '%'.trim($search).'%')
                ->orWhere('related_product', 'ILIKE', '%'.trim($search).'%');
        }

        return $query->get();
    }
}
