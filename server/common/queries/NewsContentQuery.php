<?php

namespace common\queries;

/**
 * This is the ActiveQuery class for [[\common\models\NewsContent]].
 *
 * @see \common\models\NewsContent
 */
class NewsContentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\NewsContent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\NewsContent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}