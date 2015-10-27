<?php

namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

/* @author Eugene Bogun <eugenebogun@gmail.com> */
class MessageFixture extends ActiveFixture
{
    use ActiveFixtureTrait;

    /**
     * @var string
     */
    public $tableName = '{{%message}}';

    /**
     * @var string
     */
    public $deleteBy = ['id'];

}