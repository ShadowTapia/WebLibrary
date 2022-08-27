<?php

namespace common\models\numejem;

/**
 * This is the ActiveQuery class for [[Numejem]].
 *
 * @see Numejem
 */
class NumejemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Numejem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Numejem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
