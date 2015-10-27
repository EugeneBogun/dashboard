<?php

namespace common\models;

use common\components\ActiveRecord;
use common\queries\NewsContentQuery;
use Yii;

/**
 * This is the model class for table "{{%news_content}}".
 *
 * @property integer $newsId
 * @property string $url
 * @property string $language
 * @property string $content
 * @property string $meteTitle
 * @property string $meteKeywords
 * @property string $meteDescription
 * @property integer $status
 *
 * @property News $news
 */
class NewsContent extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news_content}}';
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
            'newsId' => Yii::t('app', 'News ID'),
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
    public function getNews()
    {
        return $this->hasOne(News::className(), ['id' => 'newsId']);
    }

    /**
     * @inheritdoc
     * @return \common\queries\NewsContentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsContentQuery(get_called_class());
    }
}
