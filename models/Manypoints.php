<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "manypoints".
 *
 * @property int $id_points
 * @property int $id_route
 *
 * @property Points $points
 * @property Route $route
 */
class Manypoints extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manypoints';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_points', 'id_route'], 'required'],
            [['id_points', 'id_route'], 'integer'],
            [['id_points', 'id_route'], 'unique', 'targetAttribute' => ['id_points', 'id_route']],
            [['id_points'], 'exist', 'skipOnError' => true, 'targetClass' => Points::className(), 'targetAttribute' => ['id_points' => 'id']],
            [['id_route'], 'exist', 'skipOnError' => true, 'targetClass' => Route::className(), 'targetAttribute' => ['id_route' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_points' => 'Id Points',
            'id_route' => 'Id Route',
        ];
    }

    /**
     * Gets query for [[Points]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPoints()
    {
        return $this->hasOne(Points::className(), ['id' => 'id_points']);
    }

    /**
     * Gets query for [[Route]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoute()
    {
        return $this->hasOne(Route::className(), ['id' => 'id_route']);
    }
}
