<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "people".
 *
 * @property int $id
 * @property string $type
 * @property string|null $full_name
 * @property string $year_of_birth
 * @property string $gender
 *
 * @property Competition[] $competitions
 * @property Leaders[] $leaders
 * @property Tourists[] $tourists
 * @property Trainers[] $trainers
 */
class People extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'people';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'year_of_birth', 'gender'], 'required'],
            [['type', 'gender'], 'string'],
            [['year_of_birth'], 'safe'],
            [['full_name'], 'string', 'max' => 255],
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
            'full_name' => 'Full Name',
            'year_of_birth' => 'Year Of Birth',
            'gender' => 'Gender',
        ];
    }

    /**
     * Gets query for [[Competitions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompetitions()
    {
        return $this->hasMany(Competition::className(), ['people' => 'id']);
    }

    /**
     * Gets query for [[Leaders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeaders()
    {
        return $this->hasMany(Leaders::className(), ['people' => 'id']);
    }

    /**
     * Gets query for [[Tourists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTourists()
    {
        return $this->hasMany(Tourists::className(), ['people' => 'id']);
    }

    /**
     * Gets query for [[Trainers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrainers()
    {
        return $this->hasMany(Trainers::className(), ['people' => 'id']);
    }
}
