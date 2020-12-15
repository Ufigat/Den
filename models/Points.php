<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "points".
 *
 * @property int $id
 * @property string $name
 *
 * @property Manypoints[] $manypoints
 * @property Route[] $routes
 */
class Points extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'points';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
        ];
    }

    /**
     * Gets query for [[Manypoints]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManypoints()
    {
        return $this->hasMany(Manypoints::className(), ['id_points' => 'id']);
    }

    /**
     * Gets query for [[Routes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoutes()
    {
        return $this->hasMany(Route::className(), ['id' => 'id_route'])->viaTable('manypoints', ['id_points' => 'id']);
    }
}
