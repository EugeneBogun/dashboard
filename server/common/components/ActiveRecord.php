<?php
namespace common\components;
/**
 * Class ActiveRecord
 * @package common\components
 */
class ActiveRecord extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    /**
     * @param $runValidation
     * @param $attributeNames
     * @return bool
     */
    public function trySave($runValidation = true, $attributeNames = null)
    {
        if (false === $this->save($runValidation, $attributeNames)) {
            throw new \LogicException;
        }
        return true;
    }

    /**
     * @param $runValidation
     * @param $attributeNames
     * @return bool
     */
    public function tryUpdate($runValidation = true, $attributeNames = null)
    {
        if (false === $this->update($runValidation, $attributeNames)) {
            throw new \LogicException;
        }
        return true;
    }

    /**
     * @param $runValidation
     * @param $attributeNames
     * @return bool
     */
    public function tryInsert($runValidation = true, $attributeNames = null)
    {
        if (false === $this->insert($runValidation, $attributeNames)) {
            throw new \LogicException;
        }
        return true;
    }
}