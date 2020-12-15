<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hike".
 *
 * @property int $id
 * @property int $route
 * @property int $days
 * @property int $trainer
 * @property string $diary
 * @property int $type
 *
 * @property Trainers $trainer0
 * @property Route $route0
 * @property RouteTypes $type0
 */
class Hike extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hike';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['route', 'days', 'trainer', 'diary', 'type'], 'required'],
            [['route', 'days', 'trainer', 'type'], 'integer'],
            [['diary'], 'string', 'max' => 300],
            [['trainer'], 'exist', 'skipOnError' => true, 'targetClass' => Trainers::className(), 'targetAttribute' => ['trainer' => 'id']],
            [['route'], 'exist', 'skipOnError' => true, 'targetClass' => Route::className(), 'targetAttribute' => ['route' => 'id']],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => RouteTypes::className(), 'targetAttribute' => ['type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'route' => 'Route',
            'days' => 'Days',
            'trainer' => 'Trainer',
            'diary' => 'Diary',
            'type' => 'Type',
        ];
    }

    /**
     * Gets query for [[Trainer0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrainer0()
    {
        return $this->hasOne(Trainers::className(), ['id' => 'trainer']);
    }

    /**
     * Gets query for [[Route0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoute0()
    {
        return $this->hasOne(Route::className(), ['id' => 'route']);
    }

    /**
     * Gets query for [[Type0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(RouteTypes::className(), ['id' => 'type']);
    }
}
