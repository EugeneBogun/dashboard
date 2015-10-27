<?php
/* @author Eugene Bogun <eugenebogun@gmail.com> */

namespace backend\modules\v1\controllers;

use yii\filters\Cors;
use yii\rest\ActiveController;

class MessageController extends ActiveController
{
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public $modelClass = 'common\models\Message';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => Cors::className()
        ];

        return $behaviors;
    }

}