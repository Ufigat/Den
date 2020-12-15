<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "section".
 *
 * @property int $id
 * @property string $name
 * @property int $leader
 * @property int $trainer
 *
 * @property Party[] $parties
 * @property Schedule[] $schedules
 * @property Leaders $leader0
 * @property Trainers $trainer0
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'leader', 'trainer'], 'required'],
            [['leader', 'trainer'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['leader'], 'exist', 'skipOnError' => true, 'targetClass' => Leaders::className(), 'targetAttribute' => ['leader' => 'id']],
            [['trainer'], 'exist', 'skipOnError' => true, 'targetClass' => Trainers::className(), 'targetAttribute' => ['trainer' => 'id']],
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
            'leader' => 'Leader',
            'trainer' => 'Trainer',
        ];
    }

    /**
     * Gets query for [[Parties]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParties()
    {
        return $this->hasMany(Party::className(), ['section' => 'id']);
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['section' => 'id']);
    }

    /**
     * Gets query for [[Leader0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeader0()
    {
        return $this->hasOne(Leaders::className(), ['id' => 'leader']);
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
}
