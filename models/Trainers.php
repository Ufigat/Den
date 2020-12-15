<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trainers".
 *
 * @property int $id
 * @property int $people
 * @property int $wage
 * @property string $specialization
 *
 * @property Hike[] $hikes
 * @property Section[] $sections
 * @property People $people0
 * @property UnscheduledHike[] $unscheduledHikes
 */
class Trainers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trainers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['people', 'wage', 'specialization'], 'required'],
            [['people', 'wage'], 'integer'],
            [['specialization'], 'string'],
            [['people'], 'exist', 'skipOnError' => true, 'targetClass' => People::className(), 'targetAttribute' => ['people' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'people' => 'People',
            'wage' => 'Wage',
            'specialization' => 'Specialization',
        ];
    }

    /**
     * Gets query for [[Hikes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHikes()
    {
        return $this->hasMany(Hike::className(), ['trainer' => 'id']);
    }

    /**
     * Gets query for [[Sections]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(Section::className(), ['trainer' => 'id']);
    }

    /**
     * Gets query for [[People0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeople0()
    {
        return $this->hasOne(People::className(), ['id' => 'people']);
    }

    /**
     * Gets query for [[UnscheduledHikes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnscheduledHikes()
    {
        return $this->hasMany(UnscheduledHike::className(), ['trainer' => 'id']);
    }
}
