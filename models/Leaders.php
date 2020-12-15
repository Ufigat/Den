<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "leaders".
 *
 * @property int $id
 * @property int $people
 * @property int $wage
 * @property string $begin
 *
 * @property People $people0
 * @property Section[] $sections
 */
class Leaders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leaders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['people', 'wage', 'begin'], 'required'],
            [['people', 'wage'], 'integer'],
            [['begin'], 'safe'],
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
            'begin' => 'Begin',
        ];
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
     * Gets query for [[Sections]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(Section::className(), ['leader' => 'id']);
    }
}
