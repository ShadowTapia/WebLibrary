<?php

namespace common\models\temas;

/**
 * This is the ActiveQuery class for [[Temas]].
 *
 * @see Temas
 */
class TemasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Temas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Temas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
