<?php

namespace common\models;

use common\components\ActiveRecord;
use common\queries\UserProfileQuery;
use Yii;

/**
 * This is the model class for table "{{%user_profile}}".
 *
 * @property integer $userId
 * @property string $firstName
 * @property string $lastName
 * @property string $phoneNumber
 * @property string $city
 * @property string $region
 * @property string $country
 * @property string $address
 * @property string $address2
 * @property string $address3
 * @property string $zipCode
 * @property string $birthday
 *
 * @property User $user
 */
class UserProfile extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_profile}}';
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
            'userId' => Yii::t('app', 'User ID'),
            'firstName' => Yii::t('app', 'First Name'),
            'lastName' => Yii::t('app', 'Last Name'),
            'phoneNumber' => Yii::t('app', 'Phone Number'),
            'city' => Yii::t('app', 'City'),
            'region' => Yii::t('app', 'Region'),
            'country' => Yii::t('app', 'Country'),
            'address' => Yii::t('app', 'Address'),
            'address2' => Yii::t('app', 'Address2'),
            'address3' => Yii::t('app', 'Address3'),
            'zipCode' => Yii::t('app', 'Zip Code'),
            'birthday' => Yii::t('app', 'Birthday'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    /**
     * @inheritdoc
     * @return \common\queries\UserProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserProfileQuery(get_called_class());
    }
}
