<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "competition".
 *
 * @property int $id
 * @property string $name
 * @property int $people
 *
 * @property People $people0
 */
class Competition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'competition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'people'], 'required'],
            [['people'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
            'name' => 'Name',
            'people' => 'People',
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
}
