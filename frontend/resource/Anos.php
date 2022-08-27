<?php

namespace frontend\resource;

class Anos extends \common\models\anos\Anos
{
    public function fields()
    {
        return ['idano', 'nombreano', 'activo'];
    }
}
