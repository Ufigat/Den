<?php

namespace app\models;

use yii\base\Model;

class FoundLoad extends Model
{
    public $party;
    public $date_start;
    public $date_end;
    public $trainer;
    public function rules()
    {
        return [
            [
                 ['party', 'date_start','trainer','date_end'], 'default'
            ],
        ];
    }
}
        