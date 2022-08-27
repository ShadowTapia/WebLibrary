<?php

namespace common\models\anos;

/**
 * This is the ActiveQuery class for [[Anos]].
 *
 * @see Anos
 */
class AnosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Anos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Anos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
