<?php namespace Pensoft\Lessons\Models;

use Model;

/**
 * Model
 */
class LessonsData extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    use \October\Rain\Database\Traits\NestedTree;

    protected $dates = ['deleted_at'];

    protected $jsonable = ['classification', 'challenges', 'four_m', 'category', 'city'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_lessons_data';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
