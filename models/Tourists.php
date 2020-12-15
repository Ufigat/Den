<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tourists".
 *
 * @property int $id
 * @property int $people
 * @property int $party
 * @property string $category
 *
 * @property Party $party0
 * @property People $people0
 */
class Tourists extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tourists';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['people', 'party', 'category'], 'required'],
            [['people', 'party'], 'integer'],
            [['category'], 'string'],
            [['party'], 'exist', 'skipOnError' => true, 'targetClass' => Party::className(), 'targetAttribute' => ['party' => 'id']],
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
            'party' => 'Party',
            'category' => 'Category',
        ];
    }

    /**
     * Gets query for [[Party0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParty0()
    {
        return $this->hasOne(Party::className(), ['id' => 'party']);
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
