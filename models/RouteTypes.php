<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "route_types".
 *
 * @property int $id
 * @property string $type
 *
 * @property Hike[] $hikes
 * @property UnscheduledHike[] $unscheduledHikes
 */
class RouteTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'route_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
        ];
    }

    /**
     * Gets query for [[Hikes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHikes()
    {
        return $this->hasMany(Hike::className(), ['type' => 'id']);
    }

    /**
     * Gets query for [[UnscheduledHikes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnscheduledHikes()
    {
        return $this->hasMany(UnscheduledHike::className(), ['type' => 'id']);
    }
}
