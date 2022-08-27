<?php

namespace common\models\apoderados;

/**
 * This is the ActiveQuery class for [[Apoderados]].
 *
 * @see Apoderados
 */
class ApoderadosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Apoderados[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Apoderados|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
