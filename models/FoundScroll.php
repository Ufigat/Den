<?php

namespace app\models;

use yii\base\Model;

class FoundScroll extends Model
{
    public $category;
    public $hike;
    public $route;
    public $points;
    public function rules()
    {
        return [
            [
                 ['category', 'hike','route','points'], 'default'
            ],
        ];
    }
}
        