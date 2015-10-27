<?php

namespace common\models;

use common\components\ActiveRecord;
use common\queries\MessageQuery;
use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "{{%message}}".
 *
 * @property integer $id
 * @property string $form
 * @property string $title
 * @property string $data
 * @property string $message
 * @property string $ip
 * @property string $location
 * @property string $siteLanguage
 * @property string $createdAt
 * @property string $updatedAt
 * @property integer $status
 */
class Message extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%message}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['form', 'title', 'message', 'ip'], 'required'],
            [['data', 'message'], 'string'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['status'], 'integer'],
            [['form', 'title', 'ip', 'location', 'siteLanguage'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'form' => Yii::t('app', 'Form'),
            'title' => Yii::t('app', 'Title'),
            'data' => Yii::t('app', 'Data'),
            'message' => Yii::t('app', 'Message'),
            'ip' => Yii::t('app', 'Ip'),
            'location' => Yii::t('app', 'Location'),
            'siteLanguage' => Yii::t('app', 'Site Language'),
            'createdAt' => Yii::t('app', 'Created At'),
            'updatedAt' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\queries\MessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessageQuery(get_called_class());
    }

    public function fields()
    {
        $fields = parent::fields();

        unset($fields['createdAt'], $fields['updatedAt']);

        $fields['date'] = function(){
            return $this->createdAt;
        };

        $fields['data'] = function(){
            return Json::decode($this->data);
        };

        return $fields;
    }
}
