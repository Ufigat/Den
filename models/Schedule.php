<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property int $section
 * @property int $count
 * @property string $place
 * @property string $date
 * @property string $time
 * @property int $hour
 *
 * @property Section $section0
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'section', 'count', 'place', 'date', 'time', 'hour'], 'required'],
            [['id', 'section', 'count', 'hour'], 'integer'],
            [['date', 'time'], 'safe'],
            [['place'], 'string', 'max' => 100],
            [['id'], 'unique'],
            [['section'], 'exist', 'skipOnError' => true, 'targetClass' => Section::className(), 'targetAttribute' => ['section' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section' => 'Section',
            'count' => 'Count',
            'place' => 'Place',
            'date' => 'Date',
            'time' => 'Time',
            'hour' => 'Hour',
        ];
    }

    /**
     * Gets query for [[Section0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSection0()
    {
        return $this->hasOne(Section::className(), ['id' => 'section']);
    }
}
