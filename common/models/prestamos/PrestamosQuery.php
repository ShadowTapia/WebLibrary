<?php

namespace common\models\prestamos;

/**
 * This is the ActiveQuery class for [[Prestamos]].
 *
 * @see Prestamos
 */
class PrestamosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Prestamos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Prestamos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
