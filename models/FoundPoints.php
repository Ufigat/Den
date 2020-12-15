<?php

namespace app\models;

use yii\base\Model;

class FoundPoints extends Model
{
    public $point;
    public $length;
    public $complexity;
    public function rules()
    {
        return [
            [
                 ['point', 'length','complexity'], 'default'
            ],
        ];
    }
}
        