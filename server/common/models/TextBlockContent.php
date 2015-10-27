<?php

namespace common\models;

use common\components\ActiveRecord;
use common\queries\TextBlockContentQuery;
use Yii;

/**
 * This is the model class for table "{{%text_block_content}}".
 *
 * @property integer $textBlockId
 * @property string $language
 * @property string $content
 * @property integer $status
 *
 * @property TextBlock $textBlock
 */
class TextBlockContent extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%text_block_content}}';
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
            'textBlockId' => Yii::t('app', 'Text Block ID'),
            'language' => Yii::t('app', 'Language'),
            'content' => Yii::t('app', 'Content'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTextBlock()
    {
        return $this->hasOne(TextBlock::className(), ['id' => 'textBlockId']);
    }

    /**
     * @inheritdoc
     * @return \common\queries\TextBlockContentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TextBlockContentQuery(get_called_class());
    }
}
