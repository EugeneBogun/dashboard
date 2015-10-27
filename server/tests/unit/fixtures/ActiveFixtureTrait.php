<?php

namespace tests\unit\fixtures;

/**
 * Class ActiveFixtureTrait
 * @package tests\unit\fixtures
 */
trait ActiveFixtureTrait
{


    /**
     * @throws \yii\db\Exception
     */
    public function unload()
    {
        $data = $this->getData();
        foreach ($data as $record) {
            $deleteByConditions = [];
            foreach ($this->deleteBy as $deleteByColName) {
                $deleteByConditions[$deleteByColName] = $record[$deleteByColName];
            }

            $this->db->createCommand()->delete($this->tableName, $deleteByConditions)->execute();
        }
    }

}