<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "route".
 *
 * @property int $id
 * @property string $name
 * @property int $distance
 * @property string $complexity
 *
 * @property Hike[] $hikes
 * @property Manypoints[] $manypoints
 * @property Points[] $points
 * @property UnscheduledHike[] $unscheduledHikes
 */
class Route extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'route';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'distance', 'complexity'], 'required'],
            [['distance'], 'integer'],
            [['complexity'], 'string'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'distance' => 'Distance',
            'complexity' => 'Complexity',
        ];
    }

    /**
     * Gets query for [[Hikes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHikes()
    {
        return $this->hasMany(Hike::className(), ['route' => 'id']);
    }

    /**
     * Gets query for [[Manypoints]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManypoints()
    {
        return $this->hasMany(Manypoints::className(), ['id_route' => 'id']);
    }

    /**
     * Gets query for [[Points]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPoints()
    {
        return $this->hasMany(Points::className(), ['id' => 'id_points'])->viaTable('manypoints', ['id_route' => 'id']);
    }

    /**
     * Gets query for [[UnscheduledHikes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnscheduledHikes()
    {
        return $this->hasMany(UnscheduledHike::className(), ['route' => 'id']);
    }
}
