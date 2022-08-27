<?php

namespace frontend\resource;

class Comunas extends \common\models\comunas\Comunas
{
    public function fields()
    {
        return ['codComuna', 'comuna', 'idProvincia'];
    }
    public function extraFields()
    {
        return ['idProvincia0'];
    }
}
