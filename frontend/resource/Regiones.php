<?php

namespace frontend\resource;

class Regiones extends \common\models\regiones\Regiones
{
    public function fields()
    {
        return ['codRegion', 'region', 'orden'];
    }
}
