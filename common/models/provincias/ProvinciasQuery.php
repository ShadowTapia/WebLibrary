<?php

namespace common\models\provincias;

/**
 * This is the ActiveQuery class for [[Provincias]].
 *
 * @see Provincias
 */
class ProvinciasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Provincias[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Provincias|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
