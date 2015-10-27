<?php

namespace common\queries;

/**
 * This is the ActiveQuery class for [[\common\models\TextBlock]].
 *
 * @see \common\models\TextBlock
 */
class TextBlockQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\TextBlock[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\TextBlock|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}