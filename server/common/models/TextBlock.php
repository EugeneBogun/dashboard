<?php

namespace common\models;

use common\components\ActiveRecord;
use common\queries\TextBlockQuery;
use Yii;

/**
 * This is the model class for table "{{%text_block}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $shortcut
 * @property string $createdAt
 * @property string $updatedAt
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property integer $status
 *
 * @property User $createdByRel
 * @property User $updatedByRel
 * @property TextBlockContent $textBlockContent
 */
class TextBlock extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%text_block}}';
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
     * @return \yii\db\ActiveQuery
     */
    public function getTextBlockContent()
    {
        return $this->hasOne(TextBlockContent::className(), ['textBlockId' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\queries\TextBlockQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TextBlockQuery(get_called_class());
    }
}
