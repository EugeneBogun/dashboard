<?php
namespace common\behaviors;

use yii\db\Expression;

/**
 * Class TimestampBehavior
 * @package common\behaviors
 */
class TimestampBehavior extends \yii\behaviors\TimestampBehavior
{
    /**
     * @inheritdoc
     */
    public $createdAtAttribute = 'createdAt';

    /**
     * @inheritdoc
     */
    public $updatedAtAttribute = 'updatedAt';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->value = new Expression("NOW()");
    }


}