<?php

namespace common\models\editorial;

/**
 * This is the ActiveQuery class for [[Editorial]].
 *
 * @see Editorial
 */
class EditorialQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Editorial[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Editorial|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
