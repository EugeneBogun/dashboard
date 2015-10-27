<?php

namespace common\queries;

/**
 * This is the ActiveQuery class for [[\common\models\Page]].
 *
 * @see \common\models\Page
 */
class PageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Page[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Page|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}