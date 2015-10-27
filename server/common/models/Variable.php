<?php

namespace common\models;

use common\components\ActiveRecord;
use common\queries\VariableQuery;
use Yii;

/**
 * This is the model class for table "{{%variable}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $shortcut
 * @property integer $type
 * @property string $content
 * @property string $createdAt
 * @property string $updatedAt
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property integer $status
 *
 * @property User $createdByRel
 * @property User $updatedByRel
 */
class Variable extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%variable}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'shortcut' => Yii::t('app', 'Shortcut'),
            'type' => Yii::t('app', 'Type'),
            'content' => Yii::t('app', 'Content'),
            'createdAt' => Yii::t('app', 'Created At'),
            'updatedAt' => Yii::t('app', 'Updated At'),
            'createdBy' => Yii::t('app', 'Created By'),
            'updatedBy' => Yii::t('app', 'Updated By'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedByRel()
    {
        return $this->hasOne(User::className(), ['id' => 'createdBy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedByRel()
    {
        return $this->hasOne(User::className(), ['id' => 'updatedBy']);
    }

    /**
     * @inheritdoc
     * @return \common\queries\VariableQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VariableQuery(get_called_class());
    }
}
