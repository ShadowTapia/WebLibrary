<?php

namespace frontend\resource;

class Provincias extends \common\models\provincias\Provincias
{
    public function fields()
    {
        return ['idProvincia', 'Provincia', 'codRegion'];
    }

    public function extraFields()
    {
        return ['codRegion0'];
    }
}
