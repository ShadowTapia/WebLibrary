<?php

namespace common\models\ejemplar;

/**
 * This is the ActiveQuery class for [[Ejemplar]].
 *
 * @see Ejemplar
 */
class EjemplarQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Ejemplar[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Ejemplar|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
