<?php

namespace common\models;

use common\components\ActiveRecord;
use common\queries\PageContentQuery;
use Yii;

/**
 * This is the model class for table "{{%page_content}}".
 *
 * @property integer $pageId
 * @property string $url
 * @property string $language
 * @property string $content
 * @property string $meteTitle
 * @property string $meteKeywords
 * @property string $meteDescription
 * @property integer $status
 *
 * @property Page $page
 */
class PageContent extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%page_content}}';
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
            'pageId' => Yii::t('app', 'Page ID'),
            'url' => Yii::t('app', 'Url'),
            'language' => Yii::t('app', 'Language'),
            'content' => Yii::t('app', 'Content'),
            'meteTitle' => Yii::t('app', 'Mete Title'),
            'meteKeywords' => Yii::t('app', 'Mete Keywords'),
            'meteDescription' => Yii::t('app', 'Mete Description'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'pageId']);
    }

    /**
     * @inheritdoc
     * @return \common\queries\PageContentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PageContentQuery(get_called_class());
    }
}
